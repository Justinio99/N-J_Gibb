<?php
  $lblClass = "col-md-2";
  $eltClass = "col-md-4";
  $btnClass = "waves-effect waves-light btn";
  $form = new Form($GLOBALS['appurl']."/login/registration");
  $button = new ButtonBuilder();
  echo $form->input()->label('Nachname')->name('lastname')->type('text')->lblClass($lblClass)->eltClass($eltClass);
  echo $form->input()->label('Vorname')->name('firstname')->type('text')->lblClass($lblClass)->eltClass($eltClass);
  echo $form->input()->label('E-Mail')->name('email')->type('email')->lblClass($lblClass)->eltClass($eltClass);
  echo $form->input()->label('Passwort')->name('password')->type('password')->lblClass($lblClass)->eltClass($eltClass);
  echo $form->input()->label('Passwort')->name('pwRepeat')->type('password')->lblClass($lblClass)->eltClass($eltClass);
  echo $button->start($lblClass, $eltClass);
  echo $button->label('Regristiren')->name('registration')->type('submit')->class('btn waves-effect waves-light');
  echo $button->end();
  echo $form->end();
?>


