var vue = new Vue({
    el: "#vue_el",
    data: {
      nukos: [
      /*
        {pass: "105.jpg",name:"ぬこ",comment:"ヤンもふ",price:"100円"},
        {pass: "001.jpg",name:"ぬこ",comment:"ねむるもふもふ",price:"100円"},
        {pass: "0001.jpg",name:"ぬこ",comment:"じー。。",price:"100円"},
        {pass: "20121001_273751.jpg",name:"ぬこ",comment:"ムリー",price:"100円"},
        {pass: "cat11.jpg",name:"ぬこ",comment:"飼えよ",price:"100円"}
      */
      ]
    },
    methods:{
    }
});

$('#submit_search').click(function(){
  var search = $('#value').val();
  $.get("search", { value: search },
  function(product_info){
    var nekoneko = [];
  //vue配列リセット
   for(var j=0;j<product_info.length;j++){
     nekoneko.push(product_info[j]);
   }
    vue.$set('nukos',nekoneko);
  });
});

(function(){$.ajax({
  url: "/data",
  type: "GET",
   cache: false,
   dataType: "json",
   success: function(product_info){
     for(var i=0;i<product_info.length;i++){
       vue.$data.nukos.push(product_info[i]);
    }
   },
   error: function(xhr, textStatus, errorThrown){
     alert('読み込みに失敗しました、ページを更新してください');
   }
  });
}());
