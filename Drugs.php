<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Drugs extends Model
{
    use HasFactory;

    public static function showList()
    {
        $drugs = DB::table('drugs')->limit(5)->orderBy('created_at', 'desc')->get();
        return $drugs;
    }
    public static function index()
    {
        $drugs = Drugs::orderBy('created_at', 'desc')->paginate(5);
        return $drugs;
    }
    public static function insertDrug($request)
    {
        $newDrug = new Drugs();
        $newDrug->drug_name = $request->input("name");
        $newDrug->drug_ml = $request->input("ml");
        $newDrug->drug_price = $request->input("price");
        $newDrug->drug_amount = $request->input("amount");
        $newDrug->save();
    }
    public static function searchById($id)
    {
        return Drugs::find($id);
    }
    public static function updateDrug($request, $id)
    {
        $drug = Drugs::find($id);
        $drug->drug_name = $request->input("name");
        $drug->drug_ml = $request->input("ml");
        $drug->drug_amount = $request->input("amount");
        $drug->drug_price = $request->input("price");
        $drug->save();
    }
}
