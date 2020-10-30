<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\tb_cur_software;
use App\models\tb_log_software;

class PlatformController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function createx($pf)
    {
        $data['method']         ="POST";
        $data['pf']             =$pf;

        return view('../Platform_add',$data);
    }
    public function create($pf)
    {
        $data['method']         ="POST";
        
        return view('../Platform_add',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request;
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

        $logs = new tb_log_software();
        $logs->status            = 'I';
        $logs->master_rev        = $request->input('master_rev');
        $logs->product_name      = $request->input('product_name');
        $logs->sw_status         = $request->input('sw_status');
        $logs->sw_status_desc    = $request->input('sw_status_desc');
        $logs->operation         = $request->input('operation');
        $logs->Platform          = $request->input('Platform');
        $logs->tester            = $request->input('tester');
        $logs->timestamp         = $datetime;
        $logs->emp_id            = $request->input('employee_id');
        $logs->save();

        return $obj;
    }

    public function event(Request $request)
    { 
          
        $employee_id=$request->input('employee_id');
        $inputfrom = $request->input('inputfrom');
        $Platform = $request->input('Platform');
        $productname = $request->input('productname');
        $masterrev = $inputfrom == "ddl_productname"? "SELECT_ALL" : $request->input('masterrev');

        $objs = array();
        if($productname == "SELECT_ALL" && $masterrev =="SELECT_ALL")
        {
            $objs= tb_cur_software::where('delete_flag','=','0')
            ->where('Platform','=',$Platform)
            ->orderBy('updated_at','desc')
            ->get();
        }
        elseif ($productname == "SELECT_ALL" && $masterrev !="SELECT_ALL") 
        {
            $objs= tb_cur_software::where('delete_flag','=','0')
            ->where('Platform','=',$Platform)
            ->where('master_rev','=',$masterrev)
            ->orderBy('updated_at','desc')
            ->get();
           
        }
        elseif ($productname != "SELECT_ALL" && $masterrev =="SELECT_ALL") 
        {
            $objs= tb_cur_software::where('delete_flag','=','0')
            ->where('Platform','=', $Platform)
            ->where('product_name','=',$productname)
            ->orderBy('updated_at','desc')
            ->get();

        
        }
        elseif ($productname != "SELECT_ALL" && $masterrev !="SELECT_ALL") 
        {
            $objs= tb_cur_software::where('delete_flag','=','0')
            ->where('Platform','=',$Platform)
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
            $dataItems .= '<td style="border-right:1px solid #ddd;"><a href="#">' . $value->product_name      . '</a></td>';
            $dataItems .= '<td style="border-right:1px solid #ddd;"><a href="#">' . $value->sw_status         . '</a></td>';
            $dataItems .= '<td style="border-right:1px solid #ddd;"><a href="#">' . $value->sw_status_desc    . '</a></td>';
            $dataItems .= '<td style="border-right:1px solid #ddd;"><a href="#">' . $value->master_rev        . '</a></td>';
            $dataItems .= '<td style="border-right:1px solid #ddd;"><a href="#">' . $value->operation         . '</a></td>';
            $dataItems .= '<td style="border-right:1px solid #ddd;"><a href="#">' . $value->Platform          . '</a></td>';
            $dataItems .= '<td style="border-right:1px solid #ddd;"><a href="#">' . $value->tester            . '</a></td>';
            $dataItems .= '<td style="border-right:1px solid #ddd;"><a href="#">' . $value->timestamp         . '</a></td>';
            $dataItems .= '<td style="border-right:1px solid #ddd;"><a href="#">' . $value->emp_id            . '</a></td>';
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
       
        $objs= tb_cur_software::where('delete_flag','=','0')
        ->where('Platform','=',$id)
        ->orderBy('updated_at','desc')
        ->get();
        
        $prod= tb_cur_software::select('product_name')
        ->where('Platform','=',$id)
        ->groupBy('product_name')
        ->orderBy('product_name','asc')
        ->get();

        $msrev= tb_cur_software::select('master_rev')
        ->where('Platform','=',$id)
        ->groupBy('master_rev')
        ->orderBy('master_rev','asc')
        ->get();

        $data['objs'] = $objs;
        $data['prod'] = $prod;
        $data['msrev'] = $msrev;

        return view('Platform',$data)->with('name', $id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
       $devname             = tb_cur_software::where('id','=',$id)->get();
       $data['method']      ="PUT";
       $data['id']          =$id;
       $data['record']      =$devname;

       return view('../Platform/edit',$data);
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
            "emp_id"            => $request->input('emp_id'),
        ]);


        $logs = new tb_log_software();
        $logs->status            = 'U';
        $logs->master_rev        = $request->input('master_rev');
        $logs->product_name      = $request->input('product_name');
        $logs->sw_status         = $request->input('sw_status');
        $logs->sw_status_desc    = $request->input('sw_status_desc');
        $logs->operation         = $request->input('operation');
        $logs->Platform          = $request->input('Platform');
        $logs->tester            = $request->input('tester');
        $logs->timestamp         = $datetime;
        $logs->emp_id            = $request->input('emp_id');
        $logs->save();

        return $component;
    }
    public function delete(Request $request)
    {
        $component          = tb_cur_software::where('id',$request->input('id'))->update([
            "delete_flag"        => $request->input('delete_flag')
        ]);
        
        $datetime                = date("Y-m-d H:i:s");
        $items                   =tb_cur_software::where('id','=',$request->input('id'))->get();
        $logs                    = new tb_log_software();
        $logs->status            = 'D';
        $logs->master_rev        = $items[0]->master_rev;
        $logs->product_name      = $items[0]->product_name;
        $logs->sw_status         = $items[0]->sw_status;
        $logs->sw_status_desc    = $items[0]->sw_status_desc;
        $logs->operation         = $items[0]->operation;
        $logs->Platform          = $items[0]->Platform;
        $logs->tester            = $items[0]->tester;
        $logs->timestamp         = $datetime;
        $logs->emp_id            = $request->input('emp_id');
        $logs->save();
        
        return $component;
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
