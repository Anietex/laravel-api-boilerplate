<?php


namespace Swedigo\Modules\Account\Api\v1\Transformers;


use League\Fractal\TransformerAbstract;
use Swedigo\Modules\Account\Models\Service;

class ServiceTransformer extends TransformerAbstract
{


    public function transform(Service $service){
        return [
            "id"=>$service->id,
            "name"=>$service->name,
            "created_at"=>$service->created_at
        ];
    }
}
