<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit93de82d9b5aef89c2aa9f22c8d74050d
{
    public static $prefixLengthsPsr4 = array (
        'w' =>
        array (
            'tst\\' => 4,
        ),
        'a' =>
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'tst\\' =>
        array (
            0 => __DIR__ . '/..' . '/tst',
        ),
        'app\\' =>
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit93de82d9b5aef89c2aa9f22c8d74050d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit93de82d9b5aef89c2aa9f22c8d74050d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit93de82d9b5aef89c2aa9f22c8d74050d::$classMap;

        }, null, ClassLoader::class);
    }
}
