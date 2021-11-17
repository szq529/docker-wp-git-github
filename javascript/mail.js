$(function() {
  $('#form').submit(function() {
    // 変数selectValueを定義してください。
    var selectValue = $('#select-form').val();   //potionで選択されているvalueの値を取得・代入
    
    var textValue = $('#text-form').val();
    // 「#output-select」要素のテキストを変数selectValueの値で書き換えてください。
    $('#output-select').text(selectValue);   //対象のidへ上で取得した値をtextメソッド使って書き換え
    
    $('#output-text').text(textValue);
    return false;
  });
});

$('header','a').click(function(){
  var id = $(this).attr('href');  //クリックした<a>タグのhref要素を取得
  var position = $('id').offset().top;  //飛び先のページ最上部からの距離を取得
  $('html, body').animate({
    'scrollTop':position
  },500);
})