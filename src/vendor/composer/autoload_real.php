<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit02d3f8b7cf941e7a9881376e0386a52e
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInit02d3f8b7cf941e7a9881376e0386a52e', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit02d3f8b7cf941e7a9881376e0386a52e', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit02d3f8b7cf941e7a9881376e0386a52e::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
