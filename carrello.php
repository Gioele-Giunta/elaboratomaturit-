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
  <div class="header" style="width: 99.1%">



   <div class="header-right">
     <a href="\index.php"><p>Home</p></a>
     <a href="\prodotti.php"><p>Prodotti</p></a>
     <?php include "headerEntra.php"; ?>
     <a class="active" href="\carrello.php" style="width: 5rem;"><img src="..\..\Images\carrello.png" style="width: 60%; height: 2rem"></a>

   </div>
 </div>

 <div class="slideshow-container" style="max-width: 100%;">

 <div class="slideImmagini fade tty" style="height: 35rem; max-height: 35rem; width: 100%;">
   <div class="numbertext">1 / 4</div>
   <img src="\Images\index4.jpg" style="width:100%;  top: -20rem">
 </div>

 <div class="slideImmagini fade tty" style="height: 35rem; max-height: 35rem; width: 100%;">
   <div class="numbertext">2 / 4</div>
   <img src="\Images\index2.jpg" style="width: 100%; top: -20rem">
 </div>

 <div class="slideImmagini fade tty" style="height: 35rem; max-height: 35rem; width: 100%;">
   <div class="numbertext">3 / 4</div>
   <img src="\Images\index3.jpg" style="width: 100%; top: -20rem">
 </div>

 <div class="slideImmagini fade tty" style="height: 35rem; max-height: 35rem; width: 100%;">
   <div class="numbertext">4 / 4</div>
   <img src="\Images\index1.jpg" style="width: 100%; top: -20rem">
 </div>

 </div>
 <br>

 <div style="text-align:center">
   <span class="dot"></span>
   <span class="dot"></span>
   <span class="dot"></span>
      <span class="dot"></span>
 </div>
 <script>
 var slideIndex = 0;
 showSlides();

 function showSlides() {
   console.log("dd");
   var i;
   var slides = document.getElementsByClassName("tty");
   var dots = document.getElementsByClassName("dot");
   for (i = 0; i < slides.length; i++) {
     slides[i].style.display = "none";
   }
   slideIndex++;
   if (slideIndex > slides.length) {slideIndex = 1}
   for (i = 0; i < dots.length; i++) {
     dots[i].className = dots[i].className.replace(" active", "");
   }
   slides[slideIndex-1].style.display = "block";
   dots[slideIndex-1].className += " active";
   setTimeout(showSlides, 4000
   ); // Change image every 2 seconds
 }
 </script>

<div class = "container" style="margin-top: -3rem; width: 100%; ">

<div class="invisible" style="margin: 0px; width: 100%; padding: 0px; display: inline;">
  <div style="width:70%; float: left;">
<div class="product-container" style="display: block;  padding: 0px;">

         <?php

         if(!isset($_SESSION['carid'])){
           $countsession = 0;

           echo '<h2 style="font-size: 40px;">Spiacenti non hai ancora niente nel carello :(</h2>';
         }else{
           $countsession = count($_SESSION['carid']);
           if($countsession == 0){

             echo '<h2 style="font-size: 40px;">Spiacenti non hai ancora niente nel carello :(</h2>';
           }
         }
         for($i = 0; $i < $countsession; $i++){


         echo'<div class="product-box" id="' . $_SESSION['carid'][$i] . '" style="height: 20%; width: 70%: margin-right: 0px;">
         <div class="invisible" style="margin-top : 0px; width:100%; height: 100%">
         <img src="/../../Images/Prodotti/' . $_SESSION['carfoto'][$i] . '.jpg" style="width: 19%; height: 100%; margin: 0px;">
         <div class="vertical-box" style="margin-left: 3%; height: 100%;">
        <h1>' . $_SESSION['carnome'][$i] . '</h1>
         <h2 style="color: #4CAF50;">Disponibilità immediata</h2>
         </div>
         <div style="float: right; width:50%; height: auto;">
         <div class="vertical-box">
         <p style="font-size: 25px; float:right;">' . $_SESSION['carprezzo'][$i] . '€</p>
         <button onclick="somma(-1, ' . $_SESSION['carid'][$i] . ', ' . $_SESSION['carqty'][$i] . ')" style=" width: auto; padding: 1rem; border-radius: 1rem;"><p style="color: white; font-size: 18px;">-</p></button>
         <input type="qty" class="insert-text" style="width: 40px;" id="qty" name="qty" placeholder="' . $_SESSION['carqty'][$i] . '">
         <button onclick="somma(1, ' . $_SESSION['carid'][$i] . ', ' . $_SESSION['carqty'][$i] . ')" style=" width: auto; padding: 1rem; border-radius: 1rem;"><p style="color: white; font-size: 18px;">+</p></button>
         <button onclick="elimina(' . $_SESSION['carid'][$i] . ')" style=" width: auto; padding: 1rem; border-radius: 1rem; background-color: #FF623B;"><p style="color: white; font-size: 15px;">Elimina prodotto</p></button>

         </div>
         </div>
         </div>

         </div>';
         }
         ?>

</div>
</div>
<?php
if(!isset($_SESSION['carid'])){
  $countsession = 0;

  echo '';
}else{
  $countsession = count($_SESSION['carid']);
  echo '<div style="width:30%; float: right; ">
      <div class="product-container" style="padding: 0px;">

        <div class="product-box">
          <h1> Il tuo Ordine:</h1>';
          $spedizione="SELECT via, numerocivico, CAP, città, stato FROM indirizzo WHERE utenti_id = " . @$_SESSION['id'] . " ";
          $ricercaspedizione = @mysqli_query($conn, $spedizione);
          if ($ricercaspedizione == false)
          {
            echo "<p>Devi eseguire il login per poter eseguire un ordine!</p>";
          }else{
            echo "<h2>Dati di spedizione:</h2>";
            while ($riga=mysqli_fetch_array($ricercaspedizione))
            {
              echo"<p>" . $riga['via'] . " " . $riga['numerocivico'] . ",</p> <p>" . $riga['CAP'] . "," . $riga['città'] . ", " . $riga['stato'] . "</p>";
            }
          }

          $merce= 0;
          for($i=0; $i < count($_SESSION['carid']); $i++){
               $merce += $_SESSION['carprezzo'][$i];
             }
             echo "<h2>Merce: " . $merce . "€</h2>";
             $spedizione = ($merce/100) * 25;
             echo "<h2>Spedizione: " . $spedizione . "€</h2>";
             $totale = $merce + $spedizione;
            echo '<h2 style="font-size:30px">Totale: ' . $totale . '€</h2>';
            echo '                       <button onclick="inserimentoOrdine()" style=" width: auto; padding: 1rem; border-radius: 1rem;"><p style="color: white; font-size: 18px;">Ordina!</p></button>

                       </div>
                    </div>
                </div>';
  if($countsession == 0){

    echo '';
  }
}





              ?>

</div>

         </div>




 </body>


 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script>



function inserimentoOrdine(){
  $.post(
    '/inserimentoOrdine.php',   // url
       {}, // data to be submit
       function(data5) {// success callback
         if(data5[0][0] == "Success"){
           location.reload();
         }


        },
      'json')

      console.log("Ok");
}
function somma(numero, id, qty){

if(numero > 0){
  $.post(
    '/gestioneCarrello.php',   // url
       { aggiungi: id}, // data to be submit
       function(data1) {// success callback
         if(data1[0][0] == "Success"){
           location.reload();
         }


        },
      'json')
}else{
  if(qty == 1){
    var oggetto = "#" + id;
    $(oggetto).hide(3000, "swing");
  }
    $.post(
      '/gestioneCarrello.php',   // url
         { sottrai: id}, // data to be submit
         function(data2) {// success callback
           if(data2[0][0] == "Success"){
             location.reload();
           }


          },
        'json')
}


        console.log(id);
}

function elimina(id){
  var oggetto = "#" + id;
  $(oggetto).hide(3000, "swing");
  $.post(
    '/gestioneCarrello.php',   // url
       { elimina: id}, // data to be submit
       function(data3) {// success callback
         if(data3[0][0] == "Success"){
           location.reload();
         }
        },
      'json')


}
 </script>


 </html>
