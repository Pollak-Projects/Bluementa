<!DOCTYPE html>
<link rel="stylesheet" href="feltoltes.css">
<?php
// TODO global_connect.php-t hasznalni e helyett
// ====================================
// adatbázis kapcsolódás
$servername = "localhost";
$fel = "tanulo";
$jel = "tanulo";
$dbname = "bluementa";


$conn = mysqli_connect($servername, $fel, $jel, $dbname);
// ====================================

// adatok mentése az adatbázisba
if (isset($_POST['quiz_neve']) && isset($_POST['quiz_leiras']) && isset($_POST['kerdesek'])) {
    $quiz_neve = $_POST['quiz_neve'];
    $quiz_leiras = $_POST['quiz_leiras'];
    $kerdesek = $_POST['kerdesek'];

    // Quiz feltöltése az adatbázisba
    $sql = "INSERT INTO quiz (quiz_nev, quiz_leiras)
         VALUES ('$quiz_neve', '$quiz_leiras')";
    if (mysqli_query($conn, $sql)) {
        // Quiz sorszámának lekérdezése
        $quiz_id = mysqli_insert_id($conn);

        // Kiválasztott kérdések feltöltése az adatbázisba
        foreach ($kerdesek as $kerdes_id) {
            $sql = "INSERT INTO quiz_kerdes (quiz_id, kerdes_id) VALUES ('$quiz_id', '$kerdes_id')";
            mysqli_query($conn, $sql);
        }

        echo "Az adatok sikeresen feltöltve az adatbázisba!";
    } else {
        echo "Hiba történt az adatok feltöltése közben: " . mysqli_error($conn);
    }
}
echo "Sikeres feltöltés. ";
echo "Viszonlát!";

// adatbázis kapcsolat bezárása
mysqli_close($conn);
?>
<br></br>
<button onclick="myFunction()" class="button-64" role="button"><span class="text">Vissza a feltöltéshez</span></button>


<script>
    function myFunction() {
        window.location.href = "frontend.php";
    }
</script>

</html>