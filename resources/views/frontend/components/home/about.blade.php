<?php use App\Models\Sidebar;
    $homeSidebar= Sidebar::first();
?>  
<section class="intro text-center my-5">
    <div class="container">
   
     <div class="row">
         <div class="col-lg-7 order-2 order-lg-1 order-md-1">
             <div class="wow fadeInLeft banner-left-text">
                 <h1>HI, I'M </h1>
                 <h2>{{ $homeSidebar->name }}</h2>
             <h3>{{ $homeSidebar->slug }}</h3>
             <p class="mt-1">{{ $homeSidebar->description }}</p>
             <div class="banner-btn d-flex gap-3 mt-3">
             <button class="main-btn">
                 View Portfolio
                 <div class="arrow-wrapper">
                     <div class="arrow"></div>
             
                 </div>
             </button>
             
             <button class="main-btn">
                 View Resume
                 <div class="arrow-wrapper">
                     <div class="arrow"></div>
             
                 </div>
             </button>
            </div>
            <!-- counter -->
             <div class="count-section">
                 <div class="row">
                     <!-- Years of Experience -->
                     <div class="col-12 col-md-4">
                       <div class="counter" data-count="5">0</div>
                       <div class="label">Years of Experience</div>
                     </div>
                 
                     <!-- Projects Completed -->
                     <div class="col-12 col-md-4">
                       <div class="counter" data-count="110">0</div>
                       <div class="label">Projects Completed</div>
                     </div>
                 
                     <!-- Clients Worldwide -->
                     <div class="col-12 col-md-4">
                       <div class="counter" data-count="6000">0</div>
                       <div class="label">Clients Worldwide</div>
                     </div>
                   </div>
             </div>
            <!-- counter -->
         
             </div>
         </div>
         <div class="col-lg-5 order-1 order-lg-2 order-md-2">
           <div id="banner-img" class="wow fadeInRight rotating-bg">
               <div class="background-rotating"></div>
               <img src="{{ $homeSidebar->image }}" alt="Your Photo" class="img-fluid mt-4">
           </div>
       </div>
       
       
     </div>
    </div>
 </section>