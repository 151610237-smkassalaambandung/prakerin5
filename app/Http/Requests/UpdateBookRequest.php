<?php

namespace App\Http\Requests;

class Update extends StoreBookRequest
{
    
    public function rules()
    {
        return [
            //
        $rules = parent::rules();
        $rules['title']='required|unique:books,title,'.$this->route('book');
        return $rules;
        ];
    }
}
