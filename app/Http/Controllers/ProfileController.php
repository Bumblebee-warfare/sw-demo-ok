<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //echo "string";
        return view('profile');
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatex(Request $request, $id)
    {
        //
    }

    public function update(Request $request)
    {
        $file = $request->file('fileUpload');

        if($file == ""){
            $component          = User::where('employee_id',$request->input('employee_id'))->update([
                "name"                  => $request->input('employee_name'),
                "department"            => $request->input('department'),
                "email"                 => $request->input('email'),
                "phone"                 => $request->input('phone'),
                "mobile"                => $request->input('mobile')
            ]);
        }
        else
        {
            $destinationPath = 'images';
            $fileName = $request->get('employee_id') . '.png';
            $request->file('fileUpload')->move($destinationPath, $fileName);

            $component          = User::where('employee_id',$request->input('employee_id'))->update([
                "name"                  => $request->input('employee_name'),
                "department"            => $request->input('department'),
                "email"                 => $request->input('email'),
                "phone"                 => $request->input('phone'),
                "images"                => $fileName ,
                "mobile"                => $request->input('mobile')
            ]);
        }
        return "x";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
