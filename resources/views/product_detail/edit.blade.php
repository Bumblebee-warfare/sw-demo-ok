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
    <h2>Add New Product</h2>

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
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Product Name</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <input name="tbx_productname" id="tbx_productname" type="text" class="form-control" placeholder="Product Name" value="{{ $record[0]->product_name }}">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Product Family</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <input name="tbx_productfamily" id="tbx_productfamily" type="text" class="form-control" placeholder="Product Family" value="{{ $record[0]->product_family }}">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Employee ID</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <select name="ddl_empid" id="ddl_empid" disabled="disabled" class="form-control">
            <option>{{ $record[0]->emp_id }}</option>
            @foreach(\App\models\tb_member::where('emp_id','!=','')
            ->select('emp_id')
            ->groupBy('emp_id')
            ->orderBy('emp_id','asc')
            ->get() as $str_array)
            <option>{{ $str_array['emp_id']}}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Employee Name</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <select name="ddl_empname" id="ddl_empname" disabled="disabled" class="select2_single form-control" tabindex="-1">
            <option>{{ $record[0]->product_owner }}</option>
            @foreach(\App\models\tb_member::where('emp_name','!=','')
            ->orderBy('emp_name','asc')
            ->get() as $str_array)
            <option>{{ $str_array['emp_name']}}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="ln_solid"></div>

      <div class="form-group">
        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
          <a href="{{ url('product_detail') }}" class="btn btn-primary" role="Add">Cancel</a>
          <button type="reset" class="btn btn-primary">Reset</button>
          <button name="submit" id="update"  class="btn btn-primary">Update</button>
        </div>
      </div>

    </div>
  </div>
</div>
<script src="{{ url('vendor/jquery/dist/jquery.js')}}"></script>
<script type="text/javascript">
  $(document).ready(function()
  {
    $('#ddl_empid').change(function(){
      var ddl_empid = $(this).val(); 
      var argu = 'empid_'+ddl_empid;
      $.get("query_member/"+argu, function(data)
      {
        $('#ddl_empname').val(data[0].emp_name);
      });
    });
  });

  $("#update").click(function()
  {
    var _id = "{{$id}}";
    $.post("{{ route('product_detail.update') }}",
    {
      id:_id,
      product_name:$("#tbx_productname").val(),
      product_family:$("#tbx_productfamily").val(),
      product_owner:$("#ddl_empname").val(),
      emp_id:$("#ddl_empid").val(),
      timestamp:'',
      _token:"{{ csrf_token() }}",

    },function(data){
      console.log(data);
      if(data){
        var url= "{{ url('product_detail') }}";
        window.location=url;
      }
    });
  });
</script>
@stop