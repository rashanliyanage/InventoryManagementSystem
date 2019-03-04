<?php
/**
 * Created by PhpStorm.
 * User: Samith
 * Date: 2/2/2019
 * Time: 12:14 PM
 */

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth_admin',]);
    }

    public  function index(){
        return view('admin.dashboard');
    }

}