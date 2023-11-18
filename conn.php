<?php
error_reporting(0);
$conn =mysqli_connect("localhost","root","","accounts_app");
if(mysqli_connect_error())
{
    echo "cannot connect";
}
?>