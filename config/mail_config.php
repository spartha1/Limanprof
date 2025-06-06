<?php
return [
    'smtp' => [
        'host' => 'smtp.gmail.com', // O tu servidor SMTP
        'port' => 587,
        'username' => 'tu_correo@limanprof.com',
        'password' => 'tu_contraseña_aplicacion',
        'encryption' => 'tls'
    ],
    'from' => [
        'address' => 'no-reply@limanprof.com',
        'name' => 'Limanprof'
    ],
    'admin_email' => 'admin@limanprof.com'
];
