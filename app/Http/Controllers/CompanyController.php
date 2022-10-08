<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function listup(Company $company)
    {
        return view('companies/list')->with(['companies' => $company->get()]);
    }
    
    public function index(Company $company)
    {
        return view('companies/index')->with(['games' => $company->getByCompany()]);
    }
}
