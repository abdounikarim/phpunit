<?php

namespace Tests\AppBundle\Service;

use AppBundle\Entity\Dinosaur;
use AppBundle\Entity\Security;
use Doctrine\ORM\EntityManager;
use AppBundle\Service\EnclosureBuilderService;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class EnclosureBuilderServiceIntegrationTest extends KernelTestCase
{
    public function testItBuildsEnclosureWithDefaultSpecification()
    {
        self::bootKernel();

        /** @var EnclosureBuilderService $enclosureBuilderService */
        $enclosureBuilderService = self::$kernel->getContainer()
            ->get('test.'.EnclosureBuilderService::class);

        $enclosureBuilderService->buildEnclosure();

        /** @var EntityManager $em */
        $em = self::$kernel->getContainer()->get('doctrine')->getManager();

        $count = (int) $em->getRepository(Security::class)
            ->createQueryBuilder('s')
            ->select('COUNT(s.id)')
            ->getQuery()
            ->getSingleScalarResult();

        $this->assertSame(1, $count, 'Amount of security systems is no the same');

        $count = (int) $em->getRepository(Dinosaur::class)
            ->createQueryBuilder('d')
            ->select('COUNT(d.id)')
            ->getQuery()
            ->getSingleScalarResult();

        $this->assertSame(3, $count, 'Amount of dinosaurs is no the same');
    }
}