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

    <h2>Mamber</h2>
    
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
      <div class="form-horizontal form-label-left">
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Employee ID</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            <select name="ddl_empid" id="ddl_empid" class="form-control" style="width: 250px">
              <option>SELECT_ALL</option>
              @foreach(\App\Models\tb_member::select('emp_id')
              ->where('delete_flag','=','0')
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
            <select name="ddl_empname" id="ddl_empname" class="form-control" style="width: 250px">
              <option>SELECT_ALL</option>
              @foreach($empname as $row)
              <option>{{ $row }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            <div class="btn-group">
              <a href="{{ url('member/create') }}" class="btn btn-primary" role="Add">Add Member</a>
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

                </tr>
              </thead>
              <tbody id="tbody">

                @foreach($objs as $row)
                <tr>
                  <td class="sorting" align="center">
                    <a  href="" onclick="deletex('{{ $row->id }}');" data-toggle="tooltip" data-placement="top" data-original-title="Delete"><i class="fa fa-trash-o"></i></a> &nbsp;
                    <a href="{{ url('member') . '/' . ($row->id) .'/edit' }}" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                  </td>
                  <td class="sorting">{{ $row->emp_id }}</td>
                  <td class="sorting">{{ $row->emp_name }}</td>
                  <td class="sorting">{{ $row->emp_email }}</td>
                  <td class="sorting">{{ $row->emp_dept }}</td>
                </tr>
                @endforeach

              </tbody>
            </table>
          </thead>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $("#ddl_empid").change(function()
  {
    $.post("{{ route('member.event') }}",
    {
      inputfrom:'ddl_empid',
      empid:$("#ddl_empid").val(),
      empname:$("#ddl_empname").val(),
      _token:"{{ csrf_token() }}",

    },function(data){
      if(data){
        console.log(data);
        $('#tbody').html(data['dataItems']);
        $('#ddl_empname').html(data['dropdown']);
      }
    });
  });

  $("#ddl_empname").change(function()
  {
    $.post("{{ route('member.event') }}",
    {
      inputfrom:'ddl_empname',
      empid:$("#ddl_empid").val(),
      empname:$("#ddl_empname").val(),
      _token:"{{ csrf_token() }}",

    },function(data){
      if(data){
        console.log(data);
        $('#tbody').html(data['dataItems']);
        //$('#ddl_empname').html(data['dropdown']);
      }
    });
  });

  function deletex(id){
    var r = confirm("Are you sure to delete the master evaluation?");
    if (r == true) {
      var _id = id;
      $.post("{{ route('member.delete') }}",
      {
        id:_id,
        delete_flag:'1',
        _token:"{{ csrf_token() }}",

      },function(data){
        //alert(data);
        if(data){
          var url= "{{ url('member') }}";
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
    $("#default-table").hpaging({ "limit": 20 });
  });

  $("#btnApply").click(function () {
    var lmt = $("#pglmt").val();
    $("#default-table").hpaging("newLimit", lmt);
  });
</script>

@stop
