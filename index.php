<?php

require_once 'src/Models/BusinessModel.php';
require_once 'src/Models/TypesModel.php';
require_once 'src/Services/DatabaseService.php';
require_once 'src/Services/BusinessDisplayService.php';

$db = DatabaseService::connect();

$businessModel = new BusinessModel($db);
$typesModel = new TypesModel($db);

// Example usages
$businesses = $businessModel->getAll();
$types = $typesModel->getAll();

echo BusinessDisplayService::displayAll($businesses);

//$updatedBusiness = $businessModel->update(1, 'Update Test', 'Does this update?', '1990-01-01', 2);
//
//if ($updatedBusiness) {
//    echo 'Business updated!';
//}