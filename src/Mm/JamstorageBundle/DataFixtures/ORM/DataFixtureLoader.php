<?php

namespace Mm\JamstorageBundle\DataFixtures\ORM;

use Hautelook\AliceBundle\Alice\DataFixtureLoader;
use Nelmio\Alice\Fixtures;

class TestLoader extends DataFixtureLoader
{
    /**
     * {@inheritDoc}
     */
    protected function getFixtures()
    {
        return  array(
            __DIR__ . '/data.yml',

        );
    }
}

