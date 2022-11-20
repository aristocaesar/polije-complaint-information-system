<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitbe60fa9504f84a937f36ef1a8b3e8986
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

        spl_autoload_register(array('ComposerAutoloaderInitbe60fa9504f84a937f36ef1a8b3e8986', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitbe60fa9504f84a937f36ef1a8b3e8986', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitbe60fa9504f84a937f36ef1a8b3e8986::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
