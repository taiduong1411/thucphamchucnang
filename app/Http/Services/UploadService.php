<?php


namespace App\Http\Services;
class UploadService
{
    public function store($request)
    {
        if ($request->hasFile('file')) {
            $name = $request->file('file')->getClientOriginalName();
            dd($name);
            $path = $request->file('file')->storeAs(
                'uploads/' . date("Y/m/d"), $name
            );

            dd($path);
        }
            
    }
}