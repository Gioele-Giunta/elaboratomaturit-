<?php
	include "Script\start.php";
  if(!isset($_SESSION['carid'])){
		$countsession = 0;
	}else{
		$countsession = count($_SESSION['carid']);
	}
	for($i=0; $i < $countsession; $i++){
    $prodotti_id = $_SESSION['carid'][$i];
    $merce = $_SESSION['carprezzo'][$i];
		$quantità = $_SESSION['carqty'][$i];
    $spedizione = ($merce/100) * 25;
    $totale = $merce + $spedizione;
    $prezzototale = $totale;
    $utenti_id = $_SESSION['id'];
		$stato = "In transito";
		$dataacquisto = date("Y-m-d h:i:sa");
		$codicetracking = rand();
		$indirizzo_id = 0;

    $indirizzo = "SELECT * FROM indirizzo WHERE utenti_id = $utenti_id";
		$ricercaindirizzo = mysqli_query($conn, $indirizzo);
		if (!$ricercaindirizzo)
		{
			$arr[0] = array("Fail");
			 echo json_encode($arr);

		}else{

			 while ($riga=mysqli_fetch_array($ricercaindirizzo))
       {
				 $indirizzo_id = $riga['id'];
       }
			 $ordine = "INSERT INTO ordine (dataacquisto, prezzototale, statopacco, codicetracking, prodotti_id, indirizzo_id, utenti_id, quantità) VALUES (CURDATE(), $prezzototale, '$stato', '$codicetracking', $prodotti_id, $indirizzo_id, $utenti_id, $quantità)";
			 $inserimentoordine = mysqli_query($conn, $ordine);


		}

	}

	header("Location:gestioneCarrello.php?reset=true");


?>
