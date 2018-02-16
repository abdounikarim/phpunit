<?php

namespace Tests\AppBundle\Entity;

use AppBundle\Entity\Dinosaur;
use AppBundle\Exception\NotABuffetException;
use PHPUnit\Framework\TestCase;
use AppBundle\Entity\Enclosure;

class EnclosureTest extends TestCase
{
    public function testItHasNoDinosaurByDefault()
    {
        $enclosure = new Enclosure();
        $this->assertEmpty($enclosure->getDinosaurs());
    }

    public function testItHadDinosaurs()
    {
        $enclosure = new Enclosure();
        $enclosure->addDinosaur(new Dinosaur());
        $enclosure->addDinosaur(new Dinosaur());

        $this->assertCount(2, $enclosure->getDinosaurs());
    }

    public function testItDoesNotAllowCarnivorousDinosaursToMixWithHerbivores()
    {
        $enclosure = new Enclosure();
        $enclosure->addDinosaur(new Dinosaur());
        $this->expectException(NotABuffetException::class);
        $enclosure->addDinosaur(new Dinosaur('Velociraptor', true));
    }

    /**
     * @expectedException \AppBundle\Exception\NotABuffetException
     */
    public function testItDoesNotAllowToAddNonCarnivorousDinosaursToCarnivorousEnclosure()
    {
        $enclosure = new Enclosure();
        $enclosure->addDinosaur(new Dinosaur('Velociraptor', true));
        $enclosure->addDinosaur(new Dinosaur());
    }
}