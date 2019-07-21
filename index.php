<?php 
    if (($sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)) === false) {
        die("socket_create() failed: ".socket_strerror(socket_last_error()));
    }

    if (socket_connect($sock, '59.136.95.107', 25565) === false) {
        die("socket_connect() failed: ".socket_strerror(socket_last_error()));
    }

    $buf = "NICK:Test\n";
    socket_write($sock, $buf, strlen($buf));
    //echo socket_read($sock, strlen($buf));

    $buf = "Hello\n";
    socket_write($sock, $buf, strlen($buf));
    //echo socket_read($sock, strlen($buf));
    echo socket_read($sock, 1024);
    function console_log( $data ){
        echo '<script>';
        echo 'console.log('. json_encode( $data ) .')';
        echo '</script>';
    }

    console_log( "test" );

    $task = new class extends Thread {
        private $response;

        public function run()
        {
            while(true){
                echo socket_read($sock, 1024);
            }
        }
    };

    $task->start() && $task->join();

    var_dump($task->response);

?>
