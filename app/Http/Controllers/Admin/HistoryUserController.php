<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Warranty;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

use Illuminate\Http\Request;

class HistoryUserController extends Controller
{
   public function index()
    {
        $warranties = Warranty::with('produk')
            ->latest()
            ->get();

        return view('admin.user-history.index', compact('warranties'));
    }
}