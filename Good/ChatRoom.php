<?php

// Concrete Mediator
class ChatRoom implements ChatMediator
{
    private $users;

    public function __construct()
    {
        $this->users = array();
    }

    public function sendMessage($user, $message)
    {
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

?>
