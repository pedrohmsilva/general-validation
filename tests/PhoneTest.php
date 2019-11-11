<?php

use GeneralValidation\Phone;
use PHPUnit\Framework\TestCase;

class PhoneTest extends TestCase
{
    /**
     * @covers GeneralValidation\Phone::extract
     */
    public function testExtractValid()
    {
        $value = '+55 (14) 9 9123-4567';
        $expected = '5514991234567';

        $Phone = new Phone();
        $result = $Phone->extract($value);

        $this->assertEquals($expected, $result);
    }

    /**
     * @covers GeneralValidation\Phone::validate
     */
    public function testValidateValid()
    {
        $value = '5514991234567';
        $expected = true;

        $Phone = new Phone();
        $result = $Phone->validate($value);

        $this->assertEquals($expected, $result);
    }

    /**
     * @covers GeneralValidation\Phone::validate
     */
    public function testValidateInvalid()
    {
        $value = '00112233445';
        $expected = false;

        $Phone = new Phone();
        $result = $Phone->validate($value);

        $this->assertEquals($expected, $result);
    }

    /**
     * @covers GeneralValidation\Phone::extractAndValidate
     */
    public function testExtractAndValidateValid()
    {
        $value = '+55 (14) 9 9123-4567';
        $expected = true;

        $Phone = new Phone();
        $result = $Phone->extractAndValidate($value);

        $this->assertEquals($expected, $result);
    }

    /**
     * @covers GeneralValidation\Phone::extractAndValidate
     */
    public function testExtractAndValidateInvalid()
    {
        $value = '+55 (00) 1 2345-6789';
        $expected = false;

        $Phone = new Phone();
        $result = $Phone->extractAndValidate($value);

        $this->assertEquals($expected, $result);
    }
}
