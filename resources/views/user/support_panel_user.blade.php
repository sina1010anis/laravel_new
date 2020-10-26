<!DOCTYPE html>
<html>
<head>
    <title>پنل کاربری {{auth()->user()->name}} </title>
    <link rel="stylesheet" href="/css/menu_panel_user/style.css">
    <link rel="stylesheet" href="/css/support/style.css">
    <style>
        input, textarea {
            width: 100% !important;
            height: 35px;
            max-height: 100px;
            min-height: 35px;
            margin-top: 10px;
            border-radius: 5px;
            background-color: #f6f6f6;
            border: none;
            padding: 5px 10px;
            outline: none;
        }
        #view_chat{
            text-decoration: none;font-size: 12px;border-radius:5px;padding: 5px 15px;background-color: #4dc0b5;color: white
        }
        #view_chat:hover{
            background-color: #53cfc3;
        }
    </style>
</head>
<body>
@include('src.menu_panel')
<div class="shit_div">
    <form method="post" action="{{route('Support_User_Send')}}">
        @csrf
        <div>
            <input type="text" name="title" placeholder="title">
            @error('title')
            <p style="font-family: IRANSansWeb;color: red">{{$message}}</p>
            @enderror
        </div>

        <!--Form Group-->

        <div>
            <textarea name="not" placeholder="Message"></textarea>
            @error('not')
            <p style="font-family: IRANSansWeb;color: red">{{$message}}</p>
            @enderror
            @error('user_id')
            <p style="font-family: IRANSansWeb;color: red">{{$message}}</p>
            @enderror
        </div>

        <div>
            <button class="btn btn-info" type="submit">ارسال پیام</button>
            <a href="{{route('Support_User_View_Message')}}" id="view_chat" class="btn btn-info">صفحه چت</a>
        </div>
    </form>
</div>
</body>
</html>
