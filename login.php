<?php
    //non includiamo subito la parte HTML
    //perchè se dobbiamo tornare subito alla pagina precedente si genera un errore
    include "Script\start.php";
	if(isset($_POST))
	{
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query= "SELECT * FROM utenti WHERE username='$username' AND password='$password'";

    $risultato=mysqli_query($conn, $query);
    // Se non ci sono camere disponibili ritorniamo (REDIRECT) subito alla pagina iniziale
    if (mysqli_num_rows($risultato)==0)
    {
      $arr[0] = array("Fail");// questo blocco sarà chiuso alla fine del form
       echo json_encode($arr);
    } else{
      while ($riga=mysqli_fetch_array($risultato))
      {
        $_SESSION['id'] = $riga['id'];
        $_SESSION['username'] = $riga['username'];
        $_SESSION['password'] = $riga['password'];
        $_SESSION['nome'] = $riga['nome'];
        $_SESSION['password'] = $riga['cognome'];
        $_SESSION['status'] = $riga['status'];
      }
      $arr[0] = array("Success");// questo blocco sarà chiuso alla fine del form
       echo json_encode($arr);

    }
	}
	else{
		die ("non ci sono dati dal form" );
	}






?>
