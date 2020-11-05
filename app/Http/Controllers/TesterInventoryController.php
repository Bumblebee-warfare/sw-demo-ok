<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Tester_Inventory;
use App\models\tb_product;
// use DB;


class TesterInventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objs= Tester_Inventory::limit(200)
        // ->where('Acctive_Status','=','RUNNING')
        ->orderBy('TimeStamp','=','DESC')
        ->get();
        $data['objs'] = $objs;


        $prodduct=array();
        $prod= Tester_Inventory::select('ProductName')
        ->groupBy('ProductName')
        ->orderBy('ProductName','asc')
        ->get();
        foreach ($prod as $key => $value) 
        {
            array_push($prodduct,$value->ProductName);
        }
        $data['prodduct'] = $prodduct;

        $masterrev=array();
        $mast= Tester_Inventory::select('MasterRev')
        ->groupBy('MasterRev')
        ->orderBy('MasterRev','asc')
        ->get();
        foreach ($mast as $key => $value) 
        {
            array_push($masterrev,$value->MasterRev);
        }
        $data['masterrev'] = $masterrev;

        $platform=array();
        $plat= Tester_Inventory::select('Platform')
        ->groupBy('Platform')
        ->orderBy('Platform','asc')
        ->get();
        foreach ($plat as $key => $value) 
        {
            array_push($platform,$value->Platform);
        }
        $data['platform'] = $platform;

        $tester=array();
        $test= Tester_Inventory::select('TesterName')
        ->groupBy('TesterName')
        ->orderBy('TesterName','asc')
        ->get();
        foreach ($test as $key => $value) 
        {
            array_push($tester,$value->TesterName);
        }
        $data['tester'] = $tester;

        return view('tester_inventory',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

            // add form inventory view 

    {

            $ddl_product_name = tb_product::select('product_name')->where('delete_flag','=','0')->get();
            $data['ddl_product_name'] = $ddl_product_name;


            $ddl_Operation = Tester_Inventory::select('Operation')->groupBy('Operation')->get();
            $data['ddl_Operation'] = $ddl_Operation ;

            $ddl_ModelCCC= Tester_Inventory::select('ModelCCC')->groupBy('ModelCCC')->get();
            $data['ddl_ModelCCC'] = $ddl_ModelCCC ;



            $ddl_platform = Tester_Inventory::select('Platform')->groupBy('Platform')->get();
            $data['ddl_platform'] = $ddl_platform;



        return view('../tester_inventory_add',$data);

         // end form inventory view 
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {

        Tester_Inventory::where('TesterName',$request->input('TesterName'))->where('Acctive_Status', "RUNNING")->update([
          
            "Acctive_Status"             => "STOP",
            "TimeStamp" => date("Y-m-d H:i:s",time())
        ]);
             // insert form 
        //sleep for 3 seconds
        sleep(1);

        $datetime = date("Y-m-d H:i:s");

        $obj = new  Tester_Inventory();
        $obj->TesterName      = $request->input('TesterName');
        $obj->ProductName    = $request->input('ProductName');
        $obj->ModelCCC     = $request->input('ModelCCC');
        $obj->MasterRev      = $request->input('MasterRev');
        $obj->Operation      = $request->input('Operation');
        $obj->Quantity          = '1';
        $obj->Platform        = $request->input('Platform');
        $obj->timestamp         = $datetime;



        $obj->save();

        return "0k";





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
