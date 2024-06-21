<?php

// Mediator interface
interface ChatMediator {
    public function sendMessage($user, $message);
    public function addUser(User $user);
}

// Concrete Mediator
class ChatRoom implements ChatMediator {
    private $users;

    public function __construct() {
        $this->users = array();
    }

    public function sendMessage($user, $message) {
        foreach ($this->users as $u) {
            if ($u !== $user) {
                $u->receiveMessage($user, $message);
            }
        }
    }

    public function addUser(User $user)
    {
        if ($user instanceof ChatUser) {
            $this->users[] = $user;
            $user->setChatRoom($this);
        }
    }
}

// Colleague interface
interface User {
    public function sendMessage($message);
    public function receiveMessage($from, $message);
}

// Concrete Colleague
class ChatUser implements User {
    private $name;
    private $chatRoom;
    private $chatLog;

    public function __construct($name) {
        $this->name = $name;
        $this->chatLog = array();
    }

    public function sendMessage($message) {
        $this->chatRoom->sendMessage($this, $message);
    }

    public function receiveMessage($from, $message) {
        $this->chatLog[] = $from->getName() . ': ' . $message;
        echo $this->getName() . ' received message from ' . $from->getName() . ': ' . $message . "\n";
    }

    public function setChatRoom(ChatRoom $chatRoom) {
        $this->chatRoom = $chatRoom;
    }

    public function getName() {
        return $this->name;
    }

    public function getChatLog() {
        return $this->chatLog;
    }
}

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