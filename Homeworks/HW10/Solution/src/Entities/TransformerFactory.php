<?php

namespace Hillel\Entities;

class TransformerFactory
{
    public array $manufacturing = [];
    public string $createPrefix = 'create';

    public function addType($type)
    {
        $this->manufacturing[get_class($type)] = $type;
    }

    public function __call($method, $args)
    {
        $objectsArr = [];
        if (strpos($method, $this->createPrefix) !== false && is_int($args[0])) {
            $className = __NAMESPACE__ . '\\' . str_replace($this->createPrefix, '', $method);
            if (isset($this->manufacturing[$className])) {
                for ($i = 0; $i < $args[0]; $i++) {
                    $objectsArr[] = clone $this->manufacturing[$className];
                }
                return $objectsArr;
            } else {
                throw new \Exception('Unknown type of transformer');
            }
        } else {
            throw new \Exception('Invalid Arguments');
        }
    }
}
