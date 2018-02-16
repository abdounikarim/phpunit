<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="dinosaurs")
 */
class Dinosaur
{
    const LARGE = 10;
    const HUGE = 20;
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

    /**
     * @return string
     */
    public function getGenus(): string
    {
        return $this->genus;
    }

    /**
     * @param string $genus
     */
    public function setGenus(string $genus)
    {
        $this->genus = $genus;
    }

    public function isCarnivorous()
    {
        return $this->isCarnivorous;
    }
}