<?php

namespace App\Http\Controllers\Admin;

use App\Entity\Movies;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Movies  $movies
     * @return \Illuminate\Http\Response
     */
    public function show(Movies $movies)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Movies  $movies
     * @return \Illuminate\Http\Response
     */
    public function edit(Movies $movies)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movies  $movies
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movies $movies)
    {
        //
    }
}
