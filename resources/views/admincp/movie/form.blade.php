@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <a href="{{route('movie.index')}}" class="btn btn-primary">Danh sách Phim</a>
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row justify-content-center">

            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Quản lý Phim</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div
                        @endif
                            @if(!isset($movie))
                                {!! Form::open(['route'=>'movie.store','method'=>'POST','enctype'=>'multipart/form-data']) !!}
                            @else
                                {!! Form::open(['route'=>['movie.update',$movie->id],'method'=>'PUT','enctype'=>'multipart/form-data']) !!}
                            @endif
                            <div class="form-group">
                                {!! Form::label('title', 'Title', []) !!}
                                {!! Form::text('title', isset($movie) ? $movie->title : '', ['class'=>'form-control','placeholder'=>'Nhập vào dữ liệu','id'=>'slug','onkeyup'=>'ChangeToSlug()']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('name_en', 'Name En', []) !!}
                                {!! Form::text('name_en', isset($movie) ? $movie->name_en : '', ['class'=>'form-control','placeholder'=>'Nhập vào dữ liệu']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('slug', 'Slug', []) !!}
                                {!! Form::text('slug', isset($movie)? $movie->slug : '', ['class'=>'form-control','placeholder'=>'Nhập vào dữ liệu','id'=>'convert_slug']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('description', 'Description', []) !!}
                                {!! Form::textarea('description', isset($movie)  ? $movie->description : '', ['style'=>'resize:none','class'=>'form-control','placeholder'=>'Nhập mô tả','id'=>'description']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('active', 'Active', []) !!}
                                {!! Form::select('status', ['1'=>'Hiển thị','0'=>'Không'],isset($movie)  ? $movie->status : null, ['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('movie_hot', 'Phim hot', []) !!}
                                {!! Form::select('movie_hot', ['1'=>'Có','0'=>'Không'],isset($movie)  ? $movie->movie_hot : '', ['class'=>'form-control']) !!}
                            </div>
                                <div class="form-group">
                                    {!! Form::label('category', 'Danh mục', []) !!}
                                    {!! Form::select('category_id', $category,isset($movie)  ? $movie->category->title : null, ['class'=>'form-control']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('genre', 'Thể loại', []) !!}
                                    {!! Form::select('genre_id',$genre ,isset($movie)  ? $movie->genre->title : null, ['class'=>'form-control']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('country', 'Quốc gia', []) !!}
                                    {!! Form::select('country_id',$country,isset($movie)  ? $movie->country->title : null, ['class'=>'form-control']) !!}
                                </div>
                            <div class="form-group">
                                {!! Form::label('image', 'Image', []) !!}
                                {!! Form::file('image', ['class'=>'form-control-file']) !!}
                                @if(isset($movie))
                                    <img width="20%" src="{{asset('uploads/movie/'.$movie->image)}}" alt="" class="pt-2">
                                @endif
                            </div>
                            @if(!isset($movie) )
                                {!! Form::submit('Thêm phim', ['class'=>'btn btn-success']) !!}
                                {!! Form::close() !!}
                            @else
                                {!! Form::submit('Cập nhập phim', ['class'=>'btn btn-success']) !!}
                                {!! Form::close() !!}
                            @endif


                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>

        </div>

{{--        LIST genre--}}

    </div>
@endsection
