<?php

session_start();


header("Content-Type:text/html; charset=utf-8");

include("connMysql.php");

$seldb = @mysql_select_db("product");
    if (!$seldb) die ("資料庫選擇失敗!");



if (isset($_POST["buttonOk"]))
{
	$UserName = $_POST["txtUserName"];
	$PassWord = $_POST["txtPassWord"];
 	$sql_query = "SELECT * FROM `UserData` WHERE `user_name` = '".$UserName."'";
 	
 	// and `user_password` = '".$PassWord."'
	
	$result = mysql_query($sql_query);

 
	
	$row_Login = mysql_fetch_assoc($result);
	$DataUserName = $row_Login["user_name"];
	$DataPassWord = $row_Login["user_password"];


	if ((trim($UserName) != "") && (trim($PassWord) != "")){
	    if (($DataUserName==$UserName)&&(password_verify($PassWord,$DataPassWord))){
		setcookie("userName", $UserName);
		header("Location: index.php");
		exit();
		}
	
	else
		header("Location:index.php");
		exit();
	}
}

/*

if (isset($_POST["buttonOk"]))
{
	$UserName = $_POST["txtUserName"];
	$PassWord = $_POST["txtPassWord"];
	if ((trim($UserName) != "") && (trim($PassWord) != ""))
	{
		setcookie("userName", $UserName);
		header("Location: index.php");
		exit();
	}
	
	else
		header("Location:index.php");
		exit();
}
*/

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
    .aaa {width:128px;}
/*    
    .bbb {width:128px;}
*/
</style>


</head>

<body  style="background-color:black;">
    
<nav class="navbar navbar-inverse navbar-fixed-top;">
    <!--navbar-fixed-top將巡導列永遠保持在畫面上方-->
    <div class="container-fluid" style="height:175px;border-bottom-style:solid;border-color:red;">
        <div class="navbar-header" >
            <a class="navbar-brand"  href="index.php">
                <img src="photo/photo5.jpg">
            </a>
        </div>
      
    </div>  
    </div>
</nav>

<div class="container">
    <div class="row">
        
        <div class="col-lg-12">
            
            <div class="jumbotron" style="background-color : gray;max-width:800px;margin:auto;text-align: center;">
            <form id="form1" name="form1" method="post" action = "Login.php">
                <div class="input-group" style="max-width:400px;margin:auto;">
                    
                    <span class="input-group-addon aaa" id="basic-addon1">會員帳號</span>
                    <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1" name="txtUserName">
                  
                </div>
                <div class="input-group" style="max-width:400px;margin:auto;">
              
                    <span class="input-group-addon aaa" id="basic-addon1">密碼</span>
                    <input type="password" class="form-control" placeholder="Password" aria-describedby="basic-addon1" name="txtPassWord">
                    
                </div>
                
                <div style="padding :10px;">
                    <button type="button submit" class="btn btn-primary" name="buttonOk">登錄</button>
                </div>
            </form>
            <a href="create.php" style="color:red">
                        註冊會員</a>
            
            
            <p style = "color:white;text-align: center;">
            阿漳出品 必屬佳作
            </p>
            <p style = "color:white;text-align: center;">
            2016 版權為阿漳所有。建議使用最新版瀏覽器觀看。
            </p>
            
            </div>
        </div>
        
    </div>  
</div>
    
</body>

</html>


