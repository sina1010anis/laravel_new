<?php

namespace App\Http\Controllers;

use App\Models\ajax;
use App\Models\date_new;
use App\Models\UserControll;
use App\Models\Support;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\VarDumper\Cloner\Data;

class UserControllController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $title = 'مطلب جدیدی ثبت کنید';
        return view('user.date_new', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Support $support
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request, Support $support)
    {
        $support->user_id = auth()->user()->id;
        $msg = [
            'title.required' => 'موضوع را وارد نکرده ایید',
            'not.required' => 'متن را وارد نکرده ایید',
        ];
        $v = $request->validate([
            'title' => 'required',
            'not' => 'required',
        ], $msg);
        $support->title = $request->title;
        $support->not = $request->not;

        $support->save();
        return redirect(route('home'))->with('msg', 'پیام شما ارسال شده است');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\UserControll $userControll
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(UserControll $userControll)
    {
        $title = $userControll->name . 'مشخصات شما ';
        return view('user.show_user', compact('userControll', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\UserControll $userControll
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(UserControll $userControll)
    {
        $title = 'ویرایش حساب کاربری';
        return view('user.Edit_profile', compact('userControll', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\UserControll $userControll
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, UserControll $userControll)
    {
        $message = '';
        if (empty($request->name) && empty($request->password)) {
            $msg = [
                'name.required' => 'نام را وارد کرده ایید',
                'name.max' => 'نام نباید بیشتر از 20 مقدار باشد',
                'email.max' => 'ایمیل نباید بیشتر از 225 مقدار باشد',
                'password.min' => 'پسور نباید کمتر از 8 مقدار باشد',
                'email.unique' => 'ایمیل تکراری است',
                'password.confirmed' => 'پسورد باهم نمیخواند',
                'name.string' => 'نام باید حروف و عدد باشد',
                'email.string' => 'ایمیل باید حروف و عدد باشد',
                'password.string' => 'پسورد باید حروف و عدد باشد',
                'email.required' => 'ایمیل را وارد کرده ایید',
                'password.required' => 'رمز عبور را وارد کرده ایید',
            ];
            $v = $request->validate([
                //'name' => ['required', 'string', 'max:20'],
                'email' => ['required', 'string', 'email', 'max:255'],
                //'password' => ['required', 'string', 'min:8', 'confirmed'],
            ], $msg);
            $userControll->email = $request->email;
            $message .= 'ایمیل شما با موفقیت تغییر کرد';
        }
        if (empty($request->email) && empty($request->password)) {
            $msg = [
                'name.required' => 'نام را وارد کرده ایید',
                'name.max' => 'نام نباید بیشتر از 20 مقدار باشد',
                'email.max' => 'ایمیل نباید بیشتر از 225 مقدار باشد',
                'password.min' => 'پسور نباید کمتر از 8 مقدار باشد',
                'email.unique' => 'ایمیل تکراری است',
                'password.confirmed' => 'پسورد باهم نمیخواند',
                'name.string' => 'نام باید حروف و عدد باشد',
                'email.string' => 'ایمیل باید حروف و عدد باشد',
                'password.string' => 'پسورد باید حروف و عدد باشد',
                'email.required' => 'ایمیل را وارد کرده ایید',
                'password.required' => 'رمز عبور را وارد کرده ایید',
            ];
            $v = $request->validate([
                'name' => ['required', 'string', 'max:20'],
                //'email' => ['required', 'string', 'email', 'max:255'],
                //'password' => ['required', 'string', 'min:8', 'confirmed'],

            ], $msg);
            $userControll->name = $request->name;
            $message .= 'نام شما با موفقیت تغییر کرد';
        }
        if (empty($request->name) && empty($request->email)) {
            $msg = [
                'name.required' => 'نام را وارد کرده ایید',
                'name.max' => 'نام نباید بیشتر از 20 مقدار باشد',
                'email.max' => 'ایمیل نباید بیشتر از 225 مقدار باشد',
                'password.min' => 'پسور نباید کمتر از 8 مقدار باشد',
                'email.unique' => 'ایمیل تکراری است',
                'password.confirmed' => 'پسورد باهم نمیخواند',
                'name.string' => 'نام باید حروف و عدد باشد',
                'email.string' => 'ایمیل باید حروف و عدد باشد',
                'password.string' => 'پسورد باید حروف و عدد باشد',
                'email.required' => 'ایمیل را وارد کرده ایید',
                'password.required' => 'رمز عبور را وارد کرده ایید',
            ];
            $v = $request->validate([
                //'name' => ['required', 'string', 'max:20'],
                //'email' => ['required', 'string', 'email', 'max:255'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ], $msg);
            $pass = Hash::make($request->password);
            $userControll->password = $pass;
            $message .= 'پسورد با موفقیت تغییر کرد';
        }
        $userControll->save();
        return redirect(route('home'))->with('msg', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\UserControll $userControll
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(UserControll $userControll)
    {
        $userControll->delete();
        return redirect(route('index'))->with('msg', 'اکانت شما حذف شد');
    }

    public function view_chat()
    {
        $title = 'پیام ها';
        $id = auth()->user()->id;
        $data = Support::orderBy('id', 'DESC')->where('user_id', auth()->user()->id)->get();
        $rowCount = Support::where('user_id', '=', $id)->count();
        return view('user.view_message', compact('title', 'data', 'rowCount'));
    }

    public function Date_Store(Request $request, date_new $date_new)
    {
        //$support->user_id = auth()->user()->id;
        $msg = [
            'title.required' => 'موضوع را وارد نکرده ایید',
            'text.required' => 'متن را وارد نکرده ایید',
        ];
        $v = $request->validate([
            'title' => 'required',
            'text' => 'required',
        ], $msg);
        $date_new->title = $request->title;
        $date_new->text = $request->text;
        $date_new->status = $request->status;

        $date_new->save();
        return redirect(route('home'))->with('msg', 'مطلب شما در سایت بارگزاری شد');
    }

    public function Date_View()
    {
        $title = auth()->user()->name . 'مطالب';
        $data = date_new::orderBy('id', 'DESC')->paginate(5);
        return view('user.view_data_user', compact('title', 'data'));
    }

    public function Date_Edit(date_new $date_new)
    {
        if ($date_new->status == 0) {
            $date_new->status = 1;
        } elseif ($date_new->status == 1) {
            $date_new->status = 0;
        }
        $date_new->save();
        return redirect(route('Date_User_View'))->with('msg', 'وضعیت مطلب تغییر کرد');
    }

    public function Show_Data(date_new $date_new)
    {
        $title = ' مطلب ' . $date_new->title;
        return view('user.show_data_user', compact('title'))->with('data_user', $date_new);
    }

    public function Upload_User()
    {
        $title = ' اپلود عکس ';
        return view('user.apload', compact('title'));
    }

    public function Ajax(Request $request, ajax $ajax)
    {
        if ($request->ajax()) {
            $tmp = $request->file('file');
            $name_file = microtime(true) . $tmp->getClientOriginalName();
            $tmp->move(public_path('/Photo/'), $name_file);
            $msg = [
                'title.required' => 'موضوع را وارد نکرده ایید',
            ];
            $v = $request->validate([
                'title' => 'required',
            ], $msg);
            $new = new ajax([
                'title' => $request->title,
                'file' => $name_file
            ]);
            $new->save();
            return view('home');
        }
    }
}
