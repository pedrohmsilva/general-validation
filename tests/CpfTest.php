<?php

use GeneralValidation\Cpf;
use PHPUnit\Framework\TestCase;

class CpfTest extends TestCase
{
    /**
     * @covers GeneralValidation\Cpf::extract
     */
    public function testExtractValid()
    {
        $value = '052.799.958-00';
        $expected = '05279995800';

        $Cpf = new Cpf();
        $result = $Cpf->extract($value);

        $this->assertEquals($expected, $result);
    }

    /**
     * @covers GeneralValidation\Cpf::extract
     */
    public function testExtractInvalid()
    {
        $value = '123';
        $expected = '';
        
        $Cpf = new Cpf();
        $result = $Cpf->extract($value);

        $this->assertEquals($expected, $result);
    }

    /**
     * @covers GeneralValidation\Cpf::validate
     */
    public function testValidateValid()
    {
        $value = '05279995800';
        $expected = true;

        $Cpf = new Cpf();
        $result = $Cpf->validate($value);

        $this->assertEquals($expected, $result);
    }

    /**
     * @covers GeneralValidation\Cpf::validate
     */
    public function testValidateInvalid()
    {
        $value = '12345678901';
        $expected = false;

        $Cpf = new Cpf();
        $result = $Cpf->validate($value);

        $this->assertEquals($expected, $result);
    }

    /**
     * @covers GeneralValidation\Cpf::extractAndValidate
     */
    public function testExtractAndValidateValid()
    {
        $value = '052.799.958-00';
        $expected = true;

        $Cpf = new Cpf();
        $result = $Cpf->extractAndValidate($value);

        $this->assertEquals($expected, $result);
    }

    /**
     * @covers GeneralValidation\Cpf::extractAndValidate
     */
    public function testExtractAndValidateInvalid()
    {
        $value = '123.456.789-01';
        $expected = false;

        $Cpf = new Cpf();
        $result = $Cpf->extractAndValidate($value);

        $this->assertEquals($expected, $result);
    }
}
