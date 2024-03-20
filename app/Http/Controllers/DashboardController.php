<?php

namespace App\Http\Controllers;

use App\Repositories\CatalogRepository;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $catalog;

    public function __construct(CatalogRepository $catalog)
    {
        $this->catalog = $catalog;
    }

    public function index()
    {
        $totalCatalog = $this->catalog->getAll()->count();
        return view('dashboard', compact('totalCatalog'));
    }
}
