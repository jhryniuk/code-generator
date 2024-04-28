<?php

namespace App\MessageHandler;

use App\Message\WeatherReportMessage;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Contracts\Service\Attribute\Required;

#[AsMessageHandler]
class WeatherReportMessageHandler
{
    private LoggerInterface $logger;
    public function __invoke(WeatherReportMessage $message)
    {
        $data = json_decode($message->getMessage(), true);
        $this->logger->debug('Received message', ['id' => $data['id'], 'city' => $data['city']]);
    }

    #[Required]
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

}