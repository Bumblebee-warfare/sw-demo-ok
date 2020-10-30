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

    <h2>Software Detail</h2>
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
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Product Name</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            <select name="ddl_productname" id="ddl_productname" class="form-control" style="width: 150px">
              <option>SELECT_ALL</option>
              @foreach(\App\Models\tb_cur_software::select('product_name')
              ->where('sw_status','=','PRODUCTION')
              ->groupBy('product_name')
              ->orderBy('product_name','asc')
              ->get() as $str_array)
              <option>{{ $str_array['product_name']}}</option>
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
              <option>{{ $row }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            <div class="btn-group">
              <a href="{{ url('software_detail/create') }}" class="btn btn-primary" role="Add">Add software</a>
            </div>
          </div>
          <a href="#" class="myexcel" onclick="tableToExcel('datat')"><i class="fa fa-download"></i> Excel</a>
        </div>
        <div class="table-responsive" id="tester_software" style="align-items: center ;zoom: 82%">
          <thead style="width:auto; border:none;">
            <table id="default-table" class="table table-striped table-bordered" role="grid" style="height:auto;margin: auto;">
              <thead style="padding:3px;cursor:pointer;">
                <tr>
                  <th align="center">##</th>
                  <th>product_name</th>
                  <th>sw_status</th>
                  <th>sw_status_desc</th>
                  <th>master_rev</th>
                  <th>operation</th>
                  <th>platform</th>
                  <th>tester</th>
                  <th>timestamp</th>
                  <th>emp_id</th>
                </tr>
              </thead>
              <tbody id="tbody">

                @foreach($objs as $row)
                <tr>
                  <td align="center">
                    <a onclick="deletex('{{ $row->id }}');" href="" data-toggle="tooltip" data-placement="top" data-original-title="Delete"><i class="fa fa-trash-o"></i></a> &nbsp;
                    <a href="{{ url('software_detail') . '/' . ($row->id) .'/edit' }}" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                  </td>
                  <td>{{ $row->product_name }}</td>
                  <td>{{ $row->sw_status }}</td>
                  <td>{{ $row->sw_status_desc }}</td>
                  <td>{{ $row->master_rev }}</td>
                  <td>{{ $row->operation }}</td>
                  <td>{{ $row->platform }}</td>
                  <td>{{ $row->tester }}</td>
                  <td>{{ $row->timestamp }}</td>
                  <td>{{ $row->emp_id }}</td>
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

  $(document).ready(function()
  {  
    $('#ddl_productname').change(function(){
      //## First load data (Event dropdown)
      var productname =  $("#ddl_productname").val().toUpperCase();
      var argu = productname;
      $.get("ddl_event_software_detail/"+argu, function(data){
        var dataItems= '';
        $.each (data, function (index) {
          dataItems += '<tr class="even pointer">';
          dataItems += '<td align="center">';
          dataItems += '<a onclick="deletex('+data[index].id+');" href="" data-toggle="tooltip" data-placement="top" data-original-title="Delete"><i class="fa fa-trash-o"></i></a> &nbsp;';
          dataItems += '<a href="http://localhost:8000/sw-demo/software_detail/'+data[index].id+'/edit" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i></a>';
          dataItems += '</td>';
          dataItems += '<td style="border-right:1px solid #ddd;"><a href="#">'+ data[index].product_name+'</a></td>';
          dataItems += '<td style="border-right:1px solid #ddd;"><a href="#">'+ data[index].sw_status+'</a></td>';
          dataItems += '<td style="border-right:1px solid #ddd;"><a href="#">'+ data[index].sw_status_desc+'</a></td>';
          dataItems += '<td style="border-right:1px solid #ddd;"><a href="#">'+ data[index].master_rev+'</a></td>';
          dataItems += '<td style="border-right:1px solid #ddd;"><a href="#">'+ data[index].operation+'</a></td>';
          dataItems += '<td style="border-right:1px solid #ddd;"><a href="#">'+ data[index].platform+'</a></td>';
          dataItems += '<td style="border-right:1px solid #ddd;"><a href="#">'+ data[index].tester+'</a></td>'
          dataItems += '<td style="border-right:1px solid #ddd;"><a href="#">'+ data[index].timestamp+'</a></td>';
          dataItems += '<td style="border-right:1px solid #ddd;"><a href="#">'+ data[index].emp_id+'</a></td>'
          dataItems += '</tr>';
        });
        $('#tbody').html(dataItems);

        //## Add items to dropdown Master Rev (Event dropdown)
        var list_array=[];
        $.each (data, function (index) 
        { 
          if(jQuery.inArray(data[index].master_rev, list_array) !== -1)
          {
            //## Ignore if found value in list_array
          }
          else
          {            
            list_array.push(data[index].master_rev);
          }
        });
        list_array.sort();
        
        var ddl= '';
        ddl += '<option>SELECT_ALL</option>';
        $.each(list_array, function( i, val ){

          ddl += '<option>'+ val +'</option>'
        });
        $('#ddl_masterrev').html(ddl);
      });
    });

    $('#ddl_masterrev').change(function(){
      //## First load data (Event dropdown)
      var productname =  $("#ddl_productname").val().toUpperCase();
      var productfamily =  $("#ddl_masterrev").val().toUpperCase();
      var argu = productname+';'+productfamily;
      $.get("ddl_event_software_detail/"+argu, function(data){
        var dataItems= '';
        $.each (data, function (index) {
          dataItems += '<tr class="even pointer">';
          dataItems += '<td align="center">';
          dataItems += '<a onclick="deletex('+data[index].id+');" href="" data-toggle="tooltip" data-placement="top" data-original-title="Delete"><i class="fa fa-trash-o"></i></a> &nbsp;';
          dataItems += '<a href="http://localhost:8000/sw-demo/software_detail/'+data[index].id+'/edit" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i></a>';
          dataItems += '</td>';
          dataItems += '<td style="border-right:1px solid #ddd;"><a href="#">'+ data[index].product_name+'</a></td>';
          dataItems += '<td style="border-right:1px solid #ddd;"><a href="#">'+ data[index].sw_status+'</a></td>';
          dataItems += '<td style="border-right:1px solid #ddd;"><a href="#">'+ data[index].sw_status_desc+'</a></td>';
          dataItems += '<td style="border-right:1px solid #ddd;"><a href="#">'+ data[index].master_rev+'</a></td>';
          dataItems += '<td style="border-right:1px solid #ddd;"><a href="#">'+ data[index].operation+'</a></td>';
          dataItems += '<td style="border-right:1px solid #ddd;"><a href="#">'+ data[index].platform+'</a></td>';
          dataItems += '<td style="border-right:1px solid #ddd;"><a href="#">'+ data[index].tester+'</a></td>'
          dataItems += '<td style="border-right:1px solid #ddd;"><a href="#">'+ data[index].timestamp+'</a></td>';
          dataItems += '<td style="border-right:1px solid #ddd;"><a href="#">'+ data[index].emp_id+'</a></td>'
          dataItems += '</tr>';
        });
        $('#tbody').html(dataItems);
      });
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
