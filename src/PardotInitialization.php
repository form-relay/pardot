<?php

namespace FormRelay\Pardot;

use FormRelay\Core\Initialization;
use FormRelay\Core\Service\RegistryInterface;
use FormRelay\Pardot\Route\PardotRoute;
use FormRelay\Request\RequestInitialization;

class PardotInitialization extends Initialization
{
    const ROUTES = [
        PardotRoute::class,
    ];

    public static function initialize(RegistryInterface $registry)
    {
        RequestInitialization::initialize($registry);
        parent::initialize($registry);
    }
}
