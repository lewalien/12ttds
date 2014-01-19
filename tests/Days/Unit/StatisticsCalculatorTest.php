<?php

namespace Days\Unit;

use Days\StatisticsCalculator;

/**
 * Class StatisticsCalculatorTest
 * @package Days\Unit
 */
class StatisticsCalculatorTest extends \PHPUnit_Framework_TestCase
{
    private $object;

    public function setUp()
    {
        $this->object = new StatisticsCalculator(array(4, 52, 9, -2, 101, 75));
    }

    public function testMinimiumValue()
    {
        $this->assertEquals(-2, $this->object->getMinimiumValue());
    }

    public function testGetMaximiumNumber()
    {
        $this->assertEquals(101, $this->object->getMaximiumValue());
    }

    public function testGetNumberOfValues()
    {
        $this->assertEquals(6, $this->object->getNumberOfValues());
    }

    public function testGetAverage()
    {
        $this->assertEquals(39.833333333333, $this->object->getAverage());
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage All values need to be a number
     */
    public function testEnsureAllValuesAreNumbers()
    {
        new StatisticsCalculator(array(1, 3, 6, 'eight'));
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage Please supply a range of numbers
     */
    public function testMinimumValueIfNumbersArrayEmpty()
    {
        new StatisticsCalculator(array());
    }
}
 