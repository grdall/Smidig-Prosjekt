<?php
    require '../require/connection.php';
    $kundeid = $_POST['edit_kunde_id'];
    $listeid = $_POST['edit_liste_id'];

    $statement1 = $connection->prepare('UPDATE abonnement SET
    leverings_tidspunkt = "'.$_POST['leveringstid'].'", 
    leverings_dato = "'.$_POST['leveringsdato'].'", 
    intervall = "'.$_POST['intervall'].'"
    WHERE kunde_id = "'.$kundeid.'" AND liste_id = "'.$listeid.'"');
    $statement1->execute();

    header('Location: ../index.php');
    exit;