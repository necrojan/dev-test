<?php

namespace Razoyo\AnimalProfile\Animal;

class Animals
{
    private array $pets = ['cat', 'dog', 'llama', 'anteater'];

    public function getContents(): array
    {
        $arr = [];

        foreach ($this->getPets() as $pet) {
            $className = ucfirst($pet);
            $classPathName = __NAMESPACE__ . '\\' . $className;
            if (class_exists($classPathName)) {
                $petClass = new $classPathName();
                $arr[$pet] = $petClass->getContent();
            }
        }

        return $arr;
    }

    public function getPets(): array
    {
        return $this->pets;
    }
}
