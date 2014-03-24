<?php

Router::connect('/login', array(
    'plugin' => 'Authentication',
    'controller' => 'Users',
    'action' => 'login'
));

Router::connect('/users/login', array(
    'plugin' => 'Authentication',
    'controller' => 'Users',
    'action' => 'login'
));

Router::connect('/admin/login', array(
    'plugin' => 'Authentication',
    'controller' => 'Users',
    'action' => 'login',
    'prefix' => 'admin'
));

Router::connect('/admin/Authentication/Users/login', array(
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
    'action' => 'logout',
    'prefix' => 'admin'
));

Router::connect('/admin/users', array(
    'plugin' => 'Authentication',
    'controller' => 'Users',
    'action' => 'index',
    'prefix' => 'admin'
));

Router::connect('/admin/users/:action', array(
    'plugin' => 'Authentication',
    'controller' => 'Users',
    'prefix' => 'admin'
));

Router::connect('/admin/users/:action/:id', array(
    'plugin' => 'Authentication',
    'controller' => 'Users',
    'prefix' => 'admin'
), array(
    'pass' => array('id'),
    'id' => '[0-9]+'
));
