<?php

namespace Controller;


use Library\Controller;
use Library\Request;
use Library\Router;

class SiteController extends Controller
{
    public function indexAction()
    {
        $user = $this->container->get('repository_manager')->getRepository('user');

        $data = $user->getUsersList();

        return $this->render('index.php', ['data' => $data]);
    }

    public function addAction()
    {
        return $this->render('add.php');
    }

    public function editAction(Request $request)
    {
        $user = $this->container->get('repository_manager')->getRepository('user');

        $id = $request->get('id');

        if($request->isPost()){

            $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, "/api/users/{$id}");
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $_POST);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-HTTP-Method-Override: PUT') );

            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

            $data = curl_exec($ch);
            curl_close($ch);

        }



        $data = $user->getUsersById($id);

        return $this->render('edit.php', ['data' => $data]);
    }

    public function searchAction(Request $request)
    {
        $name = $request->post('name');
        Router::redirect("/api/users/search/{$name}");
    }
}