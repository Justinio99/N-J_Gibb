      <hr>
      <footer>
        <p>&copy; Copyright gibb</p>
      </footer>
      <?php

  if(isset($_SESSION['registerErrors'])){
    foreach($_SESSION['registerErrors'] as $value){
      echo "<div>".$value."</div>";
    }
    
  
    }
    unset($_SESSION['registerErrors']);
    ?>
    </div>
    <script src="<?=$GLOBALS['appurl']?>/js/jquery.min.js"></script>
  </body>
</html>
