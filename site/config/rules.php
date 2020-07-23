<?php

return [
    'admin' => 'admin/default/index',
    'admin/login' => 'admin/default/login',
    'admin/logout' => 'admin/default/logout',

    'admin/<controller:[\w-]+>' => 'admin/<controller>/index',
    'admin/<controller:[\w-]+>/<action:[\w-]+>' => 'admin/<controller>/<action>',
    'admin/<controller:[\w-]+>/<action:[\w-]+>/<app:\d+>' => 'admin/<controller>/<action>',

    'elfinder' => 'elfinder',
    'elfinder/<_a:[\w\-]+>' => 'elfinder/<_a>',

    '' => 'site/index',
    '<action:[\w\-]+>' => 'site/<action>',
    '<action:[\w\-]+>/<alias:[\w-]+>' => 'site/<action>',
    '<controller:[\w-]+>/<action:[\w-]+>' => '<controller>/<action>',
    '<controller:[\w-]+>' => '<controller>/index',
];