<?php
// 啟動 session
session_start();

// 檢查是否已經登入
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // 若未登入，則導向登入頁面
    header("Location: login.php");
    exit(); // 防止後續程式繼續執行
}

//加入config.php
require 'config.php'; // 假設這是您的程式碼檔案
