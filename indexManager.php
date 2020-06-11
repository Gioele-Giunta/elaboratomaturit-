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
<a href="\gestisciOrdiniUtente.php"><p>I tuoi ordini</p></a>
<?php include "headerAdmin.php"; ?>
</div>
   <div class="header-right">
     <a href="\index.php"><p>Home</p></a>
     <a  href="\prodotti.php"><p>Prodotti</p></a>
     <?php include "headerEntra.php"; ?>
     <a href="\carrello.php" style="width: 5rem;"><img src="..\..\Images\carrello.png" style="width: 60%; height: 2rem"></a>

   </div>
 </div>





<div class = "container">
  <h1>Accesso effettuato <?php echo $_SESSION['username']; ?>!</h1>
  <button id="bElimina" onclick="clickDisconnetti()" style="background-color: white; border: solid 1px; "><p style="font-size: 18px">Esci dall'account</p></button>

</div>

</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
function clickDisconnetti(){
  $.post(
    '/logout.php',   // url
       {}, // data to be submit
       function(data) {// success callback
         if(data[0][0] == "Success"){
                      location.href = "\\index.php";
         }else{
           location.reload();
         }


        },
      'json')
}
</script>



</html>
