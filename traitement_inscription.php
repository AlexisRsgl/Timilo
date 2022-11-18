<?php 
    require_once 'config.php'; // On inclu la connexion à la bdd

    // Si les variables existent et qu'elles ne sont pas vides
    if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password_retype']) && isset($_POST['nom']))
    {
        // Patch XSS
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $password_retype = htmlspecialchars($_POST['password_retype']);
        $nom = htmlspecialchars($_POST['nom']);

        // On vérifie si l'utilisateur existe
        $check = $bdd->prepare('SELECT email, password, nom FROM users WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();

        $email = strtolower($email); // on transforme toutes les lettres majuscules en minuscule pour éviter que Test@webilo.fr et test@webilo.fr soient deux comptes différents
        
        // Si la requête renvoie un 0 alors l'utilisateur n'existe pas 
        if($row == 0){ 
            if(strlen($email) <= 40){ // On verifie que la longueur du mail <= 40
                if(filter_var($email, FILTER_VALIDATE_EMAIL)){ // Si l'email est de la bonne forme
                    if(strlen($nom) <= 100){ // On verifie que la longueur du nom <= 100
                        if($password === $password_retype){ // si les deux mdp saisis sont bons

                            // On hash le mot de passe avec Bcrypt, via un coût de 12
                            $cost = ['cost' => 12];
                            $password = password_hash($password, PASSWORD_BCRYPT, $cost); 

                            // On insère dans la base de données
                            $insert = $bdd->prepare('INSERT INTO users(email, password, nom) VALUES(:email, :password, :nom)');
                            $insert->execute(array(
                                'email' => $email,
                                'password' => $password,
                                'nom' => $nom,
                            ));
                            // On redirige avec le message de succès
                            header('Location:inscription.php?reg_err=success');
                            die();
                            
                        

                        
                        }else{ header('Location: inscription.php?reg_err=password'); die();}
                    }else{ header('Location: inscription.php?reg_err=nom_length'); die();}
                }else{ header('Location: inscription.php?reg_err=email'); die();}
            }else{ header('Location: inscription.php?reg_err=email_length'); die();}
        }else{ header('Location: inscription.php?reg_err=already'); die();}
    }