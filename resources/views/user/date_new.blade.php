<!DOCTYPE html>
<html>
<head>
    <title>{{$title}} </title>
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
        #view_chat {
            text-decoration: none;font-size: 12px;border-radius:5px;padding: 5px 15px;background-color: #4dc0b5;color: white;border: none;
        }
        #view_chat:hover{
            background-color: #53cfc3;
        }
        #view_chat2{
            background-color: #7bc047!important;
        }
        #view_chat2:hover{
            background-color: #87d44f!important;
        }
    </style>
</head>
<body>
@include('src.menu_panel')
<div class="shit_div">
    <form method="post" action="{{route('Date_User_New_Store')}}">
        @csrf
        <div>
            <input type="text" name="title" placeholder="title">
            @error('title')
            <p style="font-family: IRANSansWeb;color: red">{{$message}}</p>
            @enderror
        </div>

        <!--Form Group-->

        <div>
            <textarea name="text" placeholder="Message"></textarea>
            @error('text')
            <p style="font-family: IRANSansWeb;color: red">{{$message}}</p>
            @enderror
            @error('user_id')
            <p style="font-family: IRANSansWeb;color: red">{{$message}}</p>
            @enderror
        </div>
        <select style="margin-bottom: 10px" name="status" id="">
            <option value="1">نمایش بده</option>
            <option value="0">نمایش نده</option>
        </select>
        <div>
            <button id="view_chat" class="btn btn-info" type="submit">ثبت مطلب</button>
            <a href="{{route('Date_User_View')}}" id="view_chat" class="btn btn-info">مطلب من</a>
        </div>
    </form>
</div>
</body>
</html>
