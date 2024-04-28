<?php

namespace App\MessageHandler;

use App\Message\CodeGeneratorMessage;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class CodeGeneratorMessageHandler
{
    public function __invoke(CodeGeneratorMessage $message)
    {
    }
}