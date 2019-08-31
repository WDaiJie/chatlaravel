<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    public function show()
    {
        echo date('Y-m-d H:i:s', time());
    }
    public function hello()
    {
        echo "hello";
    }
}