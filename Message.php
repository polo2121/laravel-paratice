<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;



class Message extends Model
{
    use HasFactory;
    public $table = "t_messages";

    public static function showList()
    {
        $messages = DB::table('T_MESSAGES')->limit(5)->get();
        return $messages;
    }
    public static function index()
    {
        $messages = Message::paginate(5);
        return $messages;
    }
    public static function searchById($id)
    {
        return Message::find($id);
    }
    public static function insertMessage($request)
    {
        try {
            //code...
            return DB::table('t_messages')->insert([
                'message_content' => $request->input('msg_content'),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return $th;
        }
    }
}
