<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\tb_member;


class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {

        $objs= tb_member::all();
        $data['objs'] = $objs;
        return view('member',$data);
        //dd($objs);

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
                //## Insert
        $obj = new tb_member();
        $obj->emp_id = $request['8'];
        $obj->emp_name=$request['test'];
        $obj->emp_email=$request['test@mail'];
        $obj->emp_dept=$request['TDE'];
        $obj->emp_picture=$request[''];
        $obj->emp_password=$request[''];
        $obj->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $objs = tb_member::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $objs = tb_member::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $obj = find($id);
        $obj->emp_id = $request['8'];
        $obj->emp_name=$request['test'];
        $obj->emp_email=$request['test@mail'];
        $obj->emp_dept=$request['TDE'];
        $obj->emp_picture=$request[''];
        $obj->emp_password=$request[''];
        $obj->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $objs = tb_member::find($id);
        $objs->delete();
    }
}
