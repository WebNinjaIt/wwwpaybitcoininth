<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita9c749f9da03845131d489286f3e8f70
{
    public static $files = array (
        '3df8ee254224091c21b9aebb792d2f8b' => __DIR__ . '/..' . '/codeinwp/themeisle-sdk/load.php',
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInita9c749f9da03845131d489286f3e8f70::$classMap;

        }, null, ClassLoader::class);
    }
}
