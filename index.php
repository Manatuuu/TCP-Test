<?php 
if (($sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)) === false) {
    die("socket_create() failed: ".socket_strerror(socket_last_error()));
}

if (socket_connect($sock, '59.136.95.107', 25565) === false) {
    die("socket_connect() failed: ".socket_strerror(socket_last_error()));
}

$buf = "NICK:Test\n";
socket_write($sock, $buf, strlen($buf));
echo socket_read($sock, strlen($buf));

$buf = "hellowwwwww\n";
socket_write($sock, $buf, strlen($buf));
echo socket_read($sock, strlen($buf));
while(true){
    echo socket_read($sock, strlen($buf));
}
?>
