<?php


namespace Swedigo\Modules\Account\Api\v1\Repositories;


use Swedigo\Modules\Account\Models\User;
use Swedigo\Modules\BaseRepository;

class UserRepository extends BaseRepository
{






    /**
     * @var User
     */
    private  $user;

    /**
     * UserRepository constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }


    public function register(array $userData){

       $user = $this->user->create($userData);



       $this->login($userData);




    }


    private function sendWelcomeEmail(User $user){
     //Todo: To be implemented
    }

    public function login(){

    }
}
