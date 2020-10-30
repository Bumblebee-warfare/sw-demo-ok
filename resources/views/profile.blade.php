@extends('layouts.master')

@section('content')
<link href="{{ url('assets/production/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
<!-- Font Awesome -->
<link href="{{ url('assets/production/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
<!-- NProgress -->
<link href="{{ url('assets/production/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
<!-- NProgress -->
<link href="{{ url('assets/production/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
<!-- iCheck -->
<link href="{{ url('assets/production/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
<!-- bootstrap-progressbar -->
<link href="{{ url('assets/production/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
<!-- JQVMap -->
<link href="{{ url('assets/production/vendors/jqvmap/dist/jqvmap.min.css')}}" rel="stylesheet"/>
<!-- Custom Theme Style -->
<link href="{{ url('assets/production/build/css/custom.css')}}" rel="stylesheet">
<div class="col-md-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h3><i class="fa fa-cog"></i> Profile Setting</h3>
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
			<!--form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data"-->
			<form method="post" id="form_upload" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="col-md-3 col-xs-12">

					@if(Session::get('user_info')['username'] != "Guest")
					<img id="images" name="images" src="{{asset('images\\' . (Session::get('user_info')['employee_id']) . '.png')}}" class="img-thumbnail" alt="Image Profile" width="304" height="236">
					@else
					<img id="images" name="images" src="{{asset('images\images.png')}}" class="img-thumbnail" alt="Image Profile" width="304" height="236">
					@endif

					<div class="input-group" style="padding-top: 12px">
						<span class="input-group-btn">
							<button class="btn btn-primary" type="button" id="file_browser"><i class="fa fa-search"></i></button>
						</span>
						@if(!Session::has('error'))
						<input type="text" id="file_path" class="form-control" style="height: 34px" value="{{ Session::get('user_info')['images'] }}">
						@else
						<input type="text" id="file_path" class="form-control" style="height: 34px" placeholder="เลือกไฟล์...">
						@endif
					</div>
					<input type="file" onchange="readURL(this);" class="hidden" id="fileUpload" name="fileUpload">
				</div>
				<div class="col-md-9 col-xs-12">
					<div class="form-horizontal form-label-left">

						<?php 
						$user_info=App\User::where('employee_id',Session::get('user_info')['employee_id'])->get()->first();
						?>

						<div class="form-group">
							<label class="control-label col-md-2 col-sm-2 col-xs-12">Employee Name</label>
							<div class="col-md-8 col-sm-8 col-xs-12">
								@if(!Session::has('error'))
								<input id="employee_name" name="employee_name" type="text" class="form-control" value="{{ $user_info['name'] }}">
								@else
								<input id="employee_name" name="employee_name" type="text" class="form-control" placeholder="First Name">
								@endif
							</div>
							<div class="col-md-2 col-sm-2 col-xs-12">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2 col-sm-2 col-xs-12">Employee ID</label>
							<div class="col-md-8 col-sm-8 col-xs-12">
								@if(!Session::has('error'))
								<input id="employee_id" name="employee_id" type="text" class="form-control" value="{{ $user_info['employee_id'] }}">
								@else
								<input id="employee_id" name="employee_id"  type="text" class="form-control" placeholder="Employee ID">
								@endif
							</div>
							<div class="col-md-2 col-sm-2 col-xs-12">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2 col-sm-2 col-xs-12">Department</label>
							<div class="col-md-8 col-sm-8 col-xs-12">
								@if(!Session::has('error'))
								<input id="department" name="department" type="text" class="form-control" value="{{ $user_info['department'] }}">
								@else
								<input id="department" name="department" type="text" class="form-control" placeholder="Department">
								@endif
							</div>
							<div class="col-md-2 col-sm-2 col-xs-12">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2 col-sm-2 col-xs-12">Email Address<span class="required">*</span>
							</label>
							<div class="col-md-8 col-sm-8 col-xs-12">
								@if(!Session::has('error'))
								<input id="email" name="email" type="text" class="form-control" value="{{ $user_info['email'] }}">
								@else
								<input id="email" name="email" type="text" class="form-control" placeholder="Email Address">
								@endif
							</div>
							<div class="col-md-2 col-sm-2 col-xs-12">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2 col-sm-2 col-xs-12">Contact</label>
							<div class="col-md-4 col-sm-4 col-xs-12">
								@if(!Session::has('error'))
								<input id="phone" name="phone" type="text" class="form-control" value="{{ $user_info['phone'] }}">
								@else
								<input id="phone" name="phone" type="text" class="form-control" placeholder="Phone Number">
								@endif

							</div>
							<div class="col-md-4 col-sm-4 col-xs-12">
								@if(!Session::has('error'))
								<input id="mobile" name="mobile" type="text" class="form-control" value="{{ $user_info['mobile'] }}">
								@else
								<input id="mobile" name="mobile" type="text" class="form-control" placeholder="Mobile">
								@endif
							</div>
							<div class="col-md-2 col-sm-2 col-xs-12">
							</div>
						</div>
						
						<div class="clearfix"></div>
						<div class="form-group" style="margin-top: 100px">
							<label class="control-label col-md-2 col-sm-2 col-xs-12"></label>
							<div class="col-md-10 col-sm-10 col-xs-12 col-md-offset-3">
								<a href="{{ url()->previous() }}" class="btn btn-primary">Cancel</a>
								<input type="submit" class="btn btn-primary" value="Update">
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<script src="{{ url('vendor/jquery/dist/jquery.js')}}"></script>
<script>

	$(document).on('submit', '#form_upload', function(e){
		e.preventDefault();
		var form_data = new FormData($('#form_upload')[0]);
		$.ajax({
			type:'POST',
			url:"{{ route('profile.update') }}",
			processData: false,
			contentType: false,
			async: false,
			cache: false,
			data : form_data,
			success: function(response){
				window.location="{{ url('home')}}";
				//window.location="{{ url()->previous() }}";
			}
		});
	});
</script>

<script src="{{ url('assets/production/vendors/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{ url('assets/production/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{ url('assets/production/vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js')}}"></script>
<script>
	$(document).ready(function(){
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
	};
</script>

@stop
