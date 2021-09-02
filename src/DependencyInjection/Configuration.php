<?php

namespace FPalamuso\SymfonyMaintenanceBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('maintenanceBundle');
        $rootNode = $treeBuilder->getRootNode();

        $rootNode->children()
            ->booleanNode('is_active')->defaultFalse()->end()
            ->arrayNode('ips')
                ->scalarPrototype()->end()
                ->end()
            ->arrayNode('routes')
                ->scalarPrototype()->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
