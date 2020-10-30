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

<link href="{{ url('vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
<link href="{{ url('vendor/tableexport/dist/css/tableexport.min.css')}}" rel="stylesheet"/>
<link href="{{ url('vendor/tableexport/dist/css/examples.css')}}" rel="stylesheet"/>
<link href="{{ url('vendor/tableexport/dist/css/jquerysctipttop.css')}}" rel="stylesheet"/>
<link href="{{ url('vendor/tableexport/dist/css/paging.css')}}" rel="stylesheet"/>
<script src="{{ url('vendor/tableexport/dist/js/jquery-ui.js')}}"></script>
<script src="{{ url('vendor/tableexport/dist/js/jquery.table.hpaging.min.js')}}"></script>

<div class="x_panel">
  <div class="x_title">
    <input type="hidden" name="pf" id="pf" value="{{ $name }}">
    <h2><div id="_platform" name="_platform" value="{{ $name }}" >PLATFORM: {{ $name }}</div></h2>
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
              @foreach($prod as $row)
              <option>{{ $row->product_name }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Master Rev</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            <select name="ddl_masterrev" id="ddl_masterrev" class="form-control" style="width: 150px">
              <option>SELECT_ALL</option>
              @foreach($msrev as $row)
              <option>{{ $row->master_rev }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            <div class="btn-group">
              @if(Session::get('user_info')['username'] != "Guest")
              <a href="{{ url('platform/add', [$name]) }}" class="btn btn-primary" role="Add">Add software</a>
              @endif
            </div>
          </div>
        </div>

        <div class="table-responsive" id="tester_software">
          <div class="table-scroll">
            <table id="default-table" class="table table-striped table-bordered" role="grid" style="height:auto;margin: auto;">
              <thead style="padding:3px;cursor:pointer;">
                <tr>
                  <th align="center">##</th>
                  <th class="sorting">product_name</th>
                  <th class="sorting">sw_status</th>
                  <th class="sorting">sw_status_desc</th>
                  <th class="sorting">master_rev</th>
                  <th class="sorting">operation</th>
                  <th class="sorting">Platform</th>
                  <th class="sorting">tester</th>
                  <th class="sorting">timestamp</th>
                  <th class="sorting">emp_id</th>
                </tr>
              </thead>
              <tbody id="tbody">
                @foreach($objs as $row)
                <tr>

                  @if(Session::get('user_info')['username'] != "Guest")
                  <td align="center">
                    <a onclick="deletex('{{ $row->id }}');" href="" data-toggle="tooltip" data-placement="top" data-original-title="Delete"><i class="fa fa-trash-o"></i></a> &nbsp;
                    <a href="{{ url('platform') . '/' . ($row->id) .'/edit' }}" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                  </td>
                  @else
                  <td align="center"></td>
                  @endif
                  <td class="sorting">{{ $row->product_name }}</td>
                  <td class="sorting">{{ $row->sw_status }}</td>
                  <td class="sorting">{{ $row->sw_status_desc }}</td>
                  <td class="sorting">{{ $row->master_rev }}</td>
                  <td class="sorting">{{ $row->operation }}</td>
                  <td class="sorting">{{ $row->Platform }}</td>
                  <td class="sorting">{{ $row->tester }}</td>
                  <td class="sorting">{{ $row->timestamp }}</td>
                  <td class="sorting">{{ $row->emp_id }}</td>
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

  var pf = document.getElementById('_platform').getAttribute('value');
    

  $("#ddl_productname").change(function()
  {
    $.post("{{ route('platform.event') }}",
    {
      employee_id:$("#employee_id").val(),
      inputfrom:'#ddl_productname',
      Platform:pf,
      productname:$("#ddl_productname").val(),
      masterrev:$("#ddl_masterrev").val(),
      _token:"{{ csrf_token() }}",

    },function(data){

      console.log(data);

      $('#tbody').html(data['dataItems']);
      $('#ddl_masterrev').html(data['dropdown']);
    });
  });

  $("#ddl_masterrev").change(function()
  {
    $.post("{{ route('platform.event') }}",
    {
      employee_id:$("#employee_id").val(),
      inputfrom:'#ddl_masterrev',
      Platform:pf,
      productname:$("#ddl_productname").val(),
      masterrev:$("#ddl_masterrev").val(),
      _token:"{{ csrf_token() }}",

    },function(data){
      console.log(data);
      $('#tbody').html(data['dataItems']);
    });
  });

  function deletex(id){
    var r = confirm("Are you sure to delete the master evaluation?");
    if (r == true) {
      var _id = id;
      $.post("{{ route('platform.delete') }}",
      {
        id:_id,
        delete_flag:'1',
        emp_id:$("#employee_id").val(),
        _token:"{{ csrf_token() }}",

      },function(data){
        if(data){
          var url= "{{ url('product_detail') }}";
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
