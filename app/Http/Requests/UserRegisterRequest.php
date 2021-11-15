<?php


namespace App\Http\Requests;


use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRegisterRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => [
                'regex:/^[a-zA-Z0-9Ññ\s]+$/',
                'required',
                'min:8',
                'max:32',
                'confirmed'],
            'phone' =>
                'required|
                 string|
                 max:12|
                 regex:/^\+?[78][-\(]?\d{3}\)?-?\d{3}-?\d{2}-?\d{2}$/|
                 unique:users,phone',
            'city' => 'string|max:25',
            'street' => 'string|max:25',
            'house' => 'string|max:25',
            'num_apartment' => 'string|max:25',
            'entrance' => 'string|max:25'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();

        $response = response()->json([
            'message' => 'Invalid data send',
            'details' => $errors->messages(),
        ], 422);

        throw new HttpResponseException($response);
    }
}
