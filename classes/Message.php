<?php

class Message
{
    public function create($type, $text)
    {
        $_SESSION["message_type"] = $type;
        $_SESSION["message_text"] = $text;
    }
}
