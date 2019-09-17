<?php

namespace Cogitoweb\OneSignalBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('onesignal');

        $treeBuilder
            ->getRootNode()
                ->info('Configuration options for OneSignal. Read more at https://documentation.onesignal.com/docs/accounts-and-keys.')
            ->children()
                ->scalarNode('onesignal_app_id')
                    ->isRequired()
                    ->cannotBeEmpty()
                    ->info('OneSignal App ID.')
                ->end()
                ->scalarNode('rest_api_key')
                    ->isRequired()
                    ->cannotBeEmpty()
                    ->info('REST API Key.')
                ->end()
                ->scalarNode('user_auth_key')
                    ->isRequired()
                    ->cannotBeEmpty()
                    ->info('User Auth Key.')
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
