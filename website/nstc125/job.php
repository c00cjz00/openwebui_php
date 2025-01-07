<?php
// 確保只有透過 POST 方法提交數據
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // 接收前端提交的數據
    $job = isset($_POST['job']) ? $_POST['job'] : '';
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $content = isset($_POST['content']) ? $_POST['content'] : '';

    // 處理數據（這裡可以進行一些操作，比如存入資料庫等）

    // 回傳結果（這裡只是示範，實際情況可能需要根據業務需求進行處理）
    $response = [
        'job' => $job,
        'title' => $title,
        'content' => $content,
        'status' => 'success',
        'message' => '數據處理成功\n\n\n\n\nsdfsdfsdfsdfsdsfdsdfksdkjsdflksdj n\n\n\n\ sdj n\n\n\n\ nsdfsdfsdfsdfsdsfdsdj n\n\n\n\ nsdfsdfsdfsdfsdsfdsdj n\n\n\n\ nsdfsdfsdfsdfsdsfdsdj n\n\n\n\ nsdfsdfsdfsdfsdsfdsdj n\n\n\n\ nsdfsdfsdfsdfsdsfdnsdfsdfsdfsdfsdsfdsdfksdkjsdflksdjn\n\n\n\nsdfsdfsdfsdfsdsfdsdfksdkjsdflksdjn\n\n\n\nsdfsdfsdfsdfsdsfdsdfksdkjsdflksdjn\n\n\n\nsdfsdfsdfsdfsdsfdsdfksdkjsdflksdjn\n\n\n\nsdfsdfsdfsdfsdsfdsdfksdkjsdflksdjn\n\n\n\nsdfsdfsdfsdfsdsfdsdfksdkjsdflksdjn\n\n\n\nsdfsdfsdfsdfsdsfdsdfksdkjsdflksdjn\n\n\n\nsdfsdfsdfsdfsdsfdsdfksdkjsdflksdjn\n\n\n\nsdfsdfsdfsdfsdsfdsdfksdkjsdflksdjn\n\n\n\nsdfsdfsdfsdfsdsfdsdfksdkjsdflksdjn\n\n\n\nsdfsdfsdfsdfsdsfdsdfksdkjsdflksdjn\n\n\n\nsdfsdfsdfsdfsdsfdsdfksdkjsdflksdjn\n\n\n\nsdfsdfsdfsdfsdsfdsdfksdkjsdflksdjn\n\n\n\nsdfsdfsdfsdfsdsfdsdfksdkjsdflksdjn\n\n\n\nsdfsdfsdfsdfsdsfdsdfksdkjsdflksdjn\n\n\n\nsdfsdfsdfsdfsdsfdsdfksdkjsdflksdjn\n\n\n\nsdfsdfsdfsdfsdsfdsdfksdkjsdflksdjn\n\n\n\nsdfsdfsdfsdfsdsfdsdfksdkjsdflksdj '
    ];
	sleep(10);
    // 設置標頭為 JSON 格式並回傳數據
    header('Content-Type: application/json');
    echo json_encode($response);
}
else {
    // 如果不是POST請求，回應錯誤
    echo json_encode([
        'status' => 'error',
        'message' => '請使用 POST 方法提交數據'
    ]);
}
?>
