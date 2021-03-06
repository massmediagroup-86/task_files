<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFileRequest;
use App\UserFile;
use App\Services\ManageUserFile;
use App\Contracts\SaveUserFileContract;
use Illuminate\Support\Facades\Auth;

class FileController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(UserFile::class, 'file');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = UserFile::query()->where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        return view('files.index', ['user_files' => $files]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('files.form', ['userFileModel' => null]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreFileRequest $storeRequest
     * @param ManageUserFile $manageUserFile
     * @param SaveUserFileContract $saveUserFileContract
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFileRequest $storeRequest, ManageUserFile $manageUserFile)
    {
        $validated = $storeRequest->validated();

        $manageUserFile->save($validated, Auth::id());

        return redirect()->route('files.index');
    }

    /**
     * Display the specified resource.
     *
     * @param UserFile $file
     * @return \Illuminate\Http\Response
     */
    public function show(UserFile $file)
    {
        return view('files.show', ['userFileModel' => $file]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param UserFile $file
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(UserFile $file)
    {
        return view('files.form', ['userFileModel' => $file]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreFileRequest $storeRequest
     * @param ManageUserFile $manageUserFile
     * @param UserFile $file
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(
        StoreFileRequest $storeRequest,
        ManageUserFile $manageUserFile,
        UserFile $file
    ) {
        $validated = $storeRequest->validated();

        $manageUserFile->save($validated, Auth::id(), $file);

        return redirect()->route('files.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param UserFile $file
     * @param ManageUserFile $manageUserFile
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserFile $file, ManageUserFile $manageUserFile)
    {
        $manageUserFile->removeUserFile($file);
        return redirect()->route('files.index');
    }
}
