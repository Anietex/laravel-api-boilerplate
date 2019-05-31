<?php


namespace Swedigo\Modules;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller ;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Serializer\ArraySerializer;

class BaseController  extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    protected function success($data)
    {


        return response()->json([
            'status'     => "success",
            'data'        => $data,
        ]);
    }

    protected function successWithPages($paginator, $transformer)
    {

        $collection = $paginator->getCollection();

        $data = fractal()
            ->collection($collection)
            ->transformWith($transformer)
            ->serializeWith(new ArraySerializer())
            ->withResourceName('items')
            ->paginateWith(new IlluminatePaginatorAdapter($paginator))
            ->toArray();
        return response()->json([
            'status'     => "success",
            'data'        => $data
        ]);
    }

    protected function fail($data,$status=500)
    {
        return response()->json([
            'status'     => "fail",
            'data'        => $data,
        ],$status);
    }

    protected function transform($model, $transformer)
    {
        $data = fractal($model, $transformer)->serializeWith(new \Spatie\Fractalistic\ArraySerializer());
        return $this->success($data);
    }

    protected function error($message,$code=400)
    {
        return response()->json([
            'status'     => "error",
            'message'    => $message,
        ],400);
    }
}
