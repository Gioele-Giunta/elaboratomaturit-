
<?php


//QUANTO SEGUE DA QUA AL CARATTERE ?* CORRISPONDE A UN METODO PER LIMITARE LE AZIONI DEGLI UTENTI CAMBIANDO PRIVILEGI E QUINDI ACCOUNT DEL DATABASE
if(isset($_SESSION['username'])){
  $servername = "localhost";
  $username = "amministratore";
  $password = "Koala900$";
  $db_selected = "albergo";
}else{
  $servername = "localhost";
  $username = "utente";
  $password = "Koala900$";
  $db_selected = "albergo";
}

//?* PURTROPPO NON E' POSSIBILE ESPORTARE GLI ACCOUNT CON I PRIVILEGI (SE SI VUOLE BASTA AGGIUNGERLI CON I DATI SCRITTI SOPPRA CON IMPOSTAZIONI:
//indirizzo: locale, nome: amministratore password: Koala900$, permessi: SELECT, DELETE, INSERT, UPDATE
//indirizzo: locale, nome: utente password: Koala900$, permessi: SELECT, INSERT, UPDATE
//in ogni caso per farlo funzionare ci sono pure i permessi di root abilitati per farlo connettere ugualmente, OVVIAMENTE SOLO PERCHE' E' A SCOPO SCOLASTICO

// Create connection

  @$conn = new mysqli($servername, $username, $password, $db_selected) or die();



// Check connection
if ($conn->connect_error) {



  $servername = "localhost";
  $username = "root";
  $password = "";
  $db_selected = "giuntasfruits";
  $conn = new mysqli($servername, $username, $password, $db_selected);

}

?>
