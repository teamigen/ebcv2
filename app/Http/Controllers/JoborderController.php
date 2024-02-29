<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class JoborderController extends Controller
{
    
    public function managejoborder()
    {
        return view('managejoborder');
    }

}
