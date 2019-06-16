<?php
return [
    'name' => 'ebc-test',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'container' => [
        'singletons' => [
            common\components\UserFinderInterface::class => common\components\UserFinder::class,
            common\components\ArraySplitterInterface::class => common\components\ArraySplitter::class,
            common\repositories\SplitRepositoryInterface::class => common\repositories\SplitRepository::class,
        ],
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
