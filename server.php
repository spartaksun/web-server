<?php
/**
 * Created by A.Belyakovskiy.
 * Date: 10/21/15
 * Time: 12:10 AM
 */

$socket = socket_create(AF_INET, SOL_SOCKET, SOL_TCP);
socket_bind($socket, '127.0.0.1', 8888);
socket_listen($socket);

while (true) {
    $result = socket_accept($socket);
    if (is_resource($result)) {
        $text = 'TIME IS ' . time();
        socket_write($result, 'HTTP/1.1 200 OK
Content-Length: ' . strlen($text) . '
Connection: close


' . $text . '
    ');
        socket_close($result);
    }
}