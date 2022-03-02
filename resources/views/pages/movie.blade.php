@extends('layout')
@section('seo_support')
    <title>Phim hay 2021 - Xem phim hay nhất</title>
    <meta name="description" content="Phim hay 2021 - Xem phim hay nhất, xem phim online miễn phí, phim hot , phim nhanh" />
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:title" content="Phim hay 2020 - Xem phim hay nhất" />
    <meta property="og:description" content="Phim hay 2020 - Xem phim hay nhất, phim hay trung quốc, hàn quốc, việt nam, mỹ, hong kong , chiếu rạp" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="Phim hay 2021- Xem phim hay nhất" />
    <meta property="og:image" content="" />
    <meta property="og:image:width" content="300" />
    <meta property="og:image:height" content="55" />
@endsection
@section('content')
<div class="row container" id="wrapper">
    <div class="halim-panel-filter">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-6">
                    <div class="yoast_breadcrumb hidden-xs"><span><span><a href="{{route('category',$movie->category->slug)}}">{{$movie->category->title}}</a> » <span><a href="danhmuc.php">Mỹ</a> » <span class="breadcrumb_last" aria-current="page">GÓA PHỤ ĐEN</span></span></span></span></div>
                </div>
            </div>
        </div>
        <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
            <div class="ajax"></div>
        </div>
    </div>
    <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
        <section id="content" class="test">
            <div class="clearfix wrap-content">

                <div class="halim-movie-wrapper">
                    <div class="title-block">
                        <div id="bookmark" class="bookmark-img-animation primary_ribbon" data-id="38424">
                            <div class="halim-pulse-ring"></div>
                        </div>
                        <div class="title-wrapper" style="font-weight: bold;">
                            Bookmark
                        </div>
                    </div>
                    <div class="movie_info col-xs-12">
                        <div class="movie-poster col-md-3">
                            <img class="movie-thumb" src="https://images2-focus-opensocial.googleusercontent.com/gadgets/proxy?container=focus&gadget=a&no_expand=1&refresh=604800&url=https://1.bp.blogspot.com/-fL7o9nefEPc/YOk_YIB6QRI/AAAAAAAAJn8/hahCLlgRq4AFc8O4YeKhpb5zncixXAF0wCLcBGAsYHQ/s320/images.jpg" alt="GÓA PHỤ ĐEN">
                            <div class="bwa-content">
                                <div class="loader"></div>
                                <a href="{{route('watch')}}" class="bwac-btn">
                                    <i class="fa fa-play"></i>
                                </a>
                            </div>
                        </div>
                        <div class="film-poster col-md-9">
                            <h1 class="movie-title title-1" style="display:block;line-height:35px;margin-bottom: -14px;color: #ffed4d;text-transform: uppercase;font-size: 18px;">{{$movie->title}}</h1>
                            <h2 class="movie-title title-2" style="font-size: 12px;">
                                @if($movie->name_en)
                                    {{$movie->name_en}}
                                @else
                                    No name
                                @endif
                            </h2>
                            <ul class="list-info-group">
                                <li class="list-info-group-item"><span>Trạng Thái</span> : <span class="quality">HD</span><span class="episode">Vietsub</span></li>
                                <li class="list-info-group-item"><span>Điểm IMDb</span> : <span class="imdb">7.2</span></li>
                                <li class="list-info-group-item"><span>Thời lượng</span> : 133 Phút</li>
                                <li class="list-info-group-item"><span>Thể loại</span> : <a href="{{route('genre',$movie->genre->slug)}}" rel="category tag">{{$movie->genre->title}}</a> </li>
                                <li class="list-info-group-item"><span>Quốc gia</span> : <a href="{{route('genre',$movie->country->slug)}}" rel="tag">{{$movie->country->title}}</a></li>
                            </ul>
                            <div class="movie-trailer hidden"></div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div id="halim_trailer"></div>
                <div class="clearfix"></div>
                <div class="section-bar clearfix">
                    <h2 class="section-title"><span style="color:#ffed4d">Nội dung phim</span></h2>
                </div>
                <div class="entry-content htmlwrap clearfix">
                    <div class="video-item halim-entry-box">
                        <article id="post-38424" class="item-content">
                            Phim <a href="{{route('movie',$movie->slug)}}">{{$movie->title}}</a> - {{$movie->genre->title}} - {{$movie->country->title}}:
                           <p>{{$movie->description}}</p>
                            <h5>Từ Khoá Tìm Kiếm:</h5>
                            <ul>
                                <li>black widow vietsub</li>
                                <li>Black Widow 2021 Vietsub</li>
                                <li>phim black windows 2021</li>
                                <li>xem phim black windows</li>
                                <li>xem phim black widow</li>
                                <li>phim black windows</li>
                                <li>goa phu den</li>
                                <li>xem phim black window</li>
                                <li>phim black widow 2021</li>
                                <li>xem black widow</li>
                            </ul>
                        </article>
                    </div>
                </div>
            </div>
        </section>
        <section class="related-movies">
            <div id="halim_related_movies-2xx" class="wrap-slider">
                <div class="section-bar clearfix">
                    <h3 class="section-title"><span>CÓ THỂ BẠN MUỐN XEM</span></h3>
                </div>
                <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
                    @foreach($related_movies as $key=> $rela_movie)
                    <article class="thumb grid-item post-{{$rela_movie->id}}">
                        <div class="halim-item">
                            <a class="halim-thumb" href="{{route('movie',$rela_movie->slug)}}" title="{{$rela_movie->title}}">
                                <figure><img class="lazy img-responsive" src="{{asset('/uploads/movie/'.$rela_movie->image)}}" alt="{{$rela_movie->title}}" title="{{$rela_movie->title}}"></figure>
                                <span class="status">HD</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>Vietsub</span>
                                <div class="icon_overlay"></div>
                                <div class="halim-post-title-box">
                                    <div class="halim-post-title ">
                                        <p class="entry-title">{{$rela_movie->title}}</p>
                                        <p class="original_title">
                                            @if($rela_movie->name_en)
                                                {{$rela_movie->name_en}}
                                            @else
                                                No name
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </article>
                    @endforeach

                </div>
                <script>
                    jQuery(document).ready(function($) {
                        var owl = $('#halim_related_movies-2');
                        owl.owlCarousel({loop: true,margin: 4,autoplay: true,autoplayTimeout: 4000,autoplayHoverPause: true,nav: true,navText: ['<i class="hl-down-open rotate-left"></i>', '<i class="hl-down-open rotate-right"></i>'],responsiveClass: true,responsive: {0: {items:2},480: {items:3}, 600: {items:4},1000: {items: 4}}})});
                </script>
            </div>
        </section>
    </main>
    <aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4"></aside>
</div>
@endsection
