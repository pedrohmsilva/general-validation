<?php

require_once __DIR__ . '/../vendor/autoload.php';

use GeneralValidation\Cpf;

$Cpf = new Cpf();

$value = '052.799.958-00';
$extracted = $Cpf->extract($value);

echo "CPF: $value \n";
echo "Extracted: $extracted \n\n";

$value = '05279995800';
$validated = $Cpf->validate($value);
$result = $validated ? 'Valid' : 'Invalid';

echo "CPF: $value \n";
echo "Validation result: $result \n\n";

$value = '052.799.958-00';
$validated = $Cpf->extractAndValidate($value);
$result = $validated ? 'Valid' : 'Invalid';

echo "CPF: $value \n";
echo "Validation result: $result \n\n";
