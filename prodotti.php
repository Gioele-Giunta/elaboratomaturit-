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
     <a class="active"  href="\prodotti.php"><p>Prodotti</p></a>
     <?php include "headerEntra.php"; ?>
     <a href="\carrello.php" style="width: 5rem;"><img src="..\..\Images\carrello.png" style="width: 60%; height: 2rem"></a>
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

<div class = "container" style="margin-top: -3rem; width: 100%; padding-left: 25%; padding-right: 25%;">

      <h2 style="font-size: 40px;">Giunta's Fruits</h2>


  <div id ="Form1">
<div class="product-container">
    <?php
    $queryvisualizzazione = 'SELECT DISTINCT prodotti.nome, photogallery.url, prodotti.descrizione, prodotti.prezzo, prodotti.categoria_id, prodotti.tipologiavendita, prodotti.id
                             FROM photogallery
                             INNER JOIN prodotti ON photogallery.prodotti_id = prodotti.id
                             WHERE photogallery.url LIKE "%1%"
                             ORDER BY categoria_id';

                             $cat = "";
    $visualizzazione = mysqli_query($conn, $queryvisualizzazione);

    while ($riga=mysqli_fetch_array($visualizzazione))
    {
      if($cat != $riga['categoria_id']){
        echo '</div>';
        echo '<h1 style="font-size: 50px;">' . $riga['categoria_id'] . '</h1>';
        echo '<div class="product-container">';
        $cat = $riga['categoria_id'];
      }
      echo'<div class="product-box">
      <div style="height: 5rem;"> <h1>' . $riga['nome'] . '</h1></div>
        <div class="product-image-box" > <img src="/../../Images/Prodotti/' . $riga['url'] . '.jpg" style="width: 90%; height: 10 rem;"> </div>
        <p style="font-size: 25px;">Costo: ' . $riga['prezzo'] . '€</p>
        <p style="font-size: 20px;">' . $riga['tipologiavendita'] .'</p>
        <button onclick="click1(' . $riga['id'] . ')" style="margin-top: 2rem; margin-bottom: 2rem;"><p style="color: white; font-size: 18px;">Aggiungi al carrello</p></button>
      </div>';

    }
    ?>




    </div>

      </div>




</div>




</body>

<script>

var slideIndexSuite = 1;
showSlidesSuite(slideIndexSuite);

// Next/previous controls
function plusSlidesSuite(n) {
  showSlidesSuite(slideIndexSuite += n);
}

// Thumbnail image controls
function currentSlideSuite(n) {
  showSlidesSuite(slideIndexSuite = n);
}

function showSlidesSuite(n) {
  var i;
  var slides = document.getElementsByClassName("Suite");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndexSuite = 1}
  if (n < 1) {slideIndexSuite = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndexSuite-1].style.display = "block";
  dots[slideIndexSuite-1].className += " active";
}

var slideIndexEsterna = 1;
showSlidesEsterna(slideIndexEsterna);

// Next/previous controls
function plusSlidesEsterna(n) {
  showSlidesEsterna(slideIndexEsterna += n);
}

// Thumbnail image controls
function currentSlideEsterna(n) {
  showSlidesEsterna(slideIndexEsterna = n);
}

function showSlidesEsterna(n) {
  var i;
  var slides = document.getElementsByClassName("Esterna");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndexEsterna = 1}
  if (n < 1) {slideIndexEsterna = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndexEsterna-1].style.display = "block";
  dots[slideIndexEsterna-1].className += " active";
}

var slideIndexInterna = 1;
showSlidesInterna(slideIndexInterna);

// Next/previous controls
function plusSlidesInterna(n) {
  showSlidesInterna(slideIndexInterna += n);
}

// Thumbnail image controls
function currentSlideInterna(n) {
  showSlidesInterna(slideIndexInterna = n);
}

function showSlidesInterna(n) {
  var i;
  var slides = document.getElementsByClassName("Interna");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndexInterna = 1}
  if (n < 1) {slideIndexInterna = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndexInterna-1].style.display = "block";
  dots[slideIndexInterna-1].className += " active";
}
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>

$( document ).ready(function() {
$(".p1").hide();
$("#Form2").hide();
    $("#bCrea").hide();
});





function click1(id){

  $.post(
    '/gestioneCarrello.php',   // url
       { aggiungi: id}, // data to be submit
       function(data4) {// success callback
         if(data4[0][0] == "Success"){
console.log(id);

         }


        },
      'json')





}





</script>


</html>
