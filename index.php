<!DOCTYPE html5>
<html>
<head>
    <title>Summercup 2021</title>
    <link rel="stylesheet" href="design.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8">
</head>
<body>
<?php
    
# Genaue Besucherauflistung
$datum = date("d.m.Y, H.i") . " Uhr: ";
if (! isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $adresse = $_SERVER['REMOTE_ADDR'];
}
else {
    $adresse = $_SERVER['HTTP_X_FORWARDED_FOR'];
}
$besuchedatei = fopen("besuche.txt", "a+");
fwrite($besuchedatei, $datum . $adresse . "\n") or die("Hat die Besuche-Datei Schreibrechte?");
fclose($besuchedatei);
    
    

# Besuchercounter
$zaehler = file("counter.txt");
$zaehler = $zaehler[0] + 1;
$counterdatei = fopen("counter.txt", "w");
fwrite($counterdatei, $zaehler) or die("Hat die Counter-Datei Schreibrechte?"); # wird ganz unten geclosed
    
    
# Stand
$stand = file("stand.txt")[0];
    
    
    
function isMobileDevice() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}

require "connection.php";

$query = "SELECT DATE_FORMAT(datum, '%d.%m.%Y'), TIME_FORMAT(uhrzeit, '%H:%i'), team1, team2, satz1, satz2, satz3 FROM partien ORDER BY datum";

$erg = mysqli_query($db, $query);

if(isMobileDevice()){
    echo '<img src="logo.png" id="logo_mobil">';
    echo "<h2>Spielplan</h2>";
    echo '<table id="spielplan" border=1>' . "\n";
    while ($zeile = mysqli_fetch_assoc($erg)) {
        echo "<tr class='datum_uhrzeit_mobil'>" . "\n";
        echo "<td>" . "\n" . $zeile["DATE_FORMAT(datum, '%d.%m.%Y')"] . "\n" . "</td>" . "\n";
        echo "<td>" . "\n" . $zeile["TIME_FORMAT(uhrzeit, '%H:%i')"] . "\n" . "</td>" . "\n";
        echo "</tr>" . "\n";
        echo "<tr class='teams_mobil'>" . "\n";
        echo "<td colspan=2>" . "\n" . $zeile['team1'] . "&nbsp;&nbsp;&ndash;&nbsp;&nbsp;" . $zeile['team2'] . "\n" . "</td>" . "\n";
        echo "</tr>" . "\n";
        echo "<tr class='ergebnisse_mobil'>" . "\n";
        echo "<td colspan=2>" . "\n" . $zeile['satz1'] . "&nbsp;&nbsp;&nbsp;" . $zeile['satz2'] . "&nbsp;&nbsp;&nbsp;" . $zeile['satz3'] . "\n" . "</td>" . "\n";
        echo "</tr>" . "\n";
    }
    echo "</table>";

    echo "<br><h2>Ergebnisse pro Team</h2>" . "\n";
    
    echo '<h3>Student/Trainer:</h3>
<table id="raster" border=1>
    <tr>
        <th>Gegner</th><th>Ergebnis</th>
    </tr>
    <tr>
        <td>Mustermann/Edwart</td>
        <td>' . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='HMMP'"))[0] . "&nbsp;&nbsp;" . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='HMMP'"))[0] . "&nbsp;&nbsp;" . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='HMMP'"))[0] . '</td>
    </tr>
    <tr>
        <td>Meier/Huber</td>
        <td>' . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='HMNW'"))[0] . "&nbsp;&nbsp;" . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='HMNW'"))[0] . "&nbsp;&nbsp;" . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='HMNW'"))[0] . 
        '</td>
    </tr>
    <tr>
        <td>Wart/Meckerer</td>
        <td>' . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='HMWJ'"))[0] . "&nbsp;&nbsp;" . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='HMWJ'"))[0] . "&nbsp;&nbsp;" . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='HMWJ'"))[0] . 
        '</td>
    </tr>
    <tr>
        <td>Rechtler/Fahrer</td>
        <td>' . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='HMHK'"))[0] . "&nbsp;&nbsp;" . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='HMHK'"))[0] . "&nbsp;&nbsp;" . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='HMHK'"))[0] . 
        '</td>
    </tr>
</table><br>' . "\n";
    
    echo '<h3>Mustermann/Edwart:</h3>
<table id="raster" border=1>
    <tr>
        <th>Gegner</th><th>Ergebnis</th>
    </tr>
    <tr>
        <td>Student/Trainer</td>
        <td>' . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='MPHM'"))[0] . "&nbsp;&nbsp;" . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='MPHM'"))[0] . "&nbsp;&nbsp;" . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='MPHM'"))[0] . '</td>
    </tr>
    <tr>
        <td>Meier/Huber</td>
        <td>' . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='MPNW'"))[0] . "&nbsp;&nbsp;" . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='MPNW'"))[0] . "&nbsp;&nbsp;" . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='MPNW'"))[0] . 
        '</td>
    </tr>
    <tr>
        <td>Wart/Meckerer</td>
        <td>' . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='MPWJ'"))[0] . "&nbsp;&nbsp;" . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='MPWJ'"))[0] . "&nbsp;&nbsp;" . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='MPWJ'"))[0] . 
        '</td>
    </tr>
    <tr>
        <td>Rechtler/Fahrer</td>
        <td>' . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='MPHK'"))[0] . "&nbsp;&nbsp;" . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='MPHK'"))[0] . "&nbsp;&nbsp;" . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='MPHK'"))[0] . 
        '</td>
    </tr>
</table><br>' . "\n";
    
    echo '<h3>Meier/Huber:</h3>
<table id="raster" border=1>
    <tr>
        <th>Gegner</th><th>Ergebnis</th>
    </tr>
    <tr>
        <td>Student/Trainer</td>
        <td>' . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='NWHM'"))[0] . "&nbsp;&nbsp;" . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='NWHM'"))[0] . "&nbsp;&nbsp;" . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='NWHM'"))[0] . '</td>
    </tr>
    <tr>
        <td>Mustermann/Edwart</td>
        <td>' . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='NWMP'"))[0] . "&nbsp;&nbsp;" . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='NWMP'"))[0] . "&nbsp;&nbsp;" . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='NWMP'"))[0] . 
        '</td>
    </tr>
    <tr>
        <td>Wart/Meckerer</td>
        <td>' . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='NWWJ'"))[0] . "&nbsp;&nbsp;" . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='NWWJ'"))[0] . "&nbsp;&nbsp;" . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='NWWJ'"))[0] . 
        '</td>
    </tr>
    <tr>
        <td>Rechtler/Fahrer</td>
        <td>' . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='NWHK'"))[0] . "&nbsp;&nbsp;" . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='NWHK'"))[0] . "&nbsp;&nbsp;" . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='NWHK'"))[0] . 
        '</td>
    </tr>
</table><br>' . "\n";
    
    echo '<h3>Wart/Meckerer:</h3>
<table id="raster" border=1>
    <tr>
        <th>Gegner</th><th>Ergebnis</th>
    </tr>
    <tr>
        <td>Student/Trainer</td>
        <td>' . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='WJHM'"))[0] . "&nbsp;&nbsp;" . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='WJHM'"))[0] . "&nbsp;&nbsp;" . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='WJHM'"))[0] . '</td>
    </tr>
    <tr>
        <td>Mustermann/Edwart</td>
        <td>' . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='WJMP'"))[0] . "&nbsp;&nbsp;" . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='WJMP'"))[0] . "&nbsp;&nbsp;" . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='WJMP'"))[0] . 
        '</td>
    </tr>
    <tr>
        <td>Meier/Huber</td>
        <td>' . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='WJNW'"))[0] . "&nbsp;&nbsp;" . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='WJNW'"))[0] . "&nbsp;&nbsp;" . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='WJNW'"))[0] . 
        '</td>
    </tr>
    <tr>
        <td>Rechtler/Fahrer</td>
        <td>' . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='WJHK'"))[0] . "&nbsp;&nbsp;" . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='WJHK'"))[0] . "&nbsp;&nbsp;" . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='WJHK'"))[0] . 
        '</td>
    </tr>
</table><br>' . "\n";
    
    echo '<h3>Rechtler/Fahrer:</h3>
<table id="raster" border=1>
    <tr>
        <th>Gegner</th><th>Ergebnis</th>
    </tr>
    <tr>
        <td>Student/Trainer</td>
        <td>' . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='HKHM'"))[0] . "&nbsp;&nbsp;" . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='HKHM'"))[0] . "&nbsp;&nbsp;" . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='HKHM'"))[0] . '</td>
    </tr>
    <tr>
        <td>Mustermann/Edwart</td>
        <td>' . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='HKMP'"))[0] . "&nbsp;&nbsp;" . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='HKMP'"))[0] . "&nbsp;&nbsp;" . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='HKMP'"))[0] . 
        '</td>
    </tr>
    <tr>
        <td>Meier/Huber</td>
        <td>' . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='HKNW'"))[0] . "&nbsp;&nbsp;" . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='HKNW'"))[0] . "&nbsp;&nbsp;" . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='HKNW'"))[0] . 
        '</td>
    </tr>
    <tr>
        <td>Wart/Meckerer</td>
        <td>' . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='HKWJ'"))[0] . "&nbsp;&nbsp;" . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='HKWJ'"))[0] . "&nbsp;&nbsp;" . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='HKWJ'"))[0] . 
        '</td>
    </tr>
</table><br>' . "\n";
    

    echo "<span id='stand'>Stand: " . $stand . "</span>";
    echo "<span id='besuche'>Besuche: " . $zaehler . "</span></div>";

}
else {
    echo '<div id="ausgabe">' . "\n" . '<img src="logo.png" id="logo">' . "\n" . '<h1>Spielplan</h1>' . "\n";

    echo '<table id="spielplan" border=1>' . "\n";
    echo '<tr>' . "\n";
    echo '<th>Datum</th>' . "\n";
    echo '<th>Uhrzeit</th>' . "\n";
    echo '<th>Team</th>' . "\n";
    echo '<th>Team</th>' . "\n";
    echo '<th>Ergebnis</th>' . "\n";
    echo '</tr>' . "\n";
    while ($zeile = mysqli_fetch_assoc($erg)) {
        echo "<tr>" . "\n";
        echo "<td class='datum'>" . "\n" . $zeile["DATE_FORMAT(datum, '%d.%m.%Y')"] . "\n" . "</td>" . "\n";
        echo "<td class='uhrzeit'>" . "\n" . $zeile["TIME_FORMAT(uhrzeit, '%H:%i')"] . "\n" . "</td>" . "\n";
        echo "<td class='team1'>" . "\n" . $zeile['team1'] . "\n" . "</td>" . "\n";
        echo "<td class='team2'>" . "\n" . $zeile['team2'] . "\n" . "</td>" . "\n";
        echo "<td class='ergebnis'>" . "\n" . $zeile['satz1'] . "&nbsp;&nbsp;&nbsp;" . $zeile['satz2'] . "&nbsp;&nbsp;&nbsp;" . $zeile['satz3'] . "\n" . "</td>" . "\n";
        echo "</tr>" . "\n";
    }
    echo "</table>";

    echo "\n" . "<br>" . "\n";

    echo '<h1>Raster</h1>' . "\n" . '<table id="raster">
        <tr>
            <th>

            </th>
            <th>
                Student/<br>Trainer
            </th>
            <th>
                Mustermann/<br>Edwart
            </th>
            <th>
                Meier/<br>Huber
            </th>
            <th>
                Wart/<br>Meckerer
            </th>
            <th>
                Rechtler/<br>Fahrer
            </th>
        </tr>
        <tr>
            <th>
                Student/<br>Trainer
            </th>
            <td class="nix">

            </td>
            <td>'
                . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='HMMP'"))[0]
                . '&nbsp;&nbsp;'
                . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='HMMP'"))[0]
                . '&nbsp;&nbsp;'
                . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='HMMP'"))[0]
        . '</td>
            <td>'
                . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='HMNW'"))[0]
                . '&nbsp;&nbsp;'
                . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='HMNW'"))[0]
                . '&nbsp;&nbsp;'
                . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='HMNW'"))[0]
        . '</td>
            <td>'
                . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='HMWJ'"))[0]
                . '&nbsp;&nbsp;'
                . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='HMWJ'"))[0]
                . '&nbsp;&nbsp;'
                . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='HMWJ'"))[0]
        . '</td>
            <td>'
                . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='HMHK'"))[0]
                . '&nbsp;&nbsp;'
                . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='HMHK'"))[0]
                . '&nbsp;&nbsp;'
                . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='HMHK'"))[0]
        . '</td>
        </tr>
        <tr>
            <th>
                Mustermann/<br>Edwart
            </th>
            <td>'
                . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='MPHM'"))[0]
                . '&nbsp;&nbsp;'
                . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='MPHM'"))[0]
                . '&nbsp;&nbsp;'
                . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='MPHM'"))[0]
        . '</td>
            <td class="nix">

            </td>
            <td>'
                . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='MPNW'"))[0]
                . '&nbsp;&nbsp;'
                . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='MPNW'"))[0]
                . '&nbsp;&nbsp;'
                . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='MPNW'"))[0]
        . '</td>
            <td>'
                . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='MPWJ'"))[0]
                . '&nbsp;&nbsp;'
                . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='MPWJ'"))[0]
                . '&nbsp;&nbsp;'
                . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='MPWJ'"))[0]
        . '</td>
            <td>'
                . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='MPHK'"))[0]
                . '&nbsp;&nbsp;'
                . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='MPHK'"))[0]
                . '&nbsp;&nbsp;'
                . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='MPHK'"))[0]
        . '</td>
        </tr>
        <tr>
            <th>
                Meier/<br>Huber
            </th>
            <td>'
                . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='NWHM'"))[0]
                . '&nbsp;&nbsp;'
                . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='NWHM'"))[0]
                . '&nbsp;&nbsp;'
                . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='NWHM'"))[0]
        . '</td>
            <td>'
                . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='NWMP'"))[0]
                . '&nbsp;&nbsp;'
                . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='NWMP'"))[0]
                . '&nbsp;&nbsp;'
                . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='NWMP'"))[0]
        . '</td>
            <td class="nix">

            </td>
            <td>'
                . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='NWWJ'"))[0]
                . '&nbsp;&nbsp;'
                . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='NWWJ'"))[0]
                . '&nbsp;&nbsp;'
                . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='NWWJ'"))[0]
        . '</td>
            <td>'
                . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='NWHK'"))[0]
                . '&nbsp;&nbsp;'
                . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='NWHK'"))[0]
                . '&nbsp;&nbsp;'
                . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='NWHK'"))[0]
        . '</td>
        </tr>
        <tr>
            <th>
                Wart/<br>Meckerer
            </th>
            <td>'
                . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='WJHM'"))[0]
                . '&nbsp;&nbsp;'
                . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='WJHM'"))[0]
                . '&nbsp;&nbsp;'
                . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='WJHM'"))[0]
        . '</td>
            <td>'
                . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='WJMP'"))[0]
                . '&nbsp;&nbsp;'
                . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='WJMP'"))[0]
                . '&nbsp;&nbsp;'
                . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='WJMP'"))[0]
        . '</td>
            <td>'
                . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='WJNW'"))[0]
                . '&nbsp;&nbsp;'
                . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='WJNW'"))[0]
                . '&nbsp;&nbsp;'
                . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='WJNW'"))[0]
        . '</td>
            <td class="nix">

            </td>
            <td>'
                . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='WJHK'"))[0]
                . '&nbsp;&nbsp;'
                . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='WJHK'"))[0]
                . '&nbsp;&nbsp;'
                . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='WJHK'"))[0]
        . '</td>
        </tr>
        <tr>
            <th>
                Rechtler/<br>Fahrer
            </th>
            <td>'
                . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='HKHM'"))[0]
                . '&nbsp;&nbsp;'
                . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='HKHM'"))[0]
                . '&nbsp;&nbsp;'
                . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='HKHM'"))[0]
        . '</td>
            <td>'
                . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='HKMP'"))[0]
                . '&nbsp;&nbsp;'
                . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='HKMP'"))[0]
                . '&nbsp;&nbsp;'
                . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='HKMP'"))[0]
        . '</td>
            <td>'
                . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='HKNW'"))[0]
                . '&nbsp;&nbsp;'
                . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='HKNW'"))[0]
                . '&nbsp;&nbsp;'
                . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='HKNW'"))[0]
        . '</td>
            <td>'
                . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='HKWJ'"))[0]
                . '&nbsp;&nbsp;'
                . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='HKWJ'"))[0]
                . '&nbsp;&nbsp;'
                . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='HKWJ'"))[0]
        . '</td>
            <td class="nix">

            </td>
        </tr>
</table>';
    
    echo "<div id='zusatzinfos'><span id='stand'>Stand: " . $stand . "</span>";
    echo "<span id='besuche'>Besuche: " . $zaehler . "</span></div>";
    echo "</div>";
}
    

fclose($counterdatei);
?>
</body>
</html>