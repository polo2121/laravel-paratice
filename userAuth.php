<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Rules\userAuth as RulesUserAuth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;


class userAuth extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $request = new Request();
        return [
            'email' => ['required', 'email', new RulesUserAuth($request->input($this->email))],
            'password' => ['required', 'min:8', 'regex:/(^[A-Z][a-z]+\d{4})/u', new RulesUserAuth($this->email)]
        ];
    }
}
