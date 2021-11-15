<?php
// include ("../lib/HtmlPhpExcel/HtmlPhpExcel.php");
//require_once('../vendor/autoload.php');
  include ("../lib/HtmlPhpExcel/HtmlPhpExcel.php");
$htmlPhpExcel = 'example.html';
$htmlPhpExcel->process()->output();
