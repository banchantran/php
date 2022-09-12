<?php
include_once('base_controller.php');
include_once('models/admin.php');
include_once('helpers/common.php');
include_once('helpers/const_message.php');
include_once('helpers/validation.php');
class SuperadminController extends BaseController
{
    function __construct()
    {
        $this->folder = 'admin';
    }

    public function login()
    {
        $this->render('login');
    }

    public function loginAdmin()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $error = [];
        if ($email == '') 
        {
            $error['email_blank'] = IMPORT_DATA;
        }
        if ($password == '') 
        {
            $error['password_blank'] = IMPORT_DATA;
        }
        if ($email != '' && $password != '') 
        {
            $ad = (new Admin())->findItem($_POST);
            if ($ad != null) 
            {
                $checkEmail = $_POST['email'] != $ad['email'] ? true : false;
                $checkPassword = $_POST['password'] != $ad['password'] ? true : false;
                if (strcmp($_POST['email'], $ad['email']) != 0 || strcmp($_POST['password'], $ad['password']) != 0 || $checkEmail || $checkPassword) 
                {
                    echo ACCOUNT_NOT_EXIST;
                }
                if (count($error) == 0) 
                {
                    setSessionAdmin('id', $ad['id']);
                    setSessionAdmin('email', $ad['email']);
                    setSessionAdmin('password', $ad['password']);
                    $role=$ad['role_type'];
                    // print_r($ad['role_type']);die();
                    $this->index();
                }
            } else {
                echo ACCOUNT_NOT_EXIST;
            }
        }
        if (isset($error)) 
        {
            $this->render('login', ['error' => $error]);
        }
    }

    public function index()
    {   
        $data = ['id' =>(new Admin())->findById($_SESSION['admin']['id']),'admin' => (new Admin())->getAll(['id', 'name', 'password', 'email', 'avatar', 'role_type', 'del_flag'])];
        $this->render('index', $data);
    }

    public function create()
    {
        $this->render('create');
    }

    public function store()
    {

       if ($_POST['ID'] == '')
       {
        $error['id_blank'] = IMPORT_DATA;
       }

       $data = [
        'id' => $_POST['id'],
        'name' => $_POST['name'],
        'password' => $_POST['password'],
        'email' => $_POST['email'],
        'avatar' => $this->upload(),
        'role_type' => $_POST['role_type'],
        'ins_id' => $_SESSION['admin']['id'],
        ];
            // print_r($data);die();
        if ((new Admin)->create($data)) 
        {
            echo CREATE_SUCCESS;
            $this->index();
        }
    }

    public function upload()
    {
        $target_dir = "public/images/";
        $target_file = $target_dir . basename($_FILES['files']['name']);
        $imgFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $check = getimagesize($_FILES['files']['tmp_name']);
        if ($check == false) 
        {
            $error = UPLOAD_ERROR;
        }
        if (file_exists($target_file)) 
        {
            $error =  UPLOAD_ERROR;
        }
        $allowType = ['jpg', 'png', 'jpeg', 'gif'];
        if (!in_array($imgFileType, $allowType)) 
        {
            $error = UPLOAD_ERROR;
        }
        if (empty($error)) 
        {
            if (move_uploaded_file($_FILES["files"]["tmp_name"], $target_file)) {
                echo  UPLOAD_SUCCESS;
            } else {
                echo  UPLOAD_ERROR;
            }
        }
        return $target_file;
    }

    public function edit()
    {
        $admin = (new Admin)->findById($_GET['id']);
        $this->render('update', ['admin' => $admin]);
    }

    public function update()
    {
        $data = [
            'name' => $_POST['name'],
            'password' => $_POST['password'],
            'email' => $_POST['email'],
            'avatar' => $this->upload(),
            'role_type' => $_POST['role_type'],
            'upd_id' => $_SESSION['admin']['id'],
            'upd_datetime' => date("Y-m-d h:i:s"),
        ];
        if ((new Admin)->updateById($_GET['id'], $data)) {
            echo DATA_UPDATE;
            $this->index();
        }
    }

    public function delete()
    {
        $admin = new Admin();
        $result = $admin->findById($_GET['id']);
        if ($result['del_flag'] == 1) 
        {
            echo DELETE;
            $this->index();
        }else{
            $admin->deleteById($_GET['id']);
            echo DATA_DELETE;
            $this->index();
        }
    }

    public function search()
    {   
        $admin = new Admin();
        $data = [
            'name'=>$_POST['name'],
            'email'=>$_POST['email'],
        ];
        $re= $admin->search($data);
        //  print_r($data);die;
        $this->render('search',['admin'=>$re]);
    }
    public function logout()
    {   
        if (isset($_SESSION['admin']['id']))
        {
            unset($_SESSION['admin']['id']);
            $this->render('login');
        }
       
    }
}
