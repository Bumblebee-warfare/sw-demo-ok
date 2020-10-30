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

    <h2>Product Detail</h2>

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
              @foreach($product as $row)
              <option>{{ $row }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Product Family</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            <select name="ddl_productfamily" id="ddl_productfamily" class="form-control" style="width: 150px">
              <option>SELECT_ALL</option>
              @foreach($family as $row)
              <option>{{ $row }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            <div class="btn-group">
              @if(Session::get('user_info')['username'] != "Guest")
              <a href="{{ url('product_detail/create') }}" class="btn btn-primary" role="Add">Add Product</a>
              @endif
            </div>
          </div>
        </div>
        <div class="table-responsive" id="tester_software">
          <div class="table-scroll">
            <table id="default-table" class="table table-striped table-bordered" role="grid" style="height:auto;margin: auto;">
              <thead style="padding:3px;cursor:pointer;">
                <tr>
                  <th class="sorting" align="center">##</th>
                  <th class="sorting">product_name</th>
                  <th class="sorting">product_family</th>
                  <th class="sorting">product_owner</th>
                  <th class="sorting">emp_id</th>
                  <th class="sorting">timestamp</th>
                </tr>
              </thead>
              <tbody id="tbody">

                @foreach($objs as $row)
                <tr>
                  @if(Session::get('user_info')['username'] != "Guest")
                  <td class="sorting" align="center">
                    <a href="" onclick="deletex('{{ $row->id }}');" data-toggle="tooltip" data-placement="top" data-original-title="Delete"><i class="fa fa-trash-o"></i></a> &nbsp;
                    <a href="{{ url('product_detail') . '/' . ($row->id) .'/edit' }}" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                  </td>
                  @else
                  <td align="center"></td>
                  @endif
                  <td class="sorting">{{ $row->product_name }}</td>
                  <td class="sorting">{{ $row->product_family }}</td>
                  <td class="sorting">{{ $row->product_owner }}</td>
                  <td class="sorting">{{ $row->emp_id }}</td>
                  <td class="sorting">{{ $row->timestamp }}</td>
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


<!--script src="{{ url('vendor/jquery/dist/jquery.js')}}"></script-->
<script type="text/javascript">

  $("#ddl_productname").change(function()
  {
    $.post("{{ route('product_detail.event') }}",
    {
      employee_id:$("#employee_id").val(),
      inputfrom:'ddl_productname',
      productname:$("#ddl_productname").val(),
      productfamily:$("#ddl_productfamily").val(),
      _token:"{{ csrf_token() }}",

    },function(data){
      if(data){
        console.log(data);
        $('#tbody').html(data['dataItems']);
        $('#ddl_productfamily').html(data['dropdown']);
      }
    });
  });

  $("#ddl_productfamily").change(function()
  {
    $.post("{{ route('product_detail.event') }}",
    {
      employee_id:$("#employee_id").val(),
      inputfrom:'ddl_productfamily',
      productname:$("#ddl_productname").val(),
      productfamily:$("#ddl_productfamily").val(),
      _token:"{{ csrf_token() }}",

    },function(data){
      if(data){
        console.log(data);
        $('#tbody').html(data['dataItems']);
        //$('#ddl_productfamily').html(data['dropdown']);
      }
    });
  });

  function deletex(id){
    var r = confirm("Are you sure to delete the master evaluation?");
    if (r == true) {
      var _id = id;
      $.post("{{ route('product_detail.delete') }}",
      {
        id:_id,
        delete_flag:'1',
        _token:"{{ csrf_token() }}",

      },function(data){
        //alert(data);
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