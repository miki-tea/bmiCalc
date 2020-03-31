<?php
session_start();
$token = bin2hex(openssl_random_pseudo_bytes(16));
$_SESSION['token'] = $token;
// var_dump($_SESSION['token']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>BMI for Tweet</title>
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Kosugi+Maru&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
  <!-- CSS読み込み -->
  <link rel="stylesheet" href="style.min.css" />
</head>

<body>
  <header class="header">
    <h1 class="header__title">BMI for Tweet</h1>
  </header>
  <div class="form">
    <form action=""  method="post">
      <input type="hidden" name="token" value="<?php echo $token; ?>">

      <div class="form__item">
        <label for="height">身長：</label>
        <input type="text" name="height" id="height" class="js-height form__input" />cm
      </div>
      <div class="form__item">
        <label for="weight">体重：</label>
        <input id="weight" type="text" name="weight" class="js-weight form__input" />kg
      </div>
      <input type="submit" class="form__submit form__item">
    </form>
    <div class="result">
      <p class="result__header">結果：</p>
        <div id="err" class="err"></div>
        <div id="res"></div>
    </div>
    <a href="" id="tw_btn" class="twitter-share-button" data-hashtags="ダイエット" data-show-count="false"><img src="img/tw_btn.svg" alt="ツイートする" class="btn__tw"></a>
  </div>
  <!-- jQuery読み込み -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="app.js"></script>
  
</body>

</html>