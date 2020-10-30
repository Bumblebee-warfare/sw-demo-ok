<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\tb_developer;

class DeveloperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objs= tb_developer::where('delete_flag','=','0')->get();
        $data['objs'] = $objs;

        $_devname=array();
        $devname= tb_developer::where('delete_flag','=','0')->get();


        foreach ($devname as $key => $value) 
        {
            if (in_array($value->dev_product, $_devname)) 
            {

            }
            else
            {
                array_push($_devname,$value->dev_product);
            }
        }
        $data['devname'] = $_devname;

        return view('developer',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['method']="POST";
        return view('../developer_add',$data);
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
        $obj = new tb_developer();
        $obj->dev_id        =$request->input('dev_id');
        $obj->dev_name      =$request->input('dev_name');
        $obj->dev_email     =$request->input('dev_email');
        $obj->dev_dept      =$request->input('dev_dept');
        $obj->dev_picture   ='';
        $obj->dev_product   =$request->input('dev_product');
        $obj->save();

        $objs= tb_developer::where('delete_flag','=','0')->get();
        $data['objs'] = $objs;

        $_devname=array();
        $devname= tb_developer::where('delete_flag','=','0')->get();


        foreach ($devname as $key => $value) 
        {
            if (in_array($value->dev_product, $_devname)) 
            {

            }
            else
            {
                array_push($_devname,$value->dev_product);
            }
        }
        $data['devname'] = $_devname;

        return view('developer',$data);
    }

    public function event(Request $request)
    { 
        $inputfrom = $request->input('inputfrom');
        $empname = $request->input('empname');
        $product = $inputfrom == "ddl_empname"? "SELECT_ALL" : $request->input('product');

        $objs = array();
        if($empname == "SELECT_ALL" && $product =="SELECT_ALL")
        {
            $objs= tb_Developer::where('delete_flag','=','0')
            ->orderBy('updated_at','desc')
            ->get();
        }
        elseif ($empname == "SELECT_ALL" && $product !="SELECT_ALL") 
        {
            $objs= tb_Developer::where('delete_flag','=','0')
            ->where('dev_product','=',$product)
            ->orderBy('updated_at','desc')
            ->get();
        }
        elseif ($empname != "SELECT_ALL" && $product =="SELECT_ALL") 
        {
            $objs= tb_Developer::where('delete_flag','=','0')
            ->where('dev_name','=',$empname)
            ->orderBy('updated_at','desc')
            ->get();
        }
        elseif ($empname != "SELECT_ALL" && $product !="SELECT_ALL") 
        {
            $objs= tb_Developer::where('delete_flag','=','0')
            ->where('dev_name','=',$empname)
            ->where('dev_product','=',$product)
            ->orderBy('updated_at','desc')
            ->get();
        }

        
        $dataItems= '';
        $array_dropdown=array();
        foreach ($objs as $key => $value) 
        {
            if (in_array($value->dev_product, $array_dropdown)) { 
            }
            else
            {
                array_push($array_dropdown,$value->dev_product);
            }

            $dataItems .= '<tr>';
            $dataItems .= '<td class="sorting" align="center">';
            $dataItems .= '<a onclick="deletex(' . $value->id . ');" href="" data-toggle="tooltip" data-placement="top" data-original-title="Delete"><i class="fa fa-trash-o"></i></a> &nbsp;';
            $dataItems .= '<a href="http://localhost:8000/sw-demo/developer/' . $value->id . '/edit" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i></a>';
            $dataItems .= '</td>';
            $dataItems .= '<td class="sorting">' . $value->dev_id         . '</td>';
            $dataItems .= '<td class="sorting">' . $value->dev_name       . '</td>';
            $dataItems .= '<td class="sorting">' . $value->dev_email      . '</td>';
            $dataItems .= '<td class="sorting">' . $value->dev_dept       . '</td>';
            $dataItems .= '<td class="sorting">' . $value->dev_product    . '</td>';
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

     $devname= tb_developer::where('id','=',$id)->get();
        //echo "string";
     $data['method']="PUT";
     $data['id']=$id;
     $data['record']=$devname;
        //dd($devname);
     return view('../developer/edit',$data);
 }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request)
    {
        $component          = tb_developer::where('id',$request->input('id'))->update([
            "dev_id"        => $request->input('dev_id'),
            "dev_name"      => $request->input('dev_name'),
            "dev_email"     => $request->input('dev_email'),
            "dev_dept"      => $request->input('dev_dept'),
            "dev_product"   => $request->input('dev_product')
        ]);
        return $component;
    }

    public function delete(Request $request)
    {
        $component          = tb_developer::where('id',$request->input('id'))->update([
            "delete_flag"        => $request->input('delete_flag')
        ]);
        return $component;
    }
    public function updatex(Request $request, $id)
    {
        echo "string";
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
