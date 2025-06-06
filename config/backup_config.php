<?php
return [
    'backup_path' => __DIR__ . '/../backups',
    'frequency' => 'daily', // daily, weekly, monthly
    'time' => '03:00', // hora del backup
    'keep_backups' => 30, // número de backups a mantener
    'backup_types' => [
        'database' => true,
        'files' => true,
        'config' => true
    ],
    'notification_email' => 'admin@limanprof.com',
    'compression' => 'zip'
];
