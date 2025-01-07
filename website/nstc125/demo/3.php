<?php
// 動態關閉 output_buffering
ini_set('output_buffering', 'Off');
ini_set('zlib.output_compression', 'Off'); // 確保沒有壓縮
ini_set('implicit_flush', 'On');
ob_implicit_flush(true); // 自動刷新緩衝
ob_end_flush(); // 關閉任何現有緩衝區

// 設置 HTTP 標頭
header('Content-Type: text/plain'); // 設定為純文字輸出
header('Cache-Control: no-cache'); // 禁止快取

// 模擬 ping 的輸出
$host = "google.com";
echo "Pinging {$host} with 32 bytes of data:\n\n";

// 模擬逐行輸出
for ($i = 1; $i <= 5; $i++) {
    $time = rand(10, 100); // 模擬隨機延遲
    echo "Reply from {$host}: bytes=32 time={$time}ms TTL=64\n";
    flush(); // 立即輸出緩衝
    sleep(1); // 模擬延遲
}

// 輸出統計數據
echo "\nPing statistics for {$host}:\n";
echo "    Packets: Sent = 5, Received = 5, Lost = 0 (0% loss),\n";
echo "Approximate round trip times in milli-seconds:\n";
echo "    Minimum = 10ms, Maximum = 100ms, Average = 55ms\n";

flush(); // 確保最終緩衝區被輸出
