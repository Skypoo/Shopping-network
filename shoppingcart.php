<?php

header("Content-Type:text/html; charset=utf-8");

include("connMysql.php");

$seldb = @mysql_select_db("product");
  if (!$seldb) die ("資料庫選擇失敗!");
  
$sql_query = "SELECT `cart`.`order_id`,`ProductDetails`.`product_name`,`ProductDetails`.`price`,`cart`.`count_short` FROM `cart` LEFT JOIN `ProductDetails` 

ON `cart`.`product_id` = `ProductDetails`.`product_id`";

$result = mysql_query($sql_query);

/*
$ProductResult=mysql_fetch_assoc($result);
*/







if (isset($_COOKIE["userName"]))
  $UserName = $_COOKIE["userName"];
else 
  $UserName = "Guest";
  
if($_GET['Method']=='Bye'){
  setcookie ("userName", "", time() - 3600);
	header("Location: index.php");
}  
  



?>





<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>阿漳購物網</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.min.css" rel="stylesheet">
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>


<style>

  #section {margin : 50px auto;}


  body {font-family :Microsoft JhengHei;
    
  }
  
  .input {
    padding-left : 5px;
    
  } 
  
  .btn btn-primary {
    padding-right : 5px;
    
  }
  
/*
  div.footer{
    position :fixed;
    bottom :0px;
    width :100%;
  }
*/        

  

</style>
</head>

<body>

  
    
    <nav class="navbar navbar-inverse navbar-fixed-top">
    <!--navbar-fixed-top將巡導列永遠保持在畫面上方-->
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button> 
          <a class="navbar-brand"  href="index.php">阿漳線上購物網</a>
        </div>
        
        
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">  
        <ul class="nav navbar-nav">
          <li class="active"><a href="index.php"><span class = "glyphicon glyphicon-home"></span></a></li>
          <!--class = "active"導覽列背景加深
          <span class = "glyphicon glyphicon-home">使用bootstrap提供的首頁圖片
          -->
          <li><a href="#999">最新產品</a></li>
          <li><a href="#">特價商品</a></li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">服裝<span class="caret"></span></a>
            <!--
            
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#"></a> 建立下拉式選單 
            
            span class="caret"下拉式選單加入三角形圖示-->
            <ul class="dropdown-menu">
            <!--<ul class="dropdown-menu"> 建立下拉式選單的清單內容-->
              <li><a href="#">上衣</a></li>
              <li><a href="#">褲子</a></li>
              <li><a href="#">顯示全部</a></li> 
            </ul>
          </li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">鞋子
            <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">拖鞋</a></li>
              <li><a href="#">休閒鞋</a></li>
              <li><a href="#">顯示全部</a></li> 
            </ul>
          </li>
          
          <form class="navbar-form navbar-left">
            <div class="form-group">
              <input type="text" class="form-control" id = "123" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default"><span class = "glyphicon glyphicon-search"></span>搜尋</button>
          </form>
           
          
        </ul>
        
        <ul class="nav navbar-nav navbar-right">
          <li><a style="color:white">Hello!<?php echo $UserName ?></a></li>
          
          <?php if ($UserName == "Guest"): ?>
          <li><a href="Login.php"><span class="glyphicon glyphicon-user"></span>Login</a></li>
          <?php else: ?>
          <li><a href="index.php?Method=Bye"><span class="glyphicon glyphicon-user"></span>Logout</a></li>
          <?php endif; ?>
          
        </ul>
      
      </div>  
      </div>
    </nav>

<div class="container" id="section">
  <h1 style="text-align:center">購物車清單</h1>
  <div class="row1">
    
    <?php
        
        while($ProductResult=mysql_fetch_assoc($result)){
          $sumTotal=0;
          $sumTotal += $ProductResult["price"]*$ProductResult["count_short"];
          $priceTotal += $ProductResult["price"]*$ProductResult["count_short"];
          
          
          echo '<div class="col-lg-2" style="border-width:3px;border-style:double;border-color:black;">';
          echo '<h4 style = "text-align: center;">訂單資訊</h4>';
          echo '<p style = "text-align: center;">訂單編號::'.$ProductResult["order_id"].'</p>';
          echo '<p style = "text-align: center;">產品名稱:'.$ProductResult["product_name"].'</p>';
          echo '<p style = "text-align: center;">產品單價:'.$ProductResult["price"].'</p>';
          echo '<p style = "text-align: center;">購買數量:'.$ProductResult["count_short"].'</p>';
          
          echo '<p style = "text-align: center;">小計:'.$sumTotal.'</p>';
          
          echo '</div>';
        }
        
          
    ?>
    
<!-- 
 
  <div class="col-lg-4" style="border-width:3px;border-style:double;border-color:black;">
    
    <h4 style = "text-align: center;">訂單資訊 1</h4>
    <p style = "text-align: center;">訂單編號:</p>
    <p style = "text-align: center;">產品名稱:</p>
    <p style = "text-align: center;">產品單價:</p>
    <p style = "text-align: center;">購買數量:</p>
  </div>


  
  <div class="col-lg-4" style="border-width:3px;border-style:double;border-color:black;">
    
    <h4 style = "text-align: center;">訂單資訊 2</h4>
    <p style = "text-align: center;">訂單編號:</p>
    <p style = "text-align: center;">產品名稱:</p>
    <p style = "text-align: center;">產品單價:</p>
    <p style = "text-align: center;">購買數量:</p>
  </div>
  
  
  
  <div class="col-lg-4" style="border-width:3px;border-style:double;border-color:black;">
    
    <h4 style = "text-align: center;">訂單資訊3</h4>
    <p style = "text-align: center;">訂單編號:</p>
    <p style = "text-align: center;">產品名稱:</p>
    <p style = "text-align: center;">產品單價:</p>
    <p style = "text-align: center;">購買數量:</p>
  </div>
  
  <div class="col-lg-4" style="border-width:3px;border-style:double;border-color:black;">
    
    <h4 style = "text-align: center;">訂單資訊4</h4>
    <p style = "text-align: center;">訂單編號:</p>
    <p style = "text-align: center;">產品名稱:</p>
    <p style = "text-align: center;">產品單價:</p>
    <p style = "text-align: center;">購買數量:</p>
  </div>
  
  <div class="col-lg-4" style="border-width:3px;border-style:double;border-color:black;">
    
    <h4 style = "text-align: center;">訂單資訊5</h4>
    <p style = "text-align: center;">訂單編號:</p>
    <p style = "text-align: center;">產品名稱:</p>
    <p style = "text-align: center;">產品單價:</p>
    <p style = "text-align: center;">購買數量:</p>
  </div>
  

  <div class="col-lg-4" style="border-width:3px;border-style:double;border-color:black;">
    
    <h4 style = "text-align: center;">訂單資訊6</h4>
    <p style = "text-align: center;">訂單編號:</p>
    <p style = "text-align: center;">產品名稱:</p>
    <p style = "text-align: center;">產品單價:</p>
    <p style = "text-align: center;">購買數量:</p>
  </div>
  
-->  
  
  </div>
    
  
</div>

  <h1 style = "text-align: center;">訂單總額:<?php echo $priceTotal ?></h1>




  <hr style="border-width:2px;border-color:black;">
  


  <div class="container">
      <div class="row">
        <div class="col-lg-4" style="border-width:3px;border-style:none;border-color:blue;">
          <h4>商店訊息</h4>
          <hr style="border-width:3px;border-color:orange;">
          <p>購物需知</p>
          <p>關於網拍</p>
          <p>貨運選項</p>
          <p>隱私權政策</p>
          <p>退換貨權益</p>
          
        </div>
        
        <div class="col-lg-4" style="border-width:3px;border-style:none;border-color:blue;">
          <h4>客戶服務</h4>
          <hr style="border-width:3px;border-color:orange;">
          <p>聯絡我們</p>
          <p>特賣商品</p>
          <p>商品退換貨</p>

        </div>
        
        <div class="col-lg-4" style="border-width:3px;border-style:none;border-color:blue;">
          <h4>會員中心</h4>
          <hr style="border-width:3px;border-color:orange;">
          <p>會員中心</p>
          <p>訂購紀錄</p>
          <p>訂閱商品快報</p>

        </div>
      </div>  
    </div>










<footer>
<div style = "background:black;" class="footer">
  
    <div class="container-fluid" style = "padding:12px 15px;">
      <div class="row">
        
        <div class="col-lg-6">
          
          <p style = "color:white;">
            <span class = "glyphicon glyphicon-user"></span>
            2016 版權為阿漳所有。建議使用最新版瀏覽器觀看。
          </p>
        </div>
        
        <div class="col-lg-6">
          <p style = "color:white;text-align:right" >阿漳出品 必屬佳作</p>
        </div>
        
      </div>  
    </div>
  
  
    
</div>
</footer>


</body>

</html>