<!DOCTYPE html>
<html>
<head>
    <title>مشخصات  کاربری {{auth()->user()->name}} </title>
    <link rel="stylesheet" href="/css/menu_panel_user/style.css">
    <link rel="stylesheet" href="/css/DE_user/style.scss">

    <style>
        *{
            text-align: center;
        }
        .widget{
            width: 500px!important;
            padding: 10px 60px;
            box-sizing: border-box;
            border-radius: 10px;
            direction: rtl;
        }
        .widget *{
            margin-top: 25px;
        }
    </style>
</head>
<body>
@include('src.menu_panel')
<div class="widget">

    <header>
        <div class="avatar h-avatar"></div>
        <h1>مشخصات کاربری {{$userControll->name}}</h1>
    </header>

    <article>
        <h2>تاریخ عضویت: <strong>{{jdate($userControll->created_at)->format('%A, %d %B %y')}}</strong></h2>
        @if($userControll->email_verified_at == null)
            <p>ایمیل تایید نشده است</p>
        @else
            <p>ایمیل تایید شده است</p>
        @endif

    </article>

    <section>
        <div class="comment">
            <div class="avatar c-avatar"></div>
            <div class="text">
                <h3>{{$userControll->email}}</h3>
                اخرین ویرایش : {{jdate($userControll->updated_at)->format('%A, %d %B %y')}}
            </div>
        </div>
        <a href="{{route('home')}}" class="btn btn-warning">بازگشت</a>
        <a class="btn btn-primary">ویرایش</a>
    </section>

</div>

</body>
@include('src.Bootstrap')
</html>
