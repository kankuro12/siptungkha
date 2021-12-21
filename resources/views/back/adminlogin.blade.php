
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('back/css/metro-all.css') }}">
    <title>Admin login</title>
    <style>
        .login-form {
            width: 350px;
            height: auto;
            top: 50%;
            margin-top: -160px;
        }
        .closebtn {
            margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;
            }
        .alert{
            border:2px red solid;
            padding:7px;
            background:#f44336;
            color:white;
            margin-top:15px;
            }
    </style>
</head>

<body class="h-vh-100 bg-brandColor2">
    @include('back.alert')

    <form class="login-form bg-white p-6 mx-auto border bd-default win-shadow"
          data-role="validator"
          data-clear-invalid="2000"
          data-on-error-form="invalidForm"
          data-on-validate-form="validateForm"
          method="post"
          >
          @csrf

        <span class="mif-vpn-lock mif-4x place-right" style="margin-top: -10px;"></span>
        <h2 class="text-light">Admin Login Panel</h2>
        <hr class="thin mt-4 mb-4 bg-white">
        <div class="form-group">
            <input type="text" name="email" data-role="input" data-prepend="<span class='mif-envelop'>" placeholder="Enter your email..." data-validate="required email">
        </div>
        <div class="form-group">
            <input type="password" name="password"  data-role="input" data-prepend="<span class='mif-key'>" placeholder="Enter your password..." data-validate="required minlength=3">
        </div>

           @if(isset($error))
                <div class="alert">
                {{$error}}
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                </div>
            @endif

        <div class="form-group mt-10">
            <input type="checkbox" data-role="checkbox" data-caption="Remember me" class="place-right">
            <button class="button primary">Login</button>
        </div>
    </form>




    <script src="{{ asset('common/js/jquery.js') }}"></script>
    <script src="{{ asset('back/js/metro.js') }}"></script>
<script>
        function invalidForm(){
            var form  = $(this);
            form.addClass("ani-ring");
            setTimeout(function(){
                form.removeClass("ani-ring");
            }, 1000);
        }
        function validateForm(){
            $(".login-form").animate({
                opacity: 0
            });
        }
    </script>
</body>
</html>
