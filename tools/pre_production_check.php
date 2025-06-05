<?php
function checkRequirements() {
    $requirements = [
        'PHP Version' => [
            'required' => '7.4.0',
            'current' => PHP_VERSION,
            'status' => version_compare(PHP_VERSION, '7.4.0', '>=')
        ],
        'Extensions' => [
            'mysqli' => extension_loaded('mysqli'),
            'pdo_mysql' => extension_loaded('pdo_mysql'),
            'gd' => extension_loaded('gd'),
            'curl' => extension_loaded('curl')
        ],
        'Directory Permissions' => [
            'public/uploads' => is_writable('../public/uploads'),
            'logs' => is_writable('../logs')
        ],
        'Configuration Files' => [
            '.htaccess exists' => file_exists('../.htaccess'),
            'config.php exists' => file_exists('../config/config.php')
        ]
    ];
    
    return $requirements;
}

// Ejecutar verificación
$results = checkRequirements();
foreach ($results as $category => $checks) {
    echo "\n=== $category ===\n";
    foreach ($checks as $name => $value) {
        if (is_bool($value)) {
            echo "$name: " . ($value ? "✓" : "✗") . "\n";
        } else {
            echo "$name: $value\n";
        }
    }
}
