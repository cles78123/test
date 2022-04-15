<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\DB;


class AdminLTEController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        //搜尋所有會員顯示
        $users = User::all();
        return view('/index',compact('users'));
    }

    public function insert(Request $data)
    {   
        if(isset($data->name))
        {
            //資料驗證是否重複
            $validator = Validator::make($data->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'username' =>  'required|unique:users',
                'password' => 'required|string|min:6|confirmed',
            ]);
            //錯誤傳回
            if ($validator->fails()) {
                return redirect('/insert')
                            ->withErrors($validator)
                            ->withInput();
            }else{
                //創一個新的
                User::create([
                    'name' => $data->input('name'),
                    'username' => $data->input('username'),
                    'email' => $data->input('email'),
                    'password' => bcrypt($data->input('password'))
                ]);
                return redirect('/');;
            }    
        }else{
            return view('/auth/insert');
        } 
    }

    public function edit($user_id)
    {
        //取要修改的會員編號
        $user = User::find($user_id);
        return view('/auth/edit',compact('user'));
    }

    public function update(Request $data)
    {  
        //驗證是否有重複(本身除外)
        $validator = Validator::make($data->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,'.'email,'.$data->input('id'),
            'username' =>  'required|unique:users,'.'username,'.$data->input('id'),
            'password' => 'required|string|min:6',
        ]);
        if ($validator->fails()) {
            //錯誤傳回
            return redirect('/edit/'.$data->input('id'))
                        ->withErrors($validator)
                        ->withInput();
        }else{
            //更新
            User::where('id', $data->input('id'))
            ->update([
                'name' => $data->input('name'),
                'username' => $data->input('username'),
                'email' => $data->input('email'),
                'password' => bcrypt($data->input('password'))
            ]);
            return redirect('/');;
        }     
    }

    public function delete($user_id)
    {   
        //路徑確認
        if(url()->previous() == 'http://127.0.0.1:8000/' or url()->previous() == 'http://127.0.0.1:8000/search'){
            User::destroy($user_id);
            return redirect('/');
        }else{
            return redirect('/');
        };
    }

    public function search(Request $user_username)
    {   
        //搜尋
        $users_search = User::where('username',$user_username->username)->get();
        return view('/search',compact('users_search')); 
    }
}
