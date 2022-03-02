@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Category</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div
                        @endif
                            @if(!isset($cate))
                                {!! Form::open(['route'=>'category.store','method'=>'POST']) !!}
                            @else
                                {!! Form::open(['route'=>['category.update',$cate->id],'method'=>'PUT']) !!}
                            @endif
                            <div class="form-group">
                                {!! Form::label('title', 'Title', []) !!}
                                {!! Form::text('title', isset($cate)? $cate->title : '', ['class'=>'form-control','placeholder'=>'Nhập vào dữ liệu','id'=>'slug','onkeyup'=>'ChangeToSlug()']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('slug', 'Slug', []) !!}
                                {!! Form::text('slug', isset($cate)? $cate->slug : '', ['class'=>'form-control','placeholder'=>'Nhập vào dữ liệu','id'=>'convert_slug']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('description', 'Description', []) !!}
                                {!! Form::textarea('description', isset($cate)? $cate->description : '', ['style'=>'resize:none','class'=>'form-control','placeholder'=>'Nhập mô tả','id'=>'description']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('active', 'Active', []) !!}
                                {!! Form::select('status', ['1'=>'Hiển thị','0'=>'Không'],isset($cate)? $cate->status : null, ['class'=>'form-control']) !!}
                            </div>
                            @if(!isset($cate))
                                {!! Form::submit('Thêm danh mục', ['class'=>'btn btn-success']) !!}
                                {!! Form::close() !!}
                            @else
                                {!! Form::submit('Cập nhập danh mục', ['class'=>'btn btn-success']) !!}
                                {!! Form::close() !!}
                            @endif


                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>

        </div>

{{--        LIST CATEGORY--}}
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
                <th scope="col">Description</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody class="order-position">
            @foreach($categories as $key =>$item)
            <tr id="{{$item->id}}">
                <th scope="row">{{$key}}</th>
                <td>{{$item->title}}</td>
                <td>{{$item->slug}}</td>
                <td>{{$item->description}}</td>
                <td>
                    @if($item->status)
                        Hiển thị
                    @else
                        Không hiển thị
                    @endif
                </td>
                <td class="d-flex">
                    <a href="{{route('category.edit',$item->id)}}" class="btn btn-warning mr-2" >Sửa</a>
                    {!! Form::open(['route'=>['category.destroy',$item->id],
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
