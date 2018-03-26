<?php

  /**
   * Registratons-Formular
   * Das Formular wird mithilfe des Formulargenerators erstellt.
   */
 
  $lblClass = "col-md-2";
  $eltClass = "col-md-4";
  $btnClass = "btn btn-light";
  $form = new Form($GLOBALS['appurl']."/login/registration");
  $button = new ButtonBuilder();
  echo $form->input()->label('Nachname')->name('lastname')->type('text')->lblClass($lblClass)->eltClass($eltClass);
  echo $form->input()->label('Vorname')->name('firstname')->type('text')->lblClass($lblClass)->eltClass($eltClass);
  echo $form->input()->label('E-Mail')->name('email')->type('email')->lblClass($lblClass)->eltClass($eltClass);
  echo $form->input()->label('Passwort')->name('password')->type('password')->lblClass($lblClass)->eltClass($eltClass);
  echo $button->start($lblClass, $eltClass);
  echo $button->label('Regristiren')->name('registration')->type('submit')->class('btn btn-light');
  echo $button->end();
  echo $form->end();
?>
