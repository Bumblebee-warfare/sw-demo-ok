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

<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="x_panel">
  <div class="x_title">

    <h2>Tester Inventory</h2>
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
      <form action="{{url('tester_inventory')}}" method="GET" class="form-horizontal form-label-left">
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Product Name</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            <select name="ddl_productname" id="ddl_productname" class="form-control" style="width: 150px">
              <option href="{{ url('tester_inventory/#') }}" >SELECT_ALL</option>
              @foreach($prodduct as $row)
              <option>{{ $row }}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Master Rev</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            <select name="ddl_masterrev" id="ddl_masterrev" class="form-control" style="width: 150px">
              <option>SELECT_ALL</option>
              @foreach($masterrev as $row)
              <option>{{ $row }}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Platform</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            <select name="ddl_platform" id="ddl_platform" class="form-control" style="width: 150px">
              <option>SELECT_ALL</option>
              @foreach($platform as $row)
              <option>{{ $row }}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Tester Name</label>

          <div class="col-md-9 col-sm-9 col-xs-12">
            <select name="ddl_testername" id="ddl_testername" class="form-control" style="width: 150px">
              <option>SELECT_ALL</option>
              @foreach($tester as $row)
              <option>{{ $row }}</option>
              @endforeach
            </select>
          </div>

          
        </div>

        <div class="table-responsive" id="tester_software" style="align-items: center ;zoom: 82%">
          <thead style="width:auto; border:none;">
            <table id="default-table" class="table table-striped table-bordered" role="grid" style="height:auto;margin: auto;">
              <thead style="padding:3px;cursor:pointer;">
                <tr>
                  <th class="sorting">TestInven_Id</th>
                  <th class="sorting">TesterName</th>
                  <th class="sorting">ProductName</th>
                  <th class="sorting">ModelCCC</th>
                  <th class="sorting">Operation</th>
                  <th class="sorting">MasterRev</th>
                  <th class="sorting">Quantity</th>
                  <th class="sorting">Platform</th>
                  <th class="sorting">TimeStamp</th>
                  <th class="sorting">Acctive_Status</th>
                </tr>
              </thead>
              <tbody id="tbody">

                @foreach($objs as $row)
                <tr>
                  <td class="sorting">{{ $row->TestInven_Id }}</td>
                  <td class="sorting">{{ $row->TesterName }}</td>
                  <td class="sorting">{{ $row->ProductName }}</td>
                  <td class="sorting">{{ $row->ModelCCC }}</td>
                  <td class="sorting">{{ $row->Operation }}</td>
                  <td class="sorting">{{ $row->MasterRev }}</td>
                  <td class="sorting">{{ $row->Quantity }}</td>
                  <td class="sorting">{{ $row->Platform }}</td>
                  <td class="sorting">{{ $row->TimeStamp }}</td>
                    <td class="sorting">{{ $row->Acctive_Status }}</td>
                </tr>
                @endforeach


              </tbody>

           <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            <div class="btn-group">
             
              <a href="{{ url('tester_inventory/create') }}" class="btn btn-primary" role="Add">Add inventory</a>
            </div>
          </div>
        </div>
        <BR>

            </table>     
          </thead>
        </div>
      </form>
    </div>
  </div>

</div>

<script type="text/javascript">

  $(document).ready(function(){ 

    //## Event Dropdown
    $('#ddl_productname').change(function(){

      var productname =  $("#ddl_productname").val().toUpperCase();
      var masterrev =  $("#ddl_masterrev").val().toUpperCase();
      var platform =  $("#ddl_platform").val().toUpperCase();
      var testername =  $("#ddl_testername").val().toUpperCase();
      var argu = productname+";"+masterrev+";"+platform+";"+testername;

      $.get("ddl_event_inventory/"+argu, function(data)
      {
          //console.log(data);
          var dataItems= '';
          $.each (data, function (index) {
            dataItems += '<tr>';

            dataItems += '<td class="sorting">'+ data[index].TesterName+'</td>';
            dataItems += '<td class="sorting">'+ data[index].ProductName+'</td>';
            dataItems += '<td class="sorting">'+ data[index].ModelCCC+'</td>';
            dataItems += '<td class="sorting">'+ data[index].Operation+'</td>';
             dataItems += '<td class="sorting">'+ data[index].MasterRev+'</td>';
            dataItems += '<td class="sorting">'+ data[index].Quantity+'</td>';
             dataItems += '<td class="sorting">'+ data[index].Platform+'</td>';
            dataItems += '<td class="sorting">'+ data[index].TimeStamp+'</td>';
            dataItems += '<td class="sorting">'+ data[index].Acctive_Status+'</td>';
             
            dataItems += '</tr>';
          });
          $('#tbody').html(dataItems);

        });
    });

    //## Event Dropdown
    $('#ddl_masterrev').change(function(){
      var productname =  $("#ddl_productname").val().toUpperCase();
      var masterrev =  $("#ddl_masterrev").val().toUpperCase();
      var platform =  $("#ddl_platform").val().toUpperCase();
      var testername =  $("#ddl_testername").val().toUpperCase();
      var argu = productname+";"+masterrev+";"+platform+";"+testername;

      $.get("ddl_event_inventory/"+argu, function(data){
          //console.log(data);
          var dataItems= '';
          $.each (data, function (index) {
            dataItems += '<tr>';
                dataItems += '<td class="sorting">'+ data[index].TesterName+'</td>';
            dataItems += '<td class="sorting">'+ data[index].ProductName+'</td>';
            dataItems += '<td class="sorting">'+ data[index].ModelCCC+'</td>';
            dataItems += '<td class="sorting">'+ data[index].Operation+'</td>';
             dataItems += '<td class="sorting">'+ data[index].MasterRev+'</td>';
            dataItems += '<td class="sorting">'+ data[index].Quantity+'</td>';
             dataItems += '<td class="sorting">'+ data[index].Platform+'</td>';
            dataItems += '<td class="sorting">'+ data[index].TimeStamp+'</td>';
             dataItems += '<td class="sorting">'+ data[index].Acctive_Status+'</td>';

            dataItems += '</tr>';
          });
          $('#tbody').html(dataItems);

        });
    });

    //## Event Dropdown
    $('#ddl_platform').change(function(){

      var productname =  $("#ddl_productname").val().toUpperCase();
      var masterrev =  $("#ddl_masterrev").val().toUpperCase();
      var platform =  $("#ddl_platform").val().toUpperCase();
      var testername =  $("#ddl_testername").val().toUpperCase();
      var argu = productname+";"+masterrev+";"+platform+";"+testername;

      $.get("ddl_event_inventory/"+argu, function(data)
      {
          //console.log(data);
          var dataItems= '';
          $.each (data, function (index) {
              dataItems += '<tr>';
             dataItems += '<td class="sorting">'+ data[index].TesterName+'</td>';
            dataItems += '<td class="sorting">'+ data[index].ProductName+'</td>';
            dataItems += '<td class="sorting">'+ data[index].ModelCCC+'</td>';
            dataItems += '<td class="sorting">'+ data[index].Operation+'</td>';
             dataItems += '<td class="sorting">'+ data[index].MasterRev+'</td>';
            dataItems += '<td class="sorting">'+ data[index].Quantity+'</td>';
             dataItems += '<td class="sorting">'+ data[index].Platform+'</td>';
            dataItems += '<td class="sorting">'+ data[index].TimeStamp+'</td>';
             dataItems += '<td class="sorting">'+ data[index].Acctive_Status+'</td>';

            dataItems += '</tr>';
          });
          $('#tbody').html(dataItems);

        });
    });

    //## Event Dropdown
    $('#ddl_testername').change(function(){

      var productname =  $("#ddl_productname").val().toUpperCase();
      var masterrev =  $("#ddl_masterrev").val().toUpperCase();
      var platform =  $("#ddl_platform").val().toUpperCase();
      var testername =  $("#ddl_testername").val().toUpperCase();
      var argu = productname+";"+masterrev+";"+platform+";"+testername;

      $.get("ddl_event_inventory/"+argu, function(data)
      {
          console.log(data);
          var dataItems= '';
          $.each (data, function (index) {

          dataItems += '<tr>';
                dataItems += '<td class="sorting">'+ data[index].TesterName+'</td>';
            dataItems += '<td class="sorting">'+ data[index].ProductName+'</td>';
            dataItems += '<td class="sorting">'+ data[index].ModelCCC+'</td>';
            dataItems += '<td class="sorting">'+ data[index].Operation+'</td>';
             dataItems += '<td class="sorting">'+ data[index].MasterRev+'</td>';
            dataItems += '<td class="sorting">'+ data[index].Quantity+'</td>';
             dataItems += '<td class="sorting">'+ data[index].Platform+'</td>';
            dataItems += '<td class="sorting">'+ data[index].TimeStamp+'</td>';
             dataItems += '<td class="sorting">'+ data[index].Acctive_Status+'</td>';

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
    $("#default-table").hpaging({ "limit": 20 });
  });

  $("#btnApply").click(function () {
    var lmt = $("#pglmt").val();
    $("#default-table").hpaging("newLimit", lmt);
  });
</script>
@stop
