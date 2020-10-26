<!DOCTYPE html>
<html>
<head>
    <title>پنل کاربری {{auth()->user()->name}} </title>
    <link rel="stylesheet" href="/css/menu_panel_user/style.css">
</head>
<body>

@include('src.menu_panel')
@if(session('msg'))
    <div class="alert">
        <p>{{session('msg')}}</p>
    </div>
    @endif
<h1 style="top: 50%;left: 50%;position:absolute; transform: translate(-50% , -50%)">پنل کاربری شما</h1>
</body>
</html>
