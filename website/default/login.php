<?php
// 啟動 session
session_start();

// 預設帳號和密碼
#$valid_username = "allen";
#$valid_password = "peter";
// 預設多組帳號和密碼
$valid_users = [
    "c00cjz00" => "peter@NCHC",
    "allen" => "peter@NCHC",
    "john" => "doe@NCHC",
    "jane" => "smith@NCHC",
	"ytguo" => "allen@NCHC",
	"nstc39322" => "allen@NCHC",
	"nstc53723" => "peter@NCHC",
	"nstc233429" => "mary@NCHC",
	"nstc69724" => "jacy@NCHC",
	"nstc05322" => "judy@NCHC"
];


// 登出處理
if (isset($_GET['logout'])) {
    // 清除 session 資料
    session_unset(); // 清除所有 session 變數
    session_destroy(); // 銷毀 session
    header("Location: index.php"); // 登入成功後重定向到 post.php
    exit();	
}

// 處理表單提交
$message="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // 檢查帳號和密碼是否正確
    //if ($username === $valid_username && $password === $valid_password) {
    if (isset($valid_users[$username]) && $valid_users[$username] === $password) {
		
        // 設定 session 變數以表示已經登入
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("Location: index.php"); // 登入成功後重定向到 post.php
        exit();
    } else {
        $message="帳號或密碼錯誤！";
    }
}

require 'template.php'; // 假設這是您的程式碼檔案
myhead01();	
myhead02();
mynavbar();
?>
    <!-- Form Section -->

	
	 <main class="form-signin w-50 m-auto">
		<?php if (!empty($message)): ?>
			<p style="color: red;"><?php echo htmlspecialchars($message); ?></p>
		<?php endif; ?>
		<form method="POST" action="" >
			<div class="container mt-4 text-center">
				<p class="fs-2 text-center fw-bolder">HI, 你想問什麼？</p>
				<img src="images/logo.4ea7d891.png" class="img-fluid" style="max-width: 100px; height: auto;">
				<br><br><p class="fs-5 text-center fw-bolder">請先登入</p>
			</div>		
			<!-- title field hidden initially -->
			<div class="form-floating  mb-2">
				<input type="text" class="form-control" id="username" name="username" required>						
				<label for="floatingInput" class="form-label">Account</label>
			</div>
			<!-- title field hidden initially -->
			<div class="form-floating mb-2">
				<input type="password" class="form-control" id="password" name="password" required>						
				<label for="password" class="form-label">Password</label>
			</div>
			<button type="submit" class="btn btn-primary btn-sm">登入</button><br><br>
		</form>
	</main>
<?php 
mycontact();
myjs();
?>
<?php myfooter();?>

