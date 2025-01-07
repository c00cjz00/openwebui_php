<?php
require 'session.php'; // 假設這是您的程式碼檔案
require 'template.php'; // 假設這是您的程式碼檔案
myhead01();
myhead02();
mynavbar();
?>
<main class="form-signin w-75 m-auto">
  <div class="container mt-5">
	<h5 class="mb-4"><b>好看視窗</b> <small>(MD2HTML)</small></h5>	
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 接收 POST 的資料
    $codeContent = $_POST['codeContent'] ?? '沒有接收到資料';
    // 顯示接收到的內容
    //echo '<pre>' . htmlspecialchars($codeContent, ENT_QUOTES, 'UTF-8') . '</pre>';


	// 原始 Markdown 內容
	$output=htmlspecialchars($codeContent, ENT_QUOTES, 'UTF-8');
$markdownContent = <<<EOD
$output
EOD;
	// 1. 將 Markdown 內容寫入臨時文件
	$tempMarkdownFile = tempnam(sys_get_temp_dir(), 'md_') . '.md';
	file_put_contents($tempMarkdownFile, $markdownContent);

	// 2. 定義輸出 HTML 文件的路徑
	$tempHtmlFile = tempnam(sys_get_temp_dir(), 'html_') . '.html';

	// 3. 使用 pandoc 將 Markdown 轉換為 HTML
	$command = escapeshellcmd("pandoc {$tempMarkdownFile} -o {$tempHtmlFile}");
	exec($command, $output, $returnVar);

	// 4. 檢查是否成功執行
	if ($returnVar === 0) {
		// 讀取轉換後的 HTML
		$htmlContent = file_get_contents($tempHtmlFile);
		// 清理臨時文件
		unlink($tempMarkdownFile);
		unlink($tempHtmlFile);
	} else {
		$htmlContent="轉換失敗，請檢查 pandoc 是否已安裝並可用。\n";
	}
	echo $htmlContent;
} else {
    echo '<p>請透過 POST 提交資料。</p>';
}
?>		
  </div>

</main>
<?
mycontact();
myjs();
myfooter();
