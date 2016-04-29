<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PostRequest extends Request
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
            'category_id' => 'regex:/[0-9]{1,}/',
            'user_id' => 'integer',
            'title' => 'required|string',
            'content' => 'required',
            'status' => 'required|in:published,unpublished',
            'published_at' => 'date',
            'tag_id' => 'tags',
            'name' => 'string|max:20',
            'picture' => 'image|max:1024',
            'deleteImg' => 'in:deleteImg'
        ];
    }
}
