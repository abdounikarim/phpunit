<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="dinosaurs")
 */
class Dinosaur
{
    /**
     * @ORM\Column(type="integer")
     */
    private $length = 0;
    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $genus;
    /**
     * @var bool
     * @ORM\Column(type="boolean")
     */
    private $isCarnivorous;

    public function __construct(string $genus = 'Unknown', bool $isCarnivorous = false)
    {

        $this->genus = $genus;
        $this->isCarnivorous = $isCarnivorous;
    }

    /**
     * @return mixed
     */
    public function getLength(): int
    {
        return $this->length;
    }

    /**
     * @param mixed $length
     */
    public function setLength($length)
    {
        $this->length = $length;
    }

    public function getSpecification(): string
    {
        return sprintf(
            'The %s %scarnivorous dinosaur is %d meters long',
            $this->genus,
            $this->isCarnivorous ? '' : 'non-',
            $this->length
        );
    }

}