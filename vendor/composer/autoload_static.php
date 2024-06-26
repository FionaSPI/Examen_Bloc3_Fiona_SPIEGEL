<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit429115f218995ff529caae64ae8aec98
{
    public static $prefixLengthsPsr4 = array (
        'c' => 
        array (
            'chillerlan\\Settings\\' => 20,
            'chillerlan\\QRCode\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'chillerlan\\Settings\\' => 
        array (
            0 => __DIR__ . '/..' . '/chillerlan/php-settings-container/src',
        ),
        'chillerlan\\QRCode\\' => 
        array (
            0 => __DIR__ . '/..' . '/chillerlan/php-qrcode/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit429115f218995ff529caae64ae8aec98::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit429115f218995ff529caae64ae8aec98::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit429115f218995ff529caae64ae8aec98::$classMap;

        }, null, ClassLoader::class);
    }
}
