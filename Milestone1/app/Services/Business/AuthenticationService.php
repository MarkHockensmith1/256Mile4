<?php
namespace App\Services;
use App\Models\User;
use app\Services\Data\UserDataService;

class AuthenticationService
{

    private $dataService;
    public function __construct(UserDataService $service){
        $this->dataService=$service->findUser($user);
    }
    

    
    public function tryLogin(User $user)
    {
        $result = $this->dataService->findUser($user);
        //if($user->username == $result->)
    }

    public function tryRegister(User $user)
    {}

}

