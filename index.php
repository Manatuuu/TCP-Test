<?php 
  $url = 'tcp://59.136.95.107:25565';
  $port = 25565;
  $timeout = 30;

  $fp = fsockopen( $url, $port, &$errno, &$errstr, $timeout );
  if( !$fp || $errno > 0 ) {
    print( "$errno ($errstr) \n" );
    exit();
  }

  while( true ) {
    print( 'input>' );
    // scanf関数は下のほう参照。
    $input = scanf();
    $send_text = sprintf( "%s %s\n", date( 'YmdHis' ), $input );

    print( 'SEND>>' . $send_text );
    fwrite( $fp, $send_text );
    print( 'RECV<<' . fgets( $fp, 4096 ) );

    if( $input == 'exit' ) {
      break;
    }
  }
  fclose( $fp );
  exit();
?>
