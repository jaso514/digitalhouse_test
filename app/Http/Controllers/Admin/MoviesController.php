<?php

namespace App\Http\Controllers\Admin;

use App\Entity\Movies;
use App\Entity\Genres;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = $request->input("titulo");
        if (!empty($title)) {
            $movies = Movies::where('title', 'LIKE', '%'.$title.'%')->paginate(5);
        } else {
            $movies = Movies::paginate(5);
        }

        return view('admin.movies.index', [
            'movies' => $movies,
            'title' => $title
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Genres::where('active', true)->orderBy('name')->pluck('name', 'id');

        return view('admin.movies.create', [
            'genres' => $genres
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->movies, [
            'title' => 'bail|required|max:255',
            'release_date' => 'required|date',
            'awards' => 'required|numeric',
            'rating' => 'required|numeric|max:10'
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->input());
        }
        
        $movie = Movies::create($request->movies);
        return redirect()->route('admin_movies_edit', ['id' => $movie->id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Movies  $movies
     * @return \Illuminate\Http\Response
     */
    public function edit(Movies $movies)
    {
        $genres = Genres::where('active', true)->orderBy('name')->pluck('name', 'id');

        return view('admin.movies.edit', [
            'movie' => $movies,
            'genres' => $genres,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movies  $movies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movies $movies)
    {
        $validator = Validator::make($request->movies, [
            'title' => 'bail|required|max:255',
            'release_date' => 'required|date',
            'awards' => 'required|numeric',
            'rating' => 'required|numeric|max:10'
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $movies->fill($request->movies);
        $movies->update();

        return redirect()->route('admin_movies_edit', ['movies' => $movies->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movies  $movies
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movies $movies)
    {
        $destroyed = $movies->delete();
        
        return redirect()->back();
    }
}
