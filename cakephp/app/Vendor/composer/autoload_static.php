<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2b71738deea9c6a12da89c1f29fd7bfc
{
    public static $classMap = array (
        'MySQLBulk' => __DIR__ . '/../..' . '/src/MySQL.php',
        'NebTypes' => __DIR__ . '/../..' . '/src/NebTypes.php',
        'BulkRepository' => __DIR__ . '/../..' . '/src/BulkRepository.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit2b71738deea9c6a12da89c1f29fd7bfc::$classMap;

        }, null, ClassLoader::class);
    }
}
