<?php
// src/Service/ConfigurationGeneratorService.php

namespace FDS\MultiTenancyBundle\Service;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Yaml\Yaml;

class ConfigurationGeneratorService
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function generateConfiguration($customConfig)
    {
      
        // set the default configuration
        $config = ["fds_multi_tenancy" => $customConfig];

        // Convert the configuration to YAML format
        $yamlConfig = Yaml::dump($config, 4);

        // Save the YAML configuration to a file
        $configFilePath = $this->container->getParameter('kernel.project_dir') . '/config/packages/fds_multi_tenancy.yaml';
        file_put_contents($configFilePath, $yamlConfig);
    }
}
