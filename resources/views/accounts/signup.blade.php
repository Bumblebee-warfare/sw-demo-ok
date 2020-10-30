
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Software Release</title>
    <link href="{{ url('ims.ico')}}" rel="icon">
    <!-- Bootstrap -->
    <link href="{{ url('vendor/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ url('vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ url('vendor/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ url('vendor/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ url('vendor/iCheck/skins/flat/green.css')}}" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="{{ url('vendor/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{ url('vendor/jqvmap/dist/jqvmap.min.css')}}" rel="stylesheet"/>
    <!-- Custom Theme Style -->
    <link href="{{ url('build/css/custom.css')}}" rel="stylesheet">
</head>
<body style="background-color: #bbb;">

  <div class="container" style="margin-top:100px;">
    <div>
        <div class="col-md-6 col-md-offset-3"><!-- col-md-offset-4-->
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Sign Up Form</h3>
                </div>
                <div class="panel-body">
                    <form action="{{ route('signup') }}" method="post" enctype="multipart/form-data">
                        <div class="col-md-5">
                            <center>
                                <img id="images" name="images" src="{{ url('images/images.png')}}" alt="No Images" height="220" width="220">
                                <div class="input-group" style="padding-top: 12px">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button" id="file_browser"><i class="fa fa-search"></i></button>
                                    </span>
                                    <input type="text" id="file_path" class="form-control" style="height: 34px" placeholder="เลือกไฟล์...">
                                </div>
                                <input type="file" onchange="readURL(this);" class="hidden" id="fileUpload" name="file-Upload">
                            </center>
                        </div>
                        <div class="col-md-7">

                            <div class="form-group">
                                @if(Session::has('employee_id'))
                                <input class="form-control" value="{!! Session::get('employee_id') !!}" required placeholder="Employee Id" val name="employee_id" type="text" autofocus>
                                @else
                                <input class="form-control" required placeholder="Employee Id" name="employee_id" type="text" autofocus>
                                @endif
                            </div>
                            <div class="form-group">
                                @if(Session::has('name'))
                                <input class="form-control" value="{!! Session::get('name') !!}" required placeholder="Name" name="name" type="text" autofocus>
                                @else
                                <input class="form-control" required placeholder="Name" name="name" type="text" autofocus>
                                @endif
                            </div>
                            <div class="form-group">
                                @if(Session::has('email'))
                                <input class="form-control" value="{!! Session::get('email') !!}" required placeholder="E-mail" name="email" type="email" autofocus>
                                @else
                                <input class="form-control" required placeholder="E-mail" name="email" type="email" autofocus>
                                @endif
                            </div>
                            <div class="form-group">
                                <input class="form-control" required placeholder="Password" name="password" type="password" value="">
                            </div>
                            <div class="form-group">
                                <input class="form-control" required placeholder="Confirm Password" name="re_password" type="password" value="">
                            </div>
                            <input type="submit" class="btn btn-lg btn-success btn-block" style="border-radius:0px;" value="Sign Me Up"></input>
                        </div>

                        <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                    </form>
                    @if(Session::has('error'))

                    <div class="alert alert-warning" role="alert" style="margin-top: 50px">
                        <font color="red"><center><strong>{!! Session::get('error') !!}</strong></center></font>
                    </div>

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- jQuery -->
<script src="{{ url('vendor/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{ url('vendor/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{ url('vendor/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $(":input").inputmask();
    });
    $('#file_browser').click(function(e){
        e.preventDefault();
        $('#fileUpload').click();
    });

    $('#fileUpload').change(function(){
        var str = $(this).val().replace("C:\\fakepath\\", "");
        $('#file_path').val(str);
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#images')
                .attr('src', e.target.result)
                .width(220)
                .height(220);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>


</body>
</html>
