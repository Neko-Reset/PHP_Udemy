<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4cd5203743614f90bbc5786c5058a088
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Phidongviet\\Composertest\\' => 25,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Phidongviet\\Composertest\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit4cd5203743614f90bbc5786c5058a088::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4cd5203743614f90bbc5786c5058a088::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit4cd5203743614f90bbc5786c5058a088::$classMap;

        }, null, ClassLoader::class);
    }
}
