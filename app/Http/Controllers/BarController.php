<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bares\Bar;

class BarController extends Controller
{

    function __construct()
    {
       $this->middleware('permission:ver-bar | crear-bar | editar-bar | borrar-role',['only'=>['index']]);
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
        $bar = Bar::paginate(5);
        return view('bares.index', compact('bar'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bares.crear');
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

        Bar::create($request->all());
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
    public function edit(Bar $bar)
    {
        return view('bares.editar', compact('bares'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bar $bar)
    {
       request()->validate([

        'nombre' => 'required',
        'contenido' => 'required'

       ]);

       $bar->update($request->all());
       return redirect()->route('bares.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bar $bar)
    {
        $bar->delete();
        return redirect()->route('bares.index');
    }
}
