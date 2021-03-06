<?php

namespace App\Http\Controllers;

use App\UserFile;

class ReportController extends Controller
{

    /**
     * @param UserFile $file
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(UserFile $file)
    {
        return view('reports.show', ['file' => $file]);
    }
}
