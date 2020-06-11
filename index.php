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
     <a class="active" href="\index.php"><p>Home</p></a>
     <a  href="\prodotti.php"><p>Prodotti</p></a>
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



<div class = "container" style="margin-top: -3rem; width: 100%;">
  <h2 style="font-size: 40px;">Giunta's Fruits</h2>


      <h1 style="font-size: 50px;">Descrizione</h1>
  <div class="invisible" style="margin-top: 0px;">

    <h2 style="font-size: 35px;">

Il Giunta's Fruits è una catena che da oltre 20 anni porta la qualità nelle vostre tavole.</br> La nostra mentalità è semplice come la nostra storia, fondata 20 anni fa nella Pianura Padana dalla famiglia Giunta, ci siamo impegnati per far sì che la frutta arrivi sempre nelle vostre case fresca come appena raccolta.
</br></br>Tutto nasce dalla natura.</br>
Per questo il nostro primo valore è il rispetto.</br>
Il rispetto per la terra e per le persone. Le nostre mani coltivano.</br>
La nostra marca protegge, garantisce e opera affinché la sicurezza sia il vero sigillo della qualità.</br>
Il frutto di questo lavoro arriva direttamente ai consumatori.</br>
Dialogo e confronto sono una pratica quotidiana. Noi siamo la terra che coltiviamo.</br>
Qua la mano. </br> </br>

</h2>
</div>
  <h1 style="font-size: 50px;">Metodo e regole:
una garanzia</h1>
<div class="invisible" style="margin-top: 0px;">

<h2 style="font-size: 35px;">

  Darsi delle regole è una pratica semplice, rispettarle ogni giorno è una pratica complessa.</br>
  Le regole sono fondamentali: sono un aiuto, uno strumento, una guida.</br>
  Le regole sono l'unica vera difesa della qualità, nella ricerca delle materie prime, nella selezione delle aree di coltivazione, nella gestione agronomica rispettosa dell'ambiente, nei processi di raccolta e di trasformazione e di confezionamento, nelle discipline di controllo in ogni fase.</br>
  Abbiamo scelto di darci delle regole, che compongono il nostro metodo.</br>
  Il resto sono solo frutti buoni.


</h2>


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
  setTimeout(showSlides, 4000); // Change image every 2 seconds
}
</script>

</html>
