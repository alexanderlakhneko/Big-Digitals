<?php

namespace Model;

use Library\EntityRepository;


class User extends EntityRepository
{

    public function register($data)
    {
        var_dump($data);
//        $password = password_hash($password, PASSWORD_DEFAULT);
        // Текст запроса к БД
        $sql = 'INSERT INTO user (name, email, password) '
                . 'VALUES (:name, :email, :password)';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $this->pdo->prepare($sql);
        $result->bindParam(':name', $data['name'], \PDO::PARAM_STR);
        $result->bindParam(':email', $data['email'], \PDO::PARAM_STR);
        $result->bindParam(':password', $data['password'], \PDO::PARAM_STR);
        return $result->execute();
    }

    public function update($name, $email, $password, $id)
    {
        // Текст запроса к БД

        $sql = "UPDATE user SET name = :name, email = :email, password = :password WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $this->pdo->prepare($sql);
        $result->bindParam(':id', $id, \PDO::PARAM_INT);
        $result->bindParam(':name', $name, \PDO::PARAM_INT);
        $result->bindParam(':email', $email, \PDO::PARAM_STR);
        $result->bindParam(':password', $password, \PDO::PARAM_STR);

        return $result->execute();
    }

    public function getUsersList()
    {
        // Запрос к БД

        $result = $this->pdo->query('SELECT * FROM user ORDER BY id ASC');
        // Получение и возврат результатов
        $i = 0;
        $userList = array();

        while ($row = $result->fetch()) {
            $userList[$i]['id'] = $row['id'];
            $userList[$i]['name'] = $row['name'];
            $userList[$i]['email'] = $row['email'];
            $userList[$i]['password'] = $row['password'];
            $i++;
        }
        return $userList;
    }

    public function getUsersByName($name)
    {
        // Запрос к БД
        $sql = 'SELECT * FROM user WHERE name = :name ORDER BY id ASC';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $this->pdo->prepare($sql);
        $result->bindParam(':name', $name, \PDO::PARAM_STR);
        $result->execute();

        // Получение и возврат результатов
        $i = 0;
        $user = array();
        while ($row = $result->fetch()) {
            $user[$i]['id'] = $row['id'];
            $user[$i]['name'] = $row['name'];
            $userList[$i]['email'] = $row['email'];
            $user[$i]['password'] = $row['password'];
            $i++;
        }
        return $user;
    }

    public function getUsersById($id)
    {
        // Запрос к БД
        $sql = 'SELECT * FROM user WHERE id = :id ORDER BY id ASC';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $this->pdo->prepare($sql);
        $result->bindParam(':id', $id, \PDO::PARAM_STR);
        $result->execute();

        // Получение и возврат результатов
        $user = array();
        while ($row = $result->fetch()) {
            $user['id'] = $row['id'];
            $user['name'] = $row['name'];
            $user['email'] = $row['email'];
            $user['password'] = $row['password'];
            ;
        }
        return $user;
    }

    public function DelUsersById($id)
    {
        // Запрос к БД
        $sql = 'DELETE FROM user WHERE id = :id';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $this->pdo->prepare($sql);
        $result->bindParam(':id', $id, \PDO::PARAM_STR);
        $result->execute();

        return $result;
    }

}
