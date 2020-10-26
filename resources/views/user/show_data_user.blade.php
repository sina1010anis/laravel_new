<!DOCTYPE html>
<html>
<head>
    <title>{{$title}}</title>
    <link rel="stylesheet" href="/css/menu_panel_user/style.css">
    <link rel="stylesheet" href="/css/support/style.css">
    <style>
        input, textarea {
            width: 100% !important;
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
        .pm_user{
            width: 55%;
            padding: 5px 10px;
            background-color: #f6f6f6;
            margin-top: 10px;
            border-radius: 5px;
            float: right;
        }
        .pm_admin{
            width: 55%;
            padding: 5px 10px;
            background-color: #bebfe9;
            margin-top: 10px;
            border-radius: 5px;
            float: left;
        }
    </style>
</head>
<body>
@include('src.menu_panel')
<div class="shit_div">
    <h2 align="center">{{$data_user->title}}</h2>
    <hr>
    <h5 align="right">متن</h5>
    <h4 align="center">{{$data_user->text}}</h4>
    <hr>
    <h4 dir="rtl"><span>ارسال شده توسط :</span><span>{{$data_user->user->name}}</span></h4>
    <hr>
    @if($data_user->status == 0)
        <h4>نامنتشر</h4>
        <hr>
        @endif
    @if($data_user->status == 1)
        <h4>منتشر</h4>
        <hr>
    @endif
    <h2 style="text-align: center;font-size: 12px">{{jdate($data_user->created_at)->format('%A, %d %B %y')}}</h2>
    <h2 style="text-align: center;font-size: 12px">{{jdate($data_user->updated_at)->format('%A, %d %B %y')}}</h2>
</div>
</body>
</html>
