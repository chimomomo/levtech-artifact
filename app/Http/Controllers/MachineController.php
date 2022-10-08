<?php

namespace App\Http\Controllers;

use App\Machine;
use Illuminate\Http\Request;

class MachineController extends Controller
{
     public function listup(Machine $machine)
    {
        return view('machines/list')->with(['machines' => $machine->get()]);
    }
    
    public function index(Machine $machine)
    {
        return view('machines/index')->with(['games' => $machine->getByMachine()]);
    }
}
