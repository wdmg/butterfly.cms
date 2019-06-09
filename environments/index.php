<?php
/**
 * The manifest of files that are local to specific environment.
 * This file returns a list of environments that the application
 * may be installed under. The returned data must be in the following
 * format:
 *
 * ```php
 * return [
 *     'environment name' => [
 *         'path' => 'directory storing the local files',
 *         'skipFiles'  => [
 *             // list of files that should only copied once and skipped if they already exist
 *         ],
 *         'setWritable' => [
 *             // list of directories that should be set writable
 *         ],
 *         'setExecutable' => [
 *             // list of files that should be set executable
 *         ],
 *         'setCookieValidationKey' => [
 *             // list of config files that need to be inserted with automatically generated cookie validation keys
 *         ],
 *         'setDbConnection' => [
 *             // list of db config files that need to be inserted with database connection options
 *         ],
 *         'createSymlink' => [
 *             // list of symlinks to be created. Keys are symlinks, and values are the targets.
 *         ],
 *     ],
 * ];
 * ```
 */

return [
    'development' => [
        'path' => 'dev',
        'setWritable' => [
            'runtime',
            'web/assets',
        ],
        'setExecutable' => [
            'yii',
            'tests/bin/yii',
        ],
        'setCookieValidationKey' => [
            'config/web.php',
        ],
        'setDbConnection' => [
            'config/db.php',
        ],
    ],
    'production' => [
        'path' => 'prod',
        'setWritable' => [
            'runtime',
            'web/assets',
        ],
        'setExecutable' => [
            'yii',
        ],
        'setCookieValidationKey' => [
            'config/web.php',
        ],
        'setDbConnection' => [
            'config/db.php',
        ],
    ],
];
