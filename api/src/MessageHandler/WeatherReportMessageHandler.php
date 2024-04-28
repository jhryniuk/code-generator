<?php

namespace App\MessageHandler;

use App\Message\WeatherReportMessage;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class WeatherReportMessageHandler
{
    public function __invoke(WeatherReportMessage $message)
    {
        echo 'Sending weather report';
    }
}