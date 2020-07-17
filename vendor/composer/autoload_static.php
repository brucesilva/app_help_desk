<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit465e39165fce18ea0081c5df8e7cce6f
{
    public static $prefixLengthsPsr4 = array (
        'V' => 
        array (
            'View\\' => 5,
        ),
        'M' => 
        array (
            'Models\\' => 7,
        ),
        'C' => 
        array (
            'Controllers\\' => 12,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'View\\' => 
        array (
            0 => __DIR__ . '/../..' . '/view',
        ),
        'Models\\' => 
        array (
            0 => __DIR__ . '/../..' . '/models',
        ),
        'Controllers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/controllers',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit465e39165fce18ea0081c5df8e7cce6f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit465e39165fce18ea0081c5df8e7cce6f::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
