<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}require_once("funcs.php");
sessionCheck();
?>
<link rel="stylesheet" href="../css/header.css">
<!-- topのLoveYourCarsのフォント -->
<link rel="stylesheet" href="../css/reset.css">
<link rel="stylesheet" href="../css/style.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400..900&display=swap" rel="stylesheet">


<div id="top">
    <div id="t0"></div>
    <div id="t1">
    <span id="t11">
        <span id="t111">=</span>
        <span id="t112"><a href="../php/sell.php"  rel="noopener noreferrer">出品</a></span>
        <span id="t113"><a href="../php/buy.php"  rel="noopener noreferrer">購入</a></span>
        <?php if($_SESSION["kanri_flg"]==1){?>
            <span id="t114"><a href="../php/admin.php" rel="noopener noreferrer">編集</a></span>
            <span id="t114"><a href="../php/userAll.php" rel="noopener noreferrer">ユーザー管理</a></span>
        <?php }?>
    </span>
    <span id="t12"><a href="../php/index.php">LoveYourCars</a></span>
    <span id="t13">
        <span id="t131"><a href="../php/login.php">Sing In</a></span>
    </span>
    </div>