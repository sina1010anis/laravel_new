<!DOCTYPE html>
<html>
<head>
    <title>{{$title}}</title>
    <link rel="stylesheet" href="/css/menu_panel_user/style.css">
    <link rel="stylesheet" href="/css/support/style.css">
    <script src="https://kit.fontawesome.com/d4c29863c5.js" crossorigin="anonymous"></script>
    <style>
        *{
            text-align: center!important;
        }
        #hover_menu:hover{
            animation: 1s linear forwards tets;
        }
        @keyframes tets {
            0%{
                color: red;
            }
            100%{
                color: #404040;
            }
        }
    </style>
</head>
<body>
@include('src.menu_panel')
@if(session('msg'))
    <div class="alert">
        <p>{{session('msg')}}</p>
    </div>
@endif
<div class="shit_div">
    <table class="table table-hover">
        <thead>
        <tr>
            <th>شناسه</th>
            <th>موضوع</th>
            <th>متن</th>
            <th>نویسنده</th>
            <th>وضعیت</th>
            <th>تاریخ ثبت</th>
            <th>تاریخ ویرایش</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $i)
        <tr>
            <th scope="row">{{$i->id}}</th>
            <td id="hover_menu" style="direction: rtl;cursor: pointer"/><a href="{{route('Show_Data' , $i->id)}}">{{$i->title}}</a></td>
            <td ><?php echo mb_substr($i->text , 0 , 10) , '...'; ?></td>
            <td>{{$i->user->name}}</td>
            @if($i->status == 0)
                <td>
                    <a href="{{route('Date_Edit_Status' , $i->id)}}"><i id="hover_menu" style="cursor: pointer" class="fas fa-times"></i></a>
                </td>
                    @endif
            @if($i->status == 1)
                <td>
                    <a href="{{route('Date_Edit_Status' , $i->id)}}"><i id="hover_menu" style="cursor: pointer" class="fas fa-check"></i></a>
                </td>
            @endif
            <td style="font-size: 12px">{{jdate($i->created_at)->format('%A, %d %B %y')}}</td>
            <td style="font-size: 12px">{{jdate($i->updated_at)->format('%A, %d %B %y')}}</td>
        </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{$data->links()}}
</body>
@include('src.Bootstrap')
</html>
