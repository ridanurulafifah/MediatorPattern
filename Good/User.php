<?php

interface User
{
    public function sendMessage($message);
    public function receiveMessage($from, $message);
}

?>