var net = require( 'net' );

//. 接続先 IP アドレスとポート番号
var host = '59.136.95.107';
var port = 7788;

//. 接続
var client = new net.Socket();
client.connect( port, host, function(){
  console.log( '接続: ' + host + ':' + port );

  //. サーバーへメッセージを送信
  client.write( 'ハロー' );
});

//. サーバーからメッセージを受信したら、その内容を表示する
client.on( 'data', function( data ){
  console.log( data );
});

//. 接続が切断されたら、その旨をメッセージで表示する
client.on( 'close', function(){
  console.log( '切断' );
})
