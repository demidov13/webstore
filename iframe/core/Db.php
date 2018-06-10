<?php

namespace iframe;

/**
 * Description of Db
 *
 */
class Db
{
    use TSingletone;
    
    protected function __construct(){
        $db = require_once CONF . '/config_db.php';
    }
}
