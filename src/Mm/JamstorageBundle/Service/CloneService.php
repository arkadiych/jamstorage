<?php

namespace Mm\JamstorageBundle\Service;


class CloneService
{
    /**
     * Clone Object
     * @param $object
     */
    public function cloneObject($object)
    {
        return clone $object;
    }
}
 