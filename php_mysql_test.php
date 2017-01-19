<?php

header("Content-Type:text/html; charset=utf-8");

include("connMysql.php");

$seldb = @mysql_select_db("product");
    if (!$seldb) die ("資料庫選擇失敗!");
    

$sql_query = "SELECT * FROM `UserData` WHERE `UserName`";


$result = mysql_query($sql_query);



while($row_result=mysql_fetch_row($result)){
    foreach($row_result as $item=>$value){
        echo $item."=".$value."<br />";
    }
    echo "<hr />";
}






if (isset($_POST["buttonOk"]))
{
	$UserName = $_POST["txtUserName"];
	$PassWord = $_POST["txtPassWord"];
	$sql_query = "SELECT * FROM `UserData` WHERE `UserName` = $DataUserName and `UserPassword` = $DataPassWord ";
	
	if ((trim($UserName) != "") && (trim($PassWord) != ""))
	{
	    
	    if (($DataUserName=$UserName)&&($DataPassWord=$PassWord)){
		setcookie("userName", $UserName);
		header("Location: test.php");
		exit();
	}
	
	else
		header("Location:test.php");
		exit();
}








?>