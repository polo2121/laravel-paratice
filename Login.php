<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    use HasFactory;
    public static function validateData($request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|regex:/(^[A-Z][a-z]+\d{4})/u',
        ]);
    }
}
