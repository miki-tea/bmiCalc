<?php
session_start();
// var_dump($_SESSION['token']);
$err_msg=[];
header('Content-type: text/plain; charset= UTF-8');

//index.phpから送られてきたデータを変数に入れる
$weight = $_POST['weight'];
$height = $_POST['height'];
// var_dump($_POST['token']);
// var_dump($_SESSION['token']);
if(isset($_POST['token']) && $_SESSION['token'] === $_POST['token']){

  if(is_numeric($weight) && is_numeric($height)){
    $calc = $weight / ( $height / 100 * $height / 100 );
    //式の結果を小数点第一位までに四捨五入
    $res = round( $calc ,1);
    //エスケープ変数を利用してindex.phpに返す
    $h = htmlspecialchars($res,ENT_QUOTES,"utf-8");
    echo json_encode(array(
      "res" => $h,
      "err" => '',
    ));
  }else{
    echo json_encode(array(
      "res" => '不明',
      "err" => "数値を入力してください。",
    ));
  }
}else{
  echo "トークンが無効です";
  exit;
}