<?php
// 啟用輸出緩衝控制
ob_implicit_flush(true);
ob_end_flush();

// 設置 HTTP 標頭，強制瀏覽器即時顯示內容
header('Content-Type: text/plain'); // 設定純文字格式
header('Cache-Control: no-cache'); // 禁止快取

// 模擬 ping 的輸出
$host = "google.com";
echo "Pinging {$host} with 32 bytes of data:\n\n";

// 模擬輸出
for ($i = 1; $i <= 5; $i++) {
    $time = rand(10, 100); // 模擬隨機延遲
    echo "Reply from {$host}: bytes=32 time={$time}ms TTL=64\n";
    flush(); // 強制將資料送到客戶端
    sleep(1); // 模擬延遲
}

echo "\nPing statistics for {$host}:\n";
echo "    Packets: Sent = 5, Received = 5, Lost = 0 (0% loss),\n";
echo "Approximate round trip times in milli-seconds:\n";
echo "    Minimum = 10ms, Maximum = 100ms, Average = 55ms\n";

flush();

