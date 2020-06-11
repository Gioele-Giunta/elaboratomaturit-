<?php

$utente = "SELECT status FROM utenti WHERE id = " . $_SESSION['id'] . "";
$ricercautente = mysqli_query($conn, $utente);
while ($riga=mysqli_fetch_array($ricercautente))
{
  if($riga['status'] == "Amministratore"){
    echo '<a ';
    if($_SERVER['REQUEST_URI'] == "/gestisciOrdiniAmministratore.php"){
      echo 'class="active" ';
    }

      echo 'href="\gestisciOrdiniAmministratore.php"><p>';
      echo "Ordini utenti";


    echo '</p></a>';
  }
}

 ?>
