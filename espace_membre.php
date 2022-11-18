<?php 
    session_start();
   if(!isset($_SESSION['user']))
    header('Location:index.php');
?>
<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Espace membre</title>
  </head>
  <body>
    <h1>Bienvenue sur Timilo <?php echo $_SESSION['user']; ?></h1>
    <div id="stopwatch">
        00:00:00
    </div>

<select name="projets" id="proj">
    <option value="">--Choississez votre projet--</option>
    <option value="timilo">Timilo</option>
    <option value="plub">Plub</option>
</select>

    <ul id="buttons">
        <li><button class="boutons" onclick="startTimer()">Démarrer</button></li>
        <li><button class="boutons" onclick="stopTimer()">Arrêter</button></li>
        <li><button class="boutons" onclick="resetTimer()">Enregistrer</button></li>
    </ul>

    <script src="timer.js"></script>
    <a href="deconnexion.php" class="btn btn-danger btn-lg" style="position: absolute; right: 0;">Déconnexion</a>
    <table CELLPADDING="2" CELLSPACING="2" WIDTH="80%">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Projet</th>
                    <th>Nom</th>
                    <th>Temps</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>20/11/2021</td>
                    <td>Plub</td>
                    <td>Alexis</td>
                    <td>02:03:04</td>
                </tr>
                <tr>
                    <td>17/11/2021</td>
                    <td>Timilo</td>
                    <td>Maxime</td>
                    <td>00:34:28</td>
                </tr>
                <tr>
                    <td>06/10/2021</td>
                    <td>Plub</td>
                    <td>Kevin</td>
                    <td>01:37:21</td>
                </tr>
                <tr>
                    <td>27/09/2020</td>
                    <td>Timilo</td>
                    <td>Alexis</td>
                    <td>00:07:56</td>
                </tr>
            </tbody>
        </table>
    <style>
      body {
    background: #808080;
    color: white;
}
h1 {
    text-align: center;
    color: black;
    background-color: white;
}
#proj {
    padding: 2px 5px;
    position: absolute;
    top: 37%;
    left: 42%;
    background: #ffffE4;
    color: black; 
}
table{
  margin-top:25%;
  margin-left:10%;
  margin-right:10%;
  background-color: white;
}
table
td, th {
border: 2px solid #ff4901 !important;
text-align :center;
color: black;
top: 75%;
padding: 15px;
}
#stopwatch {
    font-size: 50px;
    position: absolute;
    top: 25%;
    left: 50%;
    transform: translate(-50%, -55%);
    color: black;
}
#buttons {
    position: absolute;
    margin-left: 38%;
    margin-top: 11%;
    flex: 1;
  border: none;
  font-size: 20px;
  padding: 5px;
  box-shadow: 0 1px 4px rgba(0, 0, 0, 0.5);
  font-weight: bold;
  color: white;
  background-color: #ff4901;
  outline: none;
  cursor: pointer;
  border-radius: 10px;
}
#buttons li {
    display: inline;
    padding-left: 10px;
}
.boutons {
    border-radius: 10px;
    border: none;
}
.boutons:hover {
    background-color: #909090;
}
    </style>
  </body>
</html>