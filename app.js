$(function() {
  // BMI計算
  $(".form").submit(function(e) {
    e.preventDefault();
    var $form = $(this);
    $.ajax({
      async: true,
      url: "calc.php",
      type: "post",
      dataType: "json",
      data: {
        weight: $(".js-weight").val(),
        height: $(".js-height").val(),
        token: $('input[name="token"]').val()
      }
    })
      .done(function(data) {
        $("#err").text(data.err);
        $("#res").html(
          "あなたのBMIは<span id='bmi'>" + data.res + "</span>です。"
        );
      })
      .fail(function(data) {
        console.log("ajax通信失敗");
      });
  });
  //ツイートボタンのリンク先設定
  $("#tw_btn").click(function() {
    var bmi = $("#bmi").text();
    var tw_body = "今日のBMIは" + bmi + "でした。";
    var url = "https://bmicalc123.herokuapp.com/";
    window.open().location.href =
      "https://twitter.com/share?url=" +
      url +
      "&text=" +
      tw_body +
      "&hashtags=ダイエット,ダイエット垢さんと繋がりたい" +
      "&count=none" +
      "&lang=ja";
  });
});
