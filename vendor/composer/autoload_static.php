<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0d8192c9060fed1ebc91e1d2c1336405
{
    public static $prefixLengthsPsr4 = array (
        'J' => 
        array (
            'Jeff\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Jeff\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Jeff\\Agurkas' => __DIR__ . '/../..' . '/Agurkas.php',
        'Jeff\\App' => __DIR__ . '/../..' . '/App.php',
        'Jeff\\ProsenelinisAugalas' => __DIR__ . '/../..' . '/ProsenelinisAugalas.php',
        'Jeff\\Store' => __DIR__ . '/../..' . '/Store.php',
        'Jeff\\Zirnis' => __DIR__ . '/../..' . '/Zirnis.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0d8192c9060fed1ebc91e1d2c1336405::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0d8192c9060fed1ebc91e1d2c1336405::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0d8192c9060fed1ebc91e1d2c1336405::$classMap;

        }, null, ClassLoader::class);
    }
}
