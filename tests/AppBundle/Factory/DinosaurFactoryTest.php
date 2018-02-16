<?php

namespace Tests\AppBundle\Factory;

use AppBundle\Entity\Dinosaur;
use PHPUnit\Framework\TestCase;
use AppBundle\Factory\DinosaurFactory;

class DinosaurFactoryTest extends TestCase
{
    /**
     * @var DinosaurFactory
     */
    private $factory;

    public function setUp()
    {
        $this->factory = new DinosaurFactory();
    }

    public function testItGrowsAVelociraptor()
    {
        $dinosaur = $this->factory->growVelociraptor(5);

        $this->assertInstanceOf(Dinosaur::class, $dinosaur);
        $this->assertInternalType('string', $dinosaur->getGenus());
        $this->assertSame('Velociraptor', $dinosaur->getGenus());
        $this->assertSame(5, $dinosaur->getLength());
    }

    public function testItGrowsATriceraptor()
    {
        $this->markTestIncomplete('Waiting for confirmation from GenLab');
    }

    public function testItGrowsABabyVelociraptor()
    {
        if(!class_exists('Nanny')) {
            $this->markTestSkipped('There is nobody to watch the baby');
        }
        $dinosaur = $this->factory->growVelociraptor();
        $this->assertSame(1, $dinosaur->getLength());
    }
}