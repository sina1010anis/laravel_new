<!DOCTYPE html>
<html>
<head>
    <title>پنل کاربری {{auth()->user()->name}} </title>
    <link rel="stylesheet" href="/css/menu_panel_user/style.css">
</head>
<body>
<div
    style="
    top: 50%;left: 50%;position:absolute; transform: translate(-50% , -50%);width: 500px;box-shadow: #e5e5e5 1px 1px 10px;padding: 20px;border-radius: 20px;
">

<form method="post" action="{{route('User_Update_Profile'  , $userControll->name)}}">
    @method('put')
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">نام</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Email" name="name" value="{{$userControll->name}}">
        @error('name')
        <p style="font-family: IRANSansWeb;color: red">{{$message}}</p>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">ایمیل</label>
        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email" value="{{$userControll->email}}">
        @error('email')
        <p style="font-family: IRANSansWeb;color: red">{{$message}}</p>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">رمز عبور</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" >
        @error('password')
        <p style="font-family: IRANSansWeb;color: red">{{$message}}</p>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">تکرار رمز عبور</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password_confirmation" >
        @error('password_confirmation')
        <p style="font-family: IRANSansWeb;color: red">{{$message}}</p>
        @enderror
    </div>
    <button type="submit" class="btn btn-success">ذخیره</button>
    <a href="{{route('Delete_User' , $userControll->name)}}" type="submit" class="btn btn-danger">حذف اکانت</a>
</form>
</div>
</body>
@include('src.Bootstrap')
</html>
