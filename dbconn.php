<?php
$host='localhost';
$user='root';
$password ='';
$database ='test';

$conn = mysqli_connect($host,$user,$password,$database);

if(!$conn){
    die("connection unsuccessful".mysqli_connect_error());
}