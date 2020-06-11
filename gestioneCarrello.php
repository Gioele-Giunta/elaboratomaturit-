<?php
	include "Script\start.php";
 //---------------------------
 //Inizializzazione sessione







 //---------------------------
 //Reset (resetta il carrello)
 if ( isset($_GET['reset']) )
 {
 if ($_GET["reset"] == 'true')
   {
   unset($_SESSION["carqty"]); //Quantità di ciascun prodotto
   unset($_SESSION["carid"]); //Id di ciascun prodotto
   unset($_SESSION["carprezzo"]);
   unset($_SESSION['carnome']);
   unset($_SESSION['carfoto']);
	 $arr[0] = array("Success");
 	 echo json_encode($arr);
   }
 }

 //---------------------------
 //Aggiungi (aggiunge un oggetto al carrello)
 if ( isset($_POST['aggiungi']) ){


 $check = true;
 $punto = 0;
 if(!isset($_SESSION['carid'])){
   $countsession = 0;
 }else{
   $countsession = count($_SESSION['carid']);
 }
 for($i=0; $i < $countsession; $i++){
   if($_SESSION['carid'][$i] == $_POST['aggiungi']){
     $check = false;
     $punto = $i;
   }
 }

  $p = $countsession;
	//Preferisco eseguire la query per prelevare i dati del prodotto lato server che mandare i dati, incluso il prezzo tramite chiamata POST che potrebbe essere compromessa da eventuali hacker
	     $queryestrazione = 'SELECT DISTINCT prodotti.nome, photogallery.url, prodotti.prezzo, prodotti.tipologiavendita, prodotti.id
	                              FROM photogallery
	                              INNER JOIN prodotti ON photogallery.prodotti_id = prodotti.id
	                              WHERE photogallery.url LIKE "%1%" AND prodotti.id =' . $_POST['aggiungi'] . '';
	     $estrazionedatiprod = mysqli_query($conn, $queryestrazione);
	     while ($riga=mysqli_fetch_array($estrazionedatiprod))
	     {
	       $prezzo = $riga['prezzo'];
	       $nome = $riga['nome'];
	       $foto = $riga['url'];

	     }
 if($check) //In questo caso check è vero, quindi è un oggetto mai registrato nel carrello
   {
     $_SESSION['carid'][$p] = $_POST['aggiungi'];
     $_SESSION['carqty'][$p] = 1;
     $_SESSION['carprezzo'][$p] = $prezzo  * $_SESSION["carqty"][$p];
     $_SESSION['carnome'][$p] = $nome;
     $_SESSION['carfoto'][$p] = $foto;

     $arr[0] = array("Success", "Ko");
     echo json_encode($arr);
 }else //In questo caso check è falso, quindi è un oggetto già registrato nel carello e si cambia solo la quantità
 {
   $_SESSION["carqty"][$punto] = $_SESSION["carqty"][$punto] + 1;
   $_SESSION['carprezzo'][$punto] = $prezzo * $_SESSION["carqty"][$punto];
   $arr[0] = array("Success", "Ko");
   echo json_encode($arr);
 }
}
//---------------------------
//Toglie oggetti dal carrello
if( isset($_POST['sottrai']))
{
	for($i=0; $i < count($_SESSION['carid']); $i++){
		if($_SESSION['carid'][$i] == $_POST['sottrai']){
			$punto = $i;
		}
	}

	$_SESSION["carqty"][$punto] = $_SESSION["carqty"][$punto] - 1;
	$_SESSION['carprezzo'][$punto] = $_SESSION['carprezzo'][$punto] * $_SESSION["carqty"][$punto];
	$arr[0] = array("Success", "Ko");
	echo json_encode($arr);
	if($_SESSION["carqty"][$punto] == 0){
		$_POST["elimina"] = $_SESSION['carid'][$punto];
	}
}



  //---------------------------
  //Elimina (elimina un oggetto dal carrello)
  if ( isset($_POST["elimina"]) )
   {
		 $arr[0] = array("Success", "Ko");
		 echo json_encode($arr);
     for($i=0; $i < count($_SESSION['carid']); $i++){
       if($_SESSION['carid'][$i] == $_POST['elimina']){
				for($o=$i; $o < count($_SESSION['carid']); $o++){
					$_SESSION['carid'][$o] = $_SESSION['carid'][$o + 1];
					$_SESSION['carqty'][$o] = $_SESSION['carqty'][$o + 1];
					$_SESSION['carprezzo'][$o] = $_SESSION['carprezzo'][$o + 1];
					$_SESSION['carnome'][$o] = $_SESSION['carnome'][$o + 1];
					$_SESSION['carfoto'][$o] = $_SESSION['carfoto'][$o + 1];

				}
         unset($_SESSION['carid'][count($_SESSION['carid']) - 1]);
         unset($_SESSION['carqty'][count($_SESSION['carqty']) - 1]);
         unset($_SESSION['carprezzo'][count($_SESSION['carprezzo']) - 1]);
         unset($_SESSION['carnome'][count($_SESSION['carnome']) - 1]);
         unset($_SESSION['carfoto'][count($_SESSION['carfoto']) - 1]);
				 $arr[0] = array("Success", "Ko");
				 echo json_encode($arr);
       }
     }
 }

 ?>
