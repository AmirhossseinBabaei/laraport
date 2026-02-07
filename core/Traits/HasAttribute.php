<?php

declare(strict_types=1);

namespace Core\Traits;

trait HasAttribute
{
    protected function setAttribute(array $array, object $object = null): object
    {

        if (!$object) {
            $class = get_called_class();
            $object = new $object;
        }

        foreach ($array as $key => $value) {
            $object->$key = $object;
        }

        return $object;
    }

    protected function setObject(array $array): void
    {
        $collection = [];

        foreach ($array as $key => $value) {
            $object = $this->setAttribute($array, $value);
            $collection[] = $object;
        }

        $this->collection = $collection;
    }
}