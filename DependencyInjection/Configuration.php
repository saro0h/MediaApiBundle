<?php

namespace Saro0h\MediaApiBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('media_api');

        $rootNode
            ->children()
                ->scalarNode('media_path')
                    ->info('The path to upload media in the web folder of the application.')
                    ->example('uploads/')
                    ->defaultValue('uploads/')
                ->end()
                ->scalarNode('field_name')
                    ->info('The name ')
                    ->example('media')
                    ->defaultValue('media')
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
