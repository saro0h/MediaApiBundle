<?php

namespace Saro0h\MediaApiBundle\EventListener;

use JMS\Serializer\EventDispatcher\ObjectEvent;
use JMS\Serializer\EventDispatcher\Events;
use JMS\Serializer\EventDispatcher\EventSubscriberInterface;
use Saro0h\MediaApiBundle\Entity\Media;
use Symfony\Bundle\FrameworkBundle\Routing\Router;

class PostSerializeMediaListener implements EventSubscriberInterface
{
    private $webPath;

    public function __construct(Router $router)
    {
        $this->webPath = $router->getContext()->getScheme().'://'.$router->getContext()->getHost().':'.$router->getContext()->getHttpPort();
    }

    public function onPostSerialize(ObjectEvent $event)
    {
        $media = $event->getObject();

        if (!$media instanceof Media) {
            return;
        }

        $event->getVisitor()->addData('web_path', $this->webPath.'/'.$media->getFilename());
    }

    public static function getSubscribedEvents()
    {
        return array(
            array(
                'event' => Events::POST_SERIALIZE,
                'format' => 'json',
                'class' => 'Saro0h\MediaApiBundle\Entity\Media',
                'method' => 'onPostSerialize',
            )
        );
    }
}
