<!DOCTYPE html5>
<html>
<head>
    <title>Input</title>
    <link rel="stylesheet" href="design.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8">
    <link rel="icon" href="icon.png">
</head>
<body>
<?php
function isMobileDevice() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}

require "connection.php";

$query = "SELECT * FROM matches ORDER BY date";

$erg = mysqli_query($db, $query);

if(isMobileDevice()){
    
    echo "<h2>Playing schedule</h2>";
    
    echo '<form action="update.php" method="post" autocomplete="off">' . "\n";
    echo '<table id="spielplan" border=1>' . "\n";
    while ($zeile = mysqli_fetch_assoc($erg)) {
        echo "<tr class='datum_uhrzeit_mobil'>" . "\n";
        echo "<td class='datum_mobil'>" . "\n" . '<input type="date" value="' . $zeile['datum'] . '" name="' . "datum_" . $zeile['id'] . '">' . "\n" . "</td>" . "\n";
        echo "<td class='uhrzeit_mobil'>" . "\n" . '<input type="time" value="' . $zeile['uhrzeit'] . '" name="' . "uhrzeit_" . $zeile['id'] . '">' . "\n" . "</td>" . "\n";
        echo "</tr>" . "\n";
        echo "<tr class='teams_mobil'>" . "\n";
        echo "<td colspan=2>" . "\n" . $zeile['team1'] . "&nbsp;&nbsp;&ndash;&nbsp;&nbsp;" . $zeile['team2'] . "\n" . "</td>" . "\n";
        echo "</tr>" . "\n";
        echo "<tr class='ergebnisse_mobil'>" . "\n";
        echo "<td colspan=2>" . "\n" . '<input type="text" size="5" maxlength="5" value="' . $zeile['satz1'] . '" name="' . "sp_s1_" . $zeile['id'] . '">' . "\n" . "&nbsp;&nbsp;" . "\n" . '<input type="text" size="5" maxlength="5" value="' . $zeile['satz2'] . '" name="' . "sp_s2_" . $zeile['id'] . '">' . "\n" . "&nbsp;&nbsp;" . "\n" . '<input type="text" size="5" maxlength="5" value="' . $zeile['satz3'] . '" name="' . "sp_s3_" . $zeile['id'] . '">' . "\n" . "&nbsp;&nbsp;" . "\n" . "\n" . "</td>" . "\n";
        echo "</tr>" . "\n";
    }
    echo "</table>";
    
    echo "<br><h2>Results per team</h2>" . "\n";
    
    echo '<h3>Student/Trainer:</h3>
<table id="raster" border=1>
    <tr>
        <th>Gegner</th><th>Ergebnis</th>
    </tr>
    <tr>
        <td>Mustermann/Edwart</td>
        <td>' . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='HMMP'"))[0] . '" name="r_s1_HMMP">' . "&nbsp;&nbsp;" . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='HMMP'"))[0] . '" name="r_s2_HMMP">' . "&nbsp;&nbsp;" . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='HMMP'"))[0] . '" name="r_s3_HMMP">' . '</td>
    </tr>
    <tr>
        <td>Meier/Huber</td>
        <td>' . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='HMNW'"))[0] . '" name="r_s1_HMNW">' . "&nbsp;&nbsp;" . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='HMNW'"))[0] . '" name="r_s2_HMNW">' . "&nbsp;&nbsp;" . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='HMNW'"))[0] . '" name="r_s3_HMNW">' . 
        '</td>
    </tr>
    <tr>
        <td>Wart/Meckerer</td>
        <td>' . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='HMWJ'"))[0] . '" name="r_s1_HMWJ">' . "&nbsp;&nbsp;" . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='HMWJ'"))[0] . '" name="r_s2_HMWJ">' . "&nbsp;&nbsp;" . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='HMWJ'"))[0] . '" name="r_s3_HMWJ">' . 
        '</td>
    </tr>
    <tr>
        <td>Rechtler/Fahrer</td>
        <td>' . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='HMHK'"))[0] . '" name="r_s1_HMHK">' . "&nbsp;&nbsp;" . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='HMHK'"))[0] . '" name="r_s2_HMHK">' . "&nbsp;&nbsp;" . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='HMHK'"))[0] . '" name="r_s3_HMHK">' . 
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
        <td>' . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='MPHM'"))[0] . '" name="r_s1_MPHM">' . "&nbsp;&nbsp;" . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='MPHM'"))[0] . '" name="r_s2_MPHM">' . "&nbsp;&nbsp;" . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='MPHM'"))[0] . '" name="r_s3_MPHM">' . '</td>
    </tr>
    <tr>
        <td>Meier/Huber</td>
        <td>' . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='MPNW'"))[0] . '" name="r_s1_MPNW">' . "&nbsp;&nbsp;" . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='MPNW'"))[0] . '" name="r_s2_MPNW">' . "&nbsp;&nbsp;" . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='MPNW'"))[0] . '" name="r_s3_MPNW">' . 
        '</td>
    </tr>
    <tr>
        <td>Wart/Meckerer</td>
        <td>' . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='MPWJ'"))[0] . '" name="r_s1_MPWJ">' . "&nbsp;&nbsp;" . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='MPWJ'"))[0] . '" name="r_s2_MPWJ">' . "&nbsp;&nbsp;" . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='MPWJ'"))[0] . '" name="r_s3_MPWJ">' . 
        '</td>
    </tr>
    <tr>
        <td>Rechtler/Fahrer</td>
        <td>' . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='MPHK'"))[0] . '" name="r_s1_MPHK">' . "&nbsp;&nbsp;" . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='MPHK'"))[0] . '" name="r_s2_MPHK">' . "&nbsp;&nbsp;" . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='MPHK'"))[0] . '" name="r_s3_MPHK">' . 
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
        <td>' . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='NWHM'"))[0] . '" name="r_s1_NWHM">' . "&nbsp;&nbsp;" . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='NWHM'"))[0] . '" name="r_s2_NWHM">' . "&nbsp;&nbsp;" . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='NWHM'"))[0] . '" name="r_s3_NWHM">' . '</td>
    </tr>
    <tr>
        <td>Mustermann/Edwart</td>
        <td>' . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='NWMP'"))[0] . '" name="r_s1_NWMP">' . "&nbsp;&nbsp;" . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='NWMP'"))[0] . '" name="r_s2_NWMP">' . "&nbsp;&nbsp;" . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='NWMP'"))[0] . '" name="r_s3_NWMP">' . 
        '</td>
    </tr>
    <tr>
        <td>Wart/Meckerer</td>
        <td>' . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='NWWJ'"))[0] . '" name="r_s1_NWWJ">' . "&nbsp;&nbsp;" . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='NWWJ'"))[0] . '" name="r_s2_NWWJ">' . "&nbsp;&nbsp;" . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='NWWJ'"))[0] . '" name="r_s3_NWWJ">' . 
        '</td>
    </tr>
    <tr>
        <td>Rechtler/Fahrer</td>
        <td>' . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='NWHK'"))[0] . '" name="r_s1_NWHK">' . "&nbsp;&nbsp;" . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='NWHK'"))[0] . '" name="r_s2_NWHK">' . "&nbsp;&nbsp;" . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='NWHK'"))[0] . '" name="r_s3_NWHK">' . 
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
        <td>' . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='WJHM'"))[0] . '" name="r_s1_WJHM">' . "&nbsp;&nbsp;" . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='WJHM'"))[0] . '" name="r_s2_WJHM">' . "&nbsp;&nbsp;" . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='WJHM'"))[0] . '" name="r_s3_WJHM">' . '</td>
    </tr>
    <tr>
        <td>Mustermann/Edwart</td>
        <td>' . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='WJMP'"))[0] . '" name="r_s1_WJMP">' . "&nbsp;&nbsp;" . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='WJMP'"))[0] . '" name="r_s2_WJMP">' . "&nbsp;&nbsp;" . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='WJMP'"))[0] . '" name="r_s3_WJMP">' . 
        '</td>
    </tr>
    <tr>
        <td>Meier/Huber</td>
        <td>' . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='WJNW'"))[0] . '" name="r_s1_WJNW">' . "&nbsp;&nbsp;" . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='WJNW'"))[0] . '" name="r_s2_WJNW">' . "&nbsp;&nbsp;" . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='WJNW'"))[0] . '" name="r_s3_WJNW">' . 
        '</td>
    </tr>
    <tr>
        <td>Rechtler/Fahrer</td>
        <td>' . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='WJHK'"))[0] . '" name="r_s1_WJHK">' . "&nbsp;&nbsp;" . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='WJHK'"))[0] . '" name="r_s2_WJHK">' . "&nbsp;&nbsp;" . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='WJHK'"))[0] . '" name="r_s3_WJHK">' . 
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
        <td>' . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='HKHM'"))[0] . '" name="r_s1_HKHM">' . "&nbsp;&nbsp;" . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='HKHM'"))[0] . '" name="r_s2_HKHM">' . "&nbsp;&nbsp;" . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='HKHM'"))[0] . '" name="r_s3_HKHM">' . '</td>
    </tr>
    <tr>
        <td>Mustermann/Edwart</td>
        <td>' . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='HKMP'"))[0] . '" name="r_s1_HKMP">' . "&nbsp;&nbsp;" . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='HKMP'"))[0] . '" name="r_s2_HKMP">' . "&nbsp;&nbsp;" . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='HKMP'"))[0] . '" name="r_s3_HKMP">' . 
        '</td>
    </tr>
    <tr>
        <td>Meier/Huber</td>
        <td>' . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='HKNW'"))[0] . '" name="r_s1_HKNW">' . "&nbsp;&nbsp;" . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='HKNW'"))[0] . '" name="r_s2_HKNW">' . "&nbsp;&nbsp;" . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='HKNW'"))[0] . '" name="r_s3_HKNW">' . 
        '</td>
    </tr>
    <tr>
        <td>Wart/Meckerer</td>
        <td>' . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='HKWJ'"))[0] . '" name="r_s1_HKWJ">' . "&nbsp;&nbsp;" . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='HKWJ'"))[0] . '" name="r_s2_HKWJ">' . "&nbsp;&nbsp;" . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='HKWJ'"))[0] . '" name="r_s3_HKWJ">' . 
        '</td>
    </tr>
</table><br>' . "\n";
    
    echo '<input type="text" name="passwort" class="aktualisieren" size=12>';
    echo '<input type="submit" value="Aktualisieren" class="aktualisieren">';
    echo "</form>"; 
    

}
else {
    
    echo '<div id="ausgabe">' . "\n" . '<h1>Playing schedule</h1>' . "\n";
    
    echo '<form action="update.php" method="post" autocomplete="off">' . "\n";
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
        echo "<td class='datum'>" . "\n" . '<input type="date" value="' . $zeile['datum'] . '" name="' . "datum_" . $zeile['id'] . '">' . "\n" . "</td>" . "\n";
        echo "<td class='uhrzeit'>" . "\n" . '<input type="time" value="' . $zeile['uhrzeit'] . '" name="' . "uhrzeit_" . $zeile['id'] . '">' . "\n" . "</td>" . "\n";
        echo "<td class='team1'>" . "\n" . $zeile['team1'] . "\n" . "</td>" . "\n";
        echo "<td class='team2'>" . "\n" . $zeile['team2'] . "\n" . "</td>" . "\n";
        echo "<td class='ergebnis'>" . "\n" . '<input type="text" size="5" maxlength="5" value="' . $zeile['satz1'] . '" name="' . "sp_s1_" . $zeile['id'] . '">' . "\n" . "&nbsp;&nbsp;" . "\n" . '<input type="text" size="5" maxlength="5" value="' . $zeile['satz2'] . '" name="' . "sp_s2_" . $zeile['id'] . '">' . "\n" . "&nbsp;&nbsp;" . "\n" . '<input type="text" size="5" maxlength="5" value="' . $zeile['satz3'] . '" name="' . "sp_s3_" . $zeile['id'] . '">' . "\n" . "&nbsp;&nbsp;" . "\n" . "\n" . "</td>" . "\n";
        echo "</tr>" . "\n";
    }
    echo "</table>";

    echo '<br><h1>Raster</h1>' . "\n" . '<table id="raster">
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
                . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='HMMP'"))[0] . '" name="r_s1_HMMP">'
                . '&nbsp;&nbsp;'
                . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='HMMP'"))[0] . '" name="r_s2_HMMP">'
                . '&nbsp;&nbsp;'
                . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='HMMP'"))[0] . '" name="r_s3_HMMP">'
        . '</td>
            <td>'
                . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='HMNW'"))[0] . '" name="r_s1_HMNW">'
                . '&nbsp;&nbsp;'
                . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='HMNW'"))[0] . '" name="r_s2_HMNW">'
                . '&nbsp;&nbsp;'
                . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='HMNW'"))[0] . '" name="r_s3_HMNW">'
        . '</td>
            <td>'
                . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='HMWJ'"))[0] . '" name="r_s1_HMWJ">'
                . '&nbsp;&nbsp;'
                . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='HMWJ'"))[0] . '" name="r_s2_HMWJ">'
                . '&nbsp;&nbsp;'
                . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='HMWJ'"))[0] . '" name="r_s3_HMWJ">'
        . '</td>
            <td>'
                . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='HMHK'"))[0] . '" name="r_s1_HMHK">'
                . '&nbsp;&nbsp;'
                . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='HMHK'"))[0] . '" name="r_s2_HMHK">'
                . '&nbsp;&nbsp;'
                . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='HMHK'"))[0] . '" name="r_s3_HMHK">'
        . '</td>
        </tr>
        <tr>
            <th>
                Mustermann/<br>Edwart
            </th>
            <td>'
                . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='MPHM'"))[0] . '" name="r_s1_MPHM">'
                . '&nbsp;&nbsp;'
                . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='MPHM'"))[0] . '" name="r_s2_MPHM">'
                . '&nbsp;&nbsp;'
                . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='MPHM'"))[0] . '" name="r_s3_MPHM">'
        . '</td>
            <td class="nix">

            </td>
            <td>'
                . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='MPNW'"))[0] . '" name="r_s1_MPNW">'
                . '&nbsp;&nbsp;'
                . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='MPNW'"))[0] . '" name="r_s2_MPNW">'
                . '&nbsp;&nbsp;'
                . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='MPNW'"))[0] . '" name="r_s3_MPNW">'
        . '</td>
            <td>'
                . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='MPWJ'"))[0] . '" name="r_s1_MPWJ">'
                . '&nbsp;&nbsp;'
                . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='MPWJ'"))[0] . '" name="r_s2_MPWJ">'
                . '&nbsp;&nbsp;'
                . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='MPWJ'"))[0] . '" name="r_s3_MPWJ">'
        . '</td>
            <td>'
                . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='MPHK'"))[0] . '" name="r_s1_MPHK">'
                . '&nbsp;&nbsp;'
                . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='MPHK'"))[0] . '" name="r_s2_MPHK">'
                . '&nbsp;&nbsp;'
                . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='MPHK'"))[0] . '" name="r_s3_MPHK">'
        . '</td>
        </tr>
        <tr>
            <th>
                Meier/<br>Huber
            </th>
            <td>'
                . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='NWHM'"))[0] . '" name="r_s1_NWHM">'
                . '&nbsp;&nbsp;'
                . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='NWHM'"))[0] . '" name="r_s2_NWHM">'
                . '&nbsp;&nbsp;'
                . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='NWHM'"))[0] . '" name="r_s3_NWHM">'
        . '</td>
            <td>'
                . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='NWMP'"))[0] . '" name="r_s1_NWMP">'
                . '&nbsp;&nbsp;'
                . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='NWMP'"))[0] . '" name="r_s2_NWMP">'
                . '&nbsp;&nbsp;'
                . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='NWMP'"))[0] . '" name="r_s3_NWMP">'
        . '</td>
            <td class="nix">

            </td>
            <td>'
                . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='NWWJ'"))[0] . '" name="r_s1_NWWJ">'
                . '&nbsp;&nbsp;'
                . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='NWWJ'"))[0] . '" name="r_s2_NWWJ">'
                . '&nbsp;&nbsp;'
                . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='NWWJ'"))[0] . '" name="r_s3_NWWJ">'
        . '</td>
            <td>'
                . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='NWHK'"))[0] . '" name="r_s1_NWHK">'
                . '&nbsp;&nbsp;'
                . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='NWHK'"))[0] . '" name="r_s2_NWHK">'
                . '&nbsp;&nbsp;'
                . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='NWHK'"))[0] . '" name="r_s3_NWHK">'
        . '</td>
        </tr>
        <tr>
            <th>
                Wart/<br>Meckerer
            </th>
            <td>'
                . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='WJHM'"))[0] . '" name="r_s1_WJHM">'
                . '&nbsp;&nbsp;'
                . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='WJHM'"))[0] . '" name="r_s2_WJHM">'
                . '&nbsp;&nbsp;'
                . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='WJHM'"))[0] . '" name="r_s3_WJHM">'
        . '</td>
            <td>'
                . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='WJMP'"))[0] . '" name="r_s1_WJMP">'
                . '&nbsp;&nbsp;'
                . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='WJMP'"))[0] . '" name="r_s2_WJMP">'
                . '&nbsp;&nbsp;'
                . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='WJMP'"))[0] . '" name="r_s3_WJMP">'
        . '</td>
            <td>'
                . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='WJNW'"))[0] . '" name="r_s1_WJNW">'
                . '&nbsp;&nbsp;'
                . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='WJNW'"))[0] . '" name="r_s2_WJNW">'
                . '&nbsp;&nbsp;'
                . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='WJNW'"))[0] . '" name="r_s3_WJNW">'
        . '</td>
            <td class="nix">

            </td>
            <td>'
                . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='WJHK'"))[0] . '" name="r_s1_WJHK">'
                . '&nbsp;&nbsp;'
                . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='WJHK'"))[0] . '" name="r_s2_WJHK">'
                . '&nbsp;&nbsp;'
                . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='WJHK'"))[0] . '" name="r_s3_WJHK">'
        . '</td>
        </tr>
        <tr>
            <th>
                Rechtler/<br>Fahrer
            </th>
            <td>'
                . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='HKHM'"))[0] . '" name="r_s1_HKHM">'
                . '&nbsp;&nbsp;'
                . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='HKHM'"))[0] . '" name="r_s2_HKHM">'
                . '&nbsp;&nbsp;'
                . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='HKHM'"))[0] . '" name="r_s3_HKHM">'
        . '</td>
            <td>'
                . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='HKMP'"))[0] . '" name="r_s1_HKMP">'
                . '&nbsp;&nbsp;'
                . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='HKMP'"))[0] . '" name="r_s2_HKMP">'
                . '&nbsp;&nbsp;'
                . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='HKMP'"))[0] . '" name="r_s3_HKMP">'
        . '</td>
            <td>'
                . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='HKNW'"))[0] . '" name="r_s1_HKNW">'
                . '&nbsp;&nbsp;'
                . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='HKNW'"))[0] . '" name="r_s2_HKNW">'
                . '&nbsp;&nbsp;'
                . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='HKNW'"))[0] . '" name="r_s3_HKNW">'
        . '</td>
            <td>'
                . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz1 FROM raster WHERE id='HKWJ'"))[0] . '" name="r_s1_HKWJ">'
                . '&nbsp;&nbsp;'
                . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz2 FROM raster WHERE id='HKWJ'"))[0] . '" name="r_s2_HKWJ">'
                . '&nbsp;&nbsp;'
                . '<input type="text" size="4" maxlength="5" value="' . mysqli_fetch_array(mysqli_query($db, "SELECT satz3 FROM raster WHERE id='HKWJ'"))[0] . '" name="r_s3_HKWJ">'
        . '</td>
            <td class="nix">

            </td>
        </tr>
</table>';
    
    echo '<br><br><input type="text" name="passwort" class="aktualisieren">';
    echo '<input type="submit" value="Aktualisieren" class="aktualisieren">';
    echo "</form>";
    echo "</div>";
}

?>
</body>
</html>