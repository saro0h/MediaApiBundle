<?php

namespace Saro0h\MediaApiBundle\Media;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Saro0h\MediaApiBundle\Entity\Media;
use Doctrine\ORM\EntityManager;
use Psr\Log\LoggerInterface;

class MediaHandler
{
    private $kernel;
    private $entityManager;
    private $logger;
    private $path;
    private $internalPath;

    public function __construct(\AppKernel $kernel, EntityManager $entityManager, LoggerInterface $logger, $path)
    {
        $this->kernel = $kernel;
        $this->entityManager = $entityManager;
        $this->logger = $logger;
        $this->path = $path;

        $this->internalPath = $this->kernel->getRootDir().'/../web/';
    }

    public function upload(UploadedFile $file, $filename = null)
    {
        if (is_null($filename)) {
            $filename = $this->generateName();
        }

        $file = $file->move($this->internalPath.$this->path, $filename.'.'.$file->guessExtension());

        $this->logger->info(sprintf('The file has been moved to "%s"', $this->path));

        $media = new Media();
        $media->setFilename($this->path.$file->getFilename());
        $media->setSize($file->getSize());

        $this->entityManager->persist($media);
        $this->entityManager->flush();

        $this->logger->info(sprintf('The media "%s" has been persisted.', $media->getFilename()));

        return $media;
    }

    private function generateName()
    {
        return UuidGenerator::generate();
    }
}
