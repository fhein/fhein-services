<?php
use ZendTest\ServiceManager\TestAsset\CallTimesAbstractFactory;
use Zend\ServiceManager\ServiceManager;

include __DIR__ . "/vendor/autoload.php";

    CallTimesAbstractFactory::setCallTimes(0);

    $serviceManager = new ServiceManager([
        'abstract_factories' => [
            CallTimesAbstractFactory::class,
            CallTimesAbstractFactory::class,
        ]
    ]);
    $serviceManager->addAbstractFactory(CallTimesAbstractFactory::class);
    $serviceManager->has(stdClass::class);
    print(CallTimesAbstractFactory::getCallTimes());
    assert(CallTimesAbstractFactory::getCallTimes() === 1);
