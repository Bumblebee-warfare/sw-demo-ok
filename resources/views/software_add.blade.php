@extends('layouts.master')
@section('content')
<style type="text/css">
#tester_software {
  height: 950px;
  overflow: auto;
  margin-top: 20px;
}
table, th, td {
  border: 0px solid black;
  border-collapse: collapse;
}
.scrollable-menu {
  height: auto;
  max-height: 210px;
  overflow-x: hidden;
}
</style>

<div class="x_panel">
  <div class="x_title">
    <h2>Add New Software</h2>

    <ul class="nav navbar-right panel_toolbox">
      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
        <ul class="dropdown-menu" role="menu">
          <li><a href="#">Settings 1</a>
          </li>
          <li><a href="#">Settings 2</a>
          </li>
        </ul>
      </li>
      <li><a class="close-link"><i class="fa fa-close"></i></a>
      </li>
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content">
    <br />
    <div class="form-horizontal form-label-left">

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Software Name</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <input name="tbx_software_name" id="tbx_software_name" type="text" class="form-control" placeholder="Software Name">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Product Name</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <select name="ddl_product_name" id="ddl_product_name" class="select2_single form-control" tabindex="-1">
            <option>SELECT ITEMS</option>
            @foreach(\App\models\tb_product::select('product_name')
            ->groupBy('product_name')
            ->orderBy('product_name','asc')
            ->get() as $str_array)
            <option>{{ $str_array['product_name']}}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Software Status</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <select name="ddl_software_status" id="ddl_software_status" class="select2_single form-control" tabindex="-1">
            <option>SELECT ITEMS</option>
            <option>EVALUATION</option>
            <option>PRODUCTION</option>
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Software Step</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <select name="ddl_software_step" id="ddl_software_step" class="select2_single form-control" tabindex="-1">
            <option>SELECT ITEMS</option>
            @foreach(\App\models\tb_status::select('status_name')
            ->get() as $str_array)
            <option>{{ $str_array['status_name']}}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Operation</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <select name="ddl_operation" id="ddl_operation" class="select2_single form-control" tabindex="-1">
            <option>SELECT ITEMS</option>
            <option>HXFILLER</option>
            <option>SEEDER</option>
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tester Platform</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <select name="ddl_platform" id="ddl_platform" class="select2_single form-control" tabindex="-1">
            <option>SELECT ITEMS</option>
            @foreach(\App\models\tb_platform::select('platform')
            ->get() as $str_array)
            <option>{{ $str_array['platform']}}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tester</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <input name="tbx_tester" id="tbx_tester" type="text" class="form-control" placeholder="Tester">
        </div>
      </div>

      <div class="ln_solid"></div>

      <div class="form-group">
        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
          <a href="{{ url('software_detail') }}" class="btn btn-primary" role="Add">Cancel</a>
          <button type="reset" class="btn btn-primary">Reset</button>
          <button name="submit" id="insert"  class="btn btn-primary">Submit</button>
        </div>
      </div>

    </div>
  </div>
</div>

<script src="{{ url('vendor/jquery/dist/jquery.js')}}"></script>
<script type="text/javascript">
  $("#insert").click(function()
  {
    $.post("{{ route('software_detail.store') }}",
    {
      master_rev:$("#tbx_software_name").val(),
      product_name:$("#ddl_product_name").val(),
      sw_status:$("#ddl_software_status").val(),
      sw_status_desc:$("#ddl_software_step").val(),
      operation:$("#ddl_operation").val(),
      platform:$("#ddl_platform").val(),
      tester:$("#tbx_tester").val(),
      employee_id:$("#employee_id").val(),
      timestamp:'',
      _token:"{{ csrf_token() }}",

    },function(data){
      if(data){
        //alert('have data : ' + data);
        //var url= "{{ url('software_detail') }}";
        //window.location=url;
      }
      else{
        //alert('have not data');
      }
    });
  });
</script>
@stop