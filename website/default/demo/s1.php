<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

while (true) {
    echo "data: " . date('H:i:s') . "\n\n";
    ob_flush();
    flush();
    sleep(1);
}
?>

