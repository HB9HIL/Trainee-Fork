<?php

// Lese den Regex-Ausdruck aus der Datei "callsigns.regex"
$regex = file_get_contents('callsigns.regex');

// Gib den vollständigen Pfad zur "text.txt"-Datei an
$text = file_get_contents('text.txt');

// Teile den Text in Wörter auf
$words = str_word_count($text, 1);

// Suche nach dem Rufzeichen in jedem Wort mit dem Regex-Ausdruck
foreach ($words as $word) {
    if (preg_match("/$regex/", $word, $matches)) {
        // Extrahiere das Rufzeichen und speichere es in der Variable
        $callsign = $matches[0];

        // Gib das gefundene Rufzeichen aus
        echo "Gefundenes Rufzeichen: $callsign";
        // Breche die Schleife ab, wenn ein Rufzeichen gefunden wurde
        break;
    }
}

// Wenn kein Rufzeichen gefunden wurde
if (empty($callsign)) {
    echo "Kein Rufzeichen gefunden.";
}

?>
