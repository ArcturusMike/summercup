<!DOCTYPE html5>
<html>
<head>
    <title>Update</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
        body {
            font-size: 15pt;
        }
    </style>
    <meta charset="utf-8">
</head>
<body>
<?php
    require "connection.php";
   
    if ($_POST['password'] == "password") {
        $sp_s1_MPHK = $_POST['sp_s1_MPHK'];
        $sp_s1_MPWJ = $_POST['sp_s1_MPWJ'];
        $sp_s1_NWHK = $_POST['sp_s1_NWHK'];
        $sp_s1_HMWJ = $_POST['sp_s1_HMWJ'];
        $sp_s1_MPNW = $_POST['sp_s1_MPNW'];
        $sp_s1_HKHM = $_POST['sp_s1_HKHM'];
        $sp_s1_WJNW = $_POST['sp_s1_WJNW'];
        $sp_s1_HKWJ = $_POST['sp_s1_HKWJ'];
        $sp_s1_HMMP = $_POST['sp_s1_HMMP'];
        $sp_s1_HMNW = $_POST['sp_s1_HMNW'];

        $sp_s2_MPHK = $_POST['sp_s2_MPHK'];
        $sp_s2_MPWJ = $_POST['sp_s2_MPWJ'];
        $sp_s2_NWHK = $_POST['sp_s2_NWHK'];
        $sp_s2_HMWJ = $_POST['sp_s2_HMWJ'];
        $sp_s2_MPNW = $_POST['sp_s2_MPNW'];
        $sp_s2_HKHM = $_POST['sp_s2_HKHM'];
        $sp_s2_WJNW = $_POST['sp_s2_WJNW'];
        $sp_s2_HKWJ = $_POST['sp_s2_HKWJ'];
        $sp_s2_HMMP = $_POST['sp_s2_HMMP'];
        $sp_s2_HMNW = $_POST['sp_s2_HMNW'];
        
        $sp_s3_MPHK = $_POST['sp_s3_MPHK'];
        $sp_s3_MPWJ = $_POST['sp_s3_MPWJ'];
        $sp_s3_NWHK = $_POST['sp_s3_NWHK'];
        $sp_s3_HMWJ = $_POST['sp_s3_HMWJ'];
        $sp_s3_MPNW = $_POST['sp_s3_MPNW'];
        $sp_s3_HKHM = $_POST['sp_s3_HKHM'];
        $sp_s3_WJNW = $_POST['sp_s3_WJNW'];
        $sp_s3_HKWJ = $_POST['sp_s3_HKWJ'];
        $sp_s3_HMMP = $_POST['sp_s3_HMMP'];
        $sp_s3_HMNW = $_POST['sp_s3_HMNW'];

        $d_MPHK = $_POST['date_MPHK'];
        $d_MPWJ = $_POST['date_MPWJ'];
        $d_NWHK = $_POST['date_NWHK'];
        $d_HMWJ = $_POST['date_HMWJ'];
        $d_MPNW = $_POST['date_MPNW'];
        $d_HKHM = $_POST['date_HKHM'];
        $d_WJNW = $_POST['date_WJNW'];
        $d_HKWJ = $_POST['date_HKWJ'];
        $d_HMMP = $_POST['date_HMMP'];
        $d_HMNW = $_POST['date_HMNW'];
        
        $u_MPHK = $_POST['time_MPHK'];
        $u_MPWJ = $_POST['time_MPWJ'];
        $u_NWHK = $_POST['time_NWHK'];
        $u_HMWJ = $_POST['time_HMWJ'];
        $u_MPNW = $_POST['time_MPNW'];
        $u_HKHM = $_POST['time_HKHM'];
        $u_WJNW = $_POST['time_WJNW'];
        $u_HKWJ = $_POST['time_HKWJ'];
        $u_HMMP = $_POST['time_HMMP'];
        $u_HMNW = $_POST['time_HMNW'];

        $sp_update1_1 = "UPDATE matches SET set1='$sp_s1_MPHK' WHERE id='MPHK'";
        $sp_update2_1 = "UPDATE matches SET set1='$sp_s1_MPWJ' WHERE id='MPWJ'";
        $sp_update3_1 = "UPDATE matches SET set1='$sp_s1_NWHK' WHERE id='NWHK'";
        $sp_update4_1 = "UPDATE matches SET set1='$sp_s1_HMWJ' WHERE id='HMWJ'";
        $sp_update5_1 = "UPDATE matches SET set1='$sp_s1_MPNW' WHERE id='MPNW'";
        $sp_update6_1 = "UPDATE matches SET set1='$sp_s1_HKHM' WHERE id='HKHM'";
        $sp_update7_1 = "UPDATE matches SET set1='$sp_s1_WJNW' WHERE id='WJNW'";
        $sp_update8_1 = "UPDATE matches SET set1='$sp_s1_HKWJ' WHERE id='HKWJ'";
        $sp_update9_1 = "UPDATE matches SET set1='$sp_s1_HMMP' WHERE id='HMMP'";
        $sp_update10_1 = "UPDATE matches SET set1='$sp_s1_HMNW' WHERE id='HMNW'";

        $sp_update1_2 = "UPDATE matches SET set2='$sp_s2_MPHK' WHERE id='MPHK'";
        $sp_update2_2 = "UPDATE matches SET set2='$sp_s2_MPWJ' WHERE id='MPWJ'";
        $sp_update3_2 = "UPDATE matches SET set2='$sp_s2_NWHK' WHERE id='NWHK'";
        $sp_update4_2 = "UPDATE matches SET set2='$sp_s2_HMWJ' WHERE id='HMWJ'";
        $sp_update5_2 = "UPDATE matches SET set2='$sp_s2_MPNW' WHERE id='MPNW'";
        $sp_update6_2 = "UPDATE matches SET set2='$sp_s2_HKHM' WHERE id='HKHM'";
        $sp_update7_2 = "UPDATE matches SET set2='$sp_s2_WJNW' WHERE id='WJNW'";
        $sp_update8_2 = "UPDATE matches SET set2='$sp_s2_HKWJ' WHERE id='HKWJ'";
        $sp_update9_2 = "UPDATE matches SET set2='$sp_s2_HMMP' WHERE id='HMMP'";
        $sp_update10_2 = "UPDATE matches SET set2='$sp_s2_HMNW' WHERE id='HMNW'";

        $sp_update1_3 = "UPDATE matches SET set3='$sp_s3_MPHK' WHERE id='MPHK'";
        $sp_update2_3 = "UPDATE matches SET set3='$sp_s3_MPWJ' WHERE id='MPWJ'";
        $sp_update3_3 = "UPDATE matches SET set3='$sp_s3_NWHK' WHERE id='NWHK'";
        $sp_update4_3 = "UPDATE matches SET set3='$sp_s3_HMWJ' WHERE id='HMWJ'";
        $sp_update5_3 = "UPDATE matches SET set3='$sp_s3_MPNW' WHERE id='MPNW'";
        $sp_update6_3 = "UPDATE matches SET set3='$sp_s3_HKHM' WHERE id='HKHM'";
        $sp_update7_3 = "UPDATE matches SET set3='$sp_s3_WJNW' WHERE id='WJNW'";
        $sp_update8_3 = "UPDATE matches SET set3='$sp_s3_HKWJ' WHERE id='HKWJ'";
        $sp_update9_3 = "UPDATE matches SET set3='$sp_s3_HMMP' WHERE id='HMMP'";
        $sp_update10_3 = "UPDATE matches SET set3='$sp_s3_HMNW' WHERE id='HMNW'";

        $sp_update11 = "UPDATE matches SET date='$d_MPHK' WHERE id='MPHK'";
        $sp_update12 = "UPDATE matches SET date='$d_MPWJ' WHERE id='MPWJ'";
        $sp_update13 = "UPDATE matches SET date='$d_NWHK' WHERE id='NWHK'";
        $sp_update14 = "UPDATE matches SET date='$d_HMWJ' WHERE id='HMWJ'";
        $sp_update15 = "UPDATE matches SET date='$d_MPNW' WHERE id='MPNW'";
        $sp_update16 = "UPDATE matches SET date='$d_HKHM' WHERE id='HKHM'";
        $sp_update17 = "UPDATE matches SET date='$d_WJNW' WHERE id='WJNW'";
        $sp_update18 = "UPDATE matches SET date='$d_HKWJ' WHERE id='HKWJ'";
        $sp_update19 = "UPDATE matches SET date='$d_HMMP' WHERE id='HMMP'";
        $sp_update20 = "UPDATE matches SET date='$d_HMNW' WHERE id='HMNW'";

        $sp_update21 = "UPDATE matches SET time='$u_MPHK' WHERE id='MPHK'";
        $sp_update22 = "UPDATE matches SET time='$u_MPWJ' WHERE id='MPWJ'";
        $sp_update23 = "UPDATE matches SET time='$u_NWHK' WHERE id='NWHK'";
        $sp_update24 = "UPDATE matches SET time='$u_HMWJ' WHERE id='HMWJ'";
        $sp_update25 = "UPDATE matches SET time='$u_MPNW' WHERE id='MPNW'";
        $sp_update26 = "UPDATE matches SET time='$u_HKHM' WHERE id='HKHM'";
        $sp_update27 = "UPDATE matches SET time='$u_WJNW' WHERE id='WJNW'";
        $sp_update28 = "UPDATE matches SET time='$u_HKWJ' WHERE id='HKWJ'";
        $sp_update29 = "UPDATE matches SET time='$u_HMMP' WHERE id='HMMP'";
        $sp_update30 = "UPDATE matches SET time='$u_HMNW' WHERE id='HMNW'";

        $sp_query1_1 = mysqli_query($db, $sp_update1_1) or die(mysqli_error($db));
        $sp_query2_1 = mysqli_query($db, $sp_update2_1) or die(mysqli_error($db));
        $sp_query3_1 = mysqli_query($db, $sp_update3_1) or die(mysqli_error($db));
        $sp_query4_1 = mysqli_query($db, $sp_update4_1) or die(mysqli_error($db));
        $sp_query5_1 = mysqli_query($db, $sp_update5_1) or die(mysqli_error($db));
        $sp_query6_1 = mysqli_query($db, $sp_update6_1) or die(mysqli_error($db));
        $sp_query7_1 = mysqli_query($db, $sp_update7_1) or die(mysqli_error($db));
        $sp_query8_1 = mysqli_query($db, $sp_update8_1) or die(mysqli_error($db));
        $sp_query9_1 = mysqli_query($db, $sp_update9_1) or die(mysqli_error($db));
        $sp_query10_1 = mysqli_query($db, $sp_update10_1) or die(mysqli_error($db));

        $sp_query1_2 = mysqli_query($db, $sp_update1_2) or die(mysqli_error($db));
        $sp_query2_2 = mysqli_query($db, $sp_update2_2) or die(mysqli_error($db));
        $sp_query3_2 = mysqli_query($db, $sp_update3_2) or die(mysqli_error($db));
        $sp_query4_2 = mysqli_query($db, $sp_update4_2) or die(mysqli_error($db));
        $sp_query5_2 = mysqli_query($db, $sp_update5_2) or die(mysqli_error($db));
        $sp_query6_2 = mysqli_query($db, $sp_update6_2) or die(mysqli_error($db));
        $sp_query7_2 = mysqli_query($db, $sp_update7_2) or die(mysqli_error($db));
        $sp_query8_2 = mysqli_query($db, $sp_update8_2) or die(mysqli_error($db));
        $sp_query9_2 = mysqli_query($db, $sp_update9_2) or die(mysqli_error($db));
        $sp_query10_2 = mysqli_query($db, $sp_update10_2) or die(mysqli_error($db));

        $sp_query1_3 = mysqli_query($db, $sp_update1_3) or die(mysqli_error($db));
        $sp_query2_3 = mysqli_query($db, $sp_update2_3) or die(mysqli_error($db));
        $sp_query3_3 = mysqli_query($db, $sp_update3_3) or die(mysqli_error($db));
        $sp_query4_3 = mysqli_query($db, $sp_update4_3) or die(mysqli_error($db));
        $sp_query5_3 = mysqli_query($db, $sp_update5_3) or die(mysqli_error($db));
        $sp_query6_3 = mysqli_query($db, $sp_update6_3) or die(mysqli_error($db));
        $sp_query7_3 = mysqli_query($db, $sp_update7_3) or die(mysqli_error($db));
        $sp_query8_3 = mysqli_query($db, $sp_update8_3) or die(mysqli_error($db));
        $sp_query9_3 = mysqli_query($db, $sp_update9_3) or die(mysqli_error($db));
        $sp_query10_3 = mysqli_query($db, $sp_update10_3) or die(mysqli_error($db));

        $sp_query11 = mysqli_query($db, $sp_update11) or die(mysqli_error($db));
        $sp_query12 = mysqli_query($db, $sp_update12) or die(mysqli_error($db));
        $sp_query13 = mysqli_query($db, $sp_update13) or die(mysqli_error($db));
        $sp_query14 = mysqli_query($db, $sp_update14) or die(mysqli_error($db));
        $sp_query15 = mysqli_query($db, $sp_update15) or die(mysqli_error($db));
        $sp_query16 = mysqli_query($db, $sp_update16) or die(mysqli_error($db));
        $sp_query17 = mysqli_query($db, $sp_update17) or die(mysqli_error($db));
        $sp_query18 = mysqli_query($db, $sp_update18) or die(mysqli_error($db));
        $sp_query19 = mysqli_query($db, $sp_update19) or die(mysqli_error($db));
        $sp_query20 = mysqli_query($db, $sp_update20) or die(mysqli_error($db));
        $sp_query21 = mysqli_query($db, $sp_update21) or die(mysqli_error($db));
        $sp_query22 = mysqli_query($db, $sp_update22) or die(mysqli_error($db));
        $sp_query23 = mysqli_query($db, $sp_update23) or die(mysqli_error($db));
        $sp_query24 = mysqli_query($db, $sp_update24) or die(mysqli_error($db));
        $sp_query25 = mysqli_query($db, $sp_update25) or die(mysqli_error($db));
        $sp_query26 = mysqli_query($db, $sp_update26) or die(mysqli_error($db));
        $sp_query27 = mysqli_query($db, $sp_update27) or die(mysqli_error($db));
        $sp_query28 = mysqli_query($db, $sp_update28) or die(mysqli_error($db));
        $sp_query29 = mysqli_query($db, $sp_update29) or die(mysqli_error($db));
        $sp_query30 = mysqli_query($db, $sp_update30) or die(mysqli_error($db));


        $r_s1_HMMP = $_POST['r_s1_HMMP'];
        $r_s1_HMNW = $_POST['r_s1_HMNW'];
        $r_s1_HMWJ = $_POST['r_s1_HMWJ'];
        $r_s1_HMHK = $_POST['r_s1_HMHK'];

        $r_s1_MPHM = $_POST['r_s1_MPHM'];
        $r_s1_MPNW = $_POST['r_s1_MPNW'];
        $r_s1_MPWJ = $_POST['r_s1_MPWJ'];
        $r_s1_MPHK = $_POST['r_s1_MPHK'];

        $r_s1_NWHM = $_POST['r_s1_NWHM'];
        $r_s1_NWMP = $_POST['r_s1_NWMP'];
        $r_s1_NWWJ = $_POST['r_s1_NWWJ'];
        $r_s1_NWHK = $_POST['r_s1_NWHK'];

        $r_s1_WJHM = $_POST['r_s1_WJHM'];
        $r_s1_WJMP = $_POST['r_s1_WJMP'];
        $r_s1_WJNW = $_POST['r_s1_WJNW'];
        $r_s1_WJHK = $_POST['r_s1_WJHK'];

        $r_s1_HKHM = $_POST['r_s1_HKHM'];
        $r_s1_HKMP = $_POST['r_s1_HKMP'];
        $r_s1_HKNW = $_POST['r_s1_HKNW'];
        $r_s1_HKWJ = $_POST['r_s1_HKWJ'];

        $r_s2_HMMP = $_POST['r_s2_HMMP'];
        $r_s2_HMNW = $_POST['r_s2_HMNW'];
        $r_s2_HMWJ = $_POST['r_s2_HMWJ'];
        $r_s2_HMHK = $_POST['r_s2_HMHK'];

        $r_s2_MPHM = $_POST['r_s2_MPHM'];
        $r_s2_MPNW = $_POST['r_s2_MPNW'];
        $r_s2_MPWJ = $_POST['r_s2_MPWJ'];
        $r_s2_MPHK = $_POST['r_s2_MPHK'];

        $r_s2_NWHM = $_POST['r_s2_NWHM'];
        $r_s2_NWMP = $_POST['r_s2_NWMP'];
        $r_s2_NWWJ = $_POST['r_s2_NWWJ'];
        $r_s2_NWHK = $_POST['r_s2_NWHK'];

        $r_s2_WJHM = $_POST['r_s2_WJHM'];
        $r_s2_WJMP = $_POST['r_s2_WJMP'];
        $r_s2_WJNW = $_POST['r_s2_WJNW'];
        $r_s2_WJHK = $_POST['r_s2_WJHK'];

        $r_s2_HKHM = $_POST['r_s2_HKHM'];
        $r_s2_HKMP = $_POST['r_s2_HKMP'];
        $r_s2_HKNW = $_POST['r_s2_HKNW'];
        $r_s2_HKWJ = $_POST['r_s2_HKWJ'];

        $r_s3_HMMP = $_POST['r_s3_HMMP'];
        $r_s3_HMNW = $_POST['r_s3_HMNW'];
        $r_s3_HMWJ = $_POST['r_s3_HMWJ'];
        $r_s3_HMHK = $_POST['r_s3_HMHK'];

        $r_s3_MPHM = $_POST['r_s3_MPHM'];
        $r_s3_MPNW = $_POST['r_s3_MPNW'];
        $r_s3_MPWJ = $_POST['r_s3_MPWJ'];
        $r_s3_MPHK = $_POST['r_s3_MPHK'];

        $r_s3_NWHM = $_POST['r_s3_NWHM'];
        $r_s3_NWMP = $_POST['r_s3_NWMP'];
        $r_s3_NWWJ = $_POST['r_s3_NWWJ'];
        $r_s3_NWHK = $_POST['r_s3_NWHK'];

        $r_s3_WJHM = $_POST['r_s3_WJHM'];
        $r_s3_WJMP = $_POST['r_s3_WJMP'];
        $r_s3_WJNW = $_POST['r_s3_WJNW'];
        $r_s3_WJHK = $_POST['r_s3_WJHK'];


        $r_s3_HKHM = $_POST['r_s3_HKHM'];
        $r_s3_HKMP = $_POST['r_s3_HKMP'];
        $r_s3_HKNW = $_POST['r_s3_HKNW'];
        $r_s3_HKWJ = $_POST['r_s3_HKWJ'];

        $r_update1_1 = "UPDATE table SET set1='$r_s1_HMMP' WHERE id='HMMP'";
        $r_update2_1 = "UPDATE table SET set1='$r_s1_HMNW' WHERE id='HMNW'";
        $r_update3_1 = "UPDATE table SET set1='$r_s1_HMWJ' WHERE id='HMWJ'";
        $r_update4_1 = "UPDATE table SET set1='$r_s1_HMHK' WHERE id='HMHK'";

        $r_update5_1 = "UPDATE table SET set1='$r_s1_MPHM' WHERE id='MPHM'";
        $r_update6_1 = "UPDATE table SET set1='$r_s1_MPNW' WHERE id='MPNW'";
        $r_update7_1 = "UPDATE table SET set1='$r_s1_MPWJ' WHERE id='MPWJ'";
        $r_update8_1 = "UPDATE table SET set1='$r_s1_MPHK' WHERE id='MPHK'";

        $r_update9_1 = "UPDATE table SET set1='$r_s1_NWHM' WHERE id='NWHM'";
        $r_update10_1 = "UPDATE table SET set1='$r_s1_NWMP' WHERE id='NWMP'";
        $r_update11_1 = "UPDATE table SET set1='$r_s1_NWWJ' WHERE id='NWWJ'";
        $r_update12_1 = "UPDATE table SET set1='$r_s1_NWHK' WHERE id='NWHK'";

        $r_update13_1 = "UPDATE table SET set1='$r_s1_WJHM' WHERE id='WJHM'";
        $r_update14_1 = "UPDATE table SET set1='$r_s1_WJMP' WHERE id='WJMP'";
        $r_update15_1 = "UPDATE table SET set1='$r_s1_WJNW' WHERE id='WJNW'";
        $r_update16_1 = "UPDATE table SET set1='$r_s1_WJHK' WHERE id='WJHK'";

        $r_update17_1 = "UPDATE table SET set1='$r_s1_HKHM' WHERE id='HKHM'";
        $r_update18_1 = "UPDATE table SET set1='$r_s1_HKMP' WHERE id='HKMP'";
        $r_update19_1 = "UPDATE table SET set1='$r_s1_HKNW' WHERE id='HKNW'";
        $r_update20_1 = "UPDATE table SET set1='$r_s1_HKWJ' WHERE id='HKWJ'";

        $r_update1_2 = "UPDATE table SET set2='$r_s2_HMMP' WHERE id='HMMP'";
        $r_update2_2 = "UPDATE table SET set2='$r_s2_HMNW' WHERE id='HMNW'";
        $r_update3_2 = "UPDATE table SET set2='$r_s2_HMWJ' WHERE id='HMWJ'";
        $r_update4_2 = "UPDATE table SET set2='$r_s2_HMHK' WHERE id='HMHK'";

        $r_update5_2 = "UPDATE table SET set2='$r_s2_MPHM' WHERE id='MPHM'";
        $r_update6_2 = "UPDATE table SET set2='$r_s2_MPNW' WHERE id='MPNW'";
        $r_update7_2 = "UPDATE table SET set2='$r_s2_MPWJ' WHERE id='MPWJ'";
        $r_update8_2 = "UPDATE table SET set2='$r_s2_MPHK' WHERE id='MPHK'";

        $r_update9_2 = "UPDATE table SET set2='$r_s2_NWHM' WHERE id='NWHM'";
        $r_update10_2 = "UPDATE table SET set2='$r_s2_NWMP' WHERE id='NWMP'";
        $r_update11_2 = "UPDATE table SET set2='$r_s2_NWWJ' WHERE id='NWWJ'";
        $r_update12_2 = "UPDATE table SET set2='$r_s2_NWHK' WHERE id='NWHK'";

        $r_update13_2 = "UPDATE table SET set2='$r_s2_WJHM' WHERE id='WJHM'";
        $r_update14_2 = "UPDATE table SET set2='$r_s2_WJMP' WHERE id='WJMP'";
        $r_update15_2 = "UPDATE table SET set2='$r_s2_WJNW' WHERE id='WJNW'";
        $r_update16_2 = "UPDATE table SET set2='$r_s2_WJHK' WHERE id='WJHK'";

        $r_update17_2 = "UPDATE table SET set2='$r_s2_HKHM' WHERE id='HKHM'";
        $r_update18_2 = "UPDATE table SET set2='$r_s2_HKMP' WHERE id='HKMP'";
        $r_update19_2 = "UPDATE table SET set2='$r_s2_HKNW' WHERE id='HKNW'";
        $r_update20_2 = "UPDATE table SET set2='$r_s2_HKWJ' WHERE id='HKWJ'";

        $r_update1_3 = "UPDATE table SET set3='$r_s3_HMMP' WHERE id='HMMP'";
        $r_update2_3 = "UPDATE table SET set3='$r_s3_HMNW' WHERE id='HMNW'";
        $r_update3_3 = "UPDATE table SET set3='$r_s3_HMWJ' WHERE id='HMWJ'";
        $r_update4_3 = "UPDATE table SET set3='$r_s3_HMHK' WHERE id='HMHK'";

        $r_update5_3 = "UPDATE table SET set3='$r_s3_MPHM' WHERE id='MPHM'";
        $r_update6_3 = "UPDATE table SET set3='$r_s3_MPNW' WHERE id='MPNW'";
        $r_update7_3 = "UPDATE table SET set3='$r_s3_MPWJ' WHERE id='MPWJ'";
        $r_update8_3 = "UPDATE table SET set3='$r_s3_MPHK' WHERE id='MPHK'";

        $r_update9_3 = "UPDATE table SET set3='$r_s3_NWHM' WHERE id='NWHM'";
        $r_update10_3 = "UPDATE table SET set3='$r_s3_NWMP' WHERE id='NWMP'";
        $r_update11_3 = "UPDATE table SET set3='$r_s3_NWWJ' WHERE id='NWWJ'";
        $r_update12_3 = "UPDATE table SET set3='$r_s3_NWHK' WHERE id='NWHK'";

        $r_update13_3 = "UPDATE table SET set3='$r_s3_WJHM' WHERE id='WJHM'";
        $r_update14_3 = "UPDATE table SET set3='$r_s3_WJMP' WHERE id='WJMP'";
        $r_update15_3 = "UPDATE table SET set3='$r_s3_WJNW' WHERE id='WJNW'";
        $r_update16_3 = "UPDATE table SET set3='$r_s3_WJHK' WHERE id='WJHK'";

        $r_update17_3 = "UPDATE table SET set3='$r_s3_HKHM' WHERE id='HKHM'";
        $r_update18_3 = "UPDATE table SET set3='$r_s3_HKMP' WHERE id='HKMP'";
        $r_update19_3 = "UPDATE table SET set3='$r_s3_HKNW' WHERE id='HKNW'";
        $r_update20_3 = "UPDATE table SET set3='$r_s3_HKWJ' WHERE id='HKWJ'";

        
        $r_query1_1 = mysqli_query($db, $r_update1_1) or die(mysqli_error($db));
        $r_query2_1 = mysqli_query($db, $r_update2_1) or die(mysqli_error($db));
        $r_query3_1 = mysqli_query($db, $r_update3_1) or die(mysqli_error($db));
        $r_query4_1 = mysqli_query($db, $r_update4_1) or die(mysqli_error($db));
        $r_query5_1 = mysqli_query($db, $r_update5_1) or die(mysqli_error($db));

        $r_query6_1 = mysqli_query($db, $r_update6_1) or die(mysqli_error($db));
        $r_query7_1 = mysqli_query($db, $r_update7_1) or die(mysqli_error($db));
        $r_query8_1 = mysqli_query($db, $r_update8_1) or die(mysqli_error($db));
        $r_query9_1 = mysqli_query($db, $r_update9_1) or die(mysqli_error($db));
        $r_query10_1 = mysqli_query($db, $r_update10_1) or die(mysqli_error($db));

        $r_query11_1 = mysqli_query($db, $r_update11_1) or die(mysqli_error($db));
        $r_query12_1 = mysqli_query($db, $r_update12_1) or die(mysqli_error($db));
        $r_query13_1 = mysqli_query($db, $r_update13_1) or die(mysqli_error($db));
        $r_query14_1 = mysqli_query($db, $r_update14_1) or die(mysqli_error($db));
        $r_query15_1 = mysqli_query($db, $r_update15_1) or die(mysqli_error($db));

        $r_query16_1 = mysqli_query($db, $r_update16_1) or die(mysqli_error($db));
        $r_query17_1 = mysqli_query($db, $r_update17_1) or die(mysqli_error($db));
        $r_query18_1 = mysqli_query($db, $r_update18_1) or die(mysqli_error($db));
        $r_query19_1 = mysqli_query($db, $r_update19_1) or die(mysqli_error($db));
        $r_query20_1 = mysqli_query($db, $r_update20_1) or die(mysqli_error($db));

        $r_query1_2 = mysqli_query($db, $r_update1_2) or die(mysqli_error($db));
        $r_query2_2 = mysqli_query($db, $r_update2_2) or die(mysqli_error($db));
        $r_query3_2 = mysqli_query($db, $r_update3_2) or die(mysqli_error($db));
        $r_query4_2 = mysqli_query($db, $r_update4_2) or die(mysqli_error($db));
        $r_query5_2 = mysqli_query($db, $r_update5_2) or die(mysqli_error($db));

        $r_query6_2 = mysqli_query($db, $r_update6_2) or die(mysqli_error($db));
        $r_query7_2 = mysqli_query($db, $r_update7_2) or die(mysqli_error($db));
        $r_query8_2 = mysqli_query($db, $r_update8_2) or die(mysqli_error($db));
        $r_query9_2 = mysqli_query($db, $r_update9_2) or die(mysqli_error($db));
        $r_query10_2 = mysqli_query($db, $r_update10_2) or die(mysqli_error($db));

        $r_query11_2 = mysqli_query($db, $r_update11_2) or die(mysqli_error($db));
        $r_query12_2 = mysqli_query($db, $r_update12_2) or die(mysqli_error($db));
        $r_query13_2 = mysqli_query($db, $r_update13_2) or die(mysqli_error($db));
        $r_query14_2 = mysqli_query($db, $r_update14_2) or die(mysqli_error($db));
        $r_query15_2 = mysqli_query($db, $r_update15_2) or die(mysqli_error($db));

        $r_query16_2 = mysqli_query($db, $r_update16_2) or die(mysqli_error($db));
        $r_query17_2 = mysqli_query($db, $r_update17_2) or die(mysqli_error($db));
        $r_query18_2 = mysqli_query($db, $r_update18_2) or die(mysqli_error($db));
        $r_query19_2 = mysqli_query($db, $r_update19_2) or die(mysqli_error($db));
        $r_query20_2 = mysqli_query($db, $r_update20_2) or die(mysqli_error($db));

        $r_query1_3 = mysqli_query($db, $r_update1_3) or die(mysqli_error($db));
        $r_query2_3 = mysqli_query($db, $r_update2_3) or die(mysqli_error($db));
        $r_query3_3 = mysqli_query($db, $r_update3_3) or die(mysqli_error($db));
        $r_query4_3 = mysqli_query($db, $r_update4_3) or die(mysqli_error($db));
        $r_query5_3 = mysqli_query($db, $r_update5_3) or die(mysqli_error($db));

        $r_query6_3 = mysqli_query($db, $r_update6_3) or die(mysqli_error($db));
        $r_query7_3 = mysqli_query($db, $r_update7_3) or die(mysqli_error($db));
        $r_query8_3 = mysqli_query($db, $r_update8_3) or die(mysqli_error($db));
        $r_query9_3 = mysqli_query($db, $r_update9_3) or die(mysqli_error($db));
        $r_query10_3 = mysqli_query($db, $r_update10_3) or die(mysqli_error($db));

        $r_query11_3 = mysqli_query($db, $r_update11_3) or die(mysqli_error($db));
        $r_query12_3 = mysqli_query($db, $r_update12_3) or die(mysqli_error($db));
        $r_query13_3 = mysqli_query($db, $r_update13_3) or die(mysqli_error($db));
        $r_query14_3 = mysqli_query($db, $r_update14_3) or die(mysqli_error($db));
        $r_query15_3 = mysqli_query($db, $r_update15_3) or die(mysqli_error($db));

        $r_query16_3 = mysqli_query($db, $r_update16_3) or die(mysqli_error($db));
        $r_query17_3 = mysqli_query($db, $r_update17_3) or die(mysqli_error($db));
        $r_query18_3 = mysqli_query($db, $r_update18_3) or die(mysqli_error($db));
        $r_query19_3 = mysqli_query($db, $r_update19_3) or die(mysqli_error($db));
        $r_query20_3 = mysqli_query($db, $r_update20_3) or die(mysqli_error($db));
        
        # Stand
        $stand = fopen("stand.txt", "w");
        $zeit = date("d.m.Y, H:i");
        fwrite($stand, $zeit);
        fclose($stand);

        echo "Updated";
        echo "<br><br>";
        echo "<p><a href='input.php'>Back to input</a></p>";
        echo "<p><a href='index.php'>Back to output</a></p>";
    }
    else {
        echo "Wrong password!";
    }
    
?>
</body>
</html>