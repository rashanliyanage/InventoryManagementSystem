<?php
/**
 * Created by PhpStorm.
 * User: Samith
 * Date: 2/4/2019
 * Time: 8:03 AM
 */

namespace App\Http\Controllers;


class summeryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth_admin',]);
    }

    public function index(){


        return view('admin.summery.advance_search');
    }

}