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
        $this->assertSame(
            ['agpl', 'mit'],
            Params::ALLOWED_LICENSES,
            'Available license types not what was expected'
        );
    }

    public function testAllowedCategories()
    {
        $this->assertSame(
            [
                'multimedia',
                'tool',
                'pim',
                'other',
                'game',
                'productivity'
            ],
            Params::ALLOWED_CATEGORIES,
            'Available categories not what was expected'
        );
    }

    public function testDefaultAppVersion()
    {
        $this->assertSame(Params::DEFAULT_APP_VERSION, '0.0.1');
    }

    public function testDefaultOwnCloudVersion()
    {
        $this->assertSame(Params::DEFAULT_OWNCLOUD_VERSION, '9.0');
    }

    public function testDefaultLicense()
    {
        $this->assertSame(Params::DEFAULT_LICENSE, 'agpl');
    }

    /**
     * @dataProvider nameDataProvider
     * @param $name
     * @param $valid
     */
    public function testCanSetNameCorrectly($name, $valid)
    {
        if (!$valid) {
            $this->expectException(InvalidParameterSettingException::class);
            $this->expectExceptionMessage('Invalid value for name supplied');
        }

        $params = new Params();
        $params->setName($name);
    }

    public function nameDataProvider()
    {
        return [
            [
                'MyApp',
                true
            ],
            [
                'MyApp21',
                false
            ],
            [
                '21',
                false
            ],
            [
                '_lulbot__',
                false
            ]
        ];
    }
}
