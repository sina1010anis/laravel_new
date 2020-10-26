<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>صفحه ورود</title>
    <link rel="stylesheet" href="css/register/style.css">
    <script src="{{url('js/JQ/jquery-3.5.1.min.js')}}"></script>

</head>
<body ng-controller="RegisterCtrl" ng-app="myApp">
<script  src="https://code.jquery.com/jquery-3.1.1.min.js"  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="  crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" ></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<div class="body">
    <div class="veen">
        <div class="login-btn splits">
            <button class="active">ورود</button>
        </div>
        <div class="rgstr-btn splits">
            <p>ایا ثبت نام نکرده اید ؟</p>
            <a style="color: white;padding: 5px 20px ; border: 1px solid white;border-radius: 100px" href="{{route('register')}}">ثبت نام</a>
        </div>
        <div class="wrapper">
            <form method="post" action="{{route('login')}}" id="login" tabindex="500">
                @csrf
                <h3>ورود</h3>
                <div class="mail">
                    <input {{old('email')}} type="mail" name="email">
                    @error('email')
                    <p style="font-family: IRANSansWeb;color: red">{{$message}}</p>
                    @enderror
                    <label>ایمیل</label>
                </div>
                <div class="passwd">
                    <input type="password" name="password">
                    @error('password')
                    <p style="font-family: IRANSansWeb;color: red">{{$message}}</p>
                    @enderror
                    <label>رمز عبور</label>
                </div>
                <div class="submit">
                    <button class="dark">ثبت نام</button>
                </div>
            </form>
            <form id="register" tabindex="502">
                <h3>Register</h3>
                <div class="name">
                    <input type="text" name="">
                    <label>Full Name</label>
                </div>
                <div class="mail">
                    <input type="mail" name="">
                    <label>Mail</label>
                </div>
                <div class="uid">
                    <input type="text" name="">
                    <label>User Name</label>
                </div>
                <div class="passwd">
                    <input type="password" name="">
                    <label>Password</label>
                </div>
                <div class="submit">
                    <button class="dark">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="site-link">
    <a href="http://creatorvisions.com" target="_blank">
        Creator <img src="http://creatorvisions.com/img/new-logo-2.png">
        Visions</a>
</div>
<style type="text/css">
    *{
        font-family: IRANSansWeb;
    }
    input{
        text-align: right;
    }
    .site-link{
        padding: 5px 15px;
        position: fixed;
        z-index: 99999;
        background: #fff;
        box-shadow: 0 0 4px rgba(0,0,0,.14), 0 4px 8px rgba(0,0,0,.28);
        right: 30px;
        bottom: 30px;
        border-radius: 10px;
    }
    .site-link img{
        width: 30px;
        height: 30px;
    }
</style>
</body>
<script src="{{url('js/register/java.js')}}"></script>
</html>
