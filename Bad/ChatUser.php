<?php

class ChatUser
{
    private $name;
    private $chatLog;
    private $otherUsers = [];

    public function __construct($name)
    {
        $this->name = $name;
        $this->chatLog = array();
    }

    public function addUser(ChatUser $user)
    {
        $this->otherUsers[] = $user;
    }

    public function sendMessage($message)
    {
        foreach ($this->otherUsers as $user) {
            $user->receiveMessage($this, $message);
        }
    }

    public function receiveMessage($from, $message)
    {
        $this->chatLog[] = $from->getName() . ': ' . $message;
        echo $this->getName() . ' received message from ' . $from->getName() . ': ' . $message . "<br>";
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