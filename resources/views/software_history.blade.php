@extends('layouts.master')
@section('content')
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

    <h2>Software History</h2>

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
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Product Name</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            <select name="ddl_productname" id="ddl_productname" class="form-control" style="width: 150px">
              <option>SELECT_ALL</option>
              @foreach(\App\Models\tb_cur_software::select('product_name')
              ->groupBy('product_name')
              ->orderBy('product_name','asc')
              ->get() as $str_array)
              <option>{{ $str_array['product_name'] }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Master Rev</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            <select name="ddl_masterrev" id="ddl_masterrev" class="form-control" style="width: 150px">
              <option>SELECT_ALL</option>
              @foreach(\App\Models\tb_cur_software::select('master_rev')
              ->groupBy('master_rev')
              ->orderBy('master_rev','asc')
              ->get() as $str_array)
              <option>{{ $str_array['master_rev'] }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="table-responsive" id="tester_software">
          <div class="table-scroll">
            <table id="default-table" class="table table-striped table-bordered" role="grid" style="height:auto;margin: auto;">
              <thead style="padding:3px; cursor:pointer;">
                <tr>
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
                @foreach(\App\Models\tb_cur_software::where('delete_flag','=','0')
                ->get() as $str_array)
                <tr class="even pointer">
                  <td style="border-right:1px solid #ddd;"><a href="#">{{ $str_array['product_name'] }}</a></td>
                  <td style="border-right:1px solid #ddd;"><a href="#">{{ $str_array['sw_status'] }}</a></td>
                  <td style="border-right:1px solid #ddd;"><a href="#">{{ $str_array['sw_status_desc'] }}</a></td>
                  <td style="border-right:1px solid #ddd;"><a href="#">{{ $str_array['master_rev'] }}</a></td>
                  <td style="border-right:1px solid #ddd;"><a href="#">{{ $str_array['operation'] }}</a></td>
                  <td style="border-right:1px solid #ddd;"><a href="#">{{ $str_array['platform'] }}</a></td>
                  <td style="border-right:1px solid #ddd;"><a href="#">{{ $str_array['tester'] }}</a></td>
                  <td style="border-right:1px solid #ddd;"><a href="#">{{ $str_array['timestamp'] }}</a></td>
                  <td style="border-right:1px solid #ddd;"><a href="#">{{ $str_array['emp_id'] }}</a></td>
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
  $("#ddl_productname").change(function()
  {
    $.post("{{ route('software_history.event') }}",
    {
      inputfrom:'ddl_productname',
      productname:$("#ddl_productname").val(),
      masterrev:$("#ddl_masterrev").val(),
      _token:"{{ csrf_token() }}",

    },function(data){
      if(data){
        console.log(data);
        $('#tbody').html(data['dataItems']);
        $('#ddl_masterrev').html(data['dropdown']);
      }
    });
  });

  $("#ddl_masterrev").change(function()
  {
    $.post("{{ route('software_history.event') }}",
    {
      inputfrom:'ddl_masterrev',
      productname:$("#ddl_productname").val(),
      masterrev:$("#ddl_masterrev").val(),
      _token:"{{ csrf_token() }}",

    },function(data){
      if(data){
        console.log(data);
        $('#tbody').html(data['dataItems']);
      }
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
