<?php

namespace App\Subscriber;

use App\Message\CodeGeneratorMessage;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Events;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Component\Messenger\MessageBusInterface;

class CodeEntitySubscriber implements EventSubscriber
{
    public function __construct(
        private MessageBusInterface $bus
    ) {}
    public function getSubscribedEvents()
    {
        return [
            Events::postPersist,
        ];
    }

    public function postPersist(LifecycleEventArgs $args)
    {
        $id = ($args->getObject())->getId();
        $this->bus->dispatch(new CodeGeneratorMessage("$id"));
    }
}