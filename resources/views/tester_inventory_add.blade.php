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
    <h2>Add New Inventory</h2>

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
        <label class="control-label col-md-3 col-sm-3 col-xs-12">TesterName</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <input name="tbx_TesterName" id="tbx_TesterName" type="text" class="form-control" placeholder="TesterName EQ-XXXX,257-XXX,SIO-XXXX,HBXX">
        </div>
      </div>
<!-- 
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">ProductName</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <input name="tbx_ProductName" id="tbx_ProductName" type="text" class="form-control" placeholder="Employee Name">
        </div>
      </div> -->


         <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Product Name</label>
        <div class="col-md-9 col-sm-9 col-xs-12">

  <select class="form-control" id="ddl_ProductName" type="text" class="form-control" placeholder="Product Name">

            @foreach($ddl_product_name as $_ddl)

    
      <option>{{$_ddl['product_name']}}</option>
       
             @endforeach

    
     
       </select>



        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">ModelCCC</label>
        <div class="col-md-9 col-sm-9 col-xs-12">

      <select class="form-control" id="ddl_ModelCCC" type="text" class="form-control" placeholder="Product Name">

            @foreach($ddl_ModelCCC as $_ddl)

    
      <option>{{$_ddl['ModelCCC']}}</option>
       
             @endforeach

    
     
       </select>

        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">MasterRev</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <input name="tbx_MasterRev" id="tbx_MasterRev" type="text" class="form-control" placeholder="MasterRev">
        </div>
      </div>

  
    
     <div class="form-group" hidden=""> 
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Quantity</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <input name="tbx_Quantity" id="tbx_Quantity" type="text" class="form-control" placeholder="Quantity">
        </div>
      </div>




      <div class="form-group" hidden="">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">TimeStamp</label>
        <div class="col-md-9 col-sm-9 col-xs-12" >
          <input name="tbx_TimeStamp" id="tbx_TimeStamp" type="text" class="form-control" placeholder="TimeStamp">
        </div>
      </div>





          <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Operation</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
         
           <select class="form-control" id="tbx_Operation" type="text" class="form-control" placeholder="Operation">

            @foreach($ddl_Operation as $_ddl)

           <option>{{$_ddl['Operation']}}</option>   

             @endforeach

                </select>
        </div>
      </div>



       <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Platform</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          
            <select class="form-control" id="tbx_Platform" type="text" class="form-control" placeholder="Platform">

            @foreach($ddl_platform as $_ddl)

    
      <option>{{$_ddl['Platform']}}</option>
       
             @endforeach

                </select>


        </div>
      </div>



      <div class="ln_solid"></div>

      <div class="form-group">
        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
          <a href="{{ url('tester_inventory') }}" class="btn btn-primary" role="Add">Cancel</a>
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
    $.post("{{ route('tester_inventory.store') }}",
    {
      TesterName:$("#tbx_TesterName").val(),
      ProductName:$("#ddl_ProductName").val(),
      ModelCCC:$("#ddl_ModelCCC").val(),
      MasterRev:$("#tbx_MasterRev").val(),
      Quantity:$("#tbx_Quantity").val(),
      Operation:$("#tbx_Operation").val(),
      TimeStamp:$("#tbx_TimeStamp").val(),
      Platform:$("#tbx_Platform").val(),

      _token:"{{ csrf_token() }}",


    },function(data){
      console.log(data);
      if(data){
        var url= "{{ url('tester_inventory') }}";
        window.location=url;
      }
    });
  });
</script>
@stop