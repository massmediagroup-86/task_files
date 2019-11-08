<?php

namespace App\Http\Controllers;

use App\UserFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\ManageToken;

class TokensController extends Controller
{

    /**
     * @param UserFile $file
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function index(UserFile $file)
    {
        return view('tokens.index',['file'=>$file]);
    }


    /**
     * @param ManageToken $manageTokenService
     * @param UserFile $file
     * @return \Illuminate\Http\RedirectResponse
     */

    public function generate(ManageToken $manageTokenService, UserFile $file)
    {
        $manageTokenService->createToken($file);
        return redirect()->route('tokens.index',['file'=>$file] );
    }



}
