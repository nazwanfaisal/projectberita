<?php

namespace App\Http\Controllers;
use App\Models\Artikel;
use App\Models\Judul;
use Illuminate\Http\Request;

class JudulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $judul = Judul::all();
        return view('judul.index' , compact('judul'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('judul.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           $validated = $request->validate(
             ['judul' => 'required',
           ]);

           $judul = new Judul;
           $judul->judul = $request->judul;
           $judul->save();
           return redirect()->route('judul.index');
            }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Judul  $judul
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $judul = Judul::findOrFail($id);
    return view('judul.show' , compact('judul'));
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Judul  $judul
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
    $judul = Judul::findOrFail($id);
    return view('judul.edit' , compact('judul'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Judul 
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validated = $request->validate(
            ['judul' => 'required',
          ]);

          $judul = Judul::findOrFail($id);
          $judul->judul = $request->judul;
          $judul->save();
          return redirect()->route('judul.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Judul  
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $judul = Judul::findOrFail($id);
        $judul->delete();
        return redirect()->route('judul.index');
    }
}