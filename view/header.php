<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?=$GLOBALS['appurl']?>/css/bootstrap.min.css">
    <!-- Custom styles for this template -->
	
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="<?=$GLOBALS['appurl']?>/css/style.css" rel="stylesheet">
  
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script><script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="public/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
  <script src="<?=$GLOBALS['appurl']?>/js/app.js"></script>
  <script src="<?=$GLOBALS['appurl']?>/js/jscript.js"></script>
    <title><?= $title ?></title>
  </head>
  <body>
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <a href="#" class="brand-logo">Bilder DB</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
      <li><a href="<?=$GLOBALS['appurl']?>/login/registration">Registration</a></li>
      <?php
              if(isset($_SESSION['uid'])){
                echo "<li><a href='".$GLOBALS['appurl']."/login/logout'>Logout</a></li>";   
              }
              if(!isset($_SESSION['uid'])){
                echo "<li><a href='".$GLOBALS['appurl']."/login'>Login</a></li>";   
              }
              ?>
      </ul>
    </div>
  </nav>
    <div class="container">
    <h3><?= $heading ?></h3>

<style>

.nav-container{
  background-color: white;
    position: absolute;
    top: 0;
    width: 100%;
}

</style>