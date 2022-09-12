<?php
require_once('models/base.php');
class Admin extends Base
{
    public $fieldAble = [
        'id', 
        'name', 
        'password',
        'email',
        'avatar', 
        'role_type', 
        'ins_id', 
        'upd_id', 
        'ins_datetime', 
        'upd_datetime', 
        'del_flag'
    ];
    function __construct()
    {
        $this->tableName = 'admin';
    }
}
