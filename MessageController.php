<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Message;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\App;



class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function index()
    {
        // return "sss";
        $currentRoute = explode("/", URL::current())[4];
        if ($currentRoute != "message") {
            $message = Message::showList();
            return $message;
        } else {
            $message = Message::index();
            return View('message.message', ['messages' => $message]);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('message.insertMessage');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        Message::insertMessage($request);
        // return $request->input('msg_content');
        return redirect(route('index', App::getLocale()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $users = DB::table('T_MESSAGES')->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($lang, $id)
    {
        //
        $message = Message::searchById($id);
        return View('message.editMessage', ['message' => $message]);
        // return View('message.editMessage');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $lang, $id)
    {
        $message = Message::find($id);
        $message->message_content = $request->input('msg_content');
        $message->save();
        return redirect(route('message.index', $lang))->with('status', 'Message is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($lang, $id)
    {
        Message::destroy($id);
        return redirect(route('message.index', $lang))->with('status', 'Message is successfully deleted.');
    }
}
