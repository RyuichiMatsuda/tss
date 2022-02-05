
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

          // document.getByIdで、いいね数の書いているpタグを取ってくる。
          // その後に、htmlメソッドで中身を書き換える
          $('#followersCount').html(data.followersCount);


          $this.children('p').remove();
          $this.prepend(`<p>${data.path}</p>`);

      }).fail(function (jqXHR, textStatus, errorThrown) {
          console.log('ERROR', jqXHR, textStatus, errorThrown);
      });
      console.log("処理が終了しました。");
      return false;
  })

  // /**
  //  * Step3. insert image url to rich editor.
  //  *
  //  * @param {string} url
  //  */
  function insertToEditor(url) {
      // push image url to rich editor.
      console.log(url)
  }
});
