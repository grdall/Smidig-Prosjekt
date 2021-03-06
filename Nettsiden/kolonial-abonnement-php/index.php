<?php
    require 'require/connection.php';
    $statement1 = $connection->prepare('SELECT kunde_id, liste_navn, abonnement.liste_id, bestiling_id, leverings_dato, leverings_tidspunkt, intervall FROM abonnement 
    LEFT JOIN liste ON abonnement.liste_id=liste.liste_id ORDER BY kunde_id, liste_id');
    require 'require/statement-execute-1.php';

    $statement2 = $connection->prepare('SELECT * FROM liste ORDER BY liste_id');
    require 'require/statement-execute-2.php';

    //require '../HTML/header.html';
    require '../header-vilde/header.html';
?>

<!--- PHP CSS (kan inkluderes i en header) --->
<link rel="stylesheet" href="require/css.css"/>

<div id="container">
    <div id="content">
        <h1 style="font-size: 30px; font-weight: bold;">Admin</h1>
        <br>
        
        <!--- Navigering --->
        <input type="button" onclick="location.href='slides.php';" value="Slides">
        <input type="button" onclick="location.href='../hovedside/frontpage.php';" value="Forsiden">
        <input type="button" onclick="location.href='../INFOSIDE/infoside.php';" value="Infoside">
        <input type="button" onclick="location.href='abonnement.php';" value="Abonnement">
        <br><br>
        
        <!--- Visning --->
        <input type="button" onclick="location.href='crud/insert-example.php';" value="Nytt Eksempel">
        <input type="button" onclick="location.href='crud/delete-example.php';" value="Slett Eksempel">
        <br><br>
        
        <h2 style="font-size: 20px; font-weight: bold;">Lag ny liste</h2>
        <form class="" action="crud/create-list.php" method="post">
            <input type="text" id="listenavn" name="listenavn" placeholder="Listenavn">
            <input type="number" id="antall-antall_varer" name="antall_varer" placeholder="Antall varer">
            <input type="number" id="total-total_pris" name="total_pris" placeholder="Total pris">
            <input type="number" id="vare_id" name="vare_id" placeholder="Varer">
            <input type="button" id="lag-liste-btn" onclick="submit();" value="Lag liste">            
        </form>
        <br>
        
        <h2 style="font-size: 20px; font-weight: bold;">Legg til abonnement</h2>
        <form class="" action="crud/create-subscription.php" method="post">
            <input type="number" id="kunde-id" name="create_kunde_id" placeholder="Kunde ID">
            <input type="number" id="liste-id" name="create_liste_id" placeholder="Liste ID">
            
            <!--- Dropdown tid --->
            <select name="create_leveringstid">
                <option value="07-09">07-09</option>
                <option value="08-10">08-10</option>
                <option value="08-11">08-11</option>
                <option value="09-10">09-10</option>
                <option value="09-11">09-11</option>
                <option value="09-12">09-12</option>
                <option value="09-14">09-14</option>
                <option value="14-16">14-16</option>
                <option value="16-19">16-19</option>
            </select>

            <!--- Intervall --->
            <input type="number" id="intervall" name="create_intervall" placeholder="Intervall i uker">

            <!--- Leveringsdato --->
            <select name="create_leveringsdato">
                <option selected disabled>Leveringsdag</option>
                <option value="2017-12-04">Mandag</option>
                <option value="2017-12-05">Tirsdag</option>
                <option value="2017-12-06">Onsdag</option>
                <option value="2017-12-07">Torsdag</option>
                <option value="2017-12-08">Fredag</option>
            </select>
                
            <button type="button" onclick="submit();">Legg til abonnement</button>
        </form>
        
        <br>
        <hr>
        
        <h2 style="font-size: 20px; font-weight: bold;">Abonnement</h2>
        <br>
        <?php
            foreach ($events1 as $event) 
            {   
                require 'crud/cards/subscription-card.php';
                echo "<br><br>";
                $contentcounter++;
            } 
            if($contentcounter == 0)
            {
                echo "Beklager! Vi fant ingen abonnement med $getsearch!";
            }
        ?>
        <hr>
        
        <h2 style="font-size: 20px; font-weight: bold;">Lister</h2>
        <br>
        <?php
            foreach ($events2 as $event) 
            {   
                require 'crud/cards/list-card.php';
                echo "<br><br>";
                $contentcounter++;
            } 
            if($contentcounter == 0)
            {
                echo "Beklager! Vi fant ingen lister med $getsearch!";
            }
        ?>
        
    </div>
</div>

<?php
    //require 'footer.php';
?>