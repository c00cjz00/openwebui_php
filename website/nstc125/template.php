<?php function myhead01(){?><!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://www.nstc.gov.tw/assets/favicon.ico" rel="shortcut icon">	
    <title>nstc125國家科學及技術委員會 生成式AI服務系統</title>
    <!-- 引入 Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>

         /* 清除頁面默認間距 */
		html, body {
			margin: 0;
			padding: 0;
			height: 100%;
		}

		body {
			display: flex;
			flex-direction: column;
			min-height: 100%;
		}

		main {
			flex: 1; /* 主內容區域彈性佔據可用空間 */
		}

        /* 頂部橫幅樣式 */
        .top-banner {
            #background-color: #ffc107; /* Bootstrap 的黃色變數 */
            background-color: #563D7C; /* Bootstrap 的黃色變數 */
            color: #F8F7F9; /* 黑色文字 */
            text-align: center;
            padding: 5px 10px;
            font-size: 14px;
            position: fixed; /* 固定在頁面頂部 */
            top: 0;
            width: 100%; /* 寬度 100% */
            z-index: 1030; /* 保證橫幅在最上層 */
        }

        /* 紫色 Navbar 樣式 */
        .navbar-purple {
            #background-color: #6f42c1; /* Bootstrap 的紫色變數 */
            background-color: #7952B3; /* Bootstrap 的紫色變數 */
            margin-top: 30px; /* 與橫幅無縫銜接 */
        }
        .navbar-purple .navbar-brand,
        .navbar-purple .nav-link {
            color: white;
        }
        .navbar-purple .nav-link:hover {
            color: #d8b9f8; /* 添加一個較淺的紫色作為 hover 效果 */
        }


        /* Textarea container width set to 70% */
        .textarea-container {
            width: 80%; /* Set container width to 70% */
            margin: 0 auto; /* Center the container */
        }

        /* Textarea width fills the container */
        .textarea_document {
            font-family: monospace;
            font-size: 0.9rem !important; /* Set font-size to 0.8rem and force it with !important */
            width: 100%; /* Make textarea fill 100% of its container */
            height: calc(1.5em * 20 + 2rem + 2px); /* 20 lines height with padding and border */
            display: block;
        }

        /* Set the form control elements to be 50% width and center them */
        /*form {
            width: 80%;
            margin: 0 auto; /* Center the form */
        }*/


    </style>	
<?php } ?>
<?php function myhead02(){ ?>	
</head>
<body>
<?php } ?>
<?php function mynavbar(){ ?>
        <!-- 頂部橫幅 -->
    <div class="top-banner">
        <a href="index.php" class="text-white link-offset-1">國家科學及技術委員會 生成式AI服務系統</a>
    </div>

    <!-- 紫色 Navbar -->
    <nav class="navbar navbar-expand-lg navbar-purple">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
			<!--img src="images/TaiwanView_icon.png" class="img-fluid" style="max-width: 40px; height: auto; background-color: white; border-radius: 5px; padding: 2px;"> GENAI@NCHC </a-->
			<img src="images/logo_w.d5a9b21e.svg" class="img-fluid" style="max-width: 70px; height: auto;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                                        <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        公文撰寫
                                                </a>
                                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                        <li><a class="dropdown-item" href="document01.php?office_document=(1) 函">(1) 函</a></li>
                                                        <li><a class="dropdown-item" href="document02.php?office_document=(2) 簽">(2) 簽</a></li>
                                                </ul>
                                        </li>									
                                        <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        新聞稿撰寫
                                                </a>
                                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                        <li><a class="dropdown-item" href="news_writting.php?office_document=(1) 科技政策與發展規劃: 宣布新政策或長期科技規劃">(1) 科技政策與發展規劃: 宣布新政策或長期科技規劃</a></li>
                                                        <li><a class="dropdown-item" href="news_writting.php?office_document=(2) 研究成果發布: 公佈特定領域的重要研究進展">(2) 研究成果發布: 公佈特定領域的重要研究進展</a></li>
                                                        <li><a class="dropdown-item" href="news_writting.php?office_document=(3) 資金與補助計劃: 關於研究經費申請、撥款或管理的公告">(3) 資金與補助計劃: 關於研究經費申請、撥款或管理的公告</a></li>
                                                        <li><a class="dropdown-item" href="news_writting.php?office_document=(4) 人才培育與活動: 青年科學家競賽、研討會、教育計劃相關">(4) 人才培育與活動: 青年科學家競賽、研討會、教育計劃相關</a></li>
                                                        <li><a class="dropdown-item" href="news_writting.php?office_document=(5) 重大活動與合作: 與其他國家或國際組織合作的計劃或成果">(5) 重大活動與合作: 與其他國家或國際組織合作的計劃或成果</a></li>
                                                        <li><a class="dropdown-item" href="news_writting.php?office_document=(6) 科技普及與教育:針對大眾或學生的科普活動推廣">(6) 科技普及與教育:針對大眾或學生的科普活動推廣</a></li>
                                                        <li><a class="dropdown-item" href="news_writting.php?office_document=(7) 專題專案: 某一特定領域的研究專案進展或成果">(7) 專題專案: 某一特定領域的研究專案進展或成果</a></li>
                                                </ul>
                                        </li>
                                        <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        立法院模擬問答
                                                </a>
                                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                        <li><a class="dropdown-item" href="qa.php?office_document=(1) 重點回覆">(1) 重點回覆</a></li>
                                                        <li><a class="dropdown-item" href="qa.php?office_document=(2) 書面報告">(2) 書面報告</a></li>
                                                </ul>
                                        </li>
                                        <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        民眾陳情回文
                                                </a>
                                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                        <li><a class="dropdown-item" href="people.php?office_document=(1) 樣板一">(1) 樣板一 (根據指引回覆內容)</a></li>
                                                        <li><a class="dropdown-item" href="people.php?office_document=(2) 樣板二">(2) 樣板二 (實際回覆陳情內容)</a></li>
                                                </ul>
                                        </li>


                                        <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        法律情境檢索
                                                </a>
                                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                        <li><a class="dropdown-item" href="law.php?office_document=(1) 前案檢索系統">(1) 前案檢索系統</a></li>
                                                </ul>
                                        </li>										
										
										<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) { ?>

                                        <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <strong>使用紀錄</strong>
                                                </a>
                                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                        <li><a class="dropdown-item" href="document01_logs.php?">公文撰寫 (函)</a></li>
                                                        <li><a class="dropdown-item" href="document02_logs.php?">公文撰寫 (簽)</a></li>
                                                        <li><a class="dropdown-item" href="news_writting_logs.php?">新聞稿撰寫</a></li>
                                                        <li><a class="dropdown-item" href="qa_logs.php?">立法院模擬問答</a></li>
                                                        <li><a class="dropdown-item" href="people_logs.php?">民眾陳情回文</a></li>
                                                        <li><a class="dropdown-item" href="law_logs.php?">法律情境檢索</a></li>
												</ul>
                                        </li>
										<li class="nav-item">
											<a href="login.php?logout=true" class="nav-link">登出</a>
										</li>
										<?php } ?>
					
					
                </ul>
            </div>
        </div>
    </nav>
        <br>
		
<?php } ?>
<?php function mycontainer(){ ?>
<main class="form-signin w-75 m-auto">
    <div class="container mt-5">
        <h1>表單提交至 job.php</h1>
        
        <!-- Switch 按鈕: 切換顯示或隱藏 title 和 content 欄位 -->
        <div class="mb-3 form-check form-switch">
            <input class="form-check-input" type="checkbox" id="toggleSwitch">
            <label class="form-check-label" for="toggleSwitch">
                顯示/隱藏主旨與說明欄位
            </label>
        </div>

        <form id="myForm">
			<div class="form-floating mb-3">
                <input type="text" class="form-control" id="job" name="job"> <!-- 可輸入的 job -->
                <label for="job" class="form-label">Job:</label>
            </div>

            <!-- title field -->
            <div class="form-floating mb-3" id="titleField">
                <input type="text" class="form-control" id="title" name="title" required>						
                <label for="title" class="form-label">主旨</label>
            </div>

            <!-- content field -->
            <div class="form-floating mb-3" id="contentField">
                <textarea class="form-control" id="content" name="content" rows="4"></textarea>
                <label for="content" class="form-label">說明 (可選填)</label>
            </div>

            <button type="submit" class="btn btn-primary">提交</button>
        </form>
    </div>
    <div class="container mt-5">
		<div class="form-floating mb-3">		
			<textarea id="result" class="form-control" style="height: auto;" rows="24"></textarea>
			<label for="result" class="form-label">Result:</label>
		</div>
    </div>
</main>	
	
    <!-- 模態視窗 -->
    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">處理中</h5>
					<button type="button" class="btn-close" id="cancelButton" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    請等候十秒...
                </div>
            </div>
        </div>
    </div>
<?php } ?>	
<?php function mycontact(){ ?>


    <!-- 聯絡方式 -->
    <footer class="bg-light text-center py-3 mt-5">
        <div class="container">
		<small>©國研院國網中心 2024 All Rights Reserved. ｜指導單位: NSTC國科會</small>
        </div>
    </footer>
	
	
<?php } ?>		
<?php function myjs(){ ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<?php } ?>	
<?php function myjs01(){ ?>
    <script>
        $(document).ready(function() {
            // 預設隱藏 title 和 content 欄位
            $('#titleField, #contentField').hide();

            // 當表單提交時觸發AJAX
            $('#myForm').on('submit', function(event) {
                event.preventDefault();  // 防止表單的默認提交行為

                // 顯示模態視窗
                var myModal = new bootstrap.Modal(document.getElementById('modal'));
                myModal.show();

                // 用AJAX提交表單數據
                $.ajax({
                    url: 'job.php',
                    method: 'POST',
                    data: {
                        job: $('#job').val(),  // 從輸入框獲取 job 的值
                        title: $('#title').val(),  // 從輸入框獲取 title 的值
                        content: $('#content').val(),  // 從 textarea 獲取 content 的值
                        a: 1,  // 固定參數 a=1
                        b: 2   // 固定參數 b=2
                    },
                    success: function(response) {
                        // 顯示 job.php 返回的結果
                        $('#result').val(
                            'Job: ' + response.job + '\n' +
                            'Title: ' + response.title + '\n' +
                            'Content: ' + response.content + '\n' +
                            'Status: ' + response.status + '\n' +
                            'Message: ' + response.message
                        );

                        // 延遲隱藏模態視窗，避免 UI 反應過慢
                        setTimeout(function() {
                            myModal.hide();  // 隱藏模態視窗
                        }, 1000); // 延遲 1 秒

                        // 自動滾動到 textarea 的下方
                        $('html, body').animate({
                            scrollTop: $('#result').offset().top + $('#result').outerHeight()
                        }, 1000); // 滾動至結果區域的下方，並設置滾動時間
                    },
                    error: function() {
                        alert("發生錯誤，請稍後再試！");
                        
                        // 延遲隱藏模態視窗，避免 UI 反應過慢
                        setTimeout(function() {
                            myModal.hide();  // 隱藏模態視窗
                        }, 1000); // 延遲 1 秒
                    }
                });
            });

            // 切換顯示或隱藏 title 和 content 欄位
            $('#toggleSwitch').change(function() {
                if ($(this).prop('checked')) {
                    $('#titleField, #contentField').show();  // 顯示欄位
                } else {
                    $('#titleField, #contentField').hide();  // 隱藏欄位
                }
            });
			
			// 綁定取消按鈕點擊事件
			$('#cancelButton').on('click', function() {
				// 使用 AJAX 發送請求
				$.ajax({
					url: 'c.php',
					type: 'POST',
					data: { action: 'cancel' },
					beforeSend: function() {
						console.log('請求已發送');
					},
					success: function(response) {
						console.log('請求成功：', response);
					},
					error: function(xhr, status, error) {
						console.error('請求失敗：', error);
					}
				});
			});			
			
        });
    </script>
<?php } ?>
<?php function myjs02($program,$programArr){ 
/*$program="news_writting_run.php";
$programArr["office_document"]=1;
$programArr["title"]=1;
$programArr["content"]=1;
$programArr["a01"]=0;
$programArr["a02"]=0;*/
$data="";
$field="";
foreach ($programArr as $key => $value) {
  $data.="                        {$key}: $('#{$key}').val(),
";
 if ($value==0) {
  $field.="#".$key."Field, ";
 }
}
$data=substr(trim($data),0,-1);
$field=substr(trim($field),0,-1);

?>
    <script>
        $(document).ready(function() {
            // 預設隱藏 title 和 content 欄位
            $('<?=$field;?>').hide();

            // 當表單提交時觸發AJAX
            $('#myForm').on('submit', function(event) {
                event.preventDefault();  // 防止表單的默認提交行為

                // 顯示模態視窗
                var myModal = new bootstrap.Modal(document.getElementById('modal'));
                myModal.show();

                // 用AJAX提交表單數據
                $.ajax({
                    url: '<?=$program;?>',
                    method: 'POST',
                    data: {						
                        //office_document: $('#office_document').val(),  // 從輸入框獲取 office_document 的值
                        //title: $('#title').val(),  // 從輸入框獲取 title 的值
                        //content: $('#content').val(),  // 獲取 content 的值
                        //a01: $('#a01').val(),  // 獲取 a01 的值
                        //a02: $('#a02').val()  // 獲取 a02 的值
						<?=$data;?>						
                    },
                    success: function(response) {
                        // 顯示 job.php 返回的結果
                        $('#codeTextarea').val(
							(response.myoutput || 'N/A')
                        );

                        // 延遲隱藏模態視窗，避免 UI 反應過慢
                        setTimeout(function() {
                            myModal.hide();  // 隱藏模態視窗
                        }, 1000); // 延遲 1 秒

                        // 自動滾動到 textarea 的下方
                        $('html, body').animate({
                            scrollTop: $('#codeTextarea').offset().top + $('#codeTextarea').outerHeight()
                        }, 1000); // 滾動至結果區域的下方，並設置滾動時間
                    },
                    error: function() {
                        alert("發生錯誤，請稍後再試！");
                        
                        // 延遲隱藏模態視窗，避免 UI 反應過慢
                        setTimeout(function() {
                            myModal.hide();  // 隱藏模態視窗
                        }, 1000); // 延遲 1 秒
                    }
                });
            });

            // 切換顯示或隱藏 title 和 content 欄位
            $('#toggleSwitch').change(function() {
                if ($(this).prop('checked')) {
                    $('<?=$field;?>').show();  // 顯示欄位
                } else {
                    $('<?=$field;?>').hide();  // 隱藏欄位
                }
            });
        });
    </script>
   <script> 
   		// 將 textarea 的內容送到 hidden input，並提交表單
		function submitCode() {
			const codeTextarea = document.getElementById("codeTextarea").value;
			const hiddenCodeContent = document.getElementById("hiddenCodeContent");
			hiddenCodeContent.value = codeTextarea;
			document.getElementById("submitForm").submit();
		}

 
        function copyCode() {
            const textarea = document.getElementById('codeTextarea');
            textarea.select();
            textarea.setSelectionRange(0, 99999); // For mobile devices

            try {
                document.execCommand('copy');
                alert('已經複製到你的剪貼簿!');
            } catch (err) {
                alert('複製失敗');
            }
        }

        //function toggleTextarea() {
        //    const textarea = document.getElementById('codeTextarea');
        //    if (textarea.style.display === 'none') {
        //        textarea.style.display = 'block';
        //    } else {
        //        textarea.style.display = 'none';
        //    }
        //}
    </script>	
<?php } ?>
<?php function myjs03($program,$programArr,$sentences){ 
/*$program="news_writting_run.php";
$programArr["office_document"]=1;
$programArr["title"]=1;
$programArr["content"]=1;
$programArr["a01"]=0;
$programArr["a02"]=0;*/
$data="";
$field="";
foreach ($programArr as $key => $value) {
  $data.="                        {$key}: $('#{$key}').val(),
";
 if ($value==0) {
  $field.="#".$key."Field, ";
 }
}
$data=substr(trim($data),0,-1);
$field=substr(trim($field),0,-1);

?>
 <script>
    $(document).ready(function() {
        // 預設隱藏 title 和 content 欄位
        $('<?=$field;?>').hide();

        // 全域變數，儲存訊息計時器的 ID
        var messageTimer = null;
        var currentSentenceIndex = 0;  // 用於追蹤目前顯示的句子索引

        // 當表單提交時觸發AJAX
        $('#myForm').on('submit', function(event) {
            event.preventDefault();  // 防止表單的默認提交行為

            // 重置訊息索引
            currentSentenceIndex = 0;

            // 顯示模態視窗
            var myModal = new bootstrap.Modal(document.getElementById('modal'));
            myModal.show();

			// 更改按鈕的名稱和樣式
			//var submitButton = $(this).find('button[type="submit"]');
			//submitButton.text('再次生成內容').addClass('btn btn-lg btn-danger');

            // 設定句子陣列
            var sentences = [
<?=$sentences;?>
            ];

            // 清除之前的計時器（如果有）
            if (messageTimer) {
                clearTimeout(messageTimer);
            }
			
            // 用來顯示訊息的函數
           function displaySentence() {
                if (currentSentenceIndex < sentences.length) {
                   $('#modal .modal-body').text(sentences[currentSentenceIndex]);  // 更新模態視窗中的內容
                   messageTimer = setTimeout(function() {
                        currentSentenceIndex++; // 移動到下一個句子
                        displaySentence();  // 顯示下一個句子
                    }, 2000);  // 每個句子之間的延遲時間為 2 秒
                }
            }

            // 開始顯示第一個句子
            displaySentence(0);

            // 用AJAX提交表單數據
            $.ajax({
                url: '<?=$program;?>',
                method: 'POST',
                data: {						
                    <?=$data;?>						
                },
                success: function(response) {
                    // 顯示 job.php 返回的結果
                    $('#codeTextarea').val(
                        (response.myoutput || 'N/A')
                    );

                    // 當 AJAX 完成後，隱藏模態視窗
                    myModal.hide();

                    // 自動滾動到 textarea 的下方
                    $('html, body').animate({
                        scrollTop: $('#codeTextarea').offset().top + $('#codeTextarea').outerHeight()
                    }, 1000); // 滾動至結果區域的下方，並設置滾動時間
                },
                error: function() {
                    alert("發生錯誤，請稍後再試！");

                    // 當發生錯誤時，也隱藏模態視窗
                    myModal.hide();
                }
            });
        });

        // 切換顯示或隱藏 title 和 content 欄位
        $('#toggleSwitch').change(function() {
            if ($(this).prop('checked')) {
                $('<?=$field;?>').show();  // 顯示欄位
            } else {
                $('<?=$field;?>').hide();  // 隱藏欄位
            }
        });
    });
</script>

   <script> 
   		// 將 textarea 的內容送到 hidden input，並提交表單
		function submitCode() {
			const codeTextarea = document.getElementById("codeTextarea").value;
			const hiddenCodeContent = document.getElementById("hiddenCodeContent");
			hiddenCodeContent.value = codeTextarea;
			document.getElementById("submitForm").submit();
		}

 
        function copyCode() {
            const textarea = document.getElementById('codeTextarea');
            textarea.select();
            textarea.setSelectionRange(0, 99999); // For mobile devices

            try {
                document.execCommand('copy');
                alert('已經複製到你的剪貼簿!');
            } catch (err) {
                alert('複製失敗');
            }
        }

        //function toggleTextarea() {
        //    const textarea = document.getElementById('codeTextarea');
        //    if (textarea.style.display === 'none') {
        //        textarea.style.display = 'block';
        //    } else {
        //        textarea.style.display = 'none';
        //    }
        //}
    </script>	
<?php } ?>
<?php function myfooter(){ ?>
</body>
</html>
<?php } ?>

