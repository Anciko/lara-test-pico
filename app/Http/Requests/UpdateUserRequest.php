<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $id = $this->admin_user->id;

        // dd($id);
        return [
            "name" => "required|unique:users,name,$id" ,
            "phone" => "required|unique:users,phone,$id",
            "email" => "required|unique:users,email,$id" ,
            "password" => "required|min:6,",
        ];
    }
}
