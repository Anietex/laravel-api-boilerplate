<?php


namespace Swedigo\Modules\Account\Api\v1\Repositories;


use Swedigo\Modules\Account\Models\Service;
use Swedigo\Modules\BaseRepository;

class ServiceRepository extends BaseRepository
{

    /**
     * @var Service
     */
    protected  $service;


    /**
     * ServiceRepository constructor.
     * @param Service $service
     */
    public function __construct(Service $service)
    {

        $this->service = $service;
    }


    /**
     *
     * Creates a new service
     * @param array $data
     * @return bool|Service
     */
    public function create(array $data){
        $data = (object)$data;

        $service = new Service();

        $service->id = $this->generateUuid();
        $service->name =  $data->name;
        $service->description = property_exists($data,'description')?$data->description:'';



        return $service->save()?$service:false;
//        if($service->save())
//            return $service;
//
//
//        return false;




    }


    /**
     * List all services
     * @return mixed
     */
    public function listServices(){

        return $this->service->get();
    }
}
