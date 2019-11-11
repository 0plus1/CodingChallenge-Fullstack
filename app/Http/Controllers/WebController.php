<?php

namespace App\Http\Controllers;

use App\Models\Shelf;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class WebController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        return view('app.pages.index');
    }

    public function read($shelf_slug){
        $shelf = Shelf::where('slug', '=', $shelf_slug)->first();

        return view('app.pages.read')->withShelf($shelf);
    }
}
