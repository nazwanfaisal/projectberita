<?php

namespace App\Http\Controllers;

use App\Models\artikel;
use App\Models\judul;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikel = artikel::all();
        return view('artikel.index' , compact('artikel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $judul = judul::all();
        return view('artikel.create',compact('judul'));
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
             ['judul_id' => 'required',
             'artikel' => 'required',
             'content' => 'required',
             'cover' => 'required|image|max:2048',
           ]);

           $artikel = new Artikel;
           $artikel->judul_id = $request->judul_id;
           $artikel->artikel = $request->artikel;
           $artikel->content = $request->content;
           if ($request->hasFile('cover')) {
            $artikel->deleteImage();
            $image = $request->file('cover');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('image/artikel/', $name);
            $artikel->cover = $name;
        }
           $artikel->save();
           return redirect()->route('artikel.index');
            }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function show($judul)
    {
         $artikel = Artikel::findOrFail($judul);
    return view('artikel.show' , compact('artikel'));
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
    $artikel = Artikel::findOrFail($id);
    return view('artikel.edit' , compact('artikel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validated = $request->validate(
            ['judul_id' => 'required',
             'artikel' => 'required',
             'content' => 'required',
             'cover' => 'required|image|max:2048',
          ]);

          $artikel = Artikel::findOrFail($id);
          $artikel->judul_id = $request->judul_id;
           $artikel->artikel = $request->artikel;
           $artikel->content = $request->content;
           if ($request->hasFile('cover')) {
            $artikel->deleteImage();
            $image = $request->file('cover');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('image/artikel/', $name);
            $artikel->cover = $name;
        }
          $artikel->save();
          return redirect()->route('artikel.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);
        $artikel->delete();
        return redirect()->route('artikel.index');
    }
}