

        <div class="section-bar clearfix">
            <h1 class="section-title"><span>{{$slug_country_genre_category->title}}</span></h1>
        </div>
        <div class="halim_box">
            @foreach($movies_list as $key=>$item_movie)
            <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-27021">
                <div class="halim-item">
                    <a class="halim-thumb" href="{{route('movie',$item_movie->slug)}}" title="{{$item_movie->title}}">
                        <figure><img class="lazy img-responsive" src="{{asset('/uploads/movie/'.$item_movie->image)}}" alt="{{$item_movie->title}}" title="{{$item_movie->title}}"></figure>
                        <span class="status">5/5</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>Vietsub</span>
                        <div class="icon_overlay"></div>
                        <div class="halim-post-title-box">
                            <div class="halim-post-title ">
                                <p class="entry-title">{{$item_movie->title}}</p>
                                <p class="original_title">
                                    @if($item_movie->name_en)
                                        {{$item_movie->name_en}}
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
        <div class="clearfix"></div>
        <div class="text-center">
{{--            <ul class='page-numbers'>--}}
{{--                <li><span aria-current="page" class="page-numbers current">1</span></li>--}}
{{--                <li><a class="page-numbers" href="">2</a></li>--}}
{{--                <li><a class="page-numbers" href="">3</a></li>--}}
{{--                <li><span class="page-numbers dots">&hellip;</span></li>--}}
{{--                <li><a class="page-numbers" href="">55</a></li>--}}
{{--                <li><a class="next page-numbers" href=""><i class="hl-down-open rotate-right"></i></a></li>--}}
{{--            </ul>--}}
            {!! $movies_list->links("pagination::bootstrap-4")!!}
        </div>

