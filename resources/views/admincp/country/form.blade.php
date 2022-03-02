@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Quản lý phim quốc gia</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div
                        @endif
                            @if(!isset($country))
                                {!! Form::open(['route'=>'country.store','method'=>'POST']) !!}
                            @else
                                {!! Form::open(['route'=>['country.update',$country->id],'method'=>'PUT']) !!}
                            @endif
                            <div class="form-group">
                                {!! Form::label('title', 'Title', []) !!}
                                {!! Form::text('title', isset($country)? $country->title : '', ['class'=>'form-control','placeholder'=>'Nhập vào dữ liệu','id'=>'slug','onkeyup'=>'ChangeToSlug()']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('slug', 'Slug', []) !!}
                                {!! Form::text('slug', isset($country)? $country->slug : '', ['class'=>'form-control','placeholder'=>'Nhập vào dữ liệu','id'=>'convert_slug']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('description', 'Description', []) !!}
                                {!! Form::textarea('description', isset($country)? $country->description : '', ['style'=>'resize:none','class'=>'form-control','placeholder'=>'Nhập mô tả','id'=>'description']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('active', 'Active', []) !!}
                                {!! Form::select('status', ['1'=>'Hiển thị','0'=>'Không'],isset($country)? $country->status : null, ['class'=>'form-control']) !!}
                            </div>
                            @if(!isset($country))
                                {!! Form::submit('Thêm quốc gia', ['class'=>'btn btn-success']) !!}
                                {!! Form::close() !!}
                            @else
                                {!! Form::submit('Cập nhập quốc gia', ['class'=>'btn btn-success']) !!}
                                {!! Form::close() !!}
                            @endif


                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>

        </div>

{{--        LIST country--}}
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
            <tbody>
            @foreach($countries as $key =>$item)
            <tr>
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
                    <a href="{{route('country.edit',$item->id)}}" class="btn btn-warning mr-2" >Sửa</a>
                    {!! Form::open(['route'=>['country.destroy',$item->id],
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
