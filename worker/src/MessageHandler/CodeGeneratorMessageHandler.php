<?php

namespace App\MessageHandler;

use App\Message\CodeGeneratorMessage;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\Service\Attribute\Required;

#[AsMessageHandler]
class CodeGeneratorMessageHandler
{
    private LoggerInterface $logger;

    public function __construct(
        private HttpClientInterface $client
    ) {
    }
    public function __invoke(CodeGeneratorMessage $message)
    {
        $code = md5(uniqid(rand(), true));
        $id = $message->getMessage();
        $this->logger->debug("Received message", ['message' => $id]);
        $response = $this->client->request(
            'PUT',
            "http://nginx/api/codes/${id}",
            [
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ],
                'body' => json_encode(['code' => $code])
            ]
        );


        $this->logger->debug("Status code", ['code' => $response->getStatusCode()]);
    }

    #[Required]
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
}