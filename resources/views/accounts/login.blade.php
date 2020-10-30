
<!DOCTYPE html>
<html>
<head>
    <link href="{{ url('vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <meta charset="UTF-8">
    <title>PHP login script tutorial - click4knowledge.com</title>
    <style>
    body {
        background-size: cover;
        font-family: Montserrat;
    }

    .logo {
        width: 213px;
        height: 36px;
        margin: 30px auto;
    }

    .login-block {
        width: 320px;
        padding: 20px;
        background: #fff;
        border-radius: 5px;
        border-top: 5px solid #ff656c;
        margin: 0 auto;
    }

    .login-block h1 {
        text-align: center;
        color: #000;
        font-size: 18px;
        text-transform: uppercase;
        margin-top: 0;
        margin-bottom: 20px;
    }

    .login-block input {
        width: 100%;
        height: 42px;
        box-sizing: border-box;
        border-radius: 5px;
        border: 1px solid #ccc;
        margin-bottom: 20px;
        font-size: 14px;
        font-family: Montserrat;
        padding: 0 20px 0 50px;
        outline: none;
    }

    .login-block input#username {
        background: #fff url('http://i.imgur.com/u0XmBmv.png') 20px top no-repeat;
        background-size: 16px 80px;
    }

    .login-block input#username:focus {
        background: #fff url('http://i.imgur.com/u0XmBmv.png') 20px bottom no-repeat;
        background-size: 16px 80px;
    }

    .login-block input#password {
        background: #fff url('http://i.imgur.com/Qf83FTt.png') 20px top no-repeat;
        background-size: 16px 80px;
    }

    .login-block input#password:focus {
        background: #fff url('http://i.imgur.com/Qf83FTt.png') 20px bottom no-repeat;
        background-size: 16px 80px;
    }

    .login-block input:active, .login-block input:focus {
        border: 1px solid #ff656c;
    }

    .login-block button {
        width: 100%;
        height: 40px;
        background: #ff656c;
        box-sizing: border-box;
        border-radius: 5px;
        border: 1px solid #e15960;
        color: #fff;
        font-weight: bold;
        text-transform: uppercase;
        font-size: 14px;
        font-family: Montserrat;
        outline: none;
        cursor: pointer;
    }

    .login-block button:hover {
        background: #ff7b81;
    }

</style>
</head>

<body>

    <div class="logo"></div>
    <div class="login-block">
        <h1>Login</h1>

        <form method="POST" action="{{ route('login') }}" name="loginform">
            {{ csrf_field() }}

            <input type="text" value="" placeholder="Username" id="username" name="username" />
            <input type="password" value="" placeholder="Password" id="password" name="password" />
            <input type="checkbox" id="chk_guest" name="chk_guest" />
            <button type="submit">Submit</button>
            <div style="margin-top: 10px">
               <center><a href="{{ route('signup') }}">Register</a><span style="padding-left: 40px"></span><a href="">Forgot Password</a></center>
           </div>
           @if(Session::has('error'))

           <div class="alert alert-warning" role="alert" style="margin-top: 50px">
            <font color="red"><center><strong>{!! Session::get('error') !!}</strong></center></font>
        </div>

        @endif
    </form>
</div>
<script src="{{ url('vendor/jquery/dist/jquery.js')}}"></script>
<script type="text/javascript">
    $('#chk_guest').click(function() {
        var checked = $(this).is(':checked');
        if(checked == true)
        {
            //alert('1');
            $("#username").val('Guest');
            $("#password").val('Guest123456');
            $("#username").attr('readonly', true);
            $("#password").attr('readonly', true);
        }
        else
        {
            //alert('2');
            $("#username").val('');
            $("#password").val('');
            $("#username").attr('readonly', false);
            $("#password").attr('readonly', false);
        }
    });
</script>
</body>
</html>