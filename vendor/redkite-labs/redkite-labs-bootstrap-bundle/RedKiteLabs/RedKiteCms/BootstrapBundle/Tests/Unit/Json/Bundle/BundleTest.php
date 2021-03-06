<?php
/*
 * This file is part of the RedKiteLabsBootstrapBundle and it is distributed
 * under the MIT License. To use this bundle you must leave
 * intact this copyright notice.
 *
 * Copyright (c) RedKite Labs <info@redkite-labs.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * For extra documentation and help please visit http://redkite-labs.com
 *
 * @license    MIT License
 */

namespace RedKiteLabs\RedKiteCms\BootstrapBundle\Tests\Unit\Json;

use org\bovigo\vfs\vfsStream;
use RedKiteLabs\RedKiteCms\BootstrapBundle\Tests\TestCase;
use RedKiteLabs\RedKiteCms\BootstrapBundle\Core\Json\Bundle\Bundle;


/**
 * BundleTest
 *
 * @author RedKite Labs <info@redkite-labs.com>
 */
class BundleTest extends TestCase
{
    private $bundle;

    protected function setUp()
    {
        parent::setUp();
        
        $this->bundle = new Bundle();
    }
    
    /**
     * @expectedException \RedKiteLabs\RedKiteCms\BootstrapBundle\Core\Exception\InvalidJsonParameterException
     * @expectedExceptionMessage The class RedKiteLabs\Block\BusinessCarouselFakeBundle\BusinessCarouselBundl does not seem to be a valid bundle class. Check your autoloader.json file
     */
    public function testAnExceptionIsThrownWhenTheGivenClassIsInvalid()
    {
        $this->bundle->setClass("RedKiteLabs\\Block\\BusinessCarouselFakeBundle\\BusinessCarouselBundl");
    }
    
    public function testSettingTheClassPropertySetsTheBundleIdToo()
    {
        $this->assertNull($this->bundle->getName());
        $this->bundle->setClass("RedKiteLabs\\Block\\BusinessCarouselFakeBundle\\BusinessCarouselFakeBundle");
        $this->assertEquals("RedKiteLabs\\Block\\BusinessCarouselFakeBundle\\BusinessCarouselFakeBundle", $this->bundle->getClass());        
        $this->assertEquals("BusinessCarouselFakeBundle", $this->bundle->getName());
    }
    
    public function testSetTheOverridesProperty()
    {
        $overridesValue = array("BusinessCarouselFakeBundle");
        $this->bundle->setOverrides($overridesValue);
        $this->assertEquals($overridesValue, $this->bundle->getOverrides());
    }
    
    
}