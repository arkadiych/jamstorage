<?php

namespace Mm\JamstorageBundle\Service;

use Doctrine\Bundle\DoctrineBundle\Registry;
use Mm\JamstorageBundle\Service\CloneService;

class JamJarService
{
    const ENTITY_CLASS = 'MM\JamstorageBundle\Entity\JamJar';

    /**
     * @var \Doctrine\Bundle\DoctrineBundle\Registry
     */
    private $doctrine;

    /**
     * @var \Mm\JamstorageBundle\Service\CloneService
     */
    private $cloneService;


    public function __construct(Registry $doctrine, CloneService $cloneService)
    {
        $this->doctrine     = $doctrine;
        $this->cloneService = $cloneService;
    }

    /**
     * Create Entities
     * @param $object
     * @param $amount number of entities
     */
    public function createEntities($object, $amount)
    {
        $em = $this->doctrine->getManager();
        for($i=0; $i<$amount; $i++) {
            $tmpObj = $this->cloneService->cloneObject($object);
            $em->persist($tmpObj);
            $em->flush();
        }
    }
}
 