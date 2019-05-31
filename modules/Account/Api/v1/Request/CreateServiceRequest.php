<?php
namespace Swedigo\Modules\Account\Api\v1\Request;



use Dingo\Api\Http\FormRequest;

class CreateServiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
           "name"=>"required|unique:services,name",
        ];
    }
}
