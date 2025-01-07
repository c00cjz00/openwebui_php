<?php
header('Content-Type: text/event-stream'); // SSE header
header('Cache-Control: no-cache');
header('Connection: keep-alive');

// Turn off output buffering
while (ob_get_level()) {
    ob_end_clean();
}

$command = 'ping -c 5 google.com'; // Command to execute

$handle = popen($command, 'r'); // Open the process
if ($handle) {
    while (!feof($handle)) {
        $buffer = fgets($handle); // Read one line at a time
        if ($buffer !== false) {
            echo "data: " . trim($buffer) . "\n\n"; // Format for SSE
            flush(); // Send to client immediately
        }
    }
    pclose($handle);
} else {
    echo "data: Error: Failed to execute the command.\n\n";
    flush();
}

echo "data: Done.\n\n"; // Send completion message
flush();
?>
