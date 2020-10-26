<!DOCTYPE html>
<html>
<head>
    <title>{{$title}}</title>
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
        .shit_div{
            height: 300px!important;
            max-height: 300px!important;
            overflow-y: scroll;
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
    @if($rowCount == 0)
        <p>پیامی یافت نشد</p>
            @else
        @foreach($data as $i)
            @if($i->status == 0)
                        <div class="pm_user">
                            <p style="text-align: left;color: #757575;font-size: 12px">{{$i->title}}</p>
                            <p style="text-align: right">{{$i->not}}</p>
                            <p style="font-size: 10px">{{jdate($i->created_at)->format('%A, %d %B %y')}}</p>
                        </div>

            @endif
            @if($i->status == 1)
                    <div class="pm_admin">
                        <p style="text-align: left;color: #757575;font-size: 12px">{{$i->title}}</p>
                        <p style="text-align: right">{{$i->not}}</p>
                        <p style="text-align: right">{{$i->not}}</p>
                        <p style="font-size: 10px">{{jdate($i->created_at)->format('%A, %d %B %y')}}</p>
                    </div>
                @endif
        @endforeach
        @endif
</div>
</body>
</html>
