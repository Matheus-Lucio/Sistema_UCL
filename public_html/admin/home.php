<?php
session_start();

if ($_SESSION['Login']['tipo'] != 'Adm') exit();

include_once('../../assets/assets.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Starter Template - Materialize</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body> 

<style>
hr {
  margin: 10px 0;
}

.hr1 {
  margin: 10px 0;
  position: relative;
  height: 1px;
  border: 0;
  border-top: 1px solid #CCC;
}

.hr2 {
  margin: 10px 0;
  border: 0;
  border-top: 1px dashed #CCC;
}

.hr3 {
  margin: px 0;
  border: 0;
  height: 2px;
  background-image: linear-gradient(to right, transparent, #CCC, transparent);  
}

.hr4 {
  margin: 10px 0;
  border: 0;
  border-top: 1px dashed #CCC;
  border-bottom: 2px solid #CCC;
  height: 3px;
}

.hr5 {
  margin: 10px 0;
  border: 0;
  border-top: medium double #CCC;
  height: 1px;
  overflow: visible;
  padding: 0;
  color: #CCC;
  text-align: center;
}

.hr5::after {
  content: "¶";
  display: inline-block;
  position: relative;
  top: -0.7em;
  font-size: 1.4em;
  padding: 0 0.3em;
  background: blue;
}
</style>

  <nav class="nav-extended indigo accent-4" role="navigation">
    <div class="nav-wrapper">
      <a href="#" class="brand-logo center">Palpiteiros</a>
      <!--<a href="#" class="left light-orange-text" height="50"><i class="material-icons">dehaze</i></a>-->

    </div>
<hr class="hr3"> 
    <div class="nav-content">
      <ul class="tabs tabs-transparent">
        <li class="tab"><a href="materialize.html">Liga Palpiteiros</a></li>
        <li class="tab"><a class="active" href="artilharia.html">Artilharia</a></li>
        <li class="tab disabled"><a href="#test3"></a></li>
        <li class="tab disabled"><a href="#test4"></a></li>
        <li class="waves-effect right" title="Sair"><a href="assets/sair.php"><i class="material-icons left">close</i></a></li>
      </ul>
    </div>

<hr class="hr4"> 
  </nav>
<br>
  <!--<img src="c8a67cec89d1184ef02254d5fed5ba22.png" alt="Girl in a jacket" width="100%" height="100%">-->
<h2><center class="header center teal-text text-lighten-2" >Champions League</center></h2>
  <div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
        
        <!--<h1 class="header center teal-text text-lighten-2">UEFA Champios League</h1>-->
        <form style="margin-top:15px" action="insert_palpites.php" method="post">
        <div class="container">
        <table class="bordered striped centered highlight">
                <tr>
                    <td><img src="times/b99d6260430a6466b31dc4996f3ce2c7.png" width="75" height="55" border="50px"><input type="text" name="pal_time1" class="validate center" oninvalid="this.setCustomValidity('0')" oninput="setCustomValidity('')" disabled hidden>1</td>
                    <td><input type="text" name="pal_placar1" class="validate center" oninvalid="this.setCustomValidity('0')" oninput="setCustomValidity('')" required></td>
                    <td>X</td>
                    <td><input type="text" name="pal_time2" class="validate center" oninvalid="this.setCustomValidity('0')" oninput="setCustomValidity('')" required></td>
                    <td><img src="times/kisspng-liverpool-f-c-anfield-premier-league-fa-cup-footb-liverpool-logo-5b5084be7c1f36.0783271615320035185084.png" width="40" height="45" border="50px"><input type="text" name="pal_placar2" class="validate center" oninvalid="this.setCustomValidity('0')" oninput="setCustomValidity('')" disabled hidden>2</td>
                </tr>
                <tr>
                    <td><img src="times/pngwing.com (1).png" width="35" height="35" border="50px"><input type="text" name="pal_time1" class="validate center" oninvalid="this.setCustomValidity('0')" oninput="setCustomValidity('')" disabled hidden><br>3</td>
                    <td><input type="text" name="pal_placar1" class="validate center" oninvalid="this.setCustomValidity('0')" oninput="setCustomValidity('')" required></td>
                    <td>X</td>
                    <td><input type="text" name="pal_placar2" class="validate center" oninvalid="this.setCustomValidity('0')" oninput="setCustomValidity('')" required></td>
                    <td><img src="times/kisspng-borussia-dortmund-fc-schalke-04-football-bundeslig-dortmu-1-⋆-free-vectors-logos-icons-and-photos-5b69a192e50f00.3633630515336492989382.png" width="35" height="35" border="50px"><input type="text" name="pal_time2" class="validate center" oninvalid="this.setCustomValidity('0')" oninput="setCustomValidity('')" disabled hidden><br>4</td>
                </tr>
                <tr>
                    <td><img src="times/logo-bayern-munique-4096.png" width="45" height="45" border="50px"><input type="text" name="pal_time1" class="validate center" oninvalid="this.setCustomValidity('0')" oninput="setCustomValidity('')" disabled hidden><br>5</td>
                    <td><input type="text" name="pal_placar1" class="validate center" oninvalid="this.setCustomValidity('0')" oninput="setCustomValidity('')" required></td>
                    <td>X</td>
                    <td><input type="text" name="pal_placar2" class="validate center" oninvalid="this.setCustomValidity('0')" oninput="setCustomValidity('')" required></td>
                    <td><img src="times/kisspng-paris-saint-germain-f-c-paris-saint-germain-acade-5b21014c3aa4e4.7490892015288896762402.png" width="40" height="40" border="50px"><input type="text" name="pal_time2" class="validate center" oninvalid="this.setCustomValidity('0')" oninput="setCustomValidity('')" disabled hidden><br>6</td>
                </tr>
                <tr>
                    <td><img src="times/kisspng-fc-porto-uefa-champions-league-primeira-liga-liver-kilmarnock-fc-5b190af3df5206.9732499915283678599147.png" width="50" height="50" border="50px"><input type="text" name="pal_time1" class="validate center" oninvalid="this.setCustomValidity('0')" oninput="setCustomValidity('')" disabled hidden><br>7</td>
                    <td><input type="text" name="pal_placar1" class="validate center" oninvalid="this.setCustomValidity('0')" oninput="setCustomValidity('')" required></td>
                    <td>X</td>
                    <td><input type="text" name="pal_placar2" class="validate center" oninvalid="this.setCustomValidity('0')" oninput="setCustomValidity('')" required></td>
                    <td><img src="times/chelsea-fc-logo-3.png" width="45" height="45" border="50px"><input type="text" name="pal_time2" class="validate center" oninvalid="this.setCustomValidity('0')" oninput="setCustomValidity('')" disabled hidden><br>8</td>
                </tr>
        </table>
         <div class="row center">
         <input title="Inserir Usuário" class="btn-large waves-effect waves-light teal lighten-1" type="submit" value="Enviar">
        </div>
         </div>
      </form>

        
        <div><br></div>
      
      </div>
    </div>
    <div class="parallax"><img src="c8a67cec89d1184ef02254d5fed5ba22.jpg" alt="Unsplashed background img 1"></div>
  </div>
  <footer class="page-footer purple">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text"></h5>
          <p class="grey-text text-lighten-4"></p>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container"><a class="orange-text text-lighten-3" href="http://materializecss.com"></a>
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
