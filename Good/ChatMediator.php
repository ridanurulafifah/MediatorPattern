<?php

// Mediator interface
interface ChatMediator
{
    public function sendMessage($user, $message);
    public function addUser(User $user);
}
?>