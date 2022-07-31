<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Http\Requests\StoreFileRequest;
use App\Http\Requests\UpdateFileRequest;
use App\Http\Resources\FileResource;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return FileResource::collection(File::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFileRequest $request)
    {
        $new_file = rand() . time() . rand() . $request->file('file')->getClientOriginalName();
        $new_file = str_replace(' ', '', $new_file);
        $new_file = strtolower($new_file);
        $path = Storage::disk('local')->put('uploads', $request->file('file'), $new_file);
        $file = File::create([
            'path' => $path,
            'mimeType' => $request->file('file')->extension(),
            'file_name' => $new_file
        ]);
        return new FileResource($file);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        return new FileResource($file);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFileRequest  $request
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFileRequest $request, File $file)
    {
        $new_file = rand() . time() . rand() . $request->file('file')->getClientOriginalName();
        $new_file = str_replace(' ', '', $new_file);
        $new_file = strtolower($new_file);
        $path = Storage::disk('local')->put('uploads', $request->file('file'), $new_file);

        $file->update([
            'path' => $path,
            'mimeType' => $request->file('file')->extension(),
            'file_name' => $new_file
        ]);
        return new FileResource($file);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        $file->delete();
    }
}
