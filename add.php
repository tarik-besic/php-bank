<?php 
	include "konekcija.php";


	    $ime = $_POST['ime'];
	    $email = $_POST['email'];
	    $novac = $_POST['novac'];
	    $sql ="INSERT INTO `users` (`id`, `ime`, `email`, `novac`) VALUES (NULL, '$ime', '$email', '$novac');";
    	    $result = $konekcija->query($sql);
	    if ($result == TRUE) {
		      echo "Novi korisnik kreiran.";
	    }else{
	      echo "Error:". $sql . "<br>". $konekcija->error;
	    }
