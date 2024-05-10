<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit197db366dd281a34c8eb5ad14db92bcf
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'F' => 
        array (
            'Faker\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'Faker\\' => 
        array (
            0 => __DIR__ . '/..' . '/fzaninotto/faker/src/Faker',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'config' => __DIR__ . '/../..' . '/classes/config.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit197db366dd281a34c8eb5ad14db92bcf::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit197db366dd281a34c8eb5ad14db92bcf::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit197db366dd281a34c8eb5ad14db92bcf::$classMap;

        }, null, ClassLoader::class);
    }
}
