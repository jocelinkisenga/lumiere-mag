@extends('layouts.main')
@section('content')
    <div class="trending-area fix mt-3">
        <div class="container">
            <div class="trending-main">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle mb-30">
                            <h3>Vient de paraître</h3>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <!-- Trending Top -->
                        <div class="trending-top mb-30">
                            <div class="trend-top-img">
                                <img src="{{ asset("storage/uploads/".$latestPost->image) }}" class="img-fluid" alt="actu9">
                                <div class="trend-top-cap">
                                    <span>{{ $latestPost->category->title }}</span>
                                    <h2><a href="{{ route("posts.show",['title' => $latestPost->title, 'id' => $latestPost->id]) }}">{{ $latestPost->title }}</a></h2>
                                </div>
                            </div>
                        </div>

 <!--  Recent Articles start -->
    <div class="recent-articles">
        <div class="container">
           <div class="recent-wrapper">
                <!-- section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle mb-30">
                            <h3>Articles Recents</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="recent-active dot-style d-flex dot-style">
                            @foreach ($recentPosts as $item)
                            <div class="single-recent mb-100">
                                <div class="what-img">
                                    <img src="{{ asset("storage/uploads/".$item->image) }}" class="img-fluid" alt="actu9">
                                </div>
                                <div class="what-cap">
                                    <span class="color1">{{ $item->category->title}}</span>
                                    <h4><a href="{{ route("posts.show",['title' => $item->title, 'id' => $item->id]) }}">{{ $item->title }}</a></h4>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>   
           </div>
        </div>
    </div>
    <!--Recent Articles End -->

                        <!-- Trending Bottom -->
                        <div class="trending-bottom">
                            <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle mb-30">
                            <h3>Populaires</h3>
                        </div>
                    </div>
                                @foreach ($popularPosts as $item)
                            <div class="col-lg-4">
                                <div class="single-bottom mb-35">
                                    <div class="trend-bottom-img mb-30">
                                        <img src="{{ asset("storage/uploads/".$item->image) }}" alt="actu9" class="img-fluid">
                                    </div>
                                    <div class="trend-bottom-cap">
                                        <span class="color1">{{ $item->category->title }}</span>
                                        <h4><a href="{{ route("posts.show",['title' => $item->title, 'id' => $item->id]) }}">{{ $item->title }}</a></h4>
                                    </div>
                                </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- Riht content -->
                    <div class="col-lg-4">
                        @foreach ($recentPosts as $item)
                        <div class="trand-right-single d-flex">
                            <div class="trand-right-img">
                                <img src="{{ asset("storage/uploads/".$item->image) }}" class="img-fluid" alt="actu9">
                            </div>
                            <div class="trand-right-cap">
                                <span class="color1">{{ $item->category->title }}</span>
                                <h4><a href="{{ route("posts.show",['title' => $item->title, 'id' => $item->id]) }}">{{ $item->title }}</a></h4>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Trending Area End -->
    <!--   Weekly-News start -->
    <div class="weekly-news-area pt-50">
        <div class="container">
           <div class="weekly-wrapper">
                <!-- section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle mb-30">
                            <h3>Cette semaine</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="weekly-news-active dot-style d-flex dot-style">
                            @forelse ($weekly as $item)

                                    <div class="weekly-single">
                                <div class="weekly-img">
                                    <img src="{{ asset("storage/uploads/".$item->image) }}" class="img-fluid" alt="actu 9">
                                </div>
                                <div class="weekly-caption">
                                    <span class="color1">{{ $item->category->title }}</span>
                                    <h4><a href="{{ route("posts.show",['title' => $item->title, 'id' => $item->id]) }}">{{ $item->title }}</a></h4>
                                </div>
                            </div>

                            @empty
                                Pas d'article cette semaine
                            @endforelse
                        </div>
                    </div>
                </div>
           </div>
        </div>
    </div>
    <!-- End Weekly-News -->

    <!-- Whats New End -->
    <!--   Weekly2-News start -->

    <!-- End Weekly-News -->
    <!-- Start Youtube -->
    {{-- <div class="youtube-area video-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="video-items-active">
                        <div class="video-items text-center">
                            <iframe src="https://www.youtube.com/embed/CicQIuG8hBo" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <div class="video-items text-center">
                            <iframe  src="https://www.youtube.com/embed/rIz00N40bag" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <div class="video-items text-center">
                            <iframe src="https://www.youtube.com/embed/CONfhrASy44" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                        </div>
                        <div class="video-items text-center">
                            <iframe src="https://www.youtube.com/embed/lq6fL2ROWf8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                        </div>
                        <div class="video-items text-center">
                            <iframe src="https://www.youtube.com/embed/0VxlQlacWV4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <div class="video-info">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="video-caption">
                            <div class="top-caption">
                                <span class="color1">Politics</span>
                            </div>
                            <div class="bottom-caption">
                                <h2>Welcome To The Best Model Winner Contest At Look of the year</h2>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod ipsum dolor sit. Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod ipsum dolor sit. Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod ipsum dolor sit lorem ipsum dolor sit.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="testmonial-nav text-center">
                            <div class="single-video">
                                <iframe  src="https://www.youtube.com/embed/CicQIuG8hBo" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                <div class="video-intro">
                                    <h4>Welcotme To The Best Model Winner Contest</h4>
                                </div>
                            </div>
                            <div class="single-video">
                                <iframe  src="https://www.youtube.com/embed/rIz00N40bag" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                <div class="video-intro">
                                    <h4>Welcotme To The Best Model Winner Contest</h4>
                                </div>
                            </div>
                            <div class="single-video">
                                <iframe src="https://www.youtube.com/embed/CONfhrASy44" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                <div class="video-intro">
                                    <h4>Welcotme To The Best Model Winner Contest</h4>
                                </div>
                            </div>
                            <div class="single-video">
                                <iframe src="https://www.youtube.com/embed/lq6fL2ROWf8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                <div class="video-intro">
                                    <h4>Welcotme To The Best Model Winner Contest</h4>
                                </div>
                            </div>
                            <div class="single-video">
                                <iframe src="https://www.youtube.com/embed/0VxlQlacWV4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                <div class="video-intro">
                                    <h4>Welcotme To The Best Model Winner Contest</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- End Start youtube -->
   
    <!--Start pagination -->
<div class="pagination-area pb-45 text-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="single-wrap d-flex justify-content-center">
                        <nav aria-label="Page navigation example">
             {{--               <ul class="pagination justify-content-start">
                              <li class="page-item"><a class="page-link" href="#"><span class="flaticon-arrow roted"></span></a></li>
                                <li class="page-item active"><a class="page-link" href="#">01</a></li>
                                <li class="page-item"><a class="page-link" href="#">02</a></li>
                                <li class="page-item"><a class="page-link" href="#">03</a></li>
                              <li class="page-item"><a class="page-link" href="#"><span class="flaticon-arrow right-arrow"></span></a></li>
                            </ul> --}}
                          </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
