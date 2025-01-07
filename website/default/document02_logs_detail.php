<?php
require 'session.php'; // 假設這是您的程式碼檔案
require 'template.php'; // 假設這是您的程式碼檔案
$program="document02_run.php";
$programArr["office_document"]=1;
myhead01();
myhead02();
mynavbar();
$account=$_SESSION['username'];
$fullResponse="error";
if (($_SERVER["REQUEST_METHOD"] === "GET") && isset($_GET['id'])) {
    //Sanitize input data
    $id = htmlspecialchars(trim($_GET['id']));
	
	$cmd = 'curl -X GET "'.$dify_ip.'/v1/workflows/run/'.$id.'" --header "Authorization: Bearer '.$document02_key.'" -H "Content-Type: application/json"';
	#echo $cmd."\n";
	// Execute the command
	$fullResponse = trim(shell_exec($cmd));
	// 確保 $fullResponse 不為空
	if (($fullResponse) && ($fullResponse!='{"message": "Internal Server Error", "code": "unknown"}')){
		// 將完整響應轉換為 JSON
		$responseData = json_decode($fullResponse, true);
		#echo "<pre>";
		$inputs=$responseData["inputs"]; $data = json_decode($inputs, true); $input=$data["title"];
		$outputs=$responseData["outputs"]; $data = json_decode($outputs, true); $output=$data["output"];
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

	}else{
		$fullResponse="error";
	}
}
if ($fullResponse!="error"){
?>
<main class="form-signin w-75 m-auto">
	
    <div class="container mt-5">
		<div class="form-floating mb-4">		
			主題: <?=$input;?>
		</div>
		<div class="form-floating mb-3">		
			<textarea id="codeTextarea" class="form-control" style="height: auto; font-size: 12px;" rows="20"><?=$output;?></textarea>
			<label for="codeTextarea" class="form-label">回覆內容:</label>
		</div>
		<div class="d-flex justify-content-center align-items-center mt-3">
			<button class="btn btn-success btn-sm" onclick="copyCode()">複製內容</button>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<form action="md2html.php" method="post" id="submitForm">
				<input type="hidden" name="codeContent" id="hiddenCodeContent">
				<button type="button" class="btn btn-warning btn-sm" onclick="submitCode()">好看視窗</button>
			</form>
		</div>
	</div>	
</main>

<?php
}else{
?>
<main class="form-signin w-75 m-auto">
    <div class="container mt-5">
			<br><br><p class="fs-1 text-center fw-bolder">You are not Welcome.</p>

	</div>
</main>
<?php
}
mycontact();
myjs();
myjs03($program,$programArr,$sentences01);
myfooter();