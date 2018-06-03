      <hr>
      <footer class="footer">
        <p>&copy; Copyright Nicolas & Justin</p>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
  </body>
</html>
