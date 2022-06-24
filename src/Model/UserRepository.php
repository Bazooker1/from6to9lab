<?php

namespace User\DantegaComposer\Model;
class UserRepository
{
    public $users = array();
    public $map;
    public function __construct()
    {
        $this->map = new UserMapper();
        $this->users = $this->map->All();
    }
    //получение всех записей
    function getAll(){
        return $this->map;
    }
    //фильтрация по полям
    function checkLoginPass($login, $pass){
        foreach ($this->users as $user){
            if($user->login==$login && $user->password==$pass){
                return true;
            }
        }
        return false;
    }
    //поиск по id
    function findById($id){
        foreach ($this->users as $user){
            if($user->id == $id){
                return $user;
            }
        }
        return null;
    }
    //сохранение
    function add($login, $pass){
        $this->map->add($login, $pass);
        $this->users=$this->map->All();
    }
    //удаление
    function deleteById($id, $pass){
        $this->map->del($id, $pass);
        $this->users=$this->map->All();
    }
}