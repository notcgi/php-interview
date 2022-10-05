<?php
interface ObjectInterface{
    public function handle(): string;
}
class SomeObject implements ObjectInterface {
    protected string $name;

    public function __construct(string $name) {
        $this->name = $name;
    }

    public function handle(): string {
        return "handle_{$this->name}";
    }
}

class SomeObjectsHandler {
    public function __construct() { }

    /**
     * @param ObjectInterface[] $objects
     * @return string[]
     */
    public function handleObjects(array $objects): array {
        $handlers = [];
        foreach ($objects as $object) {
            $handlers[] = $object->handle();
        }

        return $handlers;
    }
}

$objects = [
    new SomeObject('object_1'),
    new SomeObject('object_2')
];

$soh = new SomeObjectsHandler();
$soh->handleObjects($objects);