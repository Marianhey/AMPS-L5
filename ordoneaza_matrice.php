<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $n = intval($_POST['dimensiune']);
    
    if ($n <= 1) {
        echo "Dimensiunea matricei trebuie să fie un întreg mai mare decât 1.";
        exit;
    }


    $matrice = [];
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $n; $j++) {
            $matrice[$i][$j] = rand(1, 100);
        }
    }


    echo "<h2>Matricea inițială:</h2>";
    afiseaza_matrice($matrice, $n);


    $elemente = [];
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $n; $j++) {
            $elemente[] = $matrice[$i][$j];
        }
    }
    sort($elemente);


    $matrice_spirala = creeaza_spirala($elemente, $n);


    echo "<h2>Matricea ordonată în spirală:</h2>";
    afiseaza_matrice($matrice_spirala, $n);
}

function afiseaza_matrice($matrice, $n) {
    echo "<table  cellpadding='5' cellspacing='0'>";
    for ($i = 0; $i < $n; $i++) {
        echo "<tr>";
        for ($j = 0; $j < $n; $j++) {
            echo "<td>" . $matrice[$i][$j] . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

function creeaza_spirala($elemente, $n) {
    $matrice = array_fill(0, $n, array_fill(0, $n, 0));
    
    $top = 0;
    $bottom = $n - 1;
    $left = 0;
    $right = $n - 1;
    $index = 0;

    while ($top <= $bottom && $left <= $right) {

        for ($i = $left; $i <= $right; $i++) {
            $matrice[$top][$i] = $elemente[$index++];
        }
        $top++;

        for ($i = $top; $i <= $bottom; $i++) {
            $matrice[$i][$right] = $elemente[$index++];
        }
        $right--;

        if ($top <= $bottom) {
            for ($i = $right; $i >= $left; $i--) {
                $matrice[$bottom][$i] = $elemente[$index++];
            }
            $bottom--;
        }

        if ($left <= $right) {
            for ($i = $bottom; $i >= $top; $i--) {
                $matrice[$i][$left] = $elemente[$index++];
            }
            $left++;
        }
    }

    return $matrice;
}
?>
