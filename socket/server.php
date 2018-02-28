<?php
include __DIR__ . '/start.php';
$users = \App\User::find(1);
echo $users['name'];die;
//创建websocket服务器对象，监听0.0.0.0:9502端口
$ws = new swoole_websocket_server("0.0.0.0", 9502);

//监听WebSocket连接打开事件
$ws->on('open', function ($ws, $request)use($user) {
//    var_dump($request->fd, $request->get, $request->server);
    foreach($ws->connections as $key => $fd) {
        $ws->push($fd, "hello, $user.$request->fd\n");
    }
});

//监听WebSocket消息事件
$ws->on('message', function ($ws, $frame) {
    echo "Message: {$frame->data}\n";
    $ws->push($frame->fd, "server: {$frame->data}");
});

//监听WebSocket连接关闭事件
$ws->on('close', function ($ws, $fd) {
    echo "client-{$fd} is closed\n";
});

$ws->start();