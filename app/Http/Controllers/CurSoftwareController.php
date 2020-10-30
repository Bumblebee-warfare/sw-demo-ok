<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\tb_cur_software;
use DB;

class CurSoftwareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objs= tb_cur_software::where('sw_status','=','PRODUCTION')
        ->where('delete_flag','=','0')
        ->get();
        $data['objs'] = $objs;
        $_msrev=array();
        $msrev= tb_cur_software::where('sw_status','=','PRODUCTION')
        ->where('delete_flag','=','0')
        ->get();
        foreach ($msrev as $key => $value) 
        {
            if (in_array($value->master_rev, $_msrev)) 
            {

            }
            else
            {
                array_push($_msrev,$value->master_rev);
            }
        }
        $data['msrev'] = $_msrev;

        return view('software_detail',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['method']="POST";
        return view('../software_add',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datetime = date("Y-m-d H:i:s");

        $obj = new tb_cur_software();
        $obj->master_rev        = $request->input('master_rev');
        $obj->product_name      = $request->input('product_name');
        $obj->sw_status         = $request->input('sw_status');
        $obj->sw_status_desc    = $request->input('sw_status_desc');
        $obj->operation         = $request->input('operation');
        $obj->Platform          = $request->input('Platform');
        $obj->tester            = $request->input('tester');
        $obj->timestamp         = $datetime;
        $obj->emp_id            = $request->input('employee_id');
        $obj->save();

        $objs= tb_cur_software::where('delete_flag','=','0')->get();
        $data['objs'] = $objs;

        $_msrev=array();
        $msrev= tb_cur_software::where('sw_status','=','PRODUCTION')->where('delete_flag','=','0')->get();
        foreach ($msrev as $key => $value) 
        {
            if (in_array($value->master_rev, $_msrev)) 
            {

            }
            else
            {
                array_push($_msrev,$value->master_rev);
            }
        }
        $data['msrev'] = $_msrev;

        return view('software_detail',$data);
    }

    public function event(Request $request)
    { 
        $inputfrom = $request->input('inputfrom');
        $productname = $request->input('productname');
        $masterrev = $inputfrom == "ddl_productname"? "SELECT_ALL" : $request->input('masterrev');

        $objs = array();
        if($productname == "SELECT_ALL" && $masterrev =="SELECT_ALL")
        {
            $objs= tb_cur_software::where('delete_flag','=','0')
            ->orderBy('updated_at','desc')
            ->get();
        }
        elseif ($productname == "SELECT_ALL" && $masterrev !="SELECT_ALL") 
        {
            $objs= tb_cur_software::where('delete_flag','=','0')
            ->where('master_rev','=',$masterrev)
            ->orderBy('updated_at','desc')
            ->get();
        }
        elseif ($productname != "SELECT_ALL" && $masterrev =="SELECT_ALL") 
        {
            $objs= tb_cur_software::where('delete_flag','=','0')
            ->where('product_name','=',$productname)
            ->orderBy('updated_at','desc')
            ->get();
        }
        elseif ($productname != "SELECT_ALL" && $masterrev !="SELECT_ALL") 
        {
            $objs= tb_cur_software::where('delete_flag','=','0')
            ->where('product_name','=',$productname)
            ->where('master_rev','=',$masterrev)
            ->orderBy('updated_at','desc')
            ->get();
        }

        
        $dataItems= '';
        $array_dropdown=array();
        foreach ($objs as $key => $value) 
        {
            if (in_array($value->master_rev, $array_dropdown)) { 
            }
            else
            {
                array_push($array_dropdown,$value->master_rev);
            }

            $dataItems .= '<tr>';
            $dataItems .= '<td style="border-right:1px solid #ddd;"><a href="#">' . $value->product_name    . '</a></td>';
            $dataItems .= '<td style="border-right:1px solid #ddd;"><a href="#">' . $value->sw_status       . '</a></td>';
            $dataItems .= '<td style="border-right:1px solid #ddd;"><a href="#">' . $value->sw_status_desc  . '</a></td>';
            $dataItems .= '<td style="border-right:1px solid #ddd;"><a href="#">' . $value->master_rev      . '</a></td>';
            $dataItems .= '<td style="border-right:1px solid #ddd;"><a href="#">' . $value->operation       . '</a></td>';
            $dataItems .= '<td style="border-right:1px solid #ddd;"><a href="#">' . $value->Platform        . '</a></td>';
            $dataItems .= '<td style="border-right:1px solid #ddd;"><a href="#">' . $value->testername      . '</a></td>';
            $dataItems .= '<td style="border-right:1px solid #ddd;"><a href="#">' . $value->timestamp       . '</a></td>';
            $dataItems .= '<td style="border-right:1px solid #ddd;"><a href="#">' . $value->emp_id          . '</a></td>';
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
        $objs= tb_cur_software::where('product_name','=',$id)->where('delete_flag','=','0')->get();
        $data['objs'] = $objs;

        $_msrev=array();
        $msrev= tb_cur_software::where('sw_status','=','PRODUCTION')->where('product_name','=',$id)->where('delete_flag','=','0')->get();
        foreach ($msrev as $key => $value) 
        {
            if (in_array($value->master_rev, $_msrev)) 
            {

            }
            else
            {
                array_push($_msrev,$value->master_rev);
            }
        }
        $data['msrev'] = $_msrev;


        return view('software_detail',$data);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

       $devname= tb_cur_software::where('id','=',$id)->get();
        //echo "string";
       $data['method']="PUT";
       $data['id']=$id;
       $data['record']=$devname;
        //dd($devname);
       return view('../software_detail/edit',$data);
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
        $component              = tb_cur_software::where('id',$request->input('id'))->update([
            "master_rev"        => $request->input('master_rev'),
            "product_name"      => $request->input('product_name'),
            "sw_status"         => $request->input('sw_status'),
            "sw_status_desc"    => $request->input('sw_status_desc'),
            "operation"         => $request->input('operation'),
            "Platform"          => $request->input('Platform'),
            "tester"            => $request->input('tester'),
            "timestamp"         => $datetime,
            "emp_id"            => $request->input('employee_id'),
        ]);
        return $component;
    }

    public function delete(Request $request)
    {
        $component          = tb_cur_software::where('id',$request->input('id'))->update([
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

    public function chart(Request $request)
    {
        $_name=array();
        $_vals=array();
        //
        $name = DB::select("select ProductName, count(Quantity) as 'total' from tb_tester_inventory where Platform = '" . $request->input('Platform') . "' group by ProductName");
        //$name = DB::select("select a.product_name from tb_cur_softwares a where a.Platform='" . $request->input('Platform') . "' group by a.product_name");
        
        foreach ($name as $key => $value) 
        {
            array_push($_name,$value->ProductName);
            array_push($_vals,$value->total);
        }


        $objs['name'] =$_name;
        $objs['vals'] =$_vals;
        return $objs;
    }
    
    public function chart2(Request $request)
    {

        // $name = DB::select("select a.product_name from tb_cur_softwares a where a.Platform='" . $request->input('Platform') . "' group by a.product_name");
        // $_name=array();
        // foreach ($name as $key => $value) 
        // {
        //     array_push($_name,$value->product_name);
        // }


        // $vals = DB::select("select count(a.product_name) as total from tb_cur_softwares a where a.Platform='" . $request->input('Platform') . "' group by a.product_name");
        // $_vals=array();
        // foreach ($vals as $key => $value) 
        // {
        //     array_push($_vals,$value->total);
        // }

        $objs['name'] =$_name;
        $objs['vals'] =$_vals;
        return $objs;
    }
}
