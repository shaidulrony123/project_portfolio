<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function HomePage(){
        return view('frontend.pages.home');
    }
    // GetServiceData
    public function GetServicePage(){
        return view('frontend.pages.service_and_pricing');
    }
       // get portfolio data
       public function GetPortfolioPage(){
        return view('frontend.pages.portfolio-page');
    }
       // get resume data
       public function GetResumePage(){
        return view('frontend.pages.resume-page');
    }
       // get product data
       public function GetProductPage(){
        return view('frontend.pages.product-page');
    }
       // get blog data
       public function GetBlogPage(){
        return view('frontend.pages.blog-page');
    }
       // get contact data
       public function GetContactPage(){
        return view('frontend.pages.contact-page');
    }

    
}
