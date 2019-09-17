<?php

namespace Cogitoweb\OneSignalBundle\DependencyInjection;

use Exception;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class CogitowebOneSignalExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function getAlias()
    {
        return 'onesignal';
    }

    /**
     * {@inheritDoc}
     *
     * @throws Exception
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.yaml');

        $configuration   = new Configuration();
        $processedConfig = $this->processConfiguration($configuration, $configs);

        $oneSignalAppId = $processedConfig['onesignal_app_id'];
        $restApiKey     = $processedConfig['rest_api_key'];
        $userAuthKey    = $processedConfig['user_auth_key'];

        $container->setParameter('onesignal.onesignal_app_id', $oneSignalAppId);
        $container->setParameter('onesignal.rest_api_key', $restApiKey);
        $container->setParameter('onesignal.user_auth_key', $userAuthKey);
    }
}
