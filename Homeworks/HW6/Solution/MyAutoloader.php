<?php

class MyAutoloader {

    protected $namespaces = array();

    public function addNamespace(string $prefix, string $dir)
    {
        if (isset($this->namespaces[$prefix]) === false) {
            $this->namespaces[] = array('prefix' => $prefix, 'dir' => $dir);
        }
    }

    public function register()
    {
        spl_autoload_register(array($this, 'autoload'));
    }

    public function autoload($class)
    {
        foreach ($this->namespaces as $namespace) {
            if (strpos($class, $namespace['prefix']) !== false) {
                $path = str_replace($namespace['prefix'], $namespace['dir'], $class);
            }
        }

        $path = str_replace('\\', '/', $path).'.php';

        require_once $path;
    }

}

$autoloader = new MyAutoLoader();
$autoloader->addNamespace('Hillel', 'src');
$autoloader->register();
