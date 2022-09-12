<?php
include_once('base_controller.php');
include_once('models/users.php');
include_once('helpers/common.php');
include_once('helpers/const_message.php');
include_once('helpers/validation.php');
class UsersController extends BaseController
{
    function __construct()
    {
        $this->folder = 'users';
    }

    public function index()
    {
        $data = ['users' => (new Users())->getAll(['id', 'name', 'facebook_id', 'password', 'email', 'avatar', 'status', 'del_flag'])];
        $this->render('index', $data);
    }
    public function upload()
    {
        $target_dir = "public/images/";
        $target_file = $target_dir . basename($_FILES['files']['name']);
        $imgFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $check = getimagesize($_FILES['files']['tmp_name']);
        if ($check == false) {
            $error = UPLOAD_ERROR;
        }
        if (file_exists($target_file)) {
            $error =  UPLOAD_ERROR;
        }
        $allowType = ['jpg', 'png', 'jpeg', 'gif'];
        if (!in_array($imgFileType, $allowType)) {
            $error = UPLOAD_ERROR;
        }
        if (empty($error)) {
            if (move_uploaded_file($_FILES["files"]["tmp_name"], $target_file)) {
                echo  UPLOAD_SUCCESS;
            } else {
                echo  UPLOAD_ERROR;
            }
        }
        return $target_file;
    }
    public function delete()
    {
        $users = new Users();
        $result = $users->findById($_GET['id']);
        if ($result['del_flag'] == 1) 
        {
            echo DELETE;
            $this->index();
        }else{
            $users->deleteById($_GET['id']);
            echo DATA_DELETE;
            $this->index();
        }
    }

    public function edit()
    {
        $users = (new Users)->findById($_GET['id']);
        $this->render('update', ['users' => $users]);
    }
    public function update()
    {
        $data = [
            'name' => $_POST['name'],
            'password' => $_POST['password'],
            'email' => $_POST['email'],
            'avatar' => $this->upload(),
            'status' => $_POST['status'],
            'upd_id' => $_SESSION['admin']['id'],
            'upd_datetime' => date("Y-m-d h:i:s"),
        ];
        if ((new Users)->updateById($_GET['id'], $data)) 
        {
            echo DATA_UPDATE;
            $this->index();
        }
    }
    public function search()
    {   
        $users = new Users();
        $data = [
            'name'=>$_POST['name'],
            'email'=>$_POST['email'],
        ];
        $re= $users->search($data);
        //  print_r($data);die;
        $this->render('search',['users'=>$re]);
    }
}
