<?php 
    $destination = "tcp://59.136.95.107:25565";
    $socket = stream_socket_client($destination);

    if ($socket ===false) {
        print("ソケットの確立に失敗");
        exit();
    } else {
        // ソケットへの接続時お名前を入力する
        $yourName = readline(">>> Input your name ");
        while (true) {
            print("{$yourName}さん");
            $input = readline(">>> ");
            $sendingMessage = "{$yourName}:{$input}";
            fwrite($socket, $sendingMessage, strlen($sendingMessage));
            stream_set_timeout($socket, 1);
            // サーバー側からのレスポンスを取得
            while(true) {
                $read = fread($socket, 1024);
                print($read.PHP_EOL);
                if (strlen($read) === 0) {
                    break;
                }
            }
        }
    }
?>
