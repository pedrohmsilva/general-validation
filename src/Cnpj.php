<?php

namespace GeneralValidation;

class Cnpj
{
    /**
     * Extract CNPJ document.
     *
     * @param string $value
     * @return string
     */
    public function extract(string $value): string
    {
        $value = preg_replace('/[^0-9]/', '', $value);
        $regex = '/([0-9]{2}[\.]?[0-9]{3}[\.]?[0-9]{3}[\/]?[0-9]{4}[-]?[0-9]{2})|';
        $regex .= '([0-9]{3}[\.]?[0-9]{3}[\.]?[0-9]{3}[-]?[0-9]{2})/';

        if (preg_match($regex, $value, $matches)) {
            return str_pad(
                $matches[0],
                14,
                '0',
                STR_PAD_LEFT
            );
        }
        
        return '';
    }

    /**
     * Validate CNPJ document.
     *
     * @param string $value
     * @return bool
     */
    public function validate(string $value): bool
    {
        $value = preg_replace('/[^0-9]/', '', $value);
        
        if (strlen($value) != 14) {
            return false;
        }
        
        $invalidValues = [
            '00000000000000',
            '11111111111111',
            '22222222222222',
            '33333333333333',
            '44444444444444',
            '55555555555555',
            '66666666666666',
            '77777777777777',
            '88888888888888',
            '99999999999999'
        ];

        if (in_array($value, $invalidValues)) {
            return false;
        }

        for ($i = 0, $j = 5, $sum = 0; $i < 12; $i++) {
            $sum += $value{$i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $rest = $sum % 11;

        if ($value{12} != ($rest < 2 ? 0 : 11 - $rest)) {
            return false;
        }

        for ($i = 0, $j = 6, $sum = 0; $i < 13; $i++) {
            $sum += $value{$i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $rest = $sum % 11;

        return $value{13} == ($rest < 2 ? 0 : 11 - $rest);
    }

    /**
     * Extract and validate CNPJ document.
     *
     * @param string $value
     * @return bool
     */
    public function extractAndValidate(string $value): bool
    {
        $extracted = $this->extract($value);

        return $this->validate($extracted);
    }
}
