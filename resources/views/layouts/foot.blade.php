  
    
    <!-- Footer Area -->  
    <footer class="footer_area">  
       <div class="container"> 
            <div class="footer_inner row">   
                <div class="col-lg-4 col-md-6 footer_logo wow fadeIn">
                    <a href="#"><img src="/assets/images/logo.png" alt="" style="height:53px"></a> 
                    <p>{{settings()->welcome_message}}</p> 
          
                    <ul class="footer_social"> 
                        <li><a target="_blank" href="{{settings()->instagram_url}}"><i class="fab fa-instagram"></i>  Follow Us On Instagram </a></li>
                        <li> 
                         <!-- TrustBox widget - Micro Review Count -->
<div class="trustpilot-widget" data-locale="en-US" data-template-id="5419b6a8b0d04a076446a9ad" data-businessunit-id="6106cb5870f31e001d28bea2" data-style-height="24px" data-style-width="100%" data-theme="light">
  <a href="https://www.trustpilot.com/review/zfollowers.com" target="_blank" rel="noopener">Trustpilot</a>
</div>
<!-- End TrustBox widget -->       
                        </li>
                    </ul>
                </div>
                <div class="footer_widget fw_1 col-lg-3 col-sm-6 wow fadeIn" data-wow-delay="0.2s">
                    <h4>Usefull Links</h4>
                    <ul class="footer_nav"> 
                        <li><a href="/faq">faq</a></li> 
                        <li><a href="/blogs">Blogs</a></li>  
                        <li><a href="/terms">Terms Of Services</a></li>  
                        
                    </ul>
                </div>  
                <div class="footer_widget fw_2  col-lg-2 col-sm-6 wow fadeIn" data-wow-delay="0.4s">
                    <h4>Categories</h4> 
                    <ul class="footer_nav">   
                        @foreach (parents_with_cats() as $cat)
                        <li><a href="/services/{{$cat->slug}}">{{$cat->name}}</a></li>  
                        @endforeach
                        
                        
                    </ul> 
                </div>   
                <div class="footer_widget fw_3 col-lg-3 col-sm-6  wow fadeIn" data-wow-delay="0.6s">
                    <h4>Contact us</h4> 
                    <address>
                     
                        <a href="#" class="email"><span class="__cf_email__" > {{settings()->email}}</span></a>
                        
                    </address>
                    <div class="payments"> <img height="60" src="/assets/images/payment.png"> </div>
                </div>    
            </div>  
            <p class="copy_right">Copyrights 2021 <a href="#">{{settings()->site_name}}</a></p>
            <div class="footer_style"></div>
       </div>
    </footer>
    <!-- End Footer Area --> 