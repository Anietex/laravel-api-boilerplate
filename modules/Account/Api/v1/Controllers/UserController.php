<?php

namespace Swedigo\Modules\Account\Api\v1\Controllers;


use Swedigo\Modules\Account\Api\v1\Repositories\UserRepository;
use Swedigo\Modules\Account\Api\v1\Request\RegistrationRequest;
use Swedigo\Modules\Account\Api\v1\Transformers\UserTransformer;
use Swedigo\Modules\BaseController;

class UserController extends BaseController
{

    /**
     * @var UserRepository
     */
    private $userRepository;


    /**
     * @var UserTransformer
     */
    private $userTransformer;


    /**
     * UserController constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository,
                                UserTransformer $userTransformer)
    {
        $this->userRepository = $userRepository;
        $this->userTransformer = $userTransformer;
    }


    /**
     * Handles request for registering a new user
     * @param RegistrationRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(RegistrationRequest $request){

       $user =  $this->userRepository->register($request->all());

       return $this->transform($user,$this->userTransformer);
    }


    public function login(){

    }

    public function updateProfile(){

    }
}
