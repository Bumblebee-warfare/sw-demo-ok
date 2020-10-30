<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
	//use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function getTest(){

		$str_array = DB::table('tb_tester_inventory')
		->select('MasterRev')
		->groupBy('MasterRev')
		->orderBy('MasterRev','asc')
		->get();
		return view('test', ['str_array' => $str_array]);
		//return view('test');
	}

	public function getInsert(){
	//public function insert(request $req){

		//$product_name = $req=>input('tbx_productname');
		//$product_family = $req=>input('tbx_productfamily');
		//$product_owner = $req=>input('ddl_empname');
		//$emp_id = $req=>input('ddl_empid');
		$data = array(
			'product_name'=>'',
			'product_family'=>'yy',
			'product_owner'=>'zz',
			'emp_id'=>'rr'
			);
		//DB::table('tb_product')->insert($data);
		return $data;
	}
}
	
