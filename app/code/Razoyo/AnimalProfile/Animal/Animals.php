<?php

namespace Razoyo\AnimalProfile\Animal;

use Magento\Framework\App\DeploymentConfig;

class Animals
{
    private DeploymentConfig $deploymentConfig;

    public function __construct(DeploymentConfig $deploymentConfig)
    {
        $this->deploymentConfig = $deploymentConfig;
    }

    public function getContents(): array
    {
        $arr = [];

        foreach ($this->getDeploymentConfig()->get('animals') as $pet) {
            $className = ucfirst($pet);
            $classPathName = __NAMESPACE__ . '\\' . $className;
            if (class_exists($classPathName)) {
                $petClass = new $classPathName();
                $arr[$pet] = $petClass->getContent();
            }
        }

        return $arr;
    }

    /**
     * @return DeploymentConfig
     */
    public function getDeploymentConfig(): DeploymentConfig
    {
        return $this->deploymentConfig;
    }
}
