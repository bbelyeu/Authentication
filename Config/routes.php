<?php

    Router::connect('/login', array(
        'plugin' => 'Authentication',
        'controller' => 'Users',
        'action' => 'login'
    ));

    Router::connect('/admin/login', array(
        'plugin' => 'Authentication',
        'controller' => 'Users',
        'action' => 'login'
    ));

    Router::connect('/logout', array(
        'plugin' => 'Authentication',
        'controller' => 'Users',
        'action' => 'logout'
    ));

    Router::connect('/admin/logout', array(
        'plugin' => 'Authentication',
        'controller' => 'Users',
        'action' => 'logout'
    ));
