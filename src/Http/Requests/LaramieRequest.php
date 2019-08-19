<?php

namespace Pandorga\Laramie\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class LaramieRequest extends FormRequest
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
		return [];
	}

    /**
     * Get the class name of the resource being requested.
     *
     * @return mixed
     */
    public function resource()
    {
    	$resourceName = $this->route('resource');
    	$resourceClass = Str::singular(Str::studly(class_basename($resourceName)));
    	$classPath = '\\App\\Laramie\\Resources\\' . $resourceClass;

    	if (class_exists($classPath) == false) {
    		throw new \Exception(sprintf('Resource Class %s doesn\'t exists', $classPath));
    	}

        return $classPath;
    }
}
