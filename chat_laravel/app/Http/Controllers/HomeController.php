<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
     * @SWG\Get(
     *   path="/home",
     *   summary="用户资料",
     *   @SWG\Response(response=200, description="请求成功"),
     *   @SWG\Response(response=401, description="用户验证失败"),
     *   @SWG\Response(response=500, description="服务器错误")
     * )
     *
     */
class HomeController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
