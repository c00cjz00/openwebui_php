<?php
require 'session.php'; // 假設這是您的程式碼檔案
require 'template.php'; // 假設這是您的程式碼檔案
$program="qa_run.php";
$programArr["office_document"]=1;
$programArr["title"]=1;
$programArr["content"]=1;
$programArr["a01"]=0;
$programArr["a02"]=0;
myhead01();
myhead02();
mynavbar();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize input data
    $office_document = htmlspecialchars(trim($_POST['office_document']));
    $title = htmlspecialchars(trim($_POST['title']));
    $content = htmlspecialchars(trim($_POST['content']));
    $a01 = htmlspecialchars(trim($_POST['a01']));
    $a02 = htmlspecialchars(trim($_POST['a02']));
}elseif (($_SERVER["REQUEST_METHOD"] === "GET") && isset($_GET['office_document'])) {
    // Sanitize input data
    $office_document = htmlspecialchars(trim($_GET['office_document']));
    $title="";
    $content="";
    $a01="";
    $a02="";
}else{
    $office_document = "(1) 樣板一";
    $title="";
    $content="";
    $a01="";
    $a02="";
}
if (substr($office_document,0,3)=="(1)"){
	$question="各科學園區（含新增及擴建）用電規劃情形？";		
}elseif (substr($office_document,0,3)=="(2)"){
	$question="臺北有小巨蛋TTA，臺南有TTA南部據點，國科會是否規劃設定TTA中部據點？";
}else{
	$question="臺北有小巨蛋TTA，臺南有TTA南部據點，國科會是否規劃設定TTA中部據點？";
}
?>
<main class="form-signin w-75 m-auto">
    <div class="container mt-5">
		<h5 class="mb-4"><b>立法院模擬問答: <?=$office_document;?></b></h5>
        <form id="myForm">
			<!-- office_document selection -->
			<div class="form-floating mb-3">
				<select class="form-select" id="office_document" name="office_document" required">
					<option value="<?=$office_document;?>"><?=$office_document;?></option>
				</select>
				<label for="office_document" class="form-label">回覆立委方式</label>
			</div>
			<!-- title field hidden initially -->
			<div class="form-floating mb-3">
				<input type="text" class="form-control" id="title" name="title" style="height: auto; font-size: 12px;" value="<?=$title;?>" required>						
				<label for="title" class="form-label">立委問題</label>
				<small class="form-text text-muted" style="font-size: 10px;">範例: <?=$question;?></small>
			</div>

			<!-- content field hidden initially -->
			<div class="form-floating mb-3">
				<textarea class="form-control" id="content" name="content" style="height: auto; font-size: 12px;" rows="3"><?=$content;?></textarea>
				<label for="content" class="form-label">說明 (可選填)</label>
				<small class="form-text text-muted" style="font-size: 10px;">範例: 內含5條具體的說明。每一條說明應該簡潔明瞭，並清楚解釋其關鍵概念或步驟，並避免引用範例內容。</small>
			</div>		
		

			<!-- Switch 按鈕: 切換顯示或隱藏 title 和 content 欄位 -->
			<div class="mb-3 form-check form-switch">
				<input class="form-check-input" type="checkbox" id="toggleSwitch">
				<label class="form-check-label" for="toggleSwitch">
					顯示/隱藏 其他欄位
				</label>
			</div>

			<!-- a01 field hidden initially -->
			<div class="form-floating mb-3" id="a01Field">
				<select class="form-select" id="a01" name="a01" required">
					<option value="Chinese (zh-TW)">Chinese (zh-TW)</option>
					<!--option value="English">English</option-->
				</select>
				<label for="a01" class="form-label">思考語系</label>
			</div>

			<!-- a02 field hidden initially -->
			<div class="form-floating mb-3" id="a02Field">
				<select class="form-select" id="a02" name="a02" required">
					<option value="Chinese (zh-TW)">Chinese (zh-TW)</option>
					<!--option value="English">English</option-->
				</select>
				<label for="a02" class="form-label">輸出語系</label>
			</div>		
            <button type="submit" class="btn btn-primary">提交</button>
        </form>
    </div>
    <div class="container mt-5">
		<div class="form-floating mb-3">		
			<textarea id="codeTextarea" class="form-control" style="height: auto; font-size: 12px;" rows="20"></textarea>
			<label for="codeTextarea" class="form-label">回覆內容:</label>
		</div>
		
    </div>
		<div class="d-flex justify-content-center align-items-center mt-3">
			<button class="btn btn-success btn-sm" onclick="copyCode()">複製內容</button>
			<!-- 新增 "再次生成" 按鈕 -->
			&nbsp;&nbsp;&nbsp;&nbsp;
			<button class="btn btn-warning btn-sm" onclick="$('#myForm').submit()">再次生成</button>				
			&nbsp;&nbsp;&nbsp;&nbsp;
			<form action="md2html.php" method="post" id="submitForm">
				<input type="hidden" name="codeContent" id="hiddenCodeContent">
				<button type="button" class="btn btn-danger btn-sm" onclick="submitCode()">好看視窗</button>
			</form>
		</div>
	

</main><br><br>	
	
    <!-- 模態視窗 -->
    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">處理中</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    請等候60秒...
                </div>
            </div>
        </div>
    </div>
<?
mycontact();
myjs();
myjs03($program,$programArr,$sentences02);
myfooter();
