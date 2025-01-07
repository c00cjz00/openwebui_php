<?php
require 'session.php'; // 假設這是您的程式碼檔案
require 'template.php'; // 假設這是您的程式碼檔案
$program="document02_run.php";
$programArr["office_document"]=1;
$programArr["title"]=1;
$programArr["content"]=1;
$programArr["a01"]=1;
$programArr["a02"]=0;
$programArr["a03"]=0;
$programArr["a04"]=0;
$programArr["a05"]=0;
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
    $a03 = htmlspecialchars(trim($_POST['a03']));
    $a04 = htmlspecialchars(trim($_POST['a04']));
    $a05 = htmlspecialchars(trim($_POST['a05']));
}elseif (($_SERVER["REQUEST_METHOD"] === "GET") && isset($_GET['office_document'])) {
    // Sanitize input data
    $office_document = htmlspecialchars(trim($_GET['office_document']));
    $title="";
    $content="";
    $a01="";
    $a02="";
    $a03="";
    $a04="";
    $a05="";
}else{
    $office_document = "(2) 簽";
    $title="";
    $content="";
    $a01="";
    $a02="";
    $a03="";
    $a04="";
    $a05="";
}
if (substr($office_document,0,3)=="(2)"){
	$question="有關邀請美國國家衛生院Dr.OOO代理主任訪臺一案，簽請鑒核。";
	$question_content = <<<EOD
<pre>一、Dr.OOO目前擔任美國國家衛生院OOO部門代理主任，本次Dr.OOO訪臺時程預定為112年10月2日至10日(共9日)，預定於10月4日(星期三)上午拜會本會陳政務副主委
二、餘行程規劃參訪中研院、臺大、陽明交大、成大等國內腦科學學術單位，並參與腦科技研討會等活動(行程規劃如附件4)。
三、訪台期間相關經費擬由本會補助之「OOO」計畫項下支應，並擔任接待單位。
</pre>
EOD;
	$question_todo="如奉核可後，依規定辦理相關手續 。";
}else{
	$question="有關邀請美國國家衛生院Dr.OOO代理主任訪臺一案，簽請鑒核。";
	$question_content = <<<EOD
<pre>一、Dr.OOO目前擔任美國國家衛生院OOO部門代理主任，本次Dr.OOO訪臺時程預定為112年10月2日至10日(共9日)，預定於10月4日(星期三)上午拜會本會陳政務副主委
二、餘行程規劃參訪中研院、臺大、陽明交大、成大等國內腦科學學術單位，並參與腦科技研討會等活動(行程規劃如附件4)。
三、訪台期間相關經費擬由本會補助之「OOO」計畫項下支應，並擔任接待單位。
</pre>
EOD;
	$question_todo="如奉核可後，依規定辦理相關手續 。";
}

?>
<main class="form-signin w-75 m-auto">
    <div class="container mt-5">
		<h5 class="mb-4"><b>公文: <?=$office_document;?></b></h5>
        <form id="myForm">
			<!-- office_document selection -->
			<div class="form-floating mb-3">
				<select class="form-select" id="office_document" name="office_document" required">
					<option value="<?=$office_document;?>"><?=$office_document;?></option>
				</select>
				<label for="office_document" class="form-label">公文類別</label>
			</div>
			<!-- title field hidden initially -->
			<div class="form-floating mb-3">
				<input type="text" class="form-control" id="title" name="title" style="height: auto; font-size: 12px;" value="<?=$title;?>" required>						
				<label for="title" class="form-label">主旨</label>
				<small class="form-text text-muted" style="font-size: 10px;">範例: <?=$question;?></small>

			</div>

			<!-- content field hidden initially -->
			<div class="form-floating mb-3">
				<textarea class="form-control" id="content" name="content" style="height: auto; font-size: 12px;" rows="6"><?=$content;?></textarea>
				<label for="content" class="form-label">說明 (可選填)</label>
				<small class="form-text text-muted" style="font-size: 10px;">範例: 內含三條具體的說明。每一條說明應該簡潔明瞭，並清楚解釋其關鍵概念或步驟，並避免引用範例內容。</small>
			</div>		
		
			<!-- a01 field hidden initially -->
			<div class="form-floating mb-3">
				<textarea class="form-control" id="a01" name="a01" style="height: auto;" rows="1"><?=$a01;?></textarea>
				<label for="a01" class="form-label">擬辦 (可選填)</label>
				<small class="form-text text-muted" style="font-size: 10px;">範例: <?=$question_todo;?></small>
			</div>		

			<!-- Switch 按鈕: 切換顯示或隱藏 title 和 content 欄位 -->
			<div class="mb-3 form-check form-switch">
				<input class="form-check-input" type="checkbox" id="toggleSwitch">
				<label class="form-check-label" for="toggleSwitch">
					顯示/隱藏 其他欄位
				</label>
			</div>

			<!-- a02 field hidden initially -->
			<div class="form-floating mb-3"id="a02Field">
				<input type="text" class="form-control" id="a02" name="a02" value="<?=$a02;?>">
				<label for="a02" class="form-label">簽 於</label>
			</div>

			<!-- a03 field hidden initially -->
			<div class="form-floating mb-3"id="a03Field">
				<input type="text" class="form-control" id="a03" name="a03" value="<?=$a03;?>">
				<label for="a03" class="form-label">日期</label>
			</div>

			<!-- a04 field hidden initially -->
			<div class="form-floating mb-3"id="a04Field">
				<input type="text" class="form-control" id="a04" name="a04" value="<?=$a04;?>">
				<label for="a04" class="form-label">敬陳</label>
			</div>

			<!-- a05 field hidden initially -->
			<div class="form-floating mb-3"id="a05Field">
				<input type="text" class="form-control" id="a05" name="a05" value="<?=$a05;?>">
				<label for="a05" class="form-label">會辦單位</label>
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
                    請等候10秒...
                </div>
            </div>
        </div>
    </div>
<?
mycontact();
myjs();
myjs03($program,$programArr,$sentences01);
myfooter();
