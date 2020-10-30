<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\tb_cur_software;
use App\models\tb_log_software;
use App\models\tb_member;
use DB;

class JobHisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $name = DB::table('tb_log_softwares')
        ->join('users', 'tb_log_softwares.emp_id', '=', 'users.employee_id')
        ->select('users.name')
        ->groupBy('users.name')
        ->orderBy('users.name','asc')
        ->get();

        $data['name'] = $name;


        $objs = DB::table('tb_log_softwares')
        ->join('users', 'tb_log_softwares.emp_id', '=', 'users.employee_id')
        ->select('tb_log_softwares.*','users.name')
        ->orderBy('timestamp','desc')
        ->get();
        $data['objs'] = $objs;

        return view('job_history',$data);
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

    }

    public function event(Request $request)
    { 
        $emp_id = $request->input('emp_id');

        
        $objs = array();
        if($emp_id == "SELECT_ALL")
        {
            $objs = DB::table('tb_log_softwares')
            ->join('users', 'tb_log_softwares.emp_id', '=', 'users.employee_id')
            ->select('tb_log_softwares.*','users.name')
            ->orderBy('timestamp','desc')
            ->get();
            $data['objs'] = $objs;

        }
        elseif ($emp_id != "SELECT_ALL") 
        {
            $objs = DB::table('tb_log_softwares')
            ->join('users', 'tb_log_softwares.emp_id', '=', 'users.employee_id')
            ->select('tb_log_softwares.*','users.name')
            ->where('users.name','=',$emp_id)
            ->orderBy('timestamp','desc')
            ->get();
            $data['objs'] = $objs;
        }

        $dataItems= '';
        foreach ($objs as $key => $value) 
        {
            $dataItems .= '<tr class="even pointer">';
            $dataItems .= '<td style="border-right:1px solid #ddd;"><a href="#">' . $value->product_name . '</a></td>';
            $dataItems .= '<td style="border-right:1px solid #ddd;"><a href="#">' . $value->sw_status . '</a></td>';
            $dataItems .= '<td style="border-right:1px solid #ddd;"><a href="#">' . $value->sw_status_desc . '</a></td>';
            $dataItems .= '<td style="border-right:1px solid #ddd;"><a href="#">' . $value->master_rev . '</a></td>';
            $dataItems .= '<td style="border-right:1px solid #ddd;"><a href="#">' . $value->operation . '</a></td>';
            $dataItems .= '<td style="border-right:1px solid #ddd;"><a href="#">' . $value->platform . '</a></td>';
            $dataItems .= '<td style="border-right:1px solid #ddd;"><a href="#">' . $value->tester . '</a></td>';
            $dataItems .= '<td style="border-right:1px solid #ddd;"><a href="#">' . $value->timestamp . '</a></td>';
            $dataItems .= '<td style="border-right:1px solid #ddd;"><a href="#">' . $value->emp_id . '</a></td>';
            $dataItems .= '<td style="border-right:1px solid #ddd;"><a href="#">' . $value->name . '</a></td>';
            $dataItems .= '</tr>';
        }
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
        //
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
