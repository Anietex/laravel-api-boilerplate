<?php


namespace Swedigo\Modules\Account\Api\v1\Transformers;


use League\Fractal\TransformerAbstract;
use Swedigo\Modules\Account\Models\User;

class UserTransformer extends TransformerAbstract
{

    public function transform(User $user){
        return [
          "id"=>$user->id,
          "email"=>$user->email,
          "name"=>$user->name,
        ];
    }
}
