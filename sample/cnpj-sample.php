<?php

require_once __DIR__ . '/../vendor/autoload.php';

use GeneralValidation\Cnpj;

$Cnpj = new Cnpj();

$value = '94.972.261/0001-17';
$extracted = $Cnpj->extract($value);

echo "CNPJ: $value \n";
echo "Extracted: $extracted \n\n";

$value = '12345678901234';
$validated = $Cnpj->validate($value);
$result = $validated ? 'Valid' : 'Invalid';

echo "CNPJ: $value \n";
echo "Validation result: $result \n\n";

$value = '94972261000117';
$validated = $Cnpj->validate($value);
$result = $validated ? 'Valid' : 'Invalid';

echo "CNPJ: $value \n";
echo "Validation result: $result \n\n";

$value = '94.972.261/0001-17';
$validated = $Cnpj->validate($value);
$result = $validated ? 'Valid' : 'Invalid';

echo "CNPJ: $value \n";
echo "Validation result: $result \n\n";
