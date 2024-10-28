<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    if (isset($_POST['numar'])) {
    
        $n = intval($_POST['numar']);
        

        if ($n <= 0) {
            echo "Numărul trebuie să fie un întreg pozitiv.";
            exit;
        }
        $t = [];
        for ($i = 0; $i < $n; $i++) {
            $t[] = rand(1, 100);
        }

        $elemente_unice = array_unique($t);
        $este_multime = count($t) === count($elemente_unice);
        echo "<h2>Elementele vectorului:</h2>";
        echo "<p>" . implode(", ", $t) . "</p>";
        if ($este_multime) {
            echo "<p>Vector reprezintă o mulțime (nu are elemente duplicate).</p>";
        } else {
            echo "<p>Vector nu reprezintă o mulțime (conține elemente duplicate).</p>";
        }
    } else {
        echo "Numărul nu a fost trimis corect.";
    }
} else {
    echo "Acces neautorizat.";
}
?>