<?php

namespace App\Http\Controllers\Api;

use App\Entity\Movies;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    protected function responseList(Request $request, $items) {
        $code = 206;
        $data = [];
        $message = '';

        if ($items->count()===0) {
            $code = 404;
            $message = 'No se encontraron resultados.';
        }

        return response()->json([
            'success' => $code==206,
            'message' => $message,
            'data' => $items
        ], $code);
    }
    
    protected function save(Request $request, $class) {
        $item = $class::firstOrCreate(
            $request->all()
        );
        
        $code = 201;
        $data = [];
        $message = '';
        
        if (empty($item->id)) {
            $code = 400;
            $message = 'No se guardo el registro.';
        }

        return response()->json([
            'success' => $code==201,
            'message' => $message,
            'data' => $item
        ], $code);
    }
    
    protected function modify(Request $request, $class, $id) {
        $item = $class::find($id)->fill($request->all());
        
        $code = 200;
        $data = [];
        $message = '';
        
        if (!$item->update()) {
            $code = 400;
            $message = 'No se guardo el registro.';
        }

        return response()->json([
            'success' => $code==200,
            'message' => $message,
            'data' => $item
        ], $code);
    }
    
    protected function delete(Request $request, $class, $id) {
        $item = $class::find($id);
        
        $code = 200;
        $destroyed = false;
        $message = '';
        
        if (empty($item)) {
            $code = 404;
            $message = 'No se encontró el registro.';
        } else {
            $destroyed = $class::destroy($id);
            if (!$destroyed) {
                $code = 400;
                $message = 'No se pudo eliminar el registro.';
            }
        }
        return response()->json([
            'success' => $code==200,
            'message' => $message
        ], $code);
    }
}
