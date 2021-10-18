<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf4bf7fbf186b88ea974d9fd72ebbaf5d
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'Labad\\Injection\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Labad\\Injection\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf4bf7fbf186b88ea974d9fd72ebbaf5d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf4bf7fbf186b88ea974d9fd72ebbaf5d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf4bf7fbf186b88ea974d9fd72ebbaf5d::$classMap;

        }, null, ClassLoader::class);
    }
}
