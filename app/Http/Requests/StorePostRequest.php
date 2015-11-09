<?php

namespace Blog\Http\Requests;

class StorePostRequest extends Request
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
            'title'    => 'required',
            'category' => 'required',
            'tags'     => 'required',
            'body'     => 'required'
        ];
    }
}
