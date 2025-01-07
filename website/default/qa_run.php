<?php
require 'session.php'; // 假設這是您的程式碼檔案
include 'question.php'; // 假設這是您的程式碼檔案
ini_set('memory_limit', '2048M'); // 設定內存限制為 512MB
// 確保只有透過 POST 方法提交數據
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // 接收前端提交的數據
    $office_document = isset($_POST['office_document']) ? $_POST['office_document'] : '';
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $content = isset($_POST['content']) ? $_POST['content'] : '';
    $a01 = isset($_POST['a01']) ? $_POST['a01'] : '';
    $a02 = isset($_POST['a02']) ? $_POST['a02'] : '';
    // 處理數據（這裡可以進行一些操作，比如存入資料庫等）

    // Validate input
    if (!empty($office_document) && !empty($title)) {

	  // 比對舊問題	
	  $content_tmp="";
	  foreach ($stringArr as $key => $string){
		$similarity = similar_text($title, $string, $percent);
		if ($percent>$percent_limit) {
			$content_tmp=file_get_contents("content/{$key}.md");
			break;
		}
	  }		
	  if (($content_tmp!="") && (substr(strtolower($title),0,1)!="q")){
	    $output=$content_tmp;
		sleep(10);		
      } else {
		// 運行工作流程
		// Prepare data array for JSON encoding
		$data = [
			"inputs" => [
				"office_document" => $office_document,
				"title" => $title,
				"content" => $content,
				"language" => $a01,
				"translate_to" => $a02
			],
			"response_mode" => "blocking",
			"user" => $_SESSION['username']
		];

		// Convert data array to JSON
		$jsonData = json_encode($data, JSON_UNESCAPED_UNICODE);

		// Build the curl command
		$cmd = 'curl -X POST "'.$dify_ip.'/v1/workflows/run" \
		--header "Authorization: Bearer '.$qa_key.'" \
		--header "Content-Type: application/json" \
		--data-raw \'' . $jsonData . '\'';

		// Execute the command
		$fullResponse = shell_exec($cmd);

		// 預設 output 為 "error"
		$output = "error";

		// 確保 $fullResponse 不為空
		if ($fullResponse) {
			// 將完整響應轉換為 JSON
			$responseData = json_decode($fullResponse, true);

			// 驗證是否成功解碼 JSON
			if (json_last_error() === JSON_ERROR_NONE) {
				// 檢查 JSON 結構是否符合預期
				if (isset($responseData['data']['outputs']['output'])) {
					$output = trim($responseData['data']['outputs']['output']);
				} elseif (isset($responseData['error']['message'])) {
					// JSON 中包含錯誤訊息
					$output = "error"; // 可以選擇擴展錯誤訊息，如：$responseData['error']['message'];
				} else {
					// JSON 結構無法識別
					$output = "error";
				}
			} else {
				// JSON 解碼失敗
				$output = "error";
			}
		} else {
			// Shell 命令無響應
			$output = "error";
		}
		
		if ($output!="error") {
			//$cmd="echo \"$output\" | opencc -c s2twp";
			//$output=shell_exec($cmd);
$output = <<<EOD
$output
EOD;
			// 1. 將 OPENCC 內容寫入臨時文件
			$tempOPENCCFile_in = tempnam(sys_get_temp_dir(), 'opencc_in') . '.txt';
			file_put_contents($tempOPENCCFile_in, $output);

			// 2. 定義輸出  文件的路徑
			$tempOPENCCFile_out = tempnam(sys_get_temp_dir(), 'opencc_out') . '.txt';

			// 3. 使用 opencc 將 簡體中文 轉換為 繁體中文
			$command = escapeshellcmd("opencc -c s2twp -i  {$tempOPENCCFile_in} -o {$tempOPENCCFile_out}");
			exec($command, $output, $returnVar);
			
			// 4. 檢查是否成功執行
			if ($returnVar === 0) {
				// 讀取轉換後的 繁體中文
				$output = file_get_contents($tempOPENCCFile_out);
				// 清理臨時文件
				unlink($tempOPENCCFile_in);
				unlink($tempOPENCCFile_out);
			} else {
				$output="轉換失敗，請檢查 pandoc 是否已安裝並可用。\n";
			}
		
		}
      }
		// 回傳結果（這裡只是示範，實際情況可能需要根據業務需求進行處理）
		$response = [
			'status' => 'ok',
			'message' => '分析完成',			
			'myoutput' => $output		
		];
		//sleep(10);
		// 設置標頭為 JSON 格式並回傳數據
		header('Content-Type: application/json');
		echo json_encode($response);
	} else {
		// 回傳結果（這裡只是示範，實際情況可能需要根據業務需求進行處理）
		$response = [
			'status' => 'error',
			'message' => '輸入數據有問題',		
			'myoutput' => "錯誤"		
		];
		//sleep(10);
		// 設置標頭為 JSON 格式並回傳數據
		header('Content-Type: application/json');
		echo json_encode($response);
	}
} else {
    // 如果不是POST請求，回應錯誤
    echo json_encode([
        'status' => 'error',
        'message' => '請使用 POST 方法提交數據'
    ]);
}
?>
