<?php
require_once('models/base.php');
class Users extends Base
{
    public $fieldAble = [
        'id', 
        'name', 
        'facebook_id',
        'password',
        'email',
        'avatar', 
        'status',
        'ins_id', 
        'upd_id', 
        'ins_datetime', 
        'upd_datetime', 
        'del_flag'
    ];
    function __construct()
    {
        $this->tableName = 'users';
    }
}
