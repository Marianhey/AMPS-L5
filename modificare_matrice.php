<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $n = intval($_POST['n']);
    $m = intval($_POST['m']);
    $r = intval($_POST['r']);
    $d = intval($_POST['d']);

    if ($r < 0 || $r >= $n || $d < 0 || $d >= $n) {
        echo "Valorile pentru r și d trebuie să fie între 0 și " . ($n-1) . ".";
        exit;
    }

    $matrice = [];
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $m; $j++) {
            $matrice[$i][$j] = rand(1, 100);
        }
    }

    function afiseazaMatrice($matrice, $n, $m) {
        echo "<table  cellpadding='5'>";
        for ($i = 0; $i < $n; $i++) {
            echo "<tr>";
            for ($j = 0; $j < $m; $j++) {
                echo "<td>" . $matrice[$i][$j] . "</td>";
            }
            echo "</tr>";
        }
        echo "</table><br>";
    }

    echo "<h2>Matricea inițială:</h2>";
    afiseazaMatrice($matrice, $n, $m);

    $temp = $matrice[$r];
    $matrice[$r] = $matrice[$d];
    $matrice[$d] = $temp;


    echo "<h2>Matricea modificată (rândul $r și rândul $d au fost schimbate):</h2>";
    afiseazaMatrice($matrice, $n, $m);
} else {
    echo "Acces neautorizat.";
}
?>
