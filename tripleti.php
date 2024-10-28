<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    if (isset($_POST['numar'])) {
      
        $n = intval($_POST['numar']);
        
     
        if ($n < 3) {
            echo "Numărul trebuie să fie cel puțin 3.";
            exit;
        }

     
        $t = [];
        for ($i = 0; $i < $n; $i++) {
            $t[] = rand(1, 100);
        }

      
        echo "<h2>Elementele vectorului:</h2>";
        echo "<p>" . implode(", ", $t) . "</p>";


        function nu_ordonat($a, $b, $c) {
            return !($a < $b && $b < $c) && !($a > $b && $b > $c);
        }

      
        echo "<h2>Triplete care nu sunt ordonate:</h2>";
        $gasit_triplete = false;
        for ($i = 0; $i <= $n - 3; $i++) {
            if (nu_ordonat($t[$i], $t[$i + 1], $t[$i + 2])) {
                echo "<p>Triplet: " . $t[$i] . ", " . $t[$i + 1] . ", " . $t[$i + 2] . "</p>";
                $gasit_triplete = true;
            }
        }

     
        if (!$gasit_triplete) {
            echo "<p>Nu există triplete care nu sunt ordonate nici crescător, nici descrescător.</p>";
        }
    } else {
        echo "Numărul nu a fost trimis corect.";
    }
} else {
    echo "Acces neautorizat.";
}
?>
