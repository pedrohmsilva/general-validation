<?php

namespace GeneralValidation;

class Cpf
{
    /**
     * Extract CPF document.
     *
     * @param string $value
     * @return string
     */
    public function extract(string $value): string
    {
        $value = preg_replace('/[^0-9]/', '', $value);
        $regex = '/((\d{3}|\d{2}|\d{1}))?(\s+|\.|\-|\\)?((\d{3}|\d{2}|\d{1}))';
        $regex .= '(\s+|\.|\-|\\)?(\d{3})(\s+|\.|\-|\\|\/)?(\d{2})\b))/';

        if (preg_match($regex, $value, $matches)) {
            return str_pad(
                $matches[0],
                11,
                '0',
                STR_PAD_LEFT
            );
        }
        
        return '';
    }

    /**
     * Extract (whether necessary) and validate CPF document.
     *
     * @param string $value
     * @return bool
     */
    public function validate(string $value): bool
    {
        $value = $this->extract($value);
        $regex = preg_replace('/[^\d.-]/', '', $value);

        if ($value !== $regex) {
            return false;
        }

        if (strlen($value) !== 11) {
            return false;
        }

        $invalidValues = [
            '00000000000',
            '11111111111',
            '22222222222',
            '33333333333',
            '44444444444',
            '55555555555',
            '66666666666',
            '77777777777',
            '88888888888',
            '99999999999',
        ];

        if (in_array($value, $invalidValues)) {
            return false;
        }

        for ($i = 0, $j = 10, $sum = 0; $i < 9; $i++, $j--) {
            $sum += $value{$i} * $j;
        }

        $rest = $sum % 11;

        if ($value{9} != ($rest < 2 ? 0 : 11 - $rest)) {
            return false;
        }

        for ($i = 0, $j = 11, $sum = 0; $i < 10; $i++, $j--) {
            $sum += $value{$i} * $j;
        }

        $rest = $sum % 11;

        return $value{10} == ($rest < 2 ? 0 : 11 - $rest);
    }
}
