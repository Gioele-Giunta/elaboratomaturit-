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



   <div class="header-right">
     <a  href="\index.php"><p>Home</p></a>
     <a  href="\prodotti.php"><p>Prodotti</p></a>
     <?php include "headerEntra.php"; ?>
     <a href="\carrello.php" style="width: 5rem;"><img src="..\..\Images\carrello.png" style="width: 60%; height: 2rem"></a>
   </div>
 </div>





<div class = "container">
  <h1>Effettua accesso</h1>
  <div id ="Form1">
    <form action="">


    <h2>Inserisci i tuoi dati per accedere</h2>
    <p class="e1"> Qualche dato inserito è arrato</p>
        <div class="invisible">
          <p class="p1" id="eusername">&#187;</p>
              <input type="text" class="insert-text" id="fusername" name="fusername" placeholder="Username">
        </div>
        <div class="invisible" style="margin-top: 0px;">
        <p class="p1" id="epassword">&#187;</p>
       <input type="password" class="insert-text" id="fpassword" name="fpassword" placeholder="Password">
</div>
        </form>
        <button onclick="click1()" style="margin-top: 2rem; margin-bottom: 2rem;"><p style="color: white;">Entra</p></button>
        <h2>Oppure registrati</h2>
        <button onclick="click2()" style="margin-top: 2rem; margin-bottom: 2rem;"><p style="color: white;">Registrati ora</p></button>

      </div>


<div id ="Form2" class="p1">
  <form action="">


  <h2>Inserisci i tuoi dati per registrarti</h2>
  <p class="e1"> Qualche dato inserito è arrato</p>
    <div class="invisible">
  <div class="invisible">
    <p class="p1" id="enome">&#187;</p>
        <input type="text" class="insert-text" id="fnome" name="fnome" placeholder="Nome">
  </div>
  <div class="invisible" style="margin-top: 0px;">
  <p class="p1" id="epassword">&#187;</p>
 <input type="text" class="insert-text" id="fcognome" name="fcognome" placeholder="Cognome">
</div>

      <div class="invisible">
        <p class="p1" id="eusername2">&#187;</p>
            <input type="text" class="insert-text" id="fusername2" name="fusername2" placeholder="Username">
      </div>
      </div>
          <div class="invisible">
      <div class="invisible" style="margin-top: 0px;">
      <p class="p1" id="epasswordr">&#187;</p>
     <input type="password" class="insert-text" id="fpasswordr" name="fpasswordr" placeholder="Password">
</div>
<div class="invisible" style="margin-top: 0px;">
<p class="p1" id="epassword2">&#187;</p>
<input type="password" class="insert-text" id="fpassword2" name="fpassword2" placeholder="Ripeti Password">
</div>
</div>
<div class="invisible" style="margin-top: 0px;">

<div class="invisible" style="margin-top: 0px;">
<p class="p1" id="evia">&#187;</p>
<input type="text" class="insert-text" id="fvia" name="fvia" placeholder="Via">
</div>

<div class="invisible" style="margin-top: 0px;">
<p class="p1" id="enumerocivico">&#187;</p>
<input type="number" class="insert-text" id="fnumerocivico" name="fnumerocivico" placeholder="Numero Civico">
</div>

<div class="invisible" style="margin-top: 0px;">
<p class="p1" id="ecap">&#187;</p>
<input type="number" class="insert-text" id="fcap" name="fcap" placeholder="CAP">
</div>
</div>

<div class="invisible" style="margin-top: 0px;">
<div class="invisible" style="margin-top: 0px;">
<p class="p1" id="ecitta">&#187;</p>
<input type="text" class="insert-text" id="fcitta" name="fcitta" placeholder="Città">
</div>

<div class="invisible" style="margin-top: 0px;">
<p class="p1" id="estato">&#187;</p>
<input type="text" class="insert-text" id="fstato" name="fstato" placeholder="Stato">
</div>
</div>
      </form>
      <button onclick="click3()" style="margin-top: 2rem; margin-bottom: 2rem;"><p style="color: white;">Registrati ora</p></button>

    </div>
</div>

</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>

$( document ).ready(function() {
$(".p1").hide();
$(".e1").hide();
});


function click1(){
  var e = false;
  if($("#fusername").val().length == 0){
    console.log("ERROR");
    $("#eusername").show();
    e = true;
  }
  if($("#fpassword").val().length == 0){
    console.log("ERROR");
    $("#epassword").show();
    e = true;
  }



if(!e){
  var username = $("#fusername").val();
  var password = $("#fpassword").val();
  $.post(
    '/login.php',   // url
       { username: username, password : password}, // data to be submit
       function(data) {// success callback
         if(data[0][0] == "Success"){
           location.href = "\\indexManager.php";
         }else{
           $('.e1').show();

         }


        },
      'json')
  console.log("click1");
}

}

function click2(){
  $("#Form1").hide(3000, "swing");
  $("#Form2").show(4000, "swing");


}
function click3(){

  var e = false;
  if($("#fnome").val().length == 0){
    console.log("ERROR");
    $("#enome").show();
    e = true;
  }
  if($("#fcognome").val().length == 0){
    console.log("ERROR");
    $("#ecognome").show();
    e = true;
  }
  if($("#fusername2").val().length == 0){
    console.log("ERROR");
    $("#eusername2").show();
    e = true;
  }
  if($("#fpasswordr").val().length == 0){
    console.log("ERROR");
    $("#epasswordr").show();
    e = true;
  }
  if($("#fpassword2").val().length == 0 || $("#fpassword2").val() != $("#fpasswordr").val()){
    console.log("ERROR");
    $("#epassword2").show();
    e = true;
  }
  if($("#fvia").val().length == 0){
    console.log("ERROR");
    $("#evia").show();
    e = true;
  }
  if($("#fnumerocivico").val().length == 0){
    console.log("ERROR");
    $("#enumerocivico").show();
    e = true;
  }
  if($("#fcap").val().length == 0){
    console.log("ERROR");
    $("#ecap").show();
    e = true;
  }
  if($("#fstato").val().length == 0){
    console.log("ERROR");
    $("#estato").show();
    e = true;
  }
  if($("#fcitta").val().length == 0){
    console.log("ERROR");
    $("#ecitta").show();
    e = true;
  }



if(!e){
  var nome = $("#fnome").val();
  var cognome = $("#fcognome").val();
  var username = $("#fusername2").val();
  var password = $("#fpasswordr").val();
  var via = $("#fvia").val();
  var numerocivico = $("#fnumerocivico").val();
  var cap = $("#fcap").val();
  var citta = $("#fcitta").val();
  var stato = $("#fstato").val();
  $.post(
    '/registrazione.php',   // url
       { nome: nome, cognome: cognome, username: username, password : password, via: via, numerocivico: numerocivico, cap: cap, citta: citta, stato: stato}, // data to be submit
       function(data2) {// success callback
         if(data2[0][0] == "Success"){
           location.href = "\\indexManager.php";
         }else{
           $('.e1').show();

         }


        },
      'json')

  console.log("click1");
}

}
</script>



</html>
