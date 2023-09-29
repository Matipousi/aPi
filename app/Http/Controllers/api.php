<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tarea;

class api extends Controller
{
    public function create( Request $request){

        try{
       
            $tarea = new tarea();
            $tarea->titulo = $request->titulo;
            $tarea->contenido = $request->contenido;
            $tarea->estado = $request->estado;
            $tarea->autor = $request->autor;
            $tarea->created_at = $request->created_at;
            $tarea->updated_at = $request->updated_at;
            $tarea->deleted_at = $request->deleted_at;      
            $tarea->save();
       
        }

        catch(\Exception $e){
       
            return ["result"=>"Error al crear tarea"];
       
        }
    }

    public function read( Request $request){

        try{
      
            $tarea = tarea::all();
            return $tarea;
      
        }

        catch(\Exception $e){
      
            return ["result"=>"Error al leer tareas"];
      
        }

    }

    public function readByID( Request $request, $id){

        try{
       
            $tarea = tarea::findOrFail($id);
            return $tarea;
       
        }

        catch(\Exception $e){
       
            return ["result"=>"Error al leer tarea especificada"];
       
        }

    }

    public function readByAutor( Request $request, $autor){

        try{
           
            $tarea = tarea::where("autor", $autor)->get();
            return $tarea;
        
        }

        catch(\Exception $e){
        
            return ["result"=>"Error al leer tareas del autor especificado"];
       
        }

    }

    public function readByEstado( Request $request, $estado){

        try{

            $tarea = tarea::where("estado", $estado)->get();
            return $tarea;
      
        }

        catch(\Exception $e){
      
            return ["result"=>"Error al leer tareas del estado especificado"];
      
        }

    }

    public function readByTitulo( Request $request, $titulo){

        try{
       
            $tarea = tarea::where("titulo", $titulo)->get();
            return $tarea;
       
        }

        catch(\Exception $e){
       
            return ["result"=>"Error al leer tareas del titulo especificado"];
       
        }

    }

    public function update( Request $request, $id){

        $validatedData = $request->validate([
            'titulo' => 'required|max:150',
            'contenido' => 'required|max:255',
            'estado' => 'required|max:80',
            'autor' => 'required|max:50',
            'created_at' => 'required|max:10',
            'updated_at' => 'required|max:10',
            'deleted_at' => 'required|max:10',
        ]);

        try{
          
            $tarea = tarea::findOrFail($request->id);
            $tarea->titulo = $request->titulo;
            $tarea->contenido = $request->contenido;
            $tarea->estado = $request->estado;
            $tarea->autor = $request->autor;
            $tarea->created_at = $request->created_at;
            $tarea->updated_at = $request->updated_at;
            $tarea->deleted_at = $request->deleted_at;      
            $tarea->save();
        
        }

        catch(\Exception $e){
        
            return ["result"=>"Error al actualizar tarea"];
        
        }



    }

    public function delete( Request $request, $id){

    try{
        
        $tarea = tarea::findOrFail($id);
        $tarea->delete();
        return ["result"=>"tarea $id eliminada"];

    }

    catch(\Exception $e){

        return ["result"=>"Error al eliminar tarea"];

        }

    }

}
