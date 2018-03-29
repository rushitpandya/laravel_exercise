<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>Pixel Admin - Responsive Admin Dashboard Template built with Twitter Bootstrap</title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="../plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="../plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="css/colors/blue-dark.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="fa fa-bars"></i></a>
                <div class="top-left-part"><a class="logo" href="/"><b></b></a></div>
                <ul class="nav navbar-top-links navbar-left m-l-20 hidden-xs">
                   <!-- <li>
                        <form role="search" class="app-search hidden-xs">
                            <input type="text" placeholder="Search..." class="form-control"> <a href=""><i class="fa fa-search"></i></a>
                        </form>
                    </li>-->
                </ul>
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                        <a class="profile-pic" href=""> <img src="../plugins/images/user.png" alt="user-img" width="36" class="img-circle"><b class="hidden-xs">{{ Auth::user()->name }}</b> </a>
                    </li>
					
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- Left navbar-header -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                <ul class="nav" id="side-menu">
                    <li style="padding: 10px 0 0;">
                        <a href="/" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i><span class="hide-menu">Dashboard</span></a>
                    </li>
                    
                </ul>
                <div class="center p-20">
                    <span class="hide-menu"><a href="{{ url('/logout') }}" target="_blank" class="btn btn-danger btn-block btn-rounded waves-effect waves-light">Sign Out</a></span>
                </div>
            </div>
        </div>
        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title"><i class="fa fa-btc"></i> {{$bitcoin["name"]}}/{{$bitcoin["symbol"]}} </h4> </div>
					<form  role="form" method="get" action="/changecurrency">
					{{ csrf_field() }}
					<div class="col-lg-8 col-sm-4 col-md-4 col-xs-12">
						<select name="currency" class="form-control pull-right row " style="margin-right:20px;color:black;background-color:white;border:1px black solid;width:50%;">
                                        @if($currency == "USD")
										<option value="USD" selected>USD</option>
										<option value="EUR">EUR</option>
										<option value="AUD">AUD</option>
										@endif
										@if($currency == "AUD")
										<option value="USD">USD</option>
										<option value="EUR">EUR</option>
										<option value="AUD" selected>AUD</option>
										@endif
										@if($currency == "EUR")
										<option value="USD">USD</option>
										<option value="EUR" selected>EUR</option>
										<option value="AUD">AUD</option>
										@endif
                        </select>
					</div>	
					
                    <div class="col-lg-1 col-sm-4 col-md-4 col-xs-12"> 
					<a target="_blank" onclick="document.forms[0].submit();return false;" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light submit">
					Change Currency
					</a>
					</form>
                        <!--<ol class="breadcumb">
                            <li>
							
							
                                    <select class="form-control  row b-none" style="color:black;background-color:white;">
                                        <option>March 2016</option>
                                        <option>April 2016</option>
                                        <option>May 2016</option>
                                        <option>June 2016</option>
                                        <option>July 2016</option>
                                    </select>
                            
							
							</li>
                        </ol>-->
						
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- row -->
					
                <div class="row">
                    <!--col -->
					
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <div class="col-in row">
                                <div class="col-md-5 col-sm-5 col-xs-5"> <i data-icon="E" class="linea-icon linea-basic"></i>
                                    <h4 class="text-muted vb">Current Price ({{$currency}}) </h4> </div>
                                <div class="col-md-7 col-sm-7 col-xs-7">
                                    @if($currency == "USD")
									<h3 class="text-right m-t-15 text-danger" style="color:#909090;"><i class="fa fa-usd"></i> {{$bitcoin["price_usd"]}}</h3> 
									@endif
									@if($currency == "EUR")
									<h3 class="text-right m-t-15 text-danger" style="color:#909090;"><i class="fa fa-eur"></i> {{$bitcoin["price_eur"]}}</h3> 
									@endif
									@if($currency == "AUD")
									<h3 class="text-right m-t-15 text-danger" style="color:#909090;"><i class="fa fa-money"></i> {{$bitcoin["price_aud"]}}</h3>
									@endif
									</div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    @if($bitcoin["percent_change_24h"] > 0)
										<h4 class="text-right m-t-15 text-danger" style="color:green">
											
											<i class="fa fa-chevron-up"></i> {{$bitcoin["percent_change_24h"]}} %
										</h4>	
									@else
										<h4 class="text-right m-t-15 text-danger" style="color:#c95e22">
									
											<i class="fa fa-chevron-down"></i> {{$bitcoin["percent_change_24h"]}} %
										</h4>		
									@endif	
                                 
								
                                </div>
                            </div>
                        </div>
                    </div>
			
					
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <div class="col-in row">
                                <div class="col-md-7 col-sm-7 col-xs-7"> <i data-icon="E" class="linea-icon linea-basic"></i>
                                    <h4 class="text-muted vb">Percent Change Since Last Login </h4> </div>
                                <div class="col-md-5 col-sm-5 col-xs-5">
									@if((($bitcoin["price_usd"] - Auth::user()->name)/100) > 0)
                                    <h3 class="text-right m-t-15 text-danger" style="color:green;"><i class="fa fa-chevron-up"></i>{{($bitcoin["price_usd"] - Auth::user()->name)/100}}%</h3> 
									@else
									<h3 class="text-right m-t-15 text-danger" style="color:#c95e22"><i class="fa fa-chevron-down"></i>{{($bitcoin["price_usd"] - Auth::user()->name)/100}}%</h3>
									@endif
								</div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                   
									@if(($bitcoin["price_usd"] - Auth::user()->name) > 0)
										 <h4 class="text-right m-t-15 text-danger" style="color:green">
											<i class="fa fa-chevron-up"></i> {{$bitcoin["price_usd"] - Auth::user()->name}} 
									@else
										 <h4 class="text-right m-t-15 text-danger" style="color:#c95e22">
											<i class="fa fa-chevron-down"></i> {{$bitcoin["price_usd"] - Auth::user()->name}} 
									@endif	
                                    </h4>
								
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
				
				
				<div class="row">
                    <!--col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <div class="col-in row">
                                <div class="col-md-7 col-sm-7 col-xs-7"> <i data-icon="E" class="linea-icon linea-basic"></i>
                                    <h4 class="text-muted vb">Percent Change Over 1 Hour </h4> </div>
                                <div class="col-md-5 col-sm-5 col-xs-5">
                                    @if($bitcoin["percent_change_1h"] > 0)
									<h4 class="text-right m-t-15 text-danger" style="color:green">
											<i class="fa fa-chevron-up"></i> {{$bitcoin["percent_change_1h"]}} %
									</h4>		
									@else
										<h4 class="text-right m-t-15 text-danger" style="color:#c95e22">
											<i class="fa fa-chevron-down"></i> {{$bitcoin["percent_change_1h"]}} %
										</h4>
											
									@endif	
									
									 </div>
                                <!--<div class="col-md-12 col-sm-12 col-xs-12">
                                    <h4 class="text-right m-t-15 text-danger">
									@if($bitcoin["percent_change_1h"] > 0)
											<i class="fa fa-chevron-up"></i> {{$bitcoin["percent_change_24h"]}} %
									@else
											<i class="fa fa-chevron-down"></i> {{$bitcoin["percent_change_24h"]}} %	
									@endif	
                                    </h4>
								
                                </div>-->
                            </div>
                        </div>
                    </div>
			
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <div class="col-in row">
                                <div class="col-md-7 col-sm-7 col-xs-7"> <i data-icon="E" class="linea-icon linea-basic"></i>
                                    <h4 class="text-muted vb">Percent Change Over 1 Day </h4> </div>
                                <div class="col-md-5 col-sm-5 col-xs-5">
                                    
									@if($bitcoin["percent_change_24h"] > 0)
									<h4 class="text-right m-t-15 text-danger" style="color:green">
											<i class="fa fa-chevron-up"></i> {{$bitcoin["percent_change_24h"]}} %
									</h4>		
									@else
										<h4 class="text-right m-t-15 text-danger" style="color:#c95e22">
											<i class="fa fa-chevron-down"></i> {{$bitcoin["percent_change_24h"]}} %
										</h4>
											
									@endif	
									
									 </div>
                                <!--<div class="col-md-12 col-sm-12 col-xs-12">
                                    <h4 class="text-right m-t-15 text-danger">
									@if($bitcoin["percent_change_1h"] > 0)
											<i class="fa fa-chevron-up"></i> {{$bitcoin["percent_change_24h"]}} %
									@else
											<i class="fa fa-chevron-down"></i> {{$bitcoin["percent_change_24h"]}} %	
									@endif	
                                    </h4>
								
                                </div>-->
                            </div>
                        </div>
                    </div>
					
					
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <div class="col-in row">
                                <div class="col-md-7 col-sm-7 col-xs-7"> <i data-icon="E" class="linea-icon linea-basic"></i>
                                    <h4 class="text-muted vb">Percent Change Over 7 Days</h4> </div>
                                <div class="col-md-5 col-sm-5 col-xs-5">
                                    
									@if($bitcoin["percent_change_7d"] > 0)
									<h4 class="text-right m-t-15 text-danger" style="color:green">
											<i class="fa fa-chevron-up"></i> {{$bitcoin["percent_change_7d"]}} %
									</h4>		
									@else
										<h4 class="text-right m-t-15 text-danger" style="color:#c95e22">
											<i class="fa fa-chevron-down"></i> {{$bitcoin["percent_change_7d"]}} %
										</h4>
											
									@endif		
									
									 </div>
                                <!--<div class="col-md-12 col-sm-12 col-xs-12">
                                    <h4 class="text-right m-t-15 text-danger">
									@if($bitcoin["percent_change_1h"] > 0)
											<i class="fa fa-chevron-up"></i> {{$bitcoin["percent_change_24h"]}} %
									@else
											<i class="fa fa-chevron-down"></i> {{$bitcoin["percent_change_24h"]}} %	
									@endif	
                                    </h4>
								
                                </div>-->
                            </div>
                        </div>
                    </div>
					
					
                </div>
				
				
				
				
				
                <!-- /.row -->
                <!--row 
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title">Sales Difference</h3>
                            <ul class="list-inline text-right">
                                <li>
                                    <h5><i class="fa fa-circle m-r-5" style="color: #dadada;"></i>Site A View</h5>
                                </li>
                                <li>
                                    <h5><i class="fa fa-circle m-r-5" style="color: #aec9cb;"></i>Site B View</h5>
                                </li>
                            </ul>
                            <div id="morris-area-chart2" style="height: 370px;"></div>
                        </div>
                    </div>
                </div>-->
				
				
                <!--row -->
               <!-- <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Recent sales
                                <div class="col-md-2 col-sm-4 col-xs-12 pull-right">
                                    <select class="form-control pull-right row b-none">
                                        <option>March 2016</option>
                                        <option>April 2016</option>
                                        <option>May 2016</option>
                                        <option>June 2016</option>
                                        <option>July 2016</option>
                                    </select>
                                </div>
                            </h3>
                            <div class="table-responsive">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th>NAME</th>
                                            <th>STATUS</th>
                                            <th>DATE</th>
                                            <th>PRICE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="txt-oflo">Pixel admin</td>
                                            <td>SALE</td>
                                            <td class="txt-oflo">April 18</td>
                                            <td><span class="text-success">$24</span></td>
                                        </tr>
                                        <tr>
                                            <td class="txt-oflo">Real Homes</td>
                                            <td>EXTENDED</td>
                                            <td class="txt-oflo">April 19</td>
                                            <td><span class="text-info">$1250</span></td>
                                        </tr>
                                        <tr>
                                            <td class="txt-oflo">Medical Pro</td>
                                            <td>TAX</td>
                                            <td class="txt-oflo">April 20</td>
                                            <td><span class="text-danger">-$24</span></td>
                                        </tr>
                                        <tr>
                                            <td class="txt-oflo">Hosting press</td>
                                            <td>SALE</td>
                                            <td class="txt-oflo">April 21</td>
                                            <td><span class="text-success">$24</span></td>
                                        </tr>
                                        <tr>
                                            <td class="txt-oflo">Helping Hands</td>
                                            <td>MEMBER</td>
                                            <td class="txt-oflo">April 22</td>
                                            <td><span class="text-success">$24</span></td>
                                        </tr>
                                        <tr>
                                            <td class="txt-oflo">Digital Agency</td>
                                            <td>SALE</td>
                                            <td class="txt-oflo">April 23</td>
                                            <td><span class="text-danger">-$14</span></td>
                                        </tr>
                                        <tr>
                                            <td class="txt-oflo">Helping Hands</td>
                                            <td>MEMBER</td>
                                            <td class="txt-oflo">April 22</td>
                                            <td><span class="text-success">$64</span></td>
                                        </tr>
                                    </tbody>
                                </table> <a href="#">Check all the sales</a> </div>
                        </div>
                    </div>
                </div>-->
                <!-- /.row -->
                <!-- row 
                <div class="row">
                    <div class="col-md-12 col-lg-6 col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Recent Comments</h3>
                            <div class="comment-center">
                                <div class="comment-body">
                                    <div class="user-img"> <img src="../plugins/images/users/pawandeep.jpg" alt="user" class="img-circle"></div>
                                    <div class="mail-contnet">
                                        <h5>Pavan kumar</h5> <span class="mail-desc">Donec ac condimentum massa. Etiam pellentesque pretium lacus. Phasellus ultricies dictum suscipit. Aenean commodo dui pellentesque molestie feugiat.</span><a href="javacript:void(0)" class="action"><i class="ti-close text-danger"></i></a> <a href="javacript:void(0)" class="action"><i class="ti-check text-success"></i></a><span class="time pull-right">April 14, 2016</span></div>
                                </div>
                                <div class="comment-body">
                                    <div class="user-img"> <img src="../plugins/images/users/sonu.jpg" alt="user" class="img-circle"> </div>
                                    <div class="mail-contnet">
                                        <h5>Sonu Nigam</h5> <span class="mail-desc">Donec ac condimentum massa. Etiam pellentesque pretium lacus. Phasellus ultricies dictum suscipit. Aenean commodo dui pellentesque molestie feugiat.</span><a href="javacript:void(0)" class="action"><i class="ti-close text-danger"></i></a> <a href="javacript:void(0)" class="action"><i class="ti-check text-success"></i></a><span class="time pull-right">April 14, 2016</span></div>
                                </div>
                                <div class="comment-body b-none">
                                    <div class="user-img"> <img src="../plugins/images/users/arijit.jpg" alt="user" class="img-circle"> </div>
                                    <div class="mail-contnet">
                                        <h5>Arijit Sinh</h5> <span class="mail-desc">Donec ac condimentum massa. Etiam pellentesque pretium lacus. Phasellus ultricies dictum suscipit. Aenean commodo dui pellentesque molestie feugiat. </span><a href="javacript:void(0)" class="action"><i class="ti-close text-danger"></i></a> <a href="javacript:void(0)" class="action"><i class="ti-check text-success"></i></a><span class="time pull-right">April 14, 2016</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">You have 5 new messages</h3>
                            <div class="message-center">
                                <a href="#">
                                    <div class="user-img"> <img src="../plugins/images/users/pawandeep.jpg" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                                    <div class="mail-contnet">
                                        <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span> </div>
                                </a>
                                <a href="#">
                                    <div class="user-img"> <img src="../plugins/images/users/sonu.jpg" alt="user" class="img-circle"> <span class="profile-status busy pull-right"></span> </div>
                                    <div class="mail-contnet">
                                        <h5>Sonu Nigam</h5> <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span> </div>
                                </a>
                                <a href="#">
                                    <div class="user-img"> <img src="../plugins/images/users/arijit.jpg" alt="user" class="img-circle"> <span class="profile-status away pull-right"></span> </div>
                                    <div class="mail-contnet">
                                        <h5>Arijit Sinh</h5> <span class="mail-desc">I am a singer!</span> <span class="time">9:08 AM</span> </div>
                                </a>
                                <a href="#">
                                    <div class="user-img"> <img src="../plugins/images/users/genu.jpg" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                                    <div class="mail-contnet">
                                        <h5>Genelia Deshmukh</h5> <span class="mail-desc">I love to do acting and dancing</span> <span class="time">9:08 AM</span> </div>
                                </a>
                                <a href="#" class="b-none">
                                    <div class="user-img"> <img src="../plugins/images/users/pawandeep.jpg" alt="user" class="img-circle"> <span class="profile-status offline pull-right"></span> </div>
                                    <div class="mail-contnet">
                                        <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2018 &copy; Bitcoin Dashboard brought to you by Rushit Pandya </footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Counter js -->
    <script src="../plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
    <script src="../plugins/bower_components/counterup/jquery.counterup.min.js"></script>
    <!--Morris JavaScript -->
    <script src="../plugins/bower_components/raphael/raphael-min.js"></script>
    <script src="../plugins/bower_components/morrisjs/morris.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
    <script src="js/dashboard1.js"></script>
    <script src="../plugins/bower_components/toast-master/js/jquery.toast.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $.toast({
            heading: 'Welcome to Bitcoin Stats Dashboard',
            text: 'Find Stats of Bitcoin on your Dashboard.',
            position: 'bottom-right',
            loaderBg: '#ff6849',
            icon: 'info',
            hideAfter: 5000,
            stack: 6
        })
    });
    </script>
</body>

</html>
