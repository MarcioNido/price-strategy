<?php

use DI\ContainerBuilder;

$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions(__DIR__ . '/config.php');
try {
    return $containerBuilder->build();
} catch (Exception $e) {
    die('Error loading service container');
}
