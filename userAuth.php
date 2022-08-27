<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\userAuth as requestInput;



class userAuth implements Rule
{
    private $errorMessage, $currentEmail;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($email)
    {
        //
        $this->currentEmail = $email;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //
        if ($attribute == 'email') {
            if (DB::table('users')->where('email', $value)->exists()) {
                $this->currentEmail = $value;
                return true;
            }
            $this->errorMessage = "The email is not register yet.";
        } else {
            $pwd = DB::table('users')->where('email', $this->currentEmail)->value('password');
            if ($value == $pwd) {
                session(['userId' => $this->currentEmail]);
                return true;
            }
            $this->errorMessage = 'incorrect user';
        };

        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->errorMessage;
    }
}
