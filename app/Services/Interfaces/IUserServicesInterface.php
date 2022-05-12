<?php

namespace App\Services\Interfaces;

interface IUserServicesInterface
{
    function getUser();
    function getUserById(int $id);
    function postUser(array $user);
    function putUser(array $user, int $id);
    function delUser(int $id);
    /**
     * @param int $id
     * @return bool
     */
    function restoreUser(int $id);
}
