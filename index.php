<?php
require_once('connect.php');
$sql = $sql = "SELECT * FROM diakok";
$stmt = $connect -> prepare($sql);
$stmt -> execute();
$osztalytagok = $stmt -> fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mikuláshúzás</title>
</head>
<body>
    <table>
    <tr>
        <th>Sorszám</th>
        <th>Húzott neve</th>
    </tr>
    
    <?php
        if($osztalytagok)
        {
            $huzottak = array();
            shuffle($osztalytagok);
            foreach ($osztalytagok as $key => $osztalytag) {
                $sorszam = $key + 1;
                $sorsolt_nev = $osztalytag['nev'];
                
                do {
                    $sorsolt_index = array_rand($osztalytagok);
                    $sorsolt_nev = $osztalytagok[$sorsolt_index]['nev'];
                } while ($sorsolt_nev === $osztalytag['nev'] || in_array($sorsolt_nev, $huzottak));
                
                $huzottak[] = $sorsolt_nev;
                echo "<tr><td>{$sorszam}</td><td>{$sorsolt_nev}</td></tr>";
            }
        }
    ?>
    </table>
</body>
</html>