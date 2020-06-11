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

 <div class = "container" style=" width: 100%;">


   <div class="f1" id ="Form1">
     <form action="">


     <h2>Ricerca ordine (per favore inserire solo una tipologia di ricerca)</h2>
         <div class="invisible" style="width: 50%; margin-top: 0px;">
           <p>Tramite data di acquisto
          <p class="p1" id="etipologia2">&#187;</p>
               <input type="date" class="insert-text" id="fdata" name="fdata" placeholder="Data di acquisto">
                    </p>
                    <p>Tramite username utente
         <p class="p1" id="eusername">&#187;</p>
        <input type="text" class="insert-text" id="fusername" name="fusername" placeholder="Username utente">
      </p>
        </div>
         </form>
         <div class="invisible" style="width: 50%; margin-top: 0px;">
         <button onclick="clickData()" style="margin-top: 2rem; margin-bottom: 2rem;"><p style="color: white;">Tramite data</p></button>
         <button onclick="clickUsername()" style="margin-top: 2rem; margin-left: 45%; margin-bottom: 2rem;"><p style="color: white;">Tramite username</p></button>
       </div>
       </div>
       <table id="tabella" style="margin: auto;">
        <thead>
            <tr>
              <th><p>ID ORDINE</p></th><th><p>DATA DI ACQUISTO</p></th><th><p>CODICE TRACKING</p></th><th><p>STATO PACCO</p></th><th><p>USERNAME UTENTE</p></th><th><p>ID PRODOTTO</p></th>
              <th><p>NOME DEL PRODOTTO</p></th>
            </tr>
        </thead>
        <tbody>
        </tbody>
  </table>

         </div>




 </body>


 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script>

 $( document ).ready(function() {

 $(".p1").hide();

 });
 function creaTabella(data){
   /*var tbody = $('#tabella tbody'),
  props = ["idordine", "username", "dataacquisto", "statopacco", "codicetracking", "nomeprodotto", "idprodotto"];
$.each(data, function(i, data) {
var trid = data["idordine"];
  if($("#"+trid).length <= 0) {
    var tr = $('<tr>').attr("id",trid);
    $.each(props, function(i, prop) {
      var tdid = prop.replace(/\s/g, '');
      $('<td>').html(data[prop]).attr("id",tdid).appendTo(tr);
    });
    tbody.append(tr);
  }
  else {
    $.each(props, function(i, prop) {
      var tdid = prop.replace(/\s/g, '');
        $("#"+trid).find("td#"+tdid).html(data[prop])
    });
  }
});*/


var tbody = $('#tabella tbody'),
    props = ["idordine", "dataacquisto", "codicetracking", "statopacco", "username", "idprodotto", "nomeprodotto"];
$.each(data, function(i, reservation) {
  var trid = reservation["idordine"];
    if($("#"+trid).length <= 0) {
      var tr = $('<tr>').attr("id",trid);
      $.each(props, function(i, prop) {
        var tdid = prop.replace(/\s/g, '');
        $('<td>').html(reservation[prop]).attr("id",tdid).appendTo(tr);
      });
      tbody.append(tr);
    }
    else {
      $.each(props, function(i, prop) {
        var tdid = prop.replace(/\s/g, '');
          $("#"+trid).find("td#"+tdid).html(reservation[prop])
      });
    }
});
 }

function clickData(){
  var e = false;
  if($("#fdata").val().length == 0){
    console.log("ERROR");
    $("#edata").show();
    e = true;
  }
  if(!e){
    var data1 = new Date($('#fdata').val());
    data = (data1.getFullYear() + ('0' + (data1.getMonth()+1)).slice(-2) + ('0' + data1.getDate()).slice(-2));

    $.post(
      '/ricercaOrdini.php',   // url
         {data: data}, // data to be submit
         function(data1) {// success callback
           if(data1[0]['stato'] == "Success"){

               creaTabella(data1);
           }


          },
        'json')




  }
}
function clickUsername(){
  var e = false;
  if($("#fusername").val().length == 0){
    console.log("ERROR");
    $("#eusername").show();
    e = true;
  }

  if(!e){

    var username = $("#fusername").val();
    $.post(
      '/ricercaOrdini.php',   // url
         {username: username}, // data to be submit
         function(data2) {// success callback
           if(data2[0]['stato'] == "Success"){

               creaTabella(data2);
           }


          },
        'json')



  }
}

 </script>


 </html>
