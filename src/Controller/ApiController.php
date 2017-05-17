<?php

namespace Controller;


use Library\Controller;
use Library\Request;
use Model\User;

class ApiController extends Controller
{

    protected $method;

    public function __construct()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
    }

    public function updateAction(Request $request)
    {
        var_dump($_SERVER['REQUEST_METHOD']);
        $user = $this->container->get('repository_manager')->getRepository('user');
        //api/users/:scu
        $Id = $request->get('id');
        if($this->method == 'PUT' && isset($Id)){
            $data = file_get_contents('php://input');
            $data = json_decode($data, true);
            $user->update($data['name'], $data['email'], $data['password'], $Id);
            exit();
        }else{
            header('Bad Request', true, 400);
            exit;
        }
    }

    public function usersAction()
    {
        $user = $this->container->get('repository_manager')->getRepository('user');
        //api/users/
        if($this->method == 'POST'){
            $user->register($_POST);
            exit();
        }elseif($this->method == 'GET'){
            $res = $user->getUsersList();
            exit(json_encode($res));
        }else{
            header('Bad Request', true, 400);
            exit;
        }
    }

    public function searchAction(Request $request)
    {
        $user = $this->container->get('repository_manager')->getRepository('user');
        //api/users/search/JohnDoe
        if($this->method == 'GET'){
            $name = $request->get('name');
            $res = $user->getUsersByName($name);
            exit(json_encode($res));
        }else{
            header('Bad Request', true, 400);
            exit;
        }
    }

    public function deleteAction(Request $request)
    {
        $user = $this->container->get('repository_manager')->getRepository('user');

        if($this->method == 'DELETE'){
            $name = $request->get('id');
            $res = $user->DelUsersById($name);
            exit(json_encode($res));
        }else{
            header('Bad Request', true, 400);
            exit;
        }
    }
}