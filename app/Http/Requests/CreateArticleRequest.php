<?php

namespace App\Http\Requests;

use App\Support\ACL\Permissions;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->hasPermissionTo(Permissions::CREATE_ARTICLE);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'heading'=> 'string|required',
            'text' => 'string|required',
            'hidden' => 'boolean|required'
        ];
    }
}
