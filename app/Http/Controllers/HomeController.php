<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function HomePage(){
        return view('frontend.pages.home');
    }
    // GetServiceData
    public function GetServiceData(){
        return view('frontend.pages.service_and_pricing');
    }
       // get portfolio data
       public function GetPortfolioData(){
        return view('frontend.pages.portfolio-page');
    }
}
