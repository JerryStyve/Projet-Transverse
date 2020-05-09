<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"

$shop = mysqli_connect("localhost", "root", "", "doctolib") or trigger_error(mysql_error(),E_USER_ERROR); 
?>