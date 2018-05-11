<?php

  /**
   * Login-Formular
   * Das Formular wird mithilfe des Formulargenerators erstellt.
   */

  $lblClass = "col-md-2";
  $eltClass = "col-md-4";
  $btnClass = "btn btn-light";
  $form = new Form($GLOBALS['appurl']."/login/login");
  $button = new ButtonBuilder();
  echo $form->input()->label('E-Mail')->name('email')->type('text')->lblClass($lblClass)->eltClass($eltClass);
  echo $form->input()->label('Passwort')->name('password')->type('text')->lblClass($lblClass)->eltClass($eltClass);
  echo $button->start($lblClass, $eltClass);
  echo $button->label('Login')->name('send')->type('submit')->class('btn waves-effect waves-light');
  echo $button->end();
  echo $form->end();
<<<<<<< HEAD

  if(isset($_SESSION['loginErrors'])){
    foreach ($_SESSION['loginErrors'] as $value){
      echo "<div>".$value."</div>";
    }
  }
  
=======
>>>>>>> nici-dev
?>


