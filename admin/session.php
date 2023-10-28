<?php
session_start();
if(empty($_SESSION['email'] AND $_SESSION['token'])){
    header('location: index.php');
}