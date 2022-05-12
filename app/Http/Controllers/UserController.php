<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Validator\UserValidator;
use App\Services\Implementation\UserServiceImpl;

class UserController extends Controller
{
    private $userService;
    /**
     *
    @var Request
     */
    private $request;
    private $validator;

    public function __construct(UserServiceImpl $userService, Request $request, UserValidator $userValidator)
    {
        $this->userService = $userService;
        $this->request = $request;
        $this->validator = $userValidator;
    }

    function getlistUser()
    {
        return response($this->userService->getUser());
    }

    function createUser()
    {
        $response = response("", 201);
        $validator = $this->validator->validate();
        if ($validator->fails()) {
            $response = response([
                "status" => 422,
                "message" => "Error",
                "errors" => $validator->errors()
            ], 422);
        } else {
            $this->userService->postuser($this->request->all());
        }
        return $response;
    }
    function putUser(int $id)
    {
        $response = response("", 202);
        $this->userService->putUser($this->request->all(), $id);
        return $response;
    }
    function deleteUser(int $id)
    {

        $this->userService->delUser($id);
        $response = response("", 204);
        return $response;
    }
    function restoreUser(int $id)
    {

        $this->userService->restoreUser($id);
        $response = response("", 204);
        return $response;
    }
}
