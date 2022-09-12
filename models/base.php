<?php
include_once('models/interface/query_interface.php');
include_once('helpers/const_config.php');
include_once('helpers/validation.php');
abstract class Base implements QueryAdminInterface
{
    public $tableName;
    public $fieldAble;
    public function getAll($field = [])
    {
        if (empty($field)) 
        {
            $field[] = 'id';
        }
        $db = DB::getinstance();
        $data = implode(",", $field);
        $result = $db->query("SELECT $data FROM $this->tableName");
        return $result->fetchAll(PDO::FETCH_ASSOC); 
    }

    function findItem($data)
    {
        $db = DB::getinstance();
        $result = $db->prepare(" SELECT * FROM $this->tableName WHERE email = ? AND password = ? AND del_flag = ? ");
        $result->execute([$data['email'], $data['password'], DELETE_OFF]);
        $item = $result->fetch(PDO::FETCH_ASSOC);
        if (!empty($item)) {
            return $item;
        }
        return null;
    }

    function findById($id)
    {
        $db = DB::getinstance();
        $result = $db->prepare(" SELECT * FROM $this->tableName WHERE id = ? ");
        $result->execute([$id]);
        $item = $result->fetch(PDO::FETCH_ASSOC);
        if (!empty($item)) {
            return $item;
        }
        return null;
    }
    function create($data)
    {
        $id = $data['id'];
        $name = $data['name'];
        $password = $data['password'];
        $email = $data['email'];
        $avatar = $data['avatar'];
        $role_type = $data['role_type'];
        $ins_id = $data['ins_id'];
        $ins_datetime = date("Y-m-d h:i:s");
        $db = DB::getinstance();
        $result = $db->exec("INSERT INTO $this->tableName(id, name, password, email, avatar, role_type, ins_id, ins_datetime) VALUES('$id', '$name', '$password', '$email', '$avatar', '$role_type', '$ins_id', '$ins_datetime')");
        return true;
    }
    function updateById($id, $data)
    {    
        $db = DB::getinstance();
        $result = $db->prepare(" UPDATE $this->tableName SET name = ?, password = ?, email = ?, avatar = ?, role_type = ?, upd_id = ?, upd_datetime = ? WHERE id = ? ");
        $result->execute([$data['name'], $data['password'], $data['email'], $data['avatar'], $data['role_type'], $data['upd_id'], $data['upd_datetime'],$id]);
        // $result = $db->exec("UPDATE $this->tableName SET name ='$data['name']', password ='$data['password']', email = '$data['email']', avatar ='$data['avatar']', role_type ='$data['role_type']', upd_id ='$data['upd_id']' WHERE id = '$id'");
        return true;
    }

    function search($data)
    {
        $db = DB::getinstance();
        // $result = $db->prepare(" SELECT * FROM $this->tableName WHERE email LIKE  '% ? %'  AND name LIKE  '% ? %'  AND del_flag = ? ");
        // $result->execute([$data['email'], $data['name'], DELETE_OFF]);
        $name=$data['name'];
        $email=$data['email'];
        $result = $db->exec(" SELECT * FROM $this->tableName WHERE name LIKE '%".$name."%'  AND email LIKE  '%.".$email.".%'  AND del_flag ={DELETE_OFF}");
         $item = $result->fetchAll(PDO::FETCH_ASSOC);
        if (isset($item)) 
        {
            return $item;
        }
        return true;
    }
    function deleteById($id)
    {
        $db = DB::getinstance();
        $result = $db->prepare(" UPDATE $this->tableName SET del_flag = ? WHERE id = ? ");
        $result->execute([DELETE_ON, $id]);
        return true;
    }
}
