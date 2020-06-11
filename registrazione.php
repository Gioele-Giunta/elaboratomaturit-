<?php

    include "Script\start.php";
	if(isset($_POST))
	{
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $cognome = mysqli_real_escape_string($conn, $_POST['cognome']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $via = mysqli_real_escape_string($conn, $_POST['via']);
    $numerocivico = mysqli_real_escape_string($conn, $_POST['numerocivico']);
    $cap = mysqli_real_escape_string($conn, $_POST['cap']);
    $città = mysqli_real_escape_string($conn, $_POST['citta']);
    $stato = mysqli_real_escape_string($conn, $_POST['stato']);

    $utente="INSERT INTO utenti (nome, cognome, username, password, status)
     VALUES('$nome',  '$cognome', '$username', '$password', 'Utente')";
    $inserimentoutente = mysqli_query($conn, $utente);
    if ($inserimentoutente)
    {
      $id="SELECT id FROM utenti WHERE nome = '$nome'AND cognome = '$cognome' AND username = '$username' AND password = '$password'";
      $ricercaid = mysqli_query($conn, $id);
      $idugenerale = 0;
      while ($riga=mysqli_fetch_array($ricercaid))
      {
        $idu = $riga['id'];
        $idugenerale = $idu;

      }
      $indirizzo="INSERT INTO indirizzo (via, numerocivico, CAP, città, stato, utenti_id)
       VALUES('$via',  $numerocivico, $cap, '$città', '$stato', $idu)";
      $inserimentoindirizzo = mysqli_query($conn, $indirizzo);
      if (!$inserimentoindirizzo)
      {
        $arr[0] = array("Fail");
         echo json_encode($arr);

      }else{
        $arr[0] = array("Success");
         echo json_encode($arr);

           $_SESSION['id'] = $idugenerale;
           $_SESSION['username'] = $username;
           $_SESSION['password'] = $password;
           $_SESSION['nome'] = $nome;
           $_SESSION['password'] = $cognome;
           $_SESSION['status'] = "Utente";

      }
    }else{
      $arr[0] = array("Fail");
       echo json_encode($arr);
    }
	}
	else{
		die ("non ci sono dati dal form" );
	}






?>
