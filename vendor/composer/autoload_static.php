<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit71d2d6cfe998145b9a3aad823f6b690f
{
    public static $prefixLengthsPsr4 = array (
        'c' => 
        array (
            'classes\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'classes\\' => 
        array (
            0 => __DIR__ . '/../..' . '/classes',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit71d2d6cfe998145b9a3aad823f6b690f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit71d2d6cfe998145b9a3aad823f6b690f::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}