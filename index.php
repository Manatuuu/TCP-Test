<?php 
    if (($sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)) === false) {
        die("socket_create() failed: ".socket_strerror(socket_last_error()));
    }

    if (socket_connect($sock, '127.0.0.1', 5000) === false) {
        die("socket_connect() failed: ".socket_strerror(socket_last_error()));
    }

    $buf = "NICK:Test\n";
    socket_write($sock, $buf, strlen($buf));
    echo socket_read($sock, strlen($buf));

    $buf = "Hello\n";
    socket_write($sock, $buf, strlen($buf));
    echo socket_read($sock, strlen($buf));
?>
