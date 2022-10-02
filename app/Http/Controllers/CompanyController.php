<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function listup()
    {
        return view('companies/list');  
    }
    
    public function index()
    {
        return view('companies/index');  
    }
}
