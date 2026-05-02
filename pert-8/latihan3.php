<?php
function repeat($text, $num = 10)
{
    echo "<ol>\n";
    for ($i = 0; $i < $num; $i++) {
        echo "<li>$text</li>\n";
    }
    echo "</ol>";
}

// Pemanggilan function dengan dua argumen
repeat("I'm the best", 15);

// Pemanggilan function dengan satu argumen (menggunakan nilai default)
repeat("You're the man");
?>
