<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index(){
        $movies_hot = Movie::where('movie_hot',1)->orderBy('id','DESC')->where('status',1)->get();
        $categories = Category::orderBy('id','DESC')->where('status',1)->get();
        $genres = Genre::orderBy('id','DESC')->get();
        $countries = Country::orderBy('id','DESC')->get();
        $category_home = Category::with('movie')->orderBy('id','DESC')->where('status',1)->get();
        return view('pages.home',compact('categories','genres','countries','category_home','movies_hot'));
    }
    public function category($slug){
        $categories = Category::orderBy('id','DESC')->where('status',1)->get();
        $genres = Genre::orderBy('id','DESC')->get();
        $countries = Country::orderBy('id','DESC')->get();
        $category_slug = Category::where('slug',$slug)->first();
        $slug_country_genre_category = Category::where('slug',$slug)->first();
        $movies_list = Movie::where('category_id',$category_slug->id)->orderBy('id','DESC')->where('status',1)->paginate(6);
        return view('pages.category',compact('categories','genres','countries','category_slug','movies_list','slug_country_genre_category'));
    }
    public function genre($slug){
        $categories = Category::orderBy('id','DESC')->where('status',1)->get();
        $genres = Genre::orderBy('id','DESC')->get();
        $countries = Country::orderBy('id','DESC')->get();
        $genre_slug = Genre::where('slug',$slug)->first();
        $slug_country_genre_category = Genre::where('slug',$slug)->first();
        $movies_list = Movie::where('genre_id',$genre_slug->id)->orderBy('id','DESC')->where('status',1)->paginate(6);

        return view('pages.genre',compact('categories','genres','countries','genre_slug','movies_list','slug_country_genre_category'));
    }
    public function country($slug){
        $categories = Category::orderBy('id','DESC')->where('status',1)->get();
        $genres = Genre::orderBy('id','DESC')->get();
        $countries = Country::orderBy('id','DESC')->get();
        $country_slug =Country::where('slug',$slug)->first();
        $slug_country_genre_category = Country::where('slug',$slug)->first();
        $movies_list = Movie::where('country_id',$country_slug->id)->orderBy('id','DESC')->where('status',1)->paginate(6);
        return view('pages.country',compact('categories','genres','countries','country_slug','movies_list','slug_country_genre_category'));
    }
    public function watch(){
        return view('pages.watch');
    }
    public function movie($slug){
        $categories = Category::orderBy('id','DESC')->where('status',1)->get();
        $genres = Genre::orderBy('id','DESC')->get();
        $countries = Country::orderBy('id','DESC')->get();
        $movie = Movie::with('category','genre','country')->where('slug',$slug)->orderBy('id','DESC')->where('status',1)->first();
        $related_movies = Movie::with('category','genre','country')
            ->where('category_id',$movie->category_id)
            ->orderBy(DB::raw('RAND()'))
            ->whereNotIn('slug',[$slug])
            ->get();
        return view('pages.movie',compact('categories','countries','genres','movie','related_movies'));
    }

    public function episode(){
        return view('pages.episode');
    }
}
