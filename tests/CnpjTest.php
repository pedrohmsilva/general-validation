<?php

use GeneralValidation\Cnpj;
use PHPUnit\Framework\TestCase;

class CnpjTest extends TestCase
{
    /**
     * @covers GeneralValidation\Cnpj::extract
     */
    public function testExtractValid()
    {
        $value = '94.972.261/0001-17';
        $expected = '94972261000117';

        $Cnpj = new Cnpj();
        $result = $Cnpj->extract($value);

        $this->assertEquals($expected, $result);
    }

    /**
     * @covers GeneralValidation\Cnpj::extract
     */
    public function testExtractInvalid()
    {
        $value = '123';
        $expected = '';
        
        $Cnpj = new Cnpj();
        $result = $Cnpj->extract($value);

        $this->assertEquals($expected, $result);
    }

    /**
     * @covers GeneralValidation\Cnpj::validate
     */
    public function testValidateWithoutPunctuationValid()
    {
        $value = '94972261000117';
        $expected = true;

        $Cnpj = new Cnpj();
        $result = $Cnpj->validate($value);

        $this->assertEquals($expected, $result);
    }

    /**
     * @covers GeneralValidation\Cnpj::validate
     */
    public function testValidateWithPunctuationValid()
    {
        $value = '94.972.261/0001-17';
        $expected = true;

        $Cnpj = new Cnpj();
        $result = $Cnpj->validate($value);

        $this->assertEquals($expected, $result);
    }

    /**
     * @covers GeneralValidation\Cnpj::validate
     */
    public function testValidateWithoutPunctuationInvalid()
    {
        $value = '12345678901234';
        $expected = false;

        $Cnpj = new Cnpj();
        $result = $Cnpj->validate($value);

        $this->assertEquals($expected, $result);
    }

    /**
     * @covers GeneralValidation\Cnpj::validate
     */
    public function testValidateWithPunctuationInvalid()
    {
        $value = '12.345.678/9012-34';
        $expected = false;

        $Cnpj = new Cnpj();
        $result = $Cnpj->validate($value);

        $this->assertEquals($expected, $result);
    }
}
