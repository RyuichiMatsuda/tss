
// #インシデント：非同期(Ajax)
$(function () {
  var Btn = $('.incident_btn');

  Btn.on('click', function() {
      console.log('ボタンが反応しました。')

      //jQueryの、inputタグの値は、以下を利用すれば、取得しやすい。
      var title = $('input[name="title"]').val();
      var body = $('textarea[name="body"]').val();
      
      console.log(title);
      console.log(body);
      // JS側で$requestを作成
      var fd = new FormData();
      fd.append('title', title); // $request->title = title keyとvalueがたまたま同じで分かりにくい。
      fd.append('body', body); 
      $.ajax({
          url: "/incidents/ajax_store",
          type: 'POST',
          data: fd,
          cache: false,
          processData: false,
          contentType: false,
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
          }
      }).done(function (data) {

        console.log(data.message);
        console.log(data.title);
        console.log(data.body);
        //ここに、新しく保存した、データをHTMLに挿入する記述をする。

      }).fail(function (jqXHR, textStatus, errorThrown) {
          console.log('ERROR', jqXHR, textStatus, errorThrown);
      });
      
      console.log("処理が終了しました。");
      return false;
  })
});
