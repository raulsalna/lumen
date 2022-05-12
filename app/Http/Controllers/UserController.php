<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Implementation\UserServiceImpl;

class UserController extends Controller
{
   private $userService;
   /**
    *
    @var Request
    */
    private $request;

   public function __construct(UserServiceImpl $userService, Request $request)
   {
      $this->userService = $userService;
      $this->request = $request;
    }

    function getlistUser()
        {
            return response($this->userService->getUser());
        }

    function createUser()
        {
            $response=response("", 201);
            $this->userService->postuser($this->request->all());
            return $response;


        }
        function putUser(int $id)
        {
            $response=response("", 202);
            $this->userService->putUser($this->request->all(), $id);
            return $response;


        }

}
