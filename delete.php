<?php 

include "konekcija.php"; 

if (isset($_POST['id'])) {

    $id = $_POST['id'];
    echo 
    $sql = "DELETE FROM `users` WHERE `id`='$id'";

     $result = $konekcija->query($sql);

     if ($result == TRUE) {

        echo "Korisnik obrisan.";

    }else{
        echo "Error:" . $sql . "<br>" . $konekcija->error;
    }
} 

?>