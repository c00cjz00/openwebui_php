<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

while (true) {
    echo "data: 現在時間是：" . date('H:i:s') . "\n\n";
    flush(); // 立即將輸出發送到瀏覽器
    sleep(1); // 每秒發送一次
}
?>
