<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="BillAngel helps small businesses and freelancers manage their revenues, expenditures and finances. BillAngel combines the power of accounting with the ease of using a simple Web application to enable you to organize your finances like never before!">
      <meta name="keywords" content="">
      <meta name="author" content="Bill Angel">
      <title>Bill Angel - Online Invoicing System with Attractive Features</title>
      <link rel="shortcut icon" href="img/fav-logo.svg" type="image/x-icon" />
      <link href="{{ asset('main/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
      <link href="{{ asset('main/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
      <link href="{{ asset('main/vendor/slick/slick.min.css') }}" rel="stylesheet">
      <link href="{{ asset('main/vendor/slick/slick-theme.min.css') }}" rel="stylesheet">
      <link href="{{ asset('main/css/style.css') }}" rel="stylesheet">
      <link href="{{ asset('main/vendor/font/stylesheet.css') }}" rel="stylesheet">
      <link href="{{ asset('main/vendor/animation/animate.min.css') }}" rel="stylesheet">
   </head>
   <body>
      <div class="body-color">
         <nav class="navbar navbar-expand-lg navbar-dark osahan-nav">
            <div class="container">
               <a class="navbar-brand text-dark font-weight-bold" href="index.html"><img class="logo" src="img/logo.svg" alt="logo"></a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarResponsive">
                  <ul class="navbar-nav ml-auto">
                     <li class="nav-item mx-2">
                        <a class="nav-link" href="#">Features</a>
                     </li>
                     <li class="nav-item mx-2">
                        <a class="nav-link" href="#">Pricing</a>
                     </li>
                     <li class="nav-item mx-2">
                        <a class="nav-link" href="#">Resources</a>
                     </li>
                     <li class="nav-item mx-2">
                        <a class="nav-link" href="#">Support</a>
                     </li>
                  </ul>
                  <ul class="navbar-nav ml-auto login-btn">
                     <li class="nav-item pm-2">
                        <a class="nav-link" href="{{ url('login') }}">Login</a>
                     </li>
                     <li class="nav-item active ml-1">
                        <a class="nav-link" href="{{ url('register') }}">Get Started</a>
                     </li>
                  </ul>
               </div>
            </div>
         </nav>
         <header class="pt-5">
            <div class="container h-100">
               <div class="row h-100">
                  <div class="col-md-8 mx-auto text-center header-title">
                     <div class="slideanim">
                        <h1 class="font-weight-bold mb-4">No paperwork. No accounting degree. No problem.</h1>
                        <p class="h5 text-dark">I am a cloud-based, subscription system that allows you to manage finances, business expenses and income. Perfect for freelancer and small businesses looking for an easy, cost effective way to manage their finances.</p>
                        <div class="button py-5">
                           <span class="px-2"><a href="#" class="btn btn-primary btn-lg text-decoration-none">Start free
                           trail</a></span>
                           <span class="px-2"><a href="#" class="btn btn-light btn-lg">View
                           live demo</a></span>
                        </div>
                     </div>
                     <img src="{{ asset('main/img/screen.jpeg') }}" class="img-fluid header-img slideanim">
                  </div>
               </div>
            </div>
         </header>
      </div>
      <div class="container-body mt-n5">
         <div class="container">
            <section class="py-5 border-bottom slideanim">
               <div class="row d-flex align-items-center mb-4 mt-lg-5">
                  <div class="col-1">
                     <hr class="text-muted">
                  </div>
                  <div class="col-3">
                     <p class="text-muted m-0"><em>Features</em></p>
                  </div>
               </div>
               <div class="row d-flex align-items-center mb-5">
                  <div class="col-md-6 pr-lg-5">
                     <h1>Our Solution <br>for your business</h1>
                  </div>
                  <div class="col-md-6 pl-lg-5">
                     <p class="m-0">We are self-service data analytics software that lets you create visually appealing data
                        visualization and insightful dashboards in minutes.
                     </p>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6 d-flex align-items-center mb-4">
                     <i class="icofont-copy-invert features-icofont-skin rounded-pill mr-4"></i>
                     <span>
                        <h6 class="mb-0 font-weight-bold text-dark">Easy Invoicing</h6>
                        <p class="mb-2">Create reports with an easy to use drag and drop desginer.</p>
                        <p class="mb-0 learn-more"><a href="#" class="text-decoration-none">Learn More <i class="icofont-rounded-right"></i></a></p>
                     </span>
                  </div>
                  <div class="col-md-6 d-flex align-items-center mb-4">
                     <i class="icofont-data features-icofont-skin rounded-pill mr-4"></i>
                     <span href="#" class="text-decoration-none">
                        <h6 class="mb-0 font-weight-bold text-dark">Organize Expenses Effortlessly</h6>
                        <p class="mb-2">Share/publish your reports with your colleagues.</p>
                        <p class="mb-0 learn-more"><a href="#" class="text-decoration-none">Learn More <i class="icofont-rounded-right"></i></a></p>
                     </span>
                  </div>
               </div>
               <div class="row mt-lg-3">
                  <div class="col-md-6 d-flex align-items-center mb-4">
                     <i class="icofont-credit-card features-icofont-blue rounded-pill mr-4"></i>
                     <span href="#" class="text-decoration-none">
                        <h6 class="mb-0 font-weight-bold text-dark">Online payment integrations</h6>
                        <p class="mb-2">Get a powerful analytics tool in your own brand name.</p>
                        <p class="mb-0 learn-more"><a href="#" class="text-decoration-none">Learn More <i class="icofont-rounded-right"></i></a></p>
                     </span>
                  </div>
                  <div class="col-md-6 d-flex align-items-center mb-4">
                     <i class="icofont-bars features-icofont-blue rounded-pill mr-4"></i>
                     <span href="#" class="text-decoration-none">
                        <h6 class="mb-0 font-weight-bold text-dark">Easy and Intuitive Double-Entry Accounting</h6>
                        <p class="mb-2">Easly converse with your data using everyday language.</p>
                        <p class="mb-0 learn-more"><a href="#" class="text-decoration-none">Learn More <i class="icofont-rounded-right"></i></a></p>
                     </span>
                  </div>
               </div>
            </section>
            <section class="py-5">
               <div class="row analytics py-5 d-flex align-items-center mb-5 slideanim">
                  <div class="col-md-6 pr-lg-5">
                     <img src="img/data.svg" class="img-fluid">
                  </div>
                  <div class="col-md-6">
                     <div class="row d-flex align-items-center mb-4">
                        <div class="col-2">
                           <hr class="text-muted">
                        </div>
                        <div class="col-3">
                           <p class="text-muted m-0"><em>Analytics</em></p>
                        </div>
                     </div>
                     <h1>Analyze your data with our analyze tools</h1>
                     <p class="mt-3">Self-service data analytics software that lets you create visually appealing data
                        visualization and insightful dashboards in minutes.
                     </p>
                     <div class="analytics-list d-flex pt-4">
                        <i class="icofont-copy-invert analytics-icofont mt-1 mr-4 h4 text-muted"></i>
                        <span>
                           <p class="mb-1 font-weight-bold text-dark h6">Powerfull dashboard</p>
                           <p class="mb-0">Continue multiple reports into a single beautiful dashboard.</p>
                        </span>
                     </div>
                     <div class="analytics-list d-flex pt-4">
                        <i class="icofont-refresh analytics-icofont mt-1 mr-4 h4 text-muted"></i>
                        <span>
                           <p class="mb-1 font-weight-bold text-dark h6">Always in Sync</p>
                           <p class="mb-0">Dont't worry about the data, always be synchronized</p>
                        </span>
                     </div>
                  </div>
               </div>
               <div class="features py-5 slideanim">
                  <div class="row">
                     <div class="title-features mb-5 col-md-8">
                        <div class="row d-flex align-items-center mb-4">
                           <div class="col-2">
                              <hr class="text-muted">
                           </div>
                           <div class="col-3">
                              <p class="text-muted m-0"><em>More features</em></p>
                           </div>
                        </div>
                        <h1>We are more than an analytic tool. Explore our features, and satisfy your customers.</h1>
                     </div>
                  </div>
                  <div class="row mb-4">
                     <div class="col-md-4">
                        <p><i class="icofont-settings-alt analytics-icofont-blue rounded-pill mr-3"></i></p>
                        <p class="font-weight-bold text-dark h6">Easy customization</p>
                        <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                     </div>
                     <div class="col-md-4">
                        <p><i class="icofont-safety analytics-icofont-blue rounded-pill mr-3"></i></p>
                        <p class="font-weight-bold text-dark h6">Secure and fast</p>
                        <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                     </div>
                     <div class="col-md-4">
                        <p><i class="icofont-compass analytics-icofont-blue rounded-pill mr-3"></i></p>
                        <p class="font-weight-bold text-dark h6">Powerful dashboard</p>
                        <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                     </div>
                  </div>
                  <div class="row mb-4">
                     <div class="col-md-4">
                        <p><i class="icofont-cloud-upload analytics-icofont-skin rounded-pill mr-3"></i></p>
                        <p class="font-weight-bold text-dark h6">Cloud upload</p>
                        <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                     </div>
                     <div class="col-md-4">
                        <p><i class="icofont-bulb-alt analytics-icofont-skin rounded-pill mr-3"></i></p>
                        <p class="font-weight-bold text-dark h6">Proven technology</p>
                        <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                     </div>
                     <div class="col-md-4">
                        <p><i class="icofont-like analytics-icofont-skin rounded-pill mr-3"></i></p>
                        <p class="font-weight-bold text-dark h6">98.99% satisfaction</p>
                        <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                     </div>
                  </div>
               </div>
               <div class="row collaborate py-5 d-flex align-items-center slideanim">
                  <div class="col-md-6 pr-lg-5">
                     <img src="img/collaborate.svg" class="img-fluid">
                  </div>
                  <div class="col-md-6">
                     <div class="row d-flex align-items-center mb-4">
                        <div class="col-2">
                           <hr class="text-muted">
                        </div>
                        <div class="col-3">
                           <p class="text-muted m-0"><em>Collaborate</em></p>
                        </div>
                     </div>
                     <h1>Collaborate with your team anytime, anywhere</h1>
                     <p class="mt-3">Self-service data analytics software that lets you create visually appealing data
                        visualization and insightful dashboards in minutes.
                     </p>
                     <div class="row pt-4">
                        <div class="col-md-6">
                           <p><i class="icofont-check-circled text-success mr-4"></i><span class="font-weight-bold">Organize your
                              data</span>
                           </p>
                           <p><i class="icofont-check-circled text-success mr-4"></i><span class="font-weight-bold">Work with any
                              team</span>
                           </p>
                           <p><i class="icofont-check-circled text-success mr-4"></i><span class="font-weight-bold">Business
                              analytics</span>
                           </p>
                        </div>
                        <div class="col-md-6">
                           <p><i class="icofont-check-circled text-success mr-4"></i><span class="font-weight-bold">Always in
                              sync</span>
                           </p>
                           <p><i class="icofont-check-circled text-success mr-4"></i><span class="font-weight-bold">Embedded
                              analytics</span>
                           </p>
                           <p><i class="icofont-check-circled text-success mr-4"></i><span class="font-weight-bold">Work with any
                              team</span>
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
         </div>
      </div>
      <footer class="bg-light slideanim py-5">
         <div class="container">
            <div class="row">
               <div class="col-md-4">
                  <a class="navbar-brand text-dark font-weight-bold" href="index.html"><img class="footer-logo" src="img/fav-logo.svg" alt="logo"></a>
                  <div class="social-icons mt-lg-5">
                     <a href="#" class="text-white text-decoration-none"><i class="icofont-twitter p-1 rounded-pill mr-2"></i></a>
                     <a href="#" class="text-white text-decoration-none"><i class="icofont-facebook p-1 rounded-pill mr-2"></i></a>
                     <a href="#" class="text-white text-decoration-none"><i class="icofont-linkedin p-1 rounded-pill mr-2"></i></a>
                  </div>
               </div>
               <div class="col-md-2">
                  <p class="font-weight-bold">Product</p>
                  <ul class="list-unstyled m-0">
                     <li><a href="#" class="text-decoration-none text-dark">Landingpage</a></li>
                     <li><a href="#" class="text-decoration-none text-dark">Features</a></li>
                     <li><a href="#" class="text-decoration-none text-dark">Documentation</a></li>
                     <li><a href="#" class="text-decoration-none text-dark">Referral Program</a></li>
                     <li><a href="#" class="text-decoration-none text-dark">Pricing</a></li>
                  </ul>
               </div>
               <div class="col-md-2">
                  <p class="font-weight-bold">Servies</p>
                  <ul class="list-unstyled m-0">
                     <li><a href="#" class="text-decoration-none text-dark">Documentation</a></li>
                     <li><a href="#" class="text-decoration-none text-dark">Design</a></li>
                     <li><a href="#" class="text-decoration-none text-dark">Themes</a></li>
                     <li><a href="#" class="text-decoration-none text-dark">Illustrations</a></li>
                     <li><a href="#" class="text-decoration-none text-dark">UI kit</a></li>
                  </ul>
               </div>
               <div class="col-md-2">
                  <p class="font-weight-bold">Company</p>
                  <ul class="list-unstyled m-0">
                     <li><a href="#" class="text-decoration-none text-dark">About</a></li>
                     <li><a href="#" class="text-decoration-none text-dark">Terms</a></li>
                     <li><a href="#" class="text-decoration-none text-dark">Privacy Policy</a></li>
                     <li><a href="#" class="text-decoration-none text-dark">Carrers</a></li>
                  </ul>
               </div>
               <div class="col-md-2">
                  <p class="font-weight-bold">More</p>
                  <ul class="list-unstyled m-0">
                     <li><a href="#" class="text-decoration-none text-dark">Documentation</a></li>
                     <li><a href="#" class="text-decoration-none text-dark">License</a></li>
                     <li><a href="#" class="text-decoration-none text-dark">Changeing</a></li>
                  </ul>
               </div>
            </div>
         </div>
      </footer>
      <div class="py-4 osahan-copyright">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <p class="text-dark m-0">© 2020 Landeng. All Right Reseved.</p>
               </div>
               <div class="col-md-6">
                  <p class="m-0 text-right">Made with ♥️ by <a target="blank" href="https://askbootstrap.com/">Askbootstrap.</a></p>
               </div>
            </div>
         </div>
      </div>
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow rounded">
               <div class="modal-body p-lg-5">
                  <div class="box-signup">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                     <div class="cotainer">
                        <div class="links-account">
                           <ul class="nav nav-pills" id="pills-tab" role="tablist">
                              <li class="nav-item">
                                 <a class="nav-link" id="pills-login-tab" data-toggle="pill" href="#pills-login" role="tab" aria-controls="pills-login" aria-selected="true">Sign in</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link active" id="pills-create-tab" data-toggle="pill" href="#pills-create" role="tab" aria-controls="pills-create" aria-selected="false">Get Started Free</a>
                              </li>
                           </ul>
                        </div>
                        <div class="title">
                           Sign up to Landeng.
                        </div>
                        <div class="other_login">
                           <button type="button" class="btn scale btn-loin-google">
                           <i class="icofont-google-plus"></i>
                           Sign up with Google
                           </button>
                           <button type="button" class="btn scale btn_twitter">
                           <i class="icofont-twitter"></i>
                           </button>
                           <div class="line-or">
                              <span class="or">or</span>
                           </div>
                        </div>
                        <div class="tab-content" id="pills-tabContent">
                           <div class="tab-pane fade" id="pills-login" role="tabpanel" aria-labelledby="pills-login-tab">
                              <div class="form-row">
                                 <div class="col-12">
                                    <div class="row">
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <label>Email / Username</label>
                                             <input type="email" class="form-control" placeholder="E-mail / Username" />
                                          </div>
                                       </div>
                                       <div class="col-md-12">
                                          <div class="form-group --password" id="show_hide_password">
                                             <label>Password</label>
                                             <input type="password" class="form-control" data-toggle="password" placeholder="+6 Characters" required="" />
                                          </div>
                                       </div>
                                       <div class="col-12 terms">
                                          <p>
                                             By clicking on the Sign Up button, you agree to Landeng.
                                             <a href="#">terms and conditions of use.</a>
                                          </p>
                                       </div>
                                       <div class="col-12 mt-3">
                                          <a href="#" class="btn btn-primary btn-lg btn-block">Sign in</a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="tab-pane fade show active" id="pills-create" role="tabpanel" aria-labelledby="pills-create-tab">
                              <div class="form-row">
                                 <div class="col-12">
                                    <div class="row">
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label>Full name</label>
                                             <input type="text" class="form-control" placeholder="Full Name" />
                                          </div>
                                       </div>
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label>Username</label>
                                             <input type="text" class="form-control" placeholder="Username" />
                                          </div>
                                       </div>
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <label>Email address</label>
                                             <input type="email" class="form-control" placeholder="Email Address" />
                                          </div>
                                       </div>
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <label>Password</label>
                                             <input type="password" class="form-control" data-toggle="password" placeholder="+6 Characters" required="" />
                                          </div>
                                       </div>
                                       <div class="col-12 terms">
                                          <p>
                                             By clicking on the Sign Up button, you agree to Landeng.
                                             <a href="#">terms and conditions of use.</a>
                                          </p>
                                       </div>
                                       <div class="col-12 mt-3">
                                          <a href="#" class="btn btn-primary btn-lg btn-block">Try it Free</a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script type="4d954a710c497242433396a4-text/javascript" src="{{ asset('main/vendor/jquery/jquery.min.js') }}"></script>
      <script type="4d954a710c497242433396a4-text/javascript" src="{{ asset('main/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
      <script type="4d954a710c497242433396a4-text/javascript" src="{{ asset('main/vendor/slick/slick.min.js') }}"></script>
      <script type="4d954a710c497242433396a4-text/javascript" src="{{ asset('main/vendor/animations/float-panel.js') }}"></script>
      <script type="4d954a710c497242433396a4-text/javascript" src="{{ asset('main/js/osahan.js') }}"></script>
      <script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="4d954a710c497242433396a4-|49" defer=""></script><script defer src="https://static.cloudflareinsights.com/beacon.min.js" data-cf-beacon='{"rayId":"67507b37bdaafa58","version":"2021.7.0","r":1,"token":"dd471ab1978346bbb991feaa79e6ce5c","si":10}'></script>
   </body>
 </html>