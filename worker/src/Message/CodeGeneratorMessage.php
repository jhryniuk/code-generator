<?php

namespace App\Message;

class CodeGeneratorMessage
{
    public function __construct(private string $message)
    {
    }

    public function getMessage(): string
    {
        return $this->message;
    }
}