<?php

header("Content-Type:text/html; charset=utf-8");

include("connMysql.php");

$seldb = @mysql_select_db("product");
    if (!$seldb) die ("資料庫選擇失敗!");

$sql_query = "SELECT `cart`.`order_id`,`ProductDetails`.`product_name`,`ProductDetails`.`price`,`cart`.`count_short` FROM `cart` LEFT JOIN `ProductDetails` 

ON `cart`.`product_id` = `ProductDetails`.`product_id`";

$result = mysql_query($sql_query);

while($row_result=mysql_fetch_assoc($result)){
    foreach($row_result as $item=>$value){
        echo $item."=".$value."<br />";
    }
    echo "<hr />";
}












?>