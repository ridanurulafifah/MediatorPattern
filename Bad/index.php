<?php

require_once 'ChatUser.php';

// Client code
$user1 = new ChatUser('John');
$user2 = new ChatUser('Alice');
$user3 = new ChatUser('Bob');

$user1->addUser($user2);
$user1->addUser($user3);

$user2->addUser($user1);
$user2->addUser($user3);

$user3->addUser($user1);
$user3->addUser($user2);

$user1->sendMessage('Hello, everyone!');
$user2->sendMessage('Hi, John!');
$user3->sendMessage('Hey, guys!');

?>