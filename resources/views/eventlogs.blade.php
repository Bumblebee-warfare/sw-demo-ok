@extends('layouts.master')
@section('content')
<link href="{{ url('assets/js/vendors/datetimepicker/css/bootstrap-datetimepicker.css') }}" rel="stylesheet">
<!--link href="{{ url('assets/js/vendors/datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet"-->
<link href="{{ url('assets/js/vendors/datetimepicker/css/bootstrap-datetimepicker-standalone.css') }}" rel="stylesheet">
<script src="{{ url('assets/js/vendors/datetimepicker/js/moment.js') }}"></script>
<script src="{{ url('assets/js/vendors/datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
<style type="text/css">
#tester_software {
  height: auto;
  overflow: auto;
  margin-top: 20px;
  align-items: center ;
  zoom: 82%;
}
table, th, td {
  border: 0px solid black;
  border-collapse: collapse;
}
.scrollable-menu {
  height: auto;
  max-height: 210px;
  overflow-x: scroll;
}
.table-scroll {
  width: 1500px; 
  overflow-y: scroll;
}
</style>

<!--link href="{{ url('vendor/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet"-->
<link href="{{ url('vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
<link href="{{ url('vendor/tableexport/dist/css/tableexport.min.css')}}" rel="stylesheet"/>
<link href="{{ url('vendor/tableexport/dist/css/examples.css')}}" rel="stylesheet"/>
<link href="{{ url('vendor/tableexport/dist/css/jquerysctipttop.css')}}" rel="stylesheet"/>
<link href="{{ url('vendor/tableexport/dist/css/paging.css')}}" rel="stylesheet"/>
<script src="{{ url('vendor/tableexport/dist/js/jquery-ui.js')}}"></script>
<script src="{{ url('vendor/tableexport/dist/js/jquery.table.hpaging.min.js')}}"></script>

<div class="x_panel">
  <div class="x_title">

    <h2>Event Logs</h2>

    <ul class="nav navbar-right panel_toolbox">
      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
        <ul class="dropdown-menu" role="menu">
          <li><a href="#">Settings 1</a>
          </li>
          <li><a href="#">Settings 2</a>
          </li>
        </ul>
      </li>
      <li><a class="close-link"><i class="fa fa-close"></i></a></li>
    </ul>

    <div class="clearfix"></div>

    <div class="x_content">
      <br />
      <form class="form-horizontal form-label-left">
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-6"> From</label>
          <div class='input-group date col-md-2 col-sm-2 col-xs-6' id='datetimepicker_from'>
            <input type='text' class="form-control" name="expire_date_from" id="expire_date_from"/>
            <span class="input-group-addon">
              <span class="fa fa-calendar">
              </span>
            </span>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-6"> To</label>
          <div class='input-group date col-md-2 col-sm-2 col-xs-6' id='datetimepicker_to'>
            <input type='text' class="form-control" name="expire_date_to" id="expire_date_to"/>
            <span class="input-group-addon">
              <span class="fa fa-calendar">
              </span>
            </span>
          </div>
          
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-3"></label>
          <div class="col-md-3 col-sm-3 col-xs-3">
            <input id="submit" type="button" class="btn btn-primary" value="Submit">
          </div>
        </div>

        <div class="table-responsive" id="tester_software">
          <div class="table-scroll">
            <table id="default-table" class="table table-striped table-bordered" role="grid" style="height:auto;margin: auto;">
              <thead style="padding:3px; cursor:pointer;">
                <tr>
                  <th class="sorting">status</th>
                  <th class="sorting">product_name</th>
                  <th class="sorting">sw_status</th>
                  <th class="sorting">sw_status_desc</th>
                  <th class="sorting">master_rev</th>
                  <th class="sorting">operation</th>
                  <th class="sorting">platform</th>
                  <th class="sorting">tester</th>
                  <th class="sorting">timestamp</th>
                  <th class="sorting">emp_id</th>
                </tr>
              </thead>
              <tbody id="tbody">
                @foreach($objs as $row)
                <tr class="even pointer">
                  <td style="border-right:1px solid #ddd;"><a href="#">{{ $row->status }}</a></td>
                  <td style="border-right:1px solid #ddd;"><a href="#">{{ $row->product_name }}</a></td>
                  <td style="border-right:1px solid #ddd;"><a href="#">{{ $row->sw_status }}</a></td>
                  <td style="border-right:1px solid #ddd;"><a href="#">{{ $row->sw_status_desc }}</a></td>
                  <td style="border-right:1px solid #ddd;"><a href="#">{{ $row->master_rev }}</a></td>
                  <td style="border-right:1px solid #ddd;"><a href="#">{{ $row->operation }}</a></td>
                  <td style="border-right:1px solid #ddd;"><a href="#">{{ $row->platform }}</a></td>
                  <td style="border-right:1px solid #ddd;"><a href="#">{{ $row->tester }}</a></td>
                  <td style="border-right:1px solid #ddd;"><a href="#">{{ $row->timestamp }}</a></td>
                  <td style="border-right:1px solid #ddd;"><a href="#">{{ $row->emp_id }}</a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">

  //## Set default value datetime picker
  $(document).ready(function()
  {
   var dateObject = new Date();
   var day = dateObject.getDate();
   var month = dateObject.getMonth() + 1;
   var year = dateObject.getFullYear();
   day = day < 10 ? "0" + day : day; 
   month = month < 10 ? "0" + month : month; 
   var datenow = year + "-" + month + "-" + day; 
   var datenow_1 = year + "-" + dateObject.getMonth() + "-" + day; 

   $('#expire_date_from').val(datenow_1);
   $('#expire_date_to').val(datenow);

 });


  //## event click datetime picker
  $(function () {
    $.fn.datetimepicker.defaults.format = "YYYY-MM-DD";
    $('#datetimepicker_from').datetimepicker({
      icons: {
        time: "fa fa-clock-o",
        date: "fa fa-calendar",
        up: "fa fa-arrow-up",
        down: "fa fa-arrow-down"
      }
    });
    $('#datetimepicker_to').datetimepicker({
      icons: {
        time: "fa fa-clock-o",
        date: "fa fa-calendar",
        up: "fa fa-arrow-up",
        down: "fa fa-arrow-down"
      }
    });
  });

  //Event click submit
  $("#submit").click(function()
  {
    $.post("{{ route('eventlogs.event') }}",
    {
      date_from:$("#expire_date_from").val(),
      date_to:$("#expire_date_to").val(),
      _token:"{{ csrf_token() }}",

    },function(data){
      //if(data){
        console.log(data);
        $('#tbody').html(data);
      //}
    });
  });

</script>


<script src="{{ url('vendor/tableexport/dist/js/xlsx.core.min.js')}}"></script>
<script src="{{ url('vendor/tableexport/dist/js/Blob.js')}}"></script>
<script src="{{ url('vendor/tableexport/dist/js/FileSaver.js')}}"></script>
<script src="{{ url('vendor/tableexport/dist/js/tableexport.min.js')}}"></script>
<script>

  var DefaultTable = document.getElementById('default-table');
  new TableExport(DefaultTable, 
  {
    headers: true,
    footers: true,
    formats: ['xlsx', 'csv', 'txt'],
    filename: 'id',
    bootstrap: true,
    position: 'bottom',
    ignoreRows: null,
    ignoreCols: 0,
    ignoreCSS: '.tableexport-ignore',
    emptyCSS: '.tableexport-empty',
    trimWhitespace: true
  });
</script>
<script type="text/javascript">
  $(function () {
    $("#default-table").hpaging({ "limit": 8 });
  });

  $("#btnApply").click(function () {
    var lmt = $("#pglmt").val();
    $("#default-table").hpaging("newLimit", lmt);
  });
</script>
@stop
