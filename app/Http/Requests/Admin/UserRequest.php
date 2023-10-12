<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = $this->{$this->route()->getActionMethod() . 'Rules'}();
        // dd($this->route()->getActionMethod());
        array_walk($rules, function (&$value, $key) { // add 'bail' to all rules
            array_unshift($value, 'bail');
        });

        return $rules;
    }

    protected function indexRules()
    {
        return [
            'is_draft' => ['sometimes', 'required', 'numeric', 'in:0,1'],
            'paginate' => ['sometimes', 'required', 'integer', 'gte:0'],
            'page' => ['sometimes', 'required', 'integer', 'gt:0'],
            'sort' => ['sometimes', 'required', 'string', 'in:id,created_at,title,post_date,category,type_id'],
            'order' => ['sometimes', 'required_with:sort', 'in:asc,desc'],
        ];
    }

    protected function storeRules()
    {
        return [
            'name' => ['required'],
            'email' => ['required', 'unique:users,email'],
            'password' => ['required'],
            'cpassword' => ['same:password'],
            'phone' => ['required'],
            'role' => ['required'],
            'useradress.*.city' => ['required'],
            'useradress.*.address1' => ['required'],
            'useradress.*.address2' => ['required'],
            'useradress.*.postalcode' => ['required'],
            'useradress.*.landmark' => ['required'],
            'useradress.*.label' => ['required'],
        ];
    }

    protected function updateRules()
    {
        return [
            'name' => ['sometimes', 'required'],
            'email' => ['sometimes', 'required'],
            'phone' => ['sometimes', 'required'],
            'role' => ['sometimes', 'required'],
            'useradress.*.city' => ['required'],
            'useradress.*.address1' => ['required'],
            'useradress.*.address2' => ['required'],
            'useradress.*.postalcode' => ['required'],
            'useradress.*.landmark' => ['required'],
            'useradress.*.label' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'useradress.0.city.required' => "Please enter city in adress.!",
            'useradress.0.address1.required' => "please enter address 1 in address !.",
            'useradress.0.address2.required' => "please enter address 2 in address.",
            'useradress.0.postalcode.required' => "please enter postalcode in address.",
            'useradress.0.landmark.required' => "please enter landmark in address!.",
            'useradress.0.label.required' => "please enter label in address .!",
        ];
    }
}
