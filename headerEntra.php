<?php
echo '<a ';
if($_SERVER['REQUEST_URI'] == "/entra.php" OR $_SERVER['REQUEST_URI'] == "/indexManager.php"){
  echo 'class="active" ';
}

if(isset($_SESSION['username'])){
  echo 'href="\indexManager.php"><p>';
  echo $_SESSION['username'];
}else{
  echo 'href="\entra.php"><p>';
  echo 'Entra';
}
echo '</p></a>';
 ?>
