<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\tb_log_software;
use Datetime;

class EventLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date = date("Y-m-d");
        $_dform = new DateTime($date);
        $_dform->modify('-1 month');

        $_dto = new DateTime($date);

        $date_from = DateTime::createFromFormat('Y-m-d', $_dform->format('Y-m-d'));
        $date_to = DateTime::createFromFormat('Y-m-d', $_dto->format('Y-m-d'));
        
        $objs= tb_log_software::where('delete_flag','=','0')
        ->whereBetween('timestamp', array($date_from, $date_to))
        ->orderBy('timestamp','desc')
        ->get();

        $data['objs'] = $objs;
        return view('eventlogs',$data);
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

    public function event(Request $request)
    {
        $format = 'Y-m-d';
        $date_from = DateTime::createFromFormat($format, $request->input('date_from'));
        $date_to = DateTime::createFromFormat($format, $request->get('date_to'));

        $objs= tb_log_software::where('delete_flag','=','0')
        ->whereBetween('timestamp', array($date_from, $date_to))
        ->orderBy('timestamp','desc')
        ->get();

        $dataItems= '';
        foreach ($objs as $key => $value) 
        {
            $dataItems .= '<tr class="even pointer">';
            $dataItems .= '<td style="border-right:1px solid #ddd;"><a href="#">' . $value->status          . '</a></td>';
            $dataItems .= '<td style="border-right:1px solid #ddd;"><a href="#">' . $value->product_name    . '</a></td>';
            $dataItems .= '<td style="border-right:1px solid #ddd;"><a href="#">' . $value->sw_status       . '</a></td>';
            $dataItems .= '<td style="border-right:1px solid #ddd;"><a href="#">' . $value->sw_status_desc  . '</a></td>';
            $dataItems .= '<td style="border-right:1px solid #ddd;"><a href="#">' . $value->master_rev      . '</a></td>';
            $dataItems .= '<td style="border-right:1px solid #ddd;"><a href="#">' . $value->operation       . '</a></td>';
            $dataItems .= '<td style="border-right:1px solid #ddd;"><a href="#">' . $value->platform        . '</a></td>';
            $dataItems .= '<td style="border-right:1px solid #ddd;"><a href="#">' . $value->tester          . '</a></td>';
            $dataItems .= '<td style="border-right:1px solid #ddd;"><a href="#">' . $value->timestamp       . '</a></td>';
            $dataItems .= '<td style="border-right:1px solid #ddd;"><a href="#">' . $value->emp_id          . '</a></td>';
            $dataItems .= '</tr>';
        }
        return $dataItems;
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
