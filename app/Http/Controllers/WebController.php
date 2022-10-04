<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Interfaces\ShelfRepositoryInterface;

class WebController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $shelfRepository;


    public function __construct(ShelfRepositoryInterface $shelfRepository)
    {
        $this->shelfRepository = $shelfRepository;
    }


    public function index()
    {
        return view('app.pages.index', [
            'shelfs' => $this->shelfRepository->getAllSlugs()
        ]);
    }
}
