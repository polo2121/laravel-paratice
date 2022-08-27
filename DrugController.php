<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drugs;
use Illuminate\Support\Facades\URL;



class DrugController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function index()
    {
        //
        $currentRoute = explode("/", URL::current())[3];
        if ($currentRoute != "drugs") {
            $drug = Drugs::showList();
            return $drug;
        } else {
            $drug = Drugs::index();
            return View('drugs.index', ['drugs' => $drug]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View('drugs.insert');
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
        Drugs::insertDrug($request);
        return redirect(route('drugs.index'))->with('status', 'The data is successfully inserted');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $drug = Drugs::searchById($id);
        // dd($drug);
        return View('drugs.edit', ['drug' => $drug]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        Drugs::updateDrug($request, $id);
        return redirect(route('drugs.index'))->with('status', 'Message is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Drugs::destroy($id);
        return redirect(route('drugs.index'))->with('status', 'Drug Record is successfully deleted.');
    }
}
