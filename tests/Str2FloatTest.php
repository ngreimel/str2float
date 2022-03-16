<?php

include __DIR__ . '/../str2float.php';

class Str2FloatTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @group regression
     */
    public function testZero()
    {
        $this->assertSame('0.00', str2float('0'));
    }

    /**
     * @group regression
     */
    public function testOne()
    {
        $this->assertSame('1.00', str2float('1'));
    }

    /**
     * @group regression
     */
    public function testTenPointOne()
    {
        $this->assertSame('10.10', str2float('10.1'));
    }

    /**
     * @group regression
     */
    public function testTenPointOneTwo()
    {
        $this->assertSame('10.12', str2float('10.12'));
    }

    /**
     * @group regression
     */
    public function testTenPointOneTwoThree()
    {
        $this->assertSame('10.12', str2float('10.123'));
    }

    /**
     * @group regression
     */
    public function testTenPointOneZero()
    {
        $this->assertSame('10.10', str2float('10.10'));
    }

    /**
     * @group regression
     */
    public function testNegativeTen()
    {
        $this->assertSame('-10.00', str2float('-10'));
    }

    /**
     * @group regression
     */
    public function testNegativeTenPointTwo()
    {
        $this->assertSame('-10.20', str2float('-10.2'));
    }

    /**
     * @group bug1
     */
    public function testTenPointNothing()
    {
        // $this->markTestSkipped('Bug #1');
        $this->assertSame('10.00', str2float('10.'), 'Bug #1: Numbers with trailing decimals fail.');
    }

    /**
     * @group regression
     */
    public function testDollarTenPointTwo()
    {
        $this->assertSame('$10.20', str2float('$10.2'));
    }

    /**
     * @group regression
     */
    public function testNegativeDollarTenPointTwo()
    {
        $this->assertSame('-$10.20', str2float('-$10.2'));
    }

    /**
     * @group bug2
     */
    public function testTenPointTwoZeroPointThree()
    {
        // $this->markTestSkipped('Bug #2');
        $this->expectException(InvalidArgumentException::class);
        str2float('10.20.3');
    }
}
