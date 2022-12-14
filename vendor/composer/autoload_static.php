<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfa21723b324191e9df270cb246c8c340
{
    public static $prefixLengthsPsr4 = array (
        'G' => 
        array (
            'Gloversure\\Store\\' => 17,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Gloversure\\Store\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitfa21723b324191e9df270cb246c8c340::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitfa21723b324191e9df270cb246c8c340::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitfa21723b324191e9df270cb246c8c340::$classMap;

        }, null, ClassLoader::class);
    }
}
