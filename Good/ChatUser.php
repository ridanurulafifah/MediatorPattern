<?php

// Concrete Colleague
class ChatUser implements User
{
    private $name;
    private $chatRoom;
    private $chatLog;

    public function __construct($name)
    {
        $this->name = $name;
        $this->chatLog = array();
    }

    public function sendMessage($message)
    {
        $this->chatRoom->sendMessage($this, $message);
    }

    public function receiveMessage($from, $message)
    {
        $this->chatLog[] = $from->getName() . ': ' . $message;
        echo $this->getName() . ' received message from ' . $from->getName() . ': ' . $message . "<br>";
    }

    public function setChatRoom(ChatRoom $chatRoom)
    {
        $this->chatRoom = $chatRoom;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getChatLog()
    {
        return $this->chatLog;
    }
}
?>