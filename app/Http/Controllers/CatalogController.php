<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class CatalogController extends Controller
{

    public function getIndex()
    {
        $peliculas = Movie::get();
        return view('catalog.index')
            //->with(compact('peliculas'))
            ->with('peliculas', $peliculas);
    }
    public function getShow($id)
    {
        $pelicula = Movie::find($id);
        return view('catalog.show', array('pelicula' => $pelicula));
    }
    public function getCreate()
    {
        return view('catalog.create');
    }
    public function getEdit($id)
    {
        $pelicula = Movie::find($id);
        return view('catalog.create', array('pelicula' => $pelicula));
    }
    public function postCreate(Request $request)
    {
        //Para que funcione create (insercion masiva de campos) se debe indicar en el modelo (Movie.php) que campos se permiten insertar masivamente (con la propiedad fillable)
        Movie::create($request->all());
        // $peli = new Movie;
        // $peli->title = $request->title;
        // $peli->director = $request->director;
        // $peli->year = $request->year;
        // $peli->poster = $request->poster;
        // $peli->rented = false;
        // $peli->synopsis = $request->synopsis;
        // $peli->save();
        return redirect('/catalog');
    }
    public function putEdit(int $id, Request $request)
    {
        $peli = Movie::find($id);
        $peli->title = $request->title;
        $peli->director = $request->director;
        $peli->year = $request->year;
        $peli->poster = $request->poster;
        $peli->synopsis = $request->synopsis;
        $peli->save();
        return redirect('/catalog');
    }
    public function putRented(int $id)
    {
        $peli = Movie::find($id);
        $peli->rented = !$peli->rented;
        $peli->save();
        return redirect('/catalog');
    }
    public function deleteMovie(Movie $peli)
    {
        $peli->delete();
        return redirect('/catalog');
    }
}
