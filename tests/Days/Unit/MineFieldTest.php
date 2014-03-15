<?php

namespace Days\Unit;

use Days\MineField;

/**
 * Class MineFieldTest
 * @package Days\Unit
 */
class MineFieldTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var MineField
     */
    private $object;

    /**
     * PHPUnit setUp
     */
    public function setUp()
    {
        $this->object = new MineField();
    }

    /**
     * @test
     */
    public function it_should_process_mine_field_and_return_hint()
    {
        $input = array(
            array('*','.','.','.'),
            array('.','.','*','.'),
            array('.','.','.','.'),

        );

        $expected = array(
            array('*', 2, 1, 1),
            array(1, 2, '*', 1),
            array(0, 1, 1, 1),
        );
        $hint = $this->object->provideHint($input);

        $this->assertEquals($expected ,$hint);
    }

}
 