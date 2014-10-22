<?php

namespace Saro0h\MediaApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="media")
 */
class Media
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="bigint")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * File path relative to the filesystem (provider) used.
     *
     * @ORM\Column(type="string")
     * @var string
     */
    protected $filename;

    /**
     * File size.
     *
     * @ORM\Column(type="integer")
     * @var integer
     */
    protected $size;

    /**
     * Set uploaded file to fit the media object.
     * This method is called in the HttpUploadHandler.
     */
    public function setFile(UploadedFile $uploaded)
    {
        $this->filename = $uploaded->getFile()->getName();
        $this->size = $uploaded->getFile()->getSize();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * @param string $filename
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;
    }

    /**
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param int $size
     */
    public function setSize($size)
    {
        $this->size = $size;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
}
