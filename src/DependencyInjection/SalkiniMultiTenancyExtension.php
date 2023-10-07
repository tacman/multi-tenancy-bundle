<?php
namespace FS\MultiTenancyBundle\DependencyInjection;

use FS\MultiTenancyBundle\Service\ConfigurationGeneratorService;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;

class FSMultiTenancyExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container): void
    {
        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__ . '/../Resources/config')
        );
        $loader->load('services.yaml');

        $configuration = $this->getConfiguration($configs, $container);

        $configs = $this->processConfiguration($configuration, $configs);

        
        
        $definition = $container->getDefinition('FS\MultiTenancyBundle\Service\TenantService');
        $definition->setArgument(4, $configs['tenant_entity']);

        $container->setParameter('fs.tenant_entity', $configs['tenant_entity']);


        // Get the ConfigurationGeneratorService
        $configGenerator = new ConfigurationGeneratorService($container);

        // Generate the YAML configuration file
        $configGenerator->generateConfiguration($configs);
        
    }

    public function getAlias(): string
    {
        return 'fs_multi_tenancy';
    }
}