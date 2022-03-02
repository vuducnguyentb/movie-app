<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::with('category','genre','country')->orderBy('id','DESC')->get();
        return view('admincp.movie.index',compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

//        $movies = Movie::with('category','genre','country')->orderBy('id','DESC')->get();
        $category = Category::pluck("title",'id'); // array : value <= key
        $country = Country::pluck("title",'id');
        $genre = Genre::pluck("title",'id');
//        dd(count($movies));
        return view('admincp.movie.form',compact('category','country','genre'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
//        dd($data);
        $movie = new Movie();
        $movie->title = $data['title'];
        $movie->name_en = $data['name_en'];
        $movie->slug = $data['slug'];
        $movie->movie_hot = $data['movie_hot'];
        $movie->description = $data['description'];
        $movie->status = $data['status'];
        $movie->category_id = $data['category_id'];
        $movie->country_id = $data['country_id'];
        $movie->genre_id = $data['genre_id'];
        //them hinh anh
        $get_image= $request->file('image');
        $path = 'uploads/movie';
        if($get_image) {
            $get_name_image = $get_image->getClientOriginalName(); //name.png
            $name_image = current(explode('.', $get_name_image)); // [0]=>name . [1]=>png
            $new_image = $name_image . rand(0, 9999) . '.' . $get_image->getClientOriginalExtension(); //name1234.png
            $get_image -> move($path, $new_image);
            $movie->image = $new_image;
        }
        $movie->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movies = Movie::with('category','genre','country')->orderBy('id','DESC')->get();
        $category = Category::pluck("title",'id'); // array : value <= key
        $country = Country::pluck("title",'id');
        $genre = Genre::pluck("title",'id');
        $movie = Movie::with('category','genre','country')->find($id);
//        dd(count($movies));
        return view('admincp.movie.form',compact('movies','category','country','genre','movie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
//        dd($data);
        $movie = Movie::find($id);
        $movie->title = $data['title'];
        $movie->name_en = $data['name_en'];
        $movie->slug = $data['slug'];
        $movie->movie_hot = $data['movie_hot'];
        $movie->description = $data['description'];
        $movie->status = $data['status'];
        $movie->category_id = $data['category_id'];
        $movie->country_id = $data['country_id'];
        $movie->genre_id = $data['genre_id'];
        //them hinh anh
        $get_image= $request->file('image');
        $path = 'uploads/movie';
        if($get_image) {
            //xoa anh cu
            if(!empty($movie->image)){
                unlink('uploads/movie/'.$movie->image);
            }
            $get_name_image = $get_image->getClientOriginalName(); //name.png
            $name_image = current(explode('.', $get_name_image)); // [0]=>name . [1]=>png
            $new_image = $name_image . rand(0, 9999) . '.' . $get_image->getClientOriginalExtension(); //name1234.png
            $get_image -> move($path, $new_image);
            $movie->image = $new_image;
        }
        $movie->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie =  Movie::find($id);
        if(!empty($movie->image)){
            //xoa ảnh
            unlink('uploads/movie/'.$movie->image);
        }
        $movie->delete();
        return redirect()->back();
    }
}
