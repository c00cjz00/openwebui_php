<?php
require 'session.php'; // 假設這是您的程式碼檔案
require 'template.php'; // 假設這是您的程式碼檔案
$program="news_writting_run.php";
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
    $office_document = "(4) 人才培育與活動: 青年科學家競賽、研討會、教育計劃相關";
    $title="";
    $content="";
    $a01="";
    $a02="";
}
if (substr($office_document,0,3)=="(1)"){
	$question="「臺灣淨零科技方案推動小組」正式掛牌，內容包含參加掛牌的部會成員，小組成立的目的及預期成果，以及吳政忠主委及廖俊智院長的發言，並敘明行政院所核定「淨零科技方案」的概要。";		
}elseif (substr($office_document,0,3)=="(2)"){
	$question="神經醫學新突破！發現顫抖症的核心機制及治療契機，原發性顫抖症盛行於高齡族群，為找出引起顫抖的機制，並協助國人相關疾病診斷與治療，在國科會腦科技專案計畫及吳大猷先生紀念獎計畫的支持下，國立臺灣大學醫學院藥理學科暨研究所潘明楷副教授研究團隊發現顫抖症的核心機轉，直指「顫抖」的本質，透過週期電刺激術干擾顫抖的頻率，可緩解病患顫抖症狀。此一系列成果，發表於國際頂尖期刊「科學轉譯醫學」(Science Translational Medicine)";
}elseif (substr($office_document,0,3)=="(3)"){
	$question="加碼促科研博士人數待遇再升級- 為蓄積我國科研人才庫，鼓勵學生就讀博士班，國科會在既有的補助經費基礎下，針對高階科研人才培育增加15.4億元，吳政忠主任委員今(12)日宣布助攻博士科研的四大加碼措施，包括增加博士生研究獎學金人數及金額、提高研究計畫內博士生兼任人員費用、增加補助博士生赴國外研究人數、提升博士級研究人員人數及待遇等，以支持具研究潛力之博士生專心從事研究，鼓勵優秀的專業人才投入學術研究工作，展現國科會為我國科技施政長遠布局，創造下一世代臺灣科技榮景的努力。";
}elseif (substr($office_document,0,3)=="(4)"){
	$question="2024科普環島列車圓滿歸航，鐵道上的科學教室，培育2萬名未來小小科學家 「2024年臺灣科普環島列車」自10月21日起展開科學環島之旅，於今（26）日順利抵達南港火車站，圓滿結束連續6天的科學探索巡禮。國科會副主委陳炳宇、數位發展部數位產業署副署長陳慧敏、台鐵公司總經理馮輝昇以及參與週六科普列車體驗的民眾與基隆、新北地區的國小師生，共同參加在南港瓶蓋工廠的閉幕典禮，重溫這趟精彩的科學旅程，並參觀南港科學市集活動，沉浸在科學的洗禮中，滿載而歸";
}elseif (substr($office_document,0,3)=="(5)"){
	$question="第26屆臺法科技獎 表彰臺法科研合作成果， 11月27日由國家科學及技術委員會與法國法蘭西自然科學院（Académie des Sciences）共同頒發。本屆獲獎者為中央研究院生物化學研究所副所長徐尚德博士及法國國家健康與醫學研究院（Inserm）巴黎精神病學與神經科學研究所Cyril Hanus博士，表彰他們在分子生物學領域的卓越合作與成果。";
}elseif (substr($office_document,0,3)=="(6)"){
	$question="《人文沙龍系列》 海國詩路與南洋風土， 「海國詩路」是指透過海上航線，探究境外漢詩寫作的歷史脈絡，藉由人與土地、海洋等環境的交互影響，探索各地文學之間產生的聯繫。不同時期的航線也讓漢詩寫作有不同的脈絡，文人在航線上受到的文化衝擊與遷移，也反映在古典文類的修辭等各個層面。究竟人、海洋、文學三者如何相互影響？南洋風土又如何受到殖民與華人社會的影響，產生不同創作？";
}elseif (substr($office_document,0,3)=="(7)"){
	$question="開淨零碳排新篇章！自主開發「薄膜碳捕捉」與「電化學碳轉化」技術";	
}else{
	$question="開淨零碳排新篇章！自主開發「薄膜碳捕捉」與「電化學碳轉化」技術";
}

?>
<main class="form-signin w-75 m-auto">
    <div class="container mt-5">
		<h5 class="mb-4"><b>新聞稿: <?=$office_document;?></b></h5>
        <form id="myForm">
			<!-- office_document selection -->
			<div class="form-floating mb-3">
				<select class="form-select" id="office_document" name="office_document" required">
					<option value="<?=$office_document;?>"><?=$office_document;?></option>
				</select>
				<label for="office_document" class="form-label">新聞稿類別</label>
			</div>
			<!-- title field hidden initially -->
			<div class="form-floating mb-3">
				<input type="text" class="form-control" id="title" name="title" style="height: auto; font-size: 12px;" value="<?=$title;?>" required>						
				<label for="title" class="form-label">主旨</label>
				<small class="form-text text-muted" style="font-size: 10px;">範例: <?=$question;?></small>

			</div>

			<!-- content field hidden initially -->
			<div class="form-floating mb-3">
				<textarea class="form-control" id="content" name="content" style="height: auto;  font-size: 12px;" rows="3"><?=$content;?></textarea>
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
