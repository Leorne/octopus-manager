<?php

namespace App;

use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

class Kernel extends BaseKernel
{
    use MicroKernelTrait;

    protected function configureContainer(ContainerConfigurator $container): void
    {
        $confDir = $this->getProjectDir().'/config';

        $container->import($confDir . '/{packages}/*.yaml', 'glob');
        $container->import($confDir .'/{packages}/' . $this->environment .'/*.yaml', 'glob');
        $container->import($confDir . '/{services}.yaml', 'glob');
        $container->import('./**/config/{services}.yaml', 'glob');
    }

    protected function configureRoutes(RoutingConfigurator $routes): void
    {
        $routes->import("../config/{routes}/{$this->environment}/*.yaml");
        $routes->import('../config/{routes}/*.yaml');
        $routes->import("./**/config/{routes}/{$this->environment}/*.yaml");
        $routes->import('./**/config/{routes}/*.yaml');
    }
}
