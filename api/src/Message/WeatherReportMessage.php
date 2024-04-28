<?php

namespace App\Message;

class WeatherReportMessage
{
    public function __construct(private string $message)
    {}

    public function getMessage(): string
    {
        return $this->message;
    }
}