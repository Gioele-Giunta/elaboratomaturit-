<html>
<head>
<title>Giunta's Hotel</title>


<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">


<link rel="stylesheet" href="\Css\ComputerStyle.css">

<?php
include "Script\start.php";
?>

</head>
<body>

   <a href="\index.php" class="logo">  <img src="../Images/logo.png" style="width: 100%; height: 100%"></a>
  <div class="header" style="position: relative">

<div class="header-center">
  <a class="active" href="\gestisciOrdiniUtente.php"><p>I tuoi ordini</p></a>
  <?php include "headerAdmin.php"; ?>
</div>
   <div class="header-right">
     <a href="\index.php"><p>Home</p></a>
     <a  href="\prodotti.php"><p>Prodotti</p></a>
     <?php include "headerEntra.php"; ?>
     <a href="\carrello.php" style="width: 5rem;"><img src="..\..\Images\carrello.png" style="width: 60%; height: 2rem"></a>

   </div>
 </div>

 <div class = "container" style=" width: 100%;">




   <div class="invisible" style="margin: 0px; width: 100%; padding: 0px; display: inline;">
     <div style="width:70%; float: left;">
   <div class="product-container" style="display: block;  padding: 0px;">

            <?php
            $ordine = 'SELECT DISTINCT *
                       FROM ordine
                       INNER JOIN prodotti ON ordine.prodotti_id = prodotti.id
                       INNER JOIN photogallery ON photogallery.prodotti_id = prodotti.id
                       WHERE ordine.utenti_id = ' . $_SESSION['id'] . ' AND photogallery.url LIKE "%1%"
                       ORDER BY ordine.dataacquisto DESC';
            $ricercaordine = mysqli_query($conn, $ordine);
            if(!$ricercaordine){
              echo '<h2 style="font-size: 40px;">Spiacenti non hai ancora ordinato niente :(</h2>';
            }else{
              while ($riga=mysqli_fetch_array($ricercaordine))
              {


                echo'<div class="product-box" id="' . $riga['prodotti_id'] . '" style="height: 20%; width: 70%: margin-right: 0px;">
                <div class="invisible" style="margin-top : 0px; width:100%; height: 100%">
                <img src="/../../Images/Prodotti/' . $riga['url'] . '.jpg" style="width: 19%; height: 100%; margin: 0px;">
                <div class="vertical-box" style="margin-left: 3%; height: 100%;">
               <h1 style="font-size: 22px;">' . $riga['nome'] . '</h1>
                <h2 style="color: #4CAF50;">Status: ' . $riga['statopacco'] . '</h2>
                <h2>Data acquisto: ' . $riga['dataacquisto'] . '</h2>
                <h2>Tracking: ' . $riga['codicetracking'] . '</h2>
                </div>
                <div style="float: right; width:50%; height: auto;">
                <div class="vertical-box">
                <p style="font-size: 25px; float:right;">' . $riga['prezzototale'] . '€</p>
                <h2>Pezzi: ' . $riga['quantità'] . '</h2>

                </div>
                </div>
                </div>

                </div>';

              }
            }


            ?>

   </div>
   </div>
   <?php

     echo '<div style="width:30%; float: right; ">
         <div class="product-container" style="padding: 0px;">

           <div class="product-box">
             <h1> I tuoi dati:</h1>';
             $spedizione="SELECT via, numerocivico, CAP, città, stato FROM indirizzo WHERE utenti_id = " . @$_SESSION['id'] . " ";
             $ricercaspedizione = @mysqli_query($conn, $spedizione);

               echo "<h2>Dati di spedizione:</h2>";
               while ($riga=mysqli_fetch_array($ricercaspedizione))
               {
                 echo"<p>" . $riga['via'] . " " . $riga['numerocivico'] . ",</p> <p>" . $riga['CAP'] . "," . $riga['città'] . ", " . $riga['stato'] . "</p>";
               }


              echo'            </div>
                       </div>
                   </div>';






                 ?>

   </div>


         </div>




 </body>


 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script>

function clickAzione(id, nome, cognome, email){

  $.post(
    '/eliminazioneSoggiorno.php',   // url
       { nome: nome, cognome : cognome, email : email, id : id}, // data to be submit
       function(data3) {// success callback
         if(data3[0][0] == "Success"){
           location.reload();
         }else{
           location.reload();
         }


        },
      'json')
        console.log("clickAzione");
}
 </script>


 </html>
