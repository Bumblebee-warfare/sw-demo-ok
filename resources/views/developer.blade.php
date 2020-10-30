@extends('layouts.master')
@section('content')
<style type="text/css">
#tester_software {
  height: auto;
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

    <h2>Developer</h2>
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
      <form action="{{url('developer')}}" method="GET" class="form-horizontal form-label-left">
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Employee Name</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            <select name="ddl_empname" id="ddl_empname" class="form-control" style="width: 250px">
              <option>SELECT_ALL</option>
              @foreach(\App\Models\tb_developer::select('dev_name')
              ->where('delete_flag','=','0')
              ->groupBy('dev_name')
              ->orderBy('dev_name','asc')
              ->get() as $str_array)
              <option>{{ $str_array['dev_name']}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Product Name</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            <select name="ddl_product" id="ddl_product" class="form-control" style="width: 250px">
              <option>SELECT_ALL</option>
              @foreach($devname as $row)
              <option>{{ $row }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            <div class="btn-group">
              <a href="{{ url('developer/create') }}" class="btn btn-primary" role="Add">Add Developer</a>
            </div>
          </div>
        </div>
        <div class="table-responsive" id="tester_software" style="align-items: center ;zoom: 82%">
          <thead style="width:auto; border:none;">
            <table id="default-table" class="table table-striped table-bordered" role="grid" style="height:auto;margin: auto;">
              <thead style="padding:3px;cursor:pointer;">
                <tr>
                  <th class="sorting" align="center">##</th>
                  <th class="sorting">Employee ID</th>
                  <th class="sorting">Employee Name</th>
                  <th class="sorting">Email</th>
                  <th class="sorting">Department</th>
                  <th class="sorting">Product</th>

                </tr>
              </thead>
              <tbody id="tbody">

                @foreach($objs as $row)
                <tr>
                  <td class="sorting" align="center">
                    <a href="" onclick="deletex('{{ $row->id }}');" data-toggle="tooltip" data-placement="top" data-original-title="Delete"><i class="fa fa-trash-o"></i></a> &nbsp;
                    <a href="{{ url('developer') . '/' . ($row->id) .'/edit' }}" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                  </td>
                  <td class="sorting">{{ $row->dev_id }}</td>
                  <td class="sorting">{{ $row->dev_name }}</td>
                  <td class="sorting">{{ $row->dev_email }}</td>
                  <td class="sorting">{{ $row->dev_dept }}</td>
                  <td class="sorting">{{ $row->dev_product }}</td>
                </tr>
                @endforeach

              </tbody>
            </table>
          </thead>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  $("#ddl_empname").change(function()
  {
    $.post("{{ route('developer.event') }}",
    {
      inputfrom:'ddl_empname',
      empname:$("#ddl_empname").val(),
      product:$("#ddl_product").val(),
      _token:"{{ csrf_token() }}",

    },function(data){
      if(data){
        console.log(data);
        $('#tbody').html(data['dataItems']);
        $('#ddl_product').html(data['dropdown']);
      }
    });
  });

  $("#ddl_product").change(function()
  {
    $.post("{{ route('developer.event') }}",
    {
      inputfrom:'ddl_product',
      empname:$("#ddl_empname").val(),
      product:$("#ddl_product").val(),
      _token:"{{ csrf_token() }}",

    },function(data){
      if(data){
        console.log(data);
        $('#tbody').html(data['dataItems']);
      }
    });
  });
  
  function deletex(id){
    var r = confirm("Are you sure to delete the master evaluation?");
    if (r == true) {
      var _id = id;
      $.post("{{ route('developer.delete') }}",
      {
        id:_id,
        delete_flag:'1',
        _token:"{{ csrf_token() }}",

      },function(data){
        console.log(data);
        if(data){
          var url= "{{ url('developer') }}";
          window.location=url;
        }
      });
    }
  }
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
