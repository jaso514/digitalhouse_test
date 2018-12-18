<?php

namespace App\Http\Controllers\Api;

use App\Entity\Movies;
use Illuminate\Http\Request;

class MoviesController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = $request->input("title", null);
        $items = Movies::searchByTitle($title);
        
        return $this->responseList($request, $items);
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
        return $this->save($request, Movies::class);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $item = Movies::with('genre')->find($id);
        
        $code = 200;
        $data = [];
        $message = '';
        
        if (empty($item)) {
            $code = 404;
            $message = 'No se encontro el registro solicitado.';
        }

        return response()->json([
            'success' => $code==200,
            'message' => $message,
            'data' => $item
        ], $code);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        return $this->modify($request, Movies::class, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        return $this->delete($request, Movies::class, $id);
    }
}
