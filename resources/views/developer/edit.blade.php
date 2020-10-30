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
    <h2>Edit</h2>

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
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Employee ID</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <input name="tbx_devid" id="tbx_devid" disabled="disabled" type="text" class="form-control" placeholder="Employee ID" value="{{ $record[0]->dev_id }}">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Employee Name</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <input name="tbx_devname" id="tbx_devname" disabled="disabled" type="text" class="form-control" placeholder="Employee Name" value="{{ $record[0]->dev_name }}">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <input name="tbx_devemail" id="tbx_devemail" disabled="disabled" type="text" class="form-control" placeholder="Abc@email.com" value="{{ $record[0]->dev_email }}">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Department</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <input name="tbx_devdept" id="tbx_devdept" type="text" class="form-control" placeholder="Department" value="{{ $record[0]->dev_dept }}">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Product</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <select name="ddl_prodduct" id="ddl_prodduct" class="form-control">
            <option>{{ $record[0]->dev_product }}</option>
            @foreach(\App\models\tb_product::select('product_name')
            ->groupBy('product_name')
            ->orderBy('product_name','asc')
            ->get() as $str_array)
            <option>{{ $str_array['product_name']}}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="ln_solid"></div>

      <div class="form-group">
        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
          <a href="{{ url('developer') }}" class="btn btn-primary" role="Add">Cancel</a>
          <button type="reset" class="btn btn-primary">Reset</button>
          <button name="submit" id="update"  class="btn btn-primary">Update</button>
        </div>
      </div>

    </div>
  </div>
</div>
<script src="{{ url('vendor/jquery/dist/jquery.js')}}"></script>
<script>
  $("#update").click(function()
  {
    var _id = "{{$id}}";
    $.post("{{ route('developer.update') }}",
    {
      id:_id,
      dev_id:$("#tbx_devid").val(),
      dev_name:$("#tbx_devname").val(),
      dev_email:$("#tbx_devemail").val(),
      dev_dept:$("#tbx_devdept").val(),
      dev_product:$("#ddl_prodduct").val(),
      _token:"{{ csrf_token() }}",

    },function(data){
      if(data){
        //alert('have data :' + data);
        var url= "{{ url('developer') }}";
        window.location=url;
      }
      else{
        //alert('have not data');
      }
    });
  });
</script>
@stop