<?php
require 'session.php'; // 假設這是您的程式碼檔案
require 'template.php'; // 假設這是您的程式碼檔案
$program="law_run.php";
$programArr["office_document"]=1;
$programArr["title"]=1;
$programArr["a01"]=0;
$programArr["a02"]=0;
myhead01();
myhead02();
mynavbar();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize input data
    $office_document = htmlspecialchars(trim($_POST['office_document']));
    $title = htmlspecialchars(trim($_POST['title']));
    $a01 = htmlspecialchars(trim($_POST['a01']));
    $a02 = htmlspecialchars(trim($_POST['a02']));
}elseif (($_SERVER["REQUEST_METHOD"] === "GET") && isset($_GET['office_document'])) {
    // Sanitize input data
    $office_document = htmlspecialchars(trim($_GET['office_document']));
    $title="";
    $a01="";
    $a02="";
}else{
    $office_document = "(1) 前案檢索系統";
    $title="";
    $a01="";
    $a02="";
}
if (substr($office_document,0,3)=="(1)"){
	$question="範例一: 餐廳內，小偷趁服務員不注意，偷走我的包包。 <br>範例二: 做高鐵，隔壁一直對我身體進行碰觸<br>範例三: 在搭乘高鐵過程中，鄰座乘客持續對我進行身體接觸，是否構成侵權行為？	";		
}elseif (substr($office_document,0,3)=="(2)"){
	$question="範例一: 餐廳內，小偷趁服務員不注意，偷走我的包包。 <br>範例二: 做高鐵，隔壁一直對我身體進行碰觸<br>範例三: 在搭乘高鐵過程中，鄰座乘客持續對我進行身體接觸，是否構成侵權行為？	";		
}else{
	$question="範例一: 餐廳內，小偷趁服務員不注意，偷走我的包包。 <br>範例二: 做高鐵，隔壁一直對我身體進行碰觸<br>範例三: 在搭乘高鐵過程中，鄰座乘客持續對我進行身體接觸，是否構成侵權行為？	";


}
?>
<main class="form-signin w-75 m-auto">
    <div class="container mt-5">
		<h5 class="mb-4"><b>法律情境檢索: <?=$office_document;?></b></h5>
        <form id="myForm">
			<!-- office_document selection -->
			<div class="form-floating mb-3">
				<select class="form-select" id="office_document" name="office_document" required">
					<option value="<?=$office_document;?>"><?=$office_document;?></option>
				</select>
				<label for="office_document" class="form-label">檢索標的</label>
			</div>
			<!-- title field hidden initially -->
			<div class="form-floating mb-3">
				<input type="text" class="form-control" id="title" name="title" style="height: auto; font-size: 12px;" value="<?=$title;?>" required>						
				<label for="title" class="form-label">主旨</label>
				<small class="form-text text-muted" style="font-size: 10px;"><?=$question;?></small>
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
					<option value="NO">不需要</option>
					<option value="YES">進行問題重新詮釋</option>
				</select>
				<label for="a01" class="form-label">是否需要將您的問題, 進行問題重新詮釋</label>
			</div>

			<!-- a02 field hidden initially -->
			<div class="form-floating mb-3" id="a02Field">
				<select class="form-select" id="a02" name="a02" required">
					<option value="NO">不需要</option>
					<option value="English">請翻譯成英文</option>
				</select>
				<label for="a02" class="form-label">英譯</label>
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
myjs03($program,$programArr,$sentences03);
myfooter();
