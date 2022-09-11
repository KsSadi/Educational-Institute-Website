@section('page-title')
    {{ $global->full_name }} || Home
@endsection


@extends('frontend.theme1.layouts.main')

@section('frontend-section')

    <div class="container">
        <div class="main_top_area">
        <div class="slider_notice">
            <div class="row">
                <div class="col-md-2">
                    <div class="left_some_menu">
                        <div class="single_left_me">
                            <a href="">
                                <i class="fa fa-users"></i>
                                <h4>গভর্নিং বডি</h4>
                            </a>
                        </div>

                        <div class="single_left_me">
                            <a href="">
                                <i class="fa fa-calendar"></i>
                                <h4>একাডেমিক ক্যালেন্ডার </h4>
                            </a>
                        </div>

                        <div class="single_left_me">
                            <a href="">
                                <i class="fa fa-history"></i>
                                <h4>প্রতিষ্ঠানের ইতিহাস</h4>
                            </a>
                        </div>

                        <div class="single_left_me">
                            <a href="">
                                <i class="fa fa-info-circle"></i>
                                <h4>সংক্ষিপ্ত বিবরণী</h4>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="slider">
                        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                            <div class="carousel-inner">
                                @foreach($sliders as $slider)
                                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                        <img src="{{ asset('storage/'.$slider->slider) }}" class="d-block w-100" alt="...">
                                    </div>
                                @endforeach

                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div id="carouselExampleFade" class="carousel slide carousel-fade card_slider" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="card_custome">
                                    <img src="/storage/{{$speech->head_teacher_image }}" class="card-img-top" alt="...">
                                    <div class="custome_card_body">
                                        <a href="">
                                            <h5 class="custome_card_title">অধ্যক্ষ মহোদয় এর বাণী</h5>
                                            <p class="custome_card_text">{{$speech->head_teacher_name}} <br>
                                                {{$speech->head_teacher_designation}}<br>
                                                {{$global->full_name}} <br>
                                                {{$global->address}}
                                            </p>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="carousel-item">
                                <div class="card_custome">
                                    <img src="/storage/{{$speech->president_image }}" class="card-img-top" alt="...">
                                    <div class="custome_card_body">
                                        <a href="">
                                            <h5 class="custome_card_title">সভাপতি মহোদয় এর বাণী</h5>
                                            <p class="custome_card_text">
                                                {{$speech->president_name}} <br>
                                                {{$speech->president_designation}}, গভর্নিং বডি <br>
                                                {{$global->full_name}} <br>
                                                {{$global->address}}
                                            </p>
                                        </a>
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


    <section class="border_hr">
        <div class="container">
            <div class="notice_public_exam">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="default_heading">Notice Board & Results Corner</h1>
                    </div>



                    <div class="col-md-6">
                        <div class="notice_board">
                            <div class="notice_title">
                                <h3>Notice Board</h3>
                            </div>
                            <div class="notice_body">



                                <ul class="list-group">
@foreach($notices as $notice)
                                    <a href="#">
                                        <li class="list-group-item">
                                            <div class="date_formate">
                                                <div class="month_show">
                                                    {{date('M',strtotime($notice->date))}}                                                    </div>
                                                <div class="date_show">
                                                    {{date('d',strtotime($notice->date))}}   </span>
                                                </div>
                                            </div>
                                            <div class="notice_title_des">
                                                <a href="content-control/noticeFile/1597123142_Academy Transcritp.pdf">{{$notice->title}} </a>
                                            </div>
                                        </li>
                                    </a>
                                    @endforeach

                                </ul>

                                        <ul class="list-group">


                                            <center><a href="#" class="btn btn-primary btn_br_custome">Read More</a></center>
                                        </ul>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="notice_board">
                            <div class="notice_title">
                                <h3>Exam Results Corner</h3>
                            </div>
                            <div class="notice_body">
                                <ul class="list-group">
                                    <a href="#">
                                        <li class="list-group-item">
                                            PEC
                                        </li>
                                    </a>
                                    <a href="#">
                                        <li class="list-group-item">
                                            JSC
                                        </li>
                                    </a>
                                    <a href="#">
                                        <li class="list-group-item">
                                            S.S.C
                                        </li>
                                    </a>
                                    <a href="#">
                                        <li class="list-group-item">
                                            H.S.C
                                        </li>
                                    </a>
                                    <a href="#">
                                        <li class="list-group-item">
                                            Internal Exam Result
                                        </li>
                                    </a>
                                    <center><a href="#" class="btn btn-primary btn_br_custome">Read More</a></center>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="border_hr_bottom">
        <div class="container">
            <div class="our_branches">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="default_heading">Our Branches</h1>
                    </div>
                    <div class="col-md-4">
                        <div class="single_branches">
                            <img src="assets/images/motijheel_branch.jpg" class="img-fluid">
                            <h3>Motijheel</h3>
                            <center><a href="#" class="btn btn-primary btn_br_custome">Learn More</a></center>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="single_branches">
                            <img src="assets/images/banosree_branch_ideal.jpg" class="img-fluid">
                            <h3>Banosree</h3>
                            <center><a href="#" class="btn btn-primary btn_br_custome">Learn More</a></center>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="single_branches">
                            <img src="assets/images/ideal_mugda_branch.jpg" class="img-fluid">
                            <h3>Mugda</h3>
                            <center><a href="#" class="btn btn-primary btn_br_custome">Learn More</a></center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="our_branches">
                <div class="row">
                    <!-- <div class="col-md-12">
                         <h1 class="default_heading">Latest Events in Our Branches</h1>
                     </div>-->
                    <div class="col-md-4">
                        <h3>Photo Gallery</h3>
                        <div id="carouselExampleCaptions1" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="assets/images/br_slider/slide_image1.jpg" class="d-block w-100" alt="">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>First slide label</h5>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/images/br_slider/slide_image3.jpg" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Second slide label</h5>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/images/br_slider/slide_image7.jpg" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Third slide label</h5>
                                    </div>
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleCaptions1" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleCaptions1" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <h3>Video Gallery</h3>
                        <div id="carouselExampleCaptions2" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <iframe width="560" height="205" src="https://www.youtube.com/embed/3yg6iAjivnk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleCaptions2" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleCaptions2" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h3>Location Map</h3>
                        <div id="carouselExampleCaptions3" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">


                                <div class="mapouter"><div class="gmap_canvas"><iframe width="375" height="205" id="gmap_canvas" src="https://maps.google.com/maps?q=university%20of%20san%20franciscoIdeal%20School%20%26%20College%2C%20Motijheel%2C%20Dhaka-1000&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.embedgooglemap.net">embedgooglemap.net</a></div><style>.mapouter{position:relative;text-align:right;height:205px;width:375px;}.gmap_canvas {overflow:hidden;background:none!important;height:205px;width:375px;}</style></div>




                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleCaptions3" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleCaptions3" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
