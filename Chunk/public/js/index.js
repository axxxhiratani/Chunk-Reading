var push_cnt = 0;		//ボタンを押した回数
var max = -100;			//チャンクのアイテムの最大値

//初期化処理
function start(){
		var str = "";
		for( var i = 0; i < N; i++ ){
			if( src_data[i][0] != -1 ){		//常時表示でないチャンクの場合の処理
				str += "<span class=\"d"+src_data[i][0]+" off\">"+escape_html( src_data[i][1] )+"</span>\n";
			}else{		//常時表示であるチャンクの場合の処理
				str += "<span>"+escape_html( src_data[i][1] )+"</span>\n";
			}
			if( max < src_data[i][0] ) max = src_data[i][0];		//チャンク数をカウント
		}
		$('#src_text').html( str );		//src_textタグにテキストを追加

		prettyPrint();
}

//前のチャンクへ戻るボタンが押された時のイベント
$( function() {
	$('#button-prev-chunk').click(
		function() {
			push_cnt--;
			console.log( push_cnt );

			if( push_cnt <= 0 ) { //問題の最大チャンク数よりおおくボタンを押された瞬間に最後に表示していたチャンクを非表示
				push_cnt = 0;
				$('.d'+(1) ).each( function(i, e){
					$(e).removeClass( 'on' ).addClass( 'off' );
				} );
				setTimeout(function(){
					alert("これ以上戻ることはできません。");
				}, 0);
				return;
			}

			if( push_cnt != 0 ) {		//今見ていたチャンクを非表示
				$('.d'+(push_cnt+1) ).each( function(i, e){
					$(e).removeClass( 'on' ).addClass( 'off' );
				} );
			}

			if( push_cnt > 0 ) {		//前のチャンクを表示
				$('.d'+(push_cnt) ).each( function(i, e){
					$(e).removeClass( 'off' ).addClass( 'on' );
				} );
			}
		}
	);
} );

//次のチャンクへ進むボタンが押された時のイベント
$( function() {
	$('#button-next-chunk').click(
		function() {
			push_cnt++;
			console.log( push_cnt );

			if( push_cnt > max ) { //問題の最大チャンク数よりおおくボタンを押された瞬間に最後に表示していたチャンクを非表示
				push_cnt = max;
				$('.d'+(max) ).each( function(i, e){
					$(e).removeClass( 'on' ).addClass( 'off' );
				} );
				setTimeout(function(){
					alert("この問題は終了です。回答を行ってください。");
				}, 0);
				return;
			}

			if( push_cnt != 0 ) {		//今見ていたチャンクを非表示
				$('.d'+(push_cnt-1) ).each( function(i, e){
					$(e).removeClass( 'on' ).addClass( 'off' );
				} );
			}

			if( push_cnt <= max ) {		//次のチャンクを表示
				$('.d'+(push_cnt) ).each( function(i, e){
					$(e).removeClass( 'off' ).addClass( 'on' );
				} );
			}
		}
	);
} );

//正規表現
function escape_html(string) {
  if(typeof string !== 'string') {
    return string;
  }
  return string.replace(/[&'`"<>]/g, function(match) {
    return {
      '&': '&amp;',
      "'": '&#x27;',
      '`': '&#x60;',
      '"': '&quot;',
      '<': '&lt;',
      '>': '&gt;',
    }[match]
  });
}
