<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Entity\Movies;
use Illuminate\Http\Request;

/**
 * Description of MainController
 *
 * @author jsierra
 */
class MainController extends Controller {
    
    public function index(Request $request) {
        $title = $request->input("title");
        if (!empty($title)) {
            $movies = Movies::where('title', 'LIKE', '%'.$title.'%')->paginate(6);
        } else {
            $movies = Movies::paginate(6);
        }
        
        return view('main.index', [
            'movies' => $movies,
            'title' => $title
            ]);
    }
}
