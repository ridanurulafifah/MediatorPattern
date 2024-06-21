<?php

require_once 'ChatMediator.php';
require_once 'ChatRoom.php';
require_once 'User.php';
require_once 'ChatUser.php';

// Client code
$chatRoom = new ChatRoom();

$user1 = new ChatUser('John');
$user2 = new ChatUser('Alice');
$user3 = new ChatUser('Bob');

$chatRoom->addUser($user1);
$chatRoom->addUser($user2);
$chatRoom->addUser($user3);

$user1->sendMessage('Hello, everyone!');
$user2->sendMessage('Hi, John!');
$user3->sendMessage('Hey, guys!');

?>