<?php
//require_once __DIR__ . '/vendor/autoload.php';
//use PhpAmqpLib\Connection\AMQPStreamConnection;
//
//$connection = new AMQPStreamConnection('rabbitmq', 5672, 'user', 'user');
//$channel = $connection->channel();
//
//$channel->queue_declare('right', false, false, false, false);
//
//echo " [*] Waiting for messages. To exit press CTRL+C\n";
//
//$callback = function ($msg) {
//    echo ' [x] Received ', $msg->body, "\n";
//};
//
//$channel->basic_consume('right', '', false, true, false, false, $callback);
//
//try {
//    $channel->consume();
//} catch (\Throwable $exception) {
//    echo $exception->getMessage();
//}
