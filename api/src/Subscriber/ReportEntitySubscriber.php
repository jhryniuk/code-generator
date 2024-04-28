<?php

namespace App\Subscriber;

use App\Message\WeatherReportMessage;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Doctrine\ORM\Events;
use Symfony\Component\Messenger\MessageBusInterface;

class ReportEntitySubscriber implements EventSubscriber
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

    /**
     * @param LifecycleEventArgs $args
     * @return void
     */
    public function postPersist(LifecycleEventArgs $args)
    {
        $data = [
            'id' => ($args->getObject())->getId(),
            'link' => ($args->getObject())->getLink(),
            'city' => (($args->getObject())->getCity())->getName(),
        ];

        $this->bus->dispatch(new WeatherReportMessage(json_encode($data)));
    }
}