<?php
require 'session.php'; // 假設這是您的程式碼檔案
require 'template.php'; // 假設這是您的程式碼檔案
$program="document01_run.php";
$programArr["office_document"]=1;
$programArr["title"]=1;
$programArr["content"]=1;
$programArr["a01"]=0;
$programArr["a02"]=0;
$programArr["a03"]=0;
$programArr["a04"]=0;
$programArr["a05"]=0;
$programArr["a06"]=0;
$programArr["a07"]=0;
$programArr["a08"]=0;
$programArr["a09"]=0;
$programArr["a10"]=0;
$programArr["a11"]=0;
$programArr["a12"]=0;
$programArr["a13"]=0;
$programArr["a14"]=0;
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
    $a06 = htmlspecialchars(trim($_POST['a06']));
    $a07 = htmlspecialchars(trim($_POST['a07']));
    $a08 = htmlspecialchars(trim($_POST['a08']));
    $a09 = htmlspecialchars(trim($_POST['a09']));
    $a10 = htmlspecialchars(trim($_POST['a10']));
    $a11 = htmlspecialchars(trim($_POST['a11']));
    $a12 = htmlspecialchars(trim($_POST['a12']));
    $a13 = htmlspecialchars(trim($_POST['a13']));
    $a14 = htmlspecialchars(trim($_POST['a14']));
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
    $a06="";
    $a07="";
    $a08="";
    $a09="";
    $a10="";
    $a11="";
    $a12="";
    $a13="";
    $a14="";
}else{
    $office_document = "(1) 函";
    $title="";
    $content="";
    $a01="";
    $a02="";
    $a03="";
    $a04="";
    $a05="";
    $a06="";
    $a07="";
    $a08="";
    $a09="";
    $a10="";
    $a11="";
    $a12="";
    $a13="";
    $a14="";
}
if (substr($office_document,0,3)=="(1)"){
	$question="國科會補助研究計畫自即日起調整參與計畫博士生費用增核措施之經費補助方式";
	$question_content = <<<EOD
<pre>一、補助對象：依本會補助專題研究計畫研究人力約用注意事項，適用於約用博士生兼任人員，且此類人員不得於其他公私立機關（構）從事專職全時之有給職。
二、補助方式：
　　（一）適用範圍：本會補助執行起日為113年8月1日（含）以後之計畫。
　　 　　１、已依申請書審查結果於經費核定清單內主動增核博士生兼任人員費用，每名每月新臺幣10,000元。
　　 　　２、領有本增核措施費用之博士生兼任人員，每月總金額不得低於新臺幣16,000元（包含原支給之新臺幣6,000元）。
</pre>
EOD;
}else{
	$question_content = <<<EOD
<pre>一、補助對象：依本會補助專題研究計畫研究人力約用注意事項，適用於約用博士生兼任人員，且此類人員不得於其他公私立機關（構）從事專職全時之有給職。
二、補助方式：
　　（一）適用範圍：本會補助執行起日為113年8月1日（含）以後之計畫。
　　 　　１、已依申請書審查結果於經費核定清單內主動增核博士生兼任人員費用，每名每月新臺幣10,000元。
　　 　　２、領有本增核措施費用之博士生兼任人員，每月總金額不得低於新臺幣16,000元（包含原支給之新臺幣6,000元）
</pre>
EOD;
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
		

			<!-- Switch 按鈕: 切換顯示或隱藏 title 和 content 欄位 -->
			<div class="mb-3 form-check form-switch">
				<input class="form-check-input" type="checkbox" id="toggleSwitch">
				<label class="form-check-label" for="toggleSwitch">
					顯示/隱藏 其他欄位
				</label>
			</div>

			<!-- a01 field hidden initially -->
			<div class="form-floating mb-3" id="a01Field">
				<input type="text" class="form-control" id="a01" name="a01" value="<?=$a01;?>">
				<label for="a01" class="form-label">發文單位</label>
			</div>

			<!-- a02 field hidden initially -->
			<div class="form-floating mb-3"id="a02Field">
				<input type="text" class="form-control" id="a02" name="a02" value="<?=$a02;?>">
				<label for="a02" class="form-label">受文者</label>
			</div>

			<!-- a03 field hidden initially -->
			<div class="form-floating mb-3"id="a03Field">
				<input type="text" class="form-control" id="a03" name="a03" value="<?=$a03;?>">
				<label for="a03" class="form-label">發文日期</label>
			</div>

			<!-- a04 field hidden initially -->
			<div class="form-floating mb-3"id="a04Field">
				<input type="text" class="form-control" id="a04" name="a04" value="<?=$a04;?>">
				<label for="a04" class="form-label">發文字號</label>
			</div>

			<!-- a05 field hidden initially -->
			<div class="form-floating mb-3"id="a05Field">
				<input type="text" class="form-control" id="a05" name="a05" value="<?=$a05;?>">
				<label for="a05" class="form-label">速別</label>
			</div>

			<!-- a06 field hidden initially -->
			<div class="form-floating mb-3"id="a06Field">
				<input type="text" class="form-control" id="a06" name="a06" value="<?=$a06;?>">
				<label for="a06" class="form-label">密等</label>
			</div>

			<!-- a07 field hidden initially -->
			<div class="form-floating mb-3"id="a07Field">
				<input type="text" class="form-control" id="a07" name="a07" value="<?=$a07;?>">
				<label for="a07" class="form-label">附件</label>
			</div>

			<!-- a08 field hidden initially -->
			<div class="form-floating mb-3"id="a08Field">
				<input type="text" class="form-control" id="a08" name="a08" value="<?=$a08;?>">
				<label for="a08" class="form-label">正本</label>
			</div>

			<!-- a09 field hidden initially -->
			<div class="form-floating mb-3"id="a09Field">
				<input type="text" class="form-control" id="a09" name="a09" value="<?=$a09;?>">
				<label for="a09" class="form-label">副本</label>
			</div>

			<!-- a10 field hidden initially -->
			<div class="form-floating mb-3"id="a10Field">
				<input type="text" class="form-control" id="a10" name="a10" value="<?=$a10;?>">
				<label for="a10" class="form-label">聯絡人</label>
			</div>

			<!-- a11 field hidden initially -->
			<div class="form-floating mb-3"id="a11Field">
				<input type="text" class="form-control" id="a11" name="a11" value="<?=$a11;?>">
				<label for="a11" class="form-label">地址</label>
			</div>

			<!-- a12 field hidden initially -->
			<div class="form-floating mb-3"id="a12Field">
				<input type="text" class="form-control" id="a12" name="a12" value="<?=$a12;?>">
				<label for="a12" class="form-label">電話</label>
			</div>

			<!-- a13 field hidden initially -->
			<div class="form-floating mb-3"id="a13Field">
				<input type="text" class="form-control" id="a13" name="a13" value="<?=$a13;?>">
				<label for="a13" class="form-label">傳真</label>
			</div>

			<!-- a14 field hidden initially -->
			<div class="form-floating mb-3"id="a14Field">
				<input type="text" class="form-control" id="a14" name="a14" value="<?=$a14;?>">
				<label for="a14" class="form-label">Email</label>
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
