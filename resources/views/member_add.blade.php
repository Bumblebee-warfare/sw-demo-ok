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
    <h2>Add New Member</h2>

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
          <input name="tbx_empid" id="tbx_empid" type="text" class="form-control" placeholder="Employee ID">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Employee Name</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <input name="tbx_empname" id="tbx_empname" type="text" class="form-control" placeholder="Employee Name">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <input name="tbx_empemail" id="tbx_empemail" type="text" class="form-control" placeholder="Abc@email.com">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Department</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <input name="tbx_empdept" id="tbx_empdept" type="text" class="form-control" placeholder="Department">
        </div>
      </div>

      <div class="ln_solid"></div>

      <div class="form-group">
        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
          <a href="{{ url('member') }}" class="btn btn-primary" role="Add">Cancel</a>
          <button type="reset" class="btn btn-primary">Reset</button>
          <button name="submit" id="insert"  class="btn btn-primary">Submit</button>
        </div>
      </div>

    </div>
  </div>
</div>
<script src="{{ url('vendor/jquery/dist/jquery.js')}}"></script>
<script>
  $("#insert").click(function()
  {
    $.post("{{ route('member.store') }}",
    {
      emp_id:$("#tbx_empid").val(),
      emp_name:$("#tbx_empname").val(),
      emp_email:$("#tbx_empemail").val(),
      emp_dept:$("#tbx_empdept").val(),
      _token:"{{ csrf_token() }}",

    },function(data){
      console.log(data);
      if(data){
        var url= "{{ url('member') }}";
        window.location=url;
      }
    });
  });
</script>


@stop