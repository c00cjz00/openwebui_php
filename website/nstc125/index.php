<?php
require 'session.php'; // 假設這是您的程式碼檔案
require 'template.php'; // 假設這是您的程式碼檔案
myhead01();

myhead02();
mynavbar();
?>
<main class="form-signin w-75 m-auto">
    <div class="container mt-5 text-center">
        <p class="fs-2 text-center fw-bolder">HI, 你想要問什麼？</p><br><br>
        <img src="images/logo.4ea7d891.png" class="img-fluid" style="max-width: 260px; height: auto;">
    </div>
</main>

<?php
mycontact();
myjs();
myjs01();
myfooter();
