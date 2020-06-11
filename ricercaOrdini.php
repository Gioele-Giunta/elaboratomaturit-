<?php
include "Script\start.php";

if(isset($_POST['data']))
{

  $data = mysqli_real_escape_string($conn, $_POST['data']);
  $ordine = "SELECT DISTINCT ordine.id AS ordineid, utenti.username, ordine.dataacquisto, ordine.statopacco, ordine.codicetracking, prodotti.nome AS prodottinome, prodotti.id AS prodottiid
             FROM ordine
             INNER JOIN prodotti ON ordine.prodotti_id = prodotti.id
             INNER JOIN utenti ON ordine.utenti_id = utenti.id
             WHERE ordine.dataacquisto = $data
             ORDER BY ordine.dataacquisto DESC";
 $ricercaordine = mysqli_query($conn, $ordine);
 $i = 0;
 while ($riga=mysqli_fetch_array($ricercaordine))
 {
   $arr[$i]['stato'] = "Success";
   $arr[$i]['idordine'] = $riga['ordineid'];// questo blocco sarà chiuso alla fine del form
   $arr[$i]['username'] = $riga['username'];
   $arr[$i]['dataacquisto'] = $riga['dataacquisto'];
   $arr[$i]['statopacco'] = $riga['statopacco'];
   $arr[$i]['codicetracking'] = $riga['codicetracking'];
   $arr[$i]['nomeprodotto'] = $riga['prodottinome'];
   $arr[$i]['idprodotto'] = $riga['prodottiid'];

    $i++;
 }
  echo json_encode($arr);
}

if(isset($_POST['username']))
{

  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $ordine = "SELECT DISTINCT ordine.id AS ordineid, utenti.username, ordine.dataacquisto, ordine.statopacco, ordine.codicetracking, prodotti.nome AS prodottinome, prodotti.id AS prodottiid
             FROM ordine
             INNER JOIN prodotti ON ordine.prodotti_id = prodotti.id
             INNER JOIN utenti ON ordine.utenti_id = utenti.id
             WHERE utenti.username = '$username'
             ORDER BY ordine.dataacquisto DESC";
 $ricercaordine = mysqli_query($conn, $ordine);
 $i = 0;
 while ($riga=mysqli_fetch_array($ricercaordine))
 {
   $arr[$i]['stato'] = "Success";
   $arr[$i]['idordine'] = $riga['ordineid'];// questo blocco sarà chiuso alla fine del form
   $arr[$i]['username'] = $riga['username'];
   $arr[$i]['dataacquisto'] = $riga['dataacquisto'];
   $arr[$i]['statopacco'] = $riga['statopacco'];
   $arr[$i]['codicetracking'] = $riga['codicetracking'];
   $arr[$i]['nomeprodotto'] = $riga['prodottinome'];
   $arr[$i]['idprodotto'] = $riga['prodottiid'];

    $i++;
 }
  echo json_encode($arr);
}



 ?>
