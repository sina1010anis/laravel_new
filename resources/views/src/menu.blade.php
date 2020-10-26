<ul class="ul">
    <li>
        <a class='list-item' href='{{route('register')}}'>
            ثبت نام
            <i class='icon-reorder'></i>
        </a>
    </li>
    <li>
        <a class='list-item' href='{{route('login')}}'>
            ورود
            <i class='icon-th-large'></i>
        </a>
    </li>
    <li>
        <a class='list-item' href=''>
            کاربری
            <i class='icon-bar-chart'></i>
        </a>
    </li>
    @if(auth()->check())
        <li>
            <a class='list-item' href='{{'/home'}}'>
                پنل
                <i class='icon-bar-chart'></i>
            </a>
        </li>
        <li>
            <a class='list-item' href=''>
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button style="background-color: unset;border-radius: unset;border: unset" type="submit">خروج</button>
                </form>
                <i class='icon-bar-chart'></i>
            </a>
        </li>
    @endif
</ul>
