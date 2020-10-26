<!DOCTYPE html>
<html>
<head>
    <title>{{$title}}</title>
    <link rel="stylesheet" href="/css/menu_panel_user/style.css">
    <script src="/js/JQ/jquery-3.5.1.min.js"></script>
    <script src="/js/Apload/js.js"></script>
</head>
<body>
<div
    style="
    top: 50%;left: 50%;position:absolute; transform: translate(-50% , -50%);width: 500px;box-shadow: #e5e5e5 1px 1px 10px;padding: 20px;border-radius: 20px;
">

    <form id="form" method="post" action="" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">موضوع</label>
            <input type="text" class="form-control" id="title" placeholder="title" name="title" >
            @error('title')
            <p style="font-family: IRANSansWeb;color: red">{{$message}}</p>
            @enderror
            <div class="form-group">
                <label for="title">اپلود</label>
                <input type="file" class="form-control" id="file" placeholder="file" name="file" >
                @error('file')
                <p style="font-family: IRANSansWeb;color: red">{{$message}}</p>
                @enderror
            </div>
        </div>
        <button type="submit">ارسال</button>
    </form>
</div>
</body>
@include('src.Bootstrap')

</html>
