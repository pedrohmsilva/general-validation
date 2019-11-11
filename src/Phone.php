<?php

namespace GeneralValidation;

class Phone
{
    /**
     * Extract phone number.
     *
     * @param string $value
     * @return string
     */
    public function extract(string $value)
    {
        $value = str_replace(' ', '', $value);
        $value = str_replace('(', '', $value);
        $value = str_replace(')', '', $value);
        $value = str_replace('-', '', $value);
        $value = str_replace('.', '', $value);
        $value = str_replace('+', '', $value);

        return $value;
    }

    /**
     * Validate phone number.
     *
     * @param string $value
     * @return bool
     */
    public function validate(string $value): bool
    {
        $regex = '/[0-9]{2}[6789][0-9]{3,4}[0-9]{4}/';
        
        return preg_match($regex, $value);
    }

    /**
     * Extract and validate phone number.
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
