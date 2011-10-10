<?php
/**
 * 
 * @author Ed van Beinum <edwin@sessiondigital.com>
 * @version $Id$
 * @copyright Ibuildings 12/09/2011
 * @package BowlingGameTest 
 */

include '../StringCalculator.php';
 
 /**
 * 
 * @package BowlingGameTest
 * @author Ed van Beinum <edwin@sessiondigital.com>
 */
class StringCalculatorTest  extends PHPUnit_Framework_TestCase {

    protected $_stringCalc;

    public function setUp()
    {
        $this->_stringCalc = new StringCalculator();
    }

    public function test_add_returns_zero_with_no_args()
    {
        $this->assertSame(0, $this->_stringCalc->add());
    }

    public function test_add_returns_zero_when_passed_zero()
    {
        $this->assertSame(0, $this->_stringCalc->add('0'));
    }

    public function test_add_returns_int_when_passed_as_string()
    {
        $this->assertSame(1, $this->_stringCalc->add('1'));
    }

    public function test_add_returns_sum_of_ints_when_passed_as_string()
    {
        $this->assertSame(2, $this->_stringCalc->add('1 1'));
        $this->assertSame(4, $this->_stringCalc->add('1 1 2'));
    }

    public function test_add_returns_sum_of_ints_with_white_space_when_passed_as_string()
    {
        $this->assertSame(2, $this->_stringCalc->add("1\t1"));
        $this->assertSame(4, $this->_stringCalc->add("1\n1\n2"));
    }

    public function test_add_can_use_custom_separator()
    {
        $this->assertSame(5, $this->_stringCalc->add('1,1,3', ','));
    }

    /**
     * @return void
     * @expectedException Exception
     */
    public function test_add_throws_exception_with_negative_number()
    {
        $this->_stringCalc->add('-1');
    }

    /**
     * @return void
     * @expectedException MultipleNegativeNumberException
     */
    public function test_add_throws_exception_with_multiple_negative_numbers()
    {
        $this->_stringCalc->add('-1 -3');
    }
}
