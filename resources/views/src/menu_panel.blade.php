<ul>
    <li><a href="{{route('index')}}">صفحه اصلی</a></li>
    <li><a href="{{route('User_Specifications' , auth()->user()->name)}}">مشخصات کاربر</a></li>
    <li><a href="{{route('User_Edit' , auth()->user()->name)}}">تغییر پروفایل</a></li>
    <li><a href="{{route('Support_User')}}">پشتیبانی</a></li>
    <li><a href="{{route('Date_User_New')}}">ثبت مطلب جدید</a></li>
    <li><a href="{{route('Upload_User')}}">آپلود عکس</a></li>

    <li>
        <a class='list-item' href=''>
            <form action="{{route('logout')}}" method="post">
                @csrf
                <button style="background-color: unset;border-radius: unset;border: unset;color: white" type="submit">خارج شدن از اکانت</button>
            </form>
            <i class='icon-bar-chart'></i>
        </a>
    </li>
</ul>
