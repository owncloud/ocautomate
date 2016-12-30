<?php

namespace StartappTest;

use Startapp\Params;

class ParamsTest extends \PHPUnit_Framework_TestCase
{
    public function testReturnsTheCorrectDate()
    {
        $params = new Params();
        $this->assertSame(date('y'), $params->getDate(), "Expected date not returned");
    }

    public function testLicenseTypes()
    {
        $params = new Params();
        $this->assertSame(
            ['agpl', 'mit'],
            $params::ALLOWED_LICENSES,
            'Available license types not what was expected'
        );
    }

    public function testAllowedCategories()
    {
        $params = new Params();
        $this->assertSame(
            [
                'multimedia',
                'tool',
                'pim',
                'other',
                'game',
                'productivity'
            ],
            $params::ALLOWED_CATEGORIES,
            'Available categories not what was expected'
        );
    }
}
