<?php

require_once __DIR__ . '/../vendor/autoload.php';

use GeneralValidation\Phone;

$Phone = new Phone();

$value = '+55 (14) 9 9123-4567';
$extracted = $Phone->extract($value);

echo "Phone: $value\n";
echo "Extracted: $extracted\n\n";

$value = '5514991234567';
$validation = $Phone->validate($value);
$result = $validation ? 'Valid' : 'Invalid';

echo "Phone: $value\n";
echo "Validation result: $result\n\n";

$value = '+55 (14) 9 9123-4567';
$validation = $Phone->extractAndValidate($value);
$result = $validation ? 'Valid' : 'Invalid';

echo "Phone: $value\n";
echo "Validation result: $result\n\n";
