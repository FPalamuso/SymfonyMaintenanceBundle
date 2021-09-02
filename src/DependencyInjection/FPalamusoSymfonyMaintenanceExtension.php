<?php
declare(strict_types=1);
namespace FPalamuso\SymfonyMaintenanceBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Twig\Environment;

class FPalamusoSymfonyMaintenanceExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');

        $configuration = $this->getConfiguration($configs, $container);
        $config = $this->processConfiguration($configuration, $configs);

        $definition = $container->getDefinition('fpalamuso_symfony_maintenance.maintenance_listener');
        $definition->setArgument(0, $config);
    }

    public function getAlias()
    {
        return 'fpalamuso_symfony_maintenance';
    }


}
