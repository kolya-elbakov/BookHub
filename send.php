<?php
require_once __DIR__ . '/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$connection = new AMQPStreamConnection('rabbitmq', 5672, 'user', 'user');
$channel = $connection->channel();

$channel->queue_declare('right', false, false, false, false);

$msg = new AMQPMessage('Know!');
$channel->basic_publish($msg, '', 'right');

echo "Now i know this\n";

$channel->close();
$connection->close();
