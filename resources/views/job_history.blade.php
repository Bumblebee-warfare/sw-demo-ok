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

    <h2>Job History</h2>
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
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Employee Name</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            <select name="ddl_emp_id" id="ddl_emp_id" class="form-control" style="width: 250px">
              <option>SELECT_ALL</option>
              @foreach($name as $row)
              <option>{{ $row->name }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="table-responsive" id="tester_software" style="align-items: center ;zoom: 82%">
          <thead style="width:auto; border:none;">
            <table id="default-table" class="table table-striped table-bordered" role="grid" style="height:auto;margin: auto;">
              <thead style="padding:3px;cursor:pointer;">
                <tr>
                  <th>product_name</th>
                  <th>sw_status</th>
                  <th>sw_status_desc</th>
                  <th>master_rev</th>
                  <th>operation</th>
                  <th>platform</th>
                  <th>tester</th>
                  <th>timestamp</th>
                  <th>emp_id</th>
                  <th>emp_name</th>
                </tr>
              </thead>
              <tbody id="tbody">

                @foreach($objs as $row)
                <tr>
                  <td>{{ $row->product_name }}</td>
                  <td>{{ $row->sw_status }}</td>
                  <td>{{ $row->sw_status_desc }}</td>
                  <td>{{ $row->master_rev }}</td>
                  <td>{{ $row->operation }}</td>
                  <td>{{ $row->platform }}</td>
                  <td>{{ $row->tester }}</td>
                  <td>{{ $row->timestamp }}</td>
                  <td>{{ $row->emp_id }}</td>
                  <td>{{ $row->name }}</td>
                  <td></td>
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

<!--script src="{{ url('vendor/jquery/dist/jquery.js')}}"></script-->
<script type="text/javascript">

  $("#ddl_emp_id").change(function()
  {
    $.post("{{ route('job_history.event') }}",
    {
      emp_id:$("#ddl_emp_id").val(),
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
      $.post("{{ route('software_detail.delete') }}",
      {
        id:_id,
        delete_flag:'1',
        _token:"{{ csrf_token() }}",

      },function(data){
        console.log(data);
        if(data){
          var url= "{{ url('software_detail') }}";
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
