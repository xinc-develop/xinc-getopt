<?php

use Xinc\Getopt\Value;

class ValueTest extends \PHPUnit_Framework_TestCase
{
    public function testBooleanValues()
    {
        $val1 = new Value(true);
        $this->assertTrue($val1->getValue());
        $this->assertFalse($val1->getIsDefault());
        $this->assertNotEquals('',$val1);

        $val2 = new Value(false);
        $this->assertFalse($val2->getValue());
        $this->assertFalse($val2->getIsDefault());
        $this->assertEquals('',$val2);
    }
}
