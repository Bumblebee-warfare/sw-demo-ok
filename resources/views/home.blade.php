@extends('layouts.master')
@section('content')
<div>
  <h2>DASHBOARD</h2> 
</div>
<div class="tester_software">
  <div class="x_panel">
    <div class="x_content">
     <div class="table-responsive" id="tester_software" style="align-items: center ;zoom: 82%">
      <thead style="width:auto; border:none;" >

        <div class="clearfix"></div>
        <div class="row">
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>HDF<small>Platform</small></h2>
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

                <canvas id="HDFChart"></canvas>

              </div>
            </div>
          </div>


          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>HDF+<small>Platform</small></h2>
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

                <!-- <div id="HDFPlusChart" style="height: 300px; width: 100%;"></div> -->
                <canvas id="HDFPlusChart"></canvas>


                
              </div>
            </div>
          </div>
        </div>
        
        <div class="clearfix"></div>
        <div class="row">
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>SIO<small>Platform</small></h2>
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
                <canvas id="SIOChart"></canvas>
                
              </div>
            </div>
          </div>

          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>SEEDER<small>Platform</small></h2>
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
                <canvas id="SeederChart"></canvas>
              </div>
            </div>
          </div>
        </div>

        
      </div>
    </div>
  </div>

  <style type="text/css">
  #tester_software {
    height:950px;
    overflow:auto;
    margin-top:20px;
  }


  .highcharts-figure, .highcharts-data-table table {
    min-width: 320px; 
    max-width: 660px;
    margin: 1em auto;
}

.highcharts-data-table table {
  font-family: Verdana, sans-serif;
  border-collapse: collapse;
  border: 1px solid #EBEBEB;
  margin: 10px auto;
  text-align: center;
  width: 100%;
  max-width: 500px;
}
.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}
.highcharts-data-table th {
  font-weight: 600;
    padding: 0.5em;
}
.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
    padding: 0.5em;
}
.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
}
.highcharts-data-table tr:hover {
    background: #f1f7ff;
}

</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

<script src="https://cdn.anychart.com/releases/8.9.0/js/anychart-core.min.js"></script>

<script src='https://cdn.plot.ly/plotly-latest.min.js'></script>



<script type="text/javascript">
$.post("{{ route('home.chart') }}",
{
  platform:'HDF',
  _token:"{{ csrf_token() }}",

},function(data){
  if(data){
    var name = data['name'];
    var values =  data['vals']; 
    new Chart(document.getElementById("HDFChart"), {
      type: 'doughnut',
      data: {
        labels: name,
        datasets: [{
          label: "Population (millions)",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c25850","#c45860","#c65870","#c85880","#c95890","#c95550","#c97790"],
          data: values
        }]
      },
      options: {
        title: {
          display: true
        }
      }
    });
  }
});


$.post("{{ route('home.chart') }}",
{
  platform:'HDF+',
  _token:"{{ csrf_token() }}",

},function(data){
  if(data){
    var name = data['name'];
    var values =  data['vals']; 
    new Chart(document.getElementById("HDFPlusChart"), {
      type: 'pie',
      data: {
        labels: name,
        datasets: [{
          label: "Population (millions)",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c25850","#c45860","#c65870","#c85880","#c95890","#c95550","#c97790"],
          data: values
        }]
      },
      options: {
        title: {
          display: true
        }
      }
    });
  }

      });


     


//////////////////////

$.post("{{ route('home.chart') }}",
{
  platform:'SIO',
  _token:"{{ csrf_token() }}",

},function(data){



    if(data){
    var name = data['name'];
    var values =  data['vals']; 
    new Chart(document.getElementById("SIOChart"), {
      type: 'pie',
      data: {
        labels: name,
        datasets: [{
          label: "Population (millions)",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c25850","#c45860","#c65870","#c85880","#c95890","#c95550","#c97790"],
          data: values
        }]
      },
      options: {
        title: {
          display: true
        }
      }
    });
  }
});




$.post("{{ route('home.chart') }}",
{
  platform:'SEEDER',
  _token:"{{ csrf_token() }}",

},function(data){
  

    
    if(data){
    var name = data['name'];
    var values =  data['vals']; 
    new Chart(document.getElementById("SeederChart"), {
      type: 'pie',
      data: {
        labels: name,
        datasets: [{
          label: "Population (millions)",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c25850","#c45860","#c65870","#c85880","#c95890","#c95550","#c97790"],
          data: values
        }]
      },
      options: {
        title: {
          display: true
        }
      }
    });
  }
});



    //////////////////////////////














</script>
@stop