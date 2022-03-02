@extends('layouts.app')

@section('content')
    <div class="container pt-2 pb-2">

            <a href="{{route('movie.create')}}" class="btn btn-primary">Thêm Phim</a>
    </div>
    <div class="container">

    <table class="table" id="tablefilm">
        <thead class="thead-light">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Name En</th>
            <th scope="col">Slug</th>
            <th scope="col">Image</th>
            <th scope="col">Description</th>
            <th scope="col">Category</th>
            <th scope="col">Genre</th>
            <th scope="col">Country</th>
            <th scope="col">Status</th>
            <th scope="col">Phim Hot</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($movies as $key =>$item)
            <tr>
                <th scope="row">{{$key}}</th>
                <td>{{$item->title}}</td>
                <td>{{$item->name_en}}</td>
                <td>{{$item->slug}}</td>
                <td><img width="50%" src="{{asset('uploads/movie/'.$item->image)}}" alt=""></td>
                <td style="    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    height: 85px;">
                    {{$item->description}}</td>
                <td>{{$item->category->title}}</td>
                <td>{{$item->genre->title}}</td>
                <td>{{$item->country->title}}</td>
                <td>
                    @if($item->status)
                        Hiển thị
                    @else
                        Không hiển thị
                    @endif
                </td>
                <td>
                    @if($item->movie_hot)
                        Có
                    @else
                        Không
                    @endif
                </td>
                <td class="d-flex">
                    <a href="{{route('movie.edit',$item->id)}}" class="btn btn-warning mr-2" >Sửa</a>
                    {!! Form::open(['route'=>['movie.destroy',$item->id],
                    'method'=>'DELETE',
                    'onsubmit'=>'return confirm("Xóa danh mục?");']) !!}
                    {!! Form::submit('Xóa', ['class'=>'btn btn-danger']) !!}
                    {!! Form::close() !!}


                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
@endsection
