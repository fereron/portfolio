<?php

namespace App\Http\Controllers;

use App\Category;
use App\Spare;
use App\Type;
use DB;
use Illuminate\Http\Request;

class SparesController extends Controller
{

    public function index()
    {
        $types = Type::all();

//        dd($types);

        return view('types', ['types' => $types]);
    }

    public function categories($type_id) {
        $categories = Category::all();

        return view('categories', ['type_id' => $type_id, 'categories' => $categories]);
    }

    public function spares($type_id, $category_id) {

        $spares = DB::table('spares as s')
            ->join('spare_category as c', 'c.spare_id', '=', 's.id')
            ->join('spare_type as t', 't.spare_id', '=', 's.id')
            ->where('t.type_id', $type_id)
            ->where('c.category_id', $category_id)
            ->select('s.*')->get();

        dd($spares);


    }


}
