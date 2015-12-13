<?php

use Xinc\Getopt\Argument;

class ArgumentTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructor()
    {
        $argument1 = new Argument();
        $argument2 = new Argument(10);
        $argument3 = new Argument("");
        $argument4 = new Argument(0);
        $this->assertFalse($argument1->hasDefaultValue());
        $this->assertTrue($argument2->hasDefaultValue());
        $this->assertTrue($argument3->hasDefaultValue());
        $this->assertTrue($argument4->hasDefaultValue());
        $this->assertEquals(10, $argument2->getDefaultValue());
        $this->assertEquals("",$argument3->getDefaultValue());
        $this->assertEquals(0,$argument4->getDefaultValue());
    }

    public function testSetDefaultValueNotScalar()
    {
        $this->setExpectedException('InvalidArgumentException');
        $argument = new Argument();
        $argument->setDefaultValue(array());
    }

    public function testValidates()
    {
        $test = $this;
        $argument = new Argument();
        $argument->setValidation(function ($arg) use ($test, $argument) {
            $test->assertEquals('test', $arg);

            return true;
        });
        $this->assertTrue($argument->hasValidation());
        $this->assertTrue($argument->validates('test'));
    }

    public function testSetValidationUncallable()
    {
        $this->setExpectedException('InvalidArgumentException');
        $argument = new Argument();
        $argument->setValidation('');
    }
}
