<?php
    require '../require/connection.php';
    date_default_timezone_set('Europe/Oslo');
    $date = date('Y-m-d H:i:s', time());

    //Scrubbe og restriksjoner
    $kundeid = filter_var($_POST['create_kunde_id'], FILTER_SANITIZE_STRING);
    $listeid = filter_var($_POST['create_liste_id'], FILTER_SANITIZE_STRING);
    $intervall = filter_var($_POST['create_intervall'], FILTER_SANITIZE_STRING);

    if($kundeid < 1 || $listeid < 1 || $intervall < 1 || empty($kundeid) || empty($listeid) || empty($intervall))
    {
        header('Location: javascript://history.go(-1)');
        exit;
    }

    //SQL Dateformat yyyy/mm/dd
    $statement1 = $connection->prepare('INSERT INTO abonnement VALUES (
    "'.$kundeid.'",
    "'.$listeid.'",
    NULL,
    "'.$_POST['create-leveringstid'].'", 
    "'.$_POST['create-leveringsdato'].'", 
    "'.$intervall.'")');
    $statement1->execute();

    header('Location: ../admin.php');
    exit;