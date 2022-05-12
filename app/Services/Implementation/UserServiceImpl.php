<?php

namespace App\Services\Implementation;

use App\Models\User;
use App\Services\Interfaces\IUserServicesInterface;
use Illuminate\Support\Facades\Hash;


class UserServiceImpl implements IUserServicesInterface
{
    private $model;

    function __construct(){
        $this->model = new User();

    }
    function getUser()
    {
      return $this->model->get();
    }
    function getUserById(int $id){}
/**
 * Crea un nuevo usuario
 */
function postuser(array $user){
    $user['password'] = Hash::make($user['password']);
    $this->model->create($user);
}
function putUser(array $user, int $id)
{
    $user['password'] = Hash::make($user['password']);

 $this->model->where('id', $id)
    ->first()
    ->fill($user)
    ->save();
}
function delUser(int $id)
{
  $user=$this->model->find($id);
  if ($user != null)
    $user->delete();
}
function restoreUser (int $id)
{
  $user=$this->model->withTrashed () ->find($id);
  if ($user != null)
    $user->restore();
}

}
