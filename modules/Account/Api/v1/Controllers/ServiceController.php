<?php

namespace Swedigo\Modules\Account\Api\v1\Controllers;

use Illuminate\Http\Request;
use Swedigo\Modules\Account\Api\v1\Repositories\ServiceRepository;
use Swedigo\Modules\Account\Api\v1\Request\CreateServiceRequest;
use Swedigo\Modules\Account\Api\v1\Transformers\ServiceTransformer;
use Swedigo\Modules\BaseController;

class ServiceController extends BaseController
{


    /**
     * @var ServiceRepository
     */
    protected $serviceRepository;

    /**
     * @var ServiceTransformer
     */
    protected $serviceTransformer;

    public function __construct(ServiceRepository $serviceRepository, ServiceTransformer $serviceTransformer)
    {
        $this->serviceRepository = $serviceRepository;
        $this->serviceTransformer = $serviceTransformer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return $this->transform($this->serviceRepository->listServices(),$this->serviceTransformer);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateServiceRequest $request
     * @return void
     */
    public function store(CreateServiceRequest $request)
    {
       $service =  $this->serviceRepository->create($request->all());

       if(!$service)
           return $this->error("Unable to create service",500);


       return $this->transform($service,$this->serviceTransformer);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
