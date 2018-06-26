<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LayananOfflineController extends Controller
{
    public function create(Request $request)
    {
        $this->setActive('offline');
        $this->setTitle('offline');
        // dd('a');
        return view('admin.offline.index', $this->data);
    }
}
