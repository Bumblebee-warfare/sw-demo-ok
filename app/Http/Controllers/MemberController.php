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

        $objs= tb_member::where('delete_flag','=','0')->get();
        $data['objs'] = $objs;

        $_empname=array();
        $empname= tb_member::where('delete_flag','=','0')->get();
        foreach ($empname as $key => $value) 
        {
            if (in_array($value->emp_name, $_empname)) 
            {

            }
            else
            {
                array_push($_empname,$value->emp_name);
            }
        }
        $data['empname'] = $_empname;

        return view('member',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['method']="POST";
        return view('../member_add',$data);
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
        $obj->emp_id        = $request->input('emp_id');
        $obj->emp_name      = $request->input('emp_name');
        $obj->emp_email     = $request->input('emp_email');
        $obj->emp_dept      = $request->input('emp_dept');
        $obj->emp_picture   = '';
        $obj->emp_password  = '';
        $obj->save();

        $objs= tb_member::where('delete_flag','=','0')->get();
        $data['objs'] = $objs;

        $_empname=array();
        $empname= tb_member::where('delete_flag','=','0')->get();
        foreach ($empname as $key => $value) 
        {
            if (in_array($value->emp_name, $_empname)) 
            {

            }
            else
            {
                array_push($_empname,$value->emp_name);
            }
        }
        $data['empname'] = $_empname;
        return view('member',$data);
    }

    public function event(Request $request)
    { 
        $inputfrom = $request->input('inputfrom');
        $empid = $request->input('empid');
        $empname = $inputfrom == "ddl_empid"? "SELECT_ALL" : $request->input('empname');

        $objs = array();
        if($empid == "SELECT_ALL" && $empname =="SELECT_ALL")
        {
            $objs= tb_member::where('delete_flag','=','0')
            ->orderBy('updated_at','desc')
            ->get();
        }
        elseif ($empid == "SELECT_ALL" && $empname !="SELECT_ALL") 
        {
            $objs= tb_member::where('delete_flag','=','0')
            ->where('emp_name','=',$empname)
            ->orderBy('updated_at','desc')
            ->get();
        }
        elseif ($empid != "SELECT_ALL" && $empname =="SELECT_ALL") 
        {
            $objs= tb_member::where('delete_flag','=','0')
            ->where('emp_id','=',$empid)
            ->orderBy('updated_at','desc')
            ->get();
        }
        elseif ($empid != "SELECT_ALL" && $empname !="SELECT_ALL") 
        {
            $objs= tb_member::where('delete_flag','=','0')
            ->where('emp_id','=',$empid)
            ->where('emp_name','=',$empname)
            ->orderBy('updated_at','desc')
            ->get();
        }

        
        $dataItems= '';
        $array_dropdown=array();
        foreach ($objs as $key => $value) 
        {
            if (in_array($value->emp_name, $array_dropdown)) { 
            }
            else
            {
                array_push($array_dropdown,$value->emp_name);
            }

            $dataItems .= '<tr>';
            $dataItems .= '<td class="sorting" align="center">';
            $dataItems .= '<a onclick="deletex(' . $value->id . ');" href="" data-toggle="tooltip" data-placement="top" data-original-title="Delete"><i class="fa fa-trash-o"></i></a> &nbsp;';
            $dataItems .= '<a href="http://localhost:8000/sw-demo/member/' . $value->id . '/edit" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i></a>';
            $dataItems .= '</td>';
            $dataItems .= '<td class="sorting">' . $value->emp_id         . '</td>';
            $dataItems .= '<td class="sorting">' . $value->emp_name       . '</td>';
            $dataItems .= '<td class="sorting">' . $value->emp_email      . '</td>';
            $dataItems .= '<td class="sorting">' . $value->emp_dept       . '</td>';
            $dataItems .= '</tr>';
        }

        $dropdown='<option>SELECT_ALL</option>';
        foreach ($array_dropdown as $key => $value) 
        {
            $dropdown .= '<option>' . $value . '</option>';
        }
        
        $data['dropdown'] = $dropdown;
        $data['dataItems'] = $dataItems;

        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $devname= tb_member::where('id','=',$id)->get();
        //echo "string";
       $data['method']="PUT";
       $data['id']=$id;
       $data['record']=$devname;
        //dd($devname);
       return view('../member/edit',$data);
    }

    public function update(Request $request)
    {
        $component          = tb_member::where('id',$request->input('id'))->update([
            "emp_id"        => $request->input('emp_id'),
            "emp_name"      => $request->input('emp_name'),
            "emp_email"     => $request->input('emp_email'),
            "emp_dept"      => $request->input('emp_dept')
        ]);
        return $component;
    }

    public function delete(Request $request)
    {
        $component          = tb_member::where('id',$request->input('id'))->update([
            "delete_flag"        => $request->input('delete_flag')
        ]);
        return $component;
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
