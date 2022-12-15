<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bares;

class BarController extends Controller
{

    function __construct()
    {
       $this->middleware('permission:ver-bar|crear-bar|editar-bar|borrar-role',['only'=>['index']]);
       $this->middleware('permission:crear-bar',  ['only'=>['create', 'store']]); 
       $this->middleware('permission:editar-bar', ['only'=>['edit', 'update']]);
       $this->middleware('permission:borrar-bar', ['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bares = Bares::paginate(5);
        return view('bares.index', compact('bares'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bares.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
                'nombre'    => 'required',
                'contenido' => 'required' 

        ]);

        Bares::create($request->all());
        return redirect()->route('bares.index');
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
    public function edit(Bares $bares)
    {
        return view('bares.edit', compact('bares'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bares $bares)
    {
       request()->validate([

        'nombre' => 'required',
        'contenido' => 'required'

       ]);

       $bares->update($request->all());
       return redirect()->route('bares.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bares $bares)
    {
        $bares->delete();
        return redirect()->route('bares.index');
    }
}
