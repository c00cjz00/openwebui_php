<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real-Time Command Output</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        pre { background: #f4f4f4; padding: 10px; border: 1px solid #ccc; }
    </style>
</head>
<body>
    <h1>Real-Time Command Output</h1>
    <pre id="output">Waiting for output...</pre>

    <script>
        const outputElement = document.getElementById('output');

        // Connect to the PHP backend using Server-Sent Events (SSE)
        const eventSource = new EventSource('stream.php');

        eventSource.onmessage = function(event) {
            // Append new output to the <pre> element
            if (outputElement.textContent === "Waiting for output...") {
                outputElement.textContent = ''; // Clear initial text
            }
            outputElement.textContent += event.data + '\n';
        };

        eventSource.onerror = function() {
            outputElement.textContent += "\nError: Unable to load output.";
            eventSource.close();
        };
    </script>
</body>
</html>
