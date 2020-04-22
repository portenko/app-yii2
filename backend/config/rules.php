<?php

return [
    'admin' => 'site/index',
    'login' => 'site/login',
    'logout' => 'site/logout',
    '<controller:[\w\-]+>/<action:[\w\-]+>' => '<controller>/<action>',
    '<controller:[\w\-]+>' => '<controller>/index',
];
