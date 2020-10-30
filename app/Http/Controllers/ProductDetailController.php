<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\tb_product;

class ProductDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //## Array data to view table
        $objs= tb_product::where('delete_flag','=','0')
        ->orderBy('timestamp','deac')
        ->get();
        $data['objs'] = $objs;


        //## Array data to dropdownlist
        $col_name='product_name';
        $product=array();
        $str_array= tb_product::select($col_name)
        ->where('delete_flag','=','0')
        ->groupBy($col_name)
        ->orderBy($col_name,'asc')
        ->get();
        foreach ($str_array as $key => $value) 
        {
            array_push($product,$value->$col_name);
        }
        $data['product'] = $product;

        //## Array data to dropdownlist
        $col_name='product_family';
        $family=array();
        $str_array= tb_product::select($col_name)
        ->where('delete_flag','=','0')
        ->groupBy($col_name)
        ->orderBy($col_name,'asc')
        ->get();
        foreach ($str_array as $key => $value) 
        {
            array_push($family,$value->$col_name);
        }
        $data['family'] = $family;

        return view('product_detail',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['method']="POST";
        return view('../product_add',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //## Insert new record
        $datetime = date("Y-m-d H:i:s");
        $obj = new tb_product();
        $obj->product_name      = $request->input('product_name');
        $obj->product_family    = $request->input('product_family');
        $obj->product_owner     = $request->input('product_owner');
        $obj->emp_id            = $request->input('emp_id');
        $obj->timestamp         = $datetime;
        $obj->save();

        //## Array data to view table
        $objs= tb_product::orderBy('timestamp','deac')
        ->get();
        $data['objs'] = $objs;

        //## Array data to dropdownlist
        $col_name='product_name';
        $product=array();
        $str_array= tb_product::select($col_name)
        ->where('delete_flag','=','0')
        ->groupBy($col_name)
        ->orderBy($col_name,'asc')
        ->get();
        foreach ($str_array as $key => $value) 
        {
            array_push($product,$value->$col_name);
        }
        $data['product'] = $product;

        //## Array data to dropdownlist
        $col_name='product_family';
        $family=array();
        $str_array= tb_product::select($col_name)
        ->where('delete_flag','=','0')
        ->groupBy($col_name)
        ->orderBy($col_name,'asc')
        ->get();
        foreach ($str_array as $key => $value) 
        {
            array_push($family,$value->$col_name);
        }
        $data['family'] = $family;

        return view('product_detail',$data);
    }

    public function event(Request $request)
    {         
        $employee_id=$request->input('employee_id');
        $inputfrom = $request->input('inputfrom');
        $productname = $request->input('productname');
        $productfamily = $inputfrom == "ddl_productname"? "SELECT_ALL" : $request->input('productfamily');

        $objs = array();
        if($productname == "SELECT_ALL" && $productfamily =="SELECT_ALL")
        {
            $objs= tb_product::where('delete_flag','=','0')
            ->orderBy('updated_at','desc')
            ->get();
        }
        elseif ($productname == "SELECT_ALL" && $productfamily !="SELECT_ALL") 
        {
            $objs= tb_product::where('delete_flag','=','0')
            ->where('product_family','=',$productfamily)
            ->orderBy('updated_at','desc')
            ->get();
        }
        elseif ($productname != "SELECT_ALL" && $productfamily =="SELECT_ALL") 
        {
            $objs= tb_product::where('delete_flag','=','0')
            ->where('product_name','=',$productname)
            ->orderBy('updated_at','desc')
            ->get();
        }
        elseif ($productname != "SELECT_ALL" && $productfamily !="SELECT_ALL") 
        {
            $objs= tb_product::where('delete_flag','=','0')
            ->where('product_name','=',$productname)
            ->where('product_family','=',$productfamily)
            ->orderBy('updated_at','desc')
            ->get();
        }



        $dataItems= '';
        $array_dropdown=array();
        foreach ($objs as $key => $value) 
        {
            if (in_array($value->product_family, $array_dropdown)) { 
            }
            else
            {
                array_push($array_dropdown,$value->product_family);
            }

            $dataItems .= '<tr class="even pointer">';
            if($employee_id != "Guest")
            {
                $dataItems .= '<td class="sorting" align="center">';
                $dataItems .= '<a onclick="deletex(' . $value->id . ');" href="" data-toggle="tooltip" data-placement="top" data-original-title="Delete"><i class="fa fa-trash-o"></i></a> &nbsp;';
                $dataItems .= '<a href="http://localhost:8000/sw-demo/product_detail/' . $value->id . '/edit" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i></a>';
                $dataItems .= '</td>';
            }
            else
            {
                $dataItems .= '<td class="sorting" align="center"></td>';
            }
            $dataItems .= '<td style="border-right:1px solid #ddd;"><a href="#">' . $value->product_name . '</a></td>';
            $dataItems .= '<td style="border-right:1px solid #ddd;"><a href="#">' . $value->product_family . '</a></td>';
            $dataItems .= '<td style="border-right:1px solid #ddd;"><a href="#">' . $value->product_owner . '</a></td>';
            $dataItems .= '<td style="border-right:1px solid #ddd;"><a href="#">' . $value->emp_id . '</a></td>';
            $dataItems .= '<td style="border-right:1px solid #ddd;"><a href="#">' . $value->timestamp . '</a></td>';
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
        $devname= tb_product::where('id','=',$id)->get();
        $data['method']             ="PUT";
        $data['id']                 =$id;
        $data['record']             =$devname;

        return view('../product_detail/edit',$data);
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
        $datetime = date("Y-m-d H:i:s");
        $component                  = tb_product::where('id',$request->input('id'))->update([
            "product_name"          => $request->input('product_name'),
            "product_family"        => $request->input('product_family'),
            "product_owner"         => $request->input('product_owner'),
            "emp_id"                => $request->input('emp_id'),
            "timestamp"             => $datetime
        ]);
        return $component;
    }

    public function delete(Request $request)
    {
        $component                  = tb_product::where('id',$request->input('id'))->update([
            "delete_flag"           => $request->input('delete_flag')
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
        //
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
