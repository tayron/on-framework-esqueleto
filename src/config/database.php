<?php

/**
 * Configuração do banco de dados do Framework OnFramework
 */
use Cake\Datasource\ConnectionManager;

ConnectionManager::config('default', [
  'className' => 'Cake\Database\Connection',
  'driver' => 'Cake\Database\Driver\Mysql',
  'database' => 'tayron',
  'username' => 'root',
  'password' => '123456'
]);