<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit731c06b6c54812348ab453e837a1d599
{
    public static $classMap = array (
        'Feed' => __DIR__ . '/..' . '/dg/rss-php/src/Feed.php',
        'FeedException' => __DIR__ . '/..' . '/dg/rss-php/src/Feed.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit731c06b6c54812348ab453e837a1d599::$classMap;

        }, null, ClassLoader::class);
    }
}
