<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita790312462a25824bbd4df617b7d32fe
{
    public static $prefixLengthsPsr4 = array (
        'O' => 
        array (
            'OSS\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'OSS\\' => 
        array (
            0 => __DIR__ . '/..' . '/aliyuncs/oss-sdk-php/src/OSS',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita790312462a25824bbd4df617b7d32fe::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita790312462a25824bbd4df617b7d32fe::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}