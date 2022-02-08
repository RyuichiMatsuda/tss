
// #インシデント：非同期(Ajax)
// $(function () {
//   var Btn = $('.incident_btn');

//   Btn.on('click', function () {
//     console.log('ボタンが反応しました。')

//     //jQueryの、inputタグの値は、以下を利用すれば、取得しやすい。
//     var title = $('input[name="title"]').val();
//     var body = $('textarea[name="body"]').val();

//     console.log(title);
//     console.log(body);
//     // JS側で$requestを作成
//     var fd = new FormData();
//     fd.append('title', title); // $request->title = title keyとvalueがたまたま同じで分かりにくい。
//     fd.append('body', body);
//     $.ajax({
//       url: "/incidents/ajax_store",
//       type: 'POST',
//       data: fd,
//       cache: false,
//       processData: false,
//       contentType: false,
//       headers: {
//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
//       }
//     }).done(function (data) {

//       console.log(data.message);
//       console.log(data.title);
//       console.log(data.body);
//       //ここに、新しく保存した、データをHTMLに挿入する記述をする。

//     }).fail(function (jqXHR, textStatus, errorThrown) {
//       console.log('ERROR', jqXHR, textStatus, errorThrown);
//     });

//     console.log("処理が終了しました。");
//     return false;
//   })
// });

$(function () {
  $("ul.nav li").on('click', function () {
    console.log('run jquery');

    $("ul.nav li.selected").removeClass("selected");
    $(this).addClass("selected");
    $incident_id = $(this).attr('incident_id');
    console.log($incident_id);
    console.log(this);


    $.ajaxSetup({
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });
    $.get({
      url: "incidents/ajax_index/" + $incident_id,
      method: 'POST',
      dataType: 'json'
    })
      .done(function (data) {
        $testt = data;
        console.log(data);

        

        // console.log($testt.data.length);
        // $('.change_card').children('.card').remove();
        // if (Array.isArray($testt)) {
        //   for (var i = 0; i < $testt.length; i++) {

        //     var card_li = $('<div id="copy_card" class="card"><div class="card-header">名前</div><div class="card-body"> 要件 </div> </div>');
        //     // const commentClone = $('#copy_card').clone(true).removeAttr('style');
        //     // console.log(commentClone);

        //     card_li.children('.card-header').append($testt[i].title);
        //     card_li.children('.card-body').append($testt[i].body);

        //     $('#change_card').append(card_li);
        //   }
        // } else {
        //   var card_li = $('<div id="copy_card" class="card"><div class="card-header">名前</div><div class="card-body"> 要件 </div> </div>');
        //   // const commentClone = $('#copy_card').clone(true).removeAttr('style');
        //   // console.log(commentClone);
        //   card_li.children('.card-header').append($testt.title);
        //   card_li.children('.card-body').append($testt.body);
        //   $('#change_card').append(card_li);
        // }

      })
      .fail(function () {
      })


  });
});