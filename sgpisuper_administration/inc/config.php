<?php
define("DB_HOST",'localhost');
define("DB_USER",'root');
define("DB_PASSWORD",'');
define("DB_DATABASE",'sgpi-derai');
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
mysqli_query($connection,'SET CHARACTER SET utf8');
?>