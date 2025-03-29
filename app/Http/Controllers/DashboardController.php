<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function store(Request $request)
    {
        // Process form data here
        return redirect('/dashboard')->with('success', 'Form submitted successfully!');
    }
}

