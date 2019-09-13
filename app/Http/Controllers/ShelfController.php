<?php


namespace App\Http\Controllers;

use App\Models\Shelf;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ShelfController extends WebController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * list all shelves
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function list()
    {
        return view('app.pages.shelf.list',['shelves'=>Shelf::all()]);
    }

    /**
     * show the shelf with the given slug
     *
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function read($slug)
    {
        return view('app.pages.shelf.read',['shelf' => Shelf::where('slug', $slug)->first()]);
    }
}