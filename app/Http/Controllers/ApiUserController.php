<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ApiUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $user = User::all();

        return response()->json([
            'status' => true,
            'code' => 200,
            'message' => 'Berhasil',
            'data' => $user,
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
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bycript($request->password);
        $user->save();
        return response()->json([
            'status' => true,
            'message' => 'Berhasil',
            'data' => $user,
        ], 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        if($user){
            return response()->json([
                'succes' => true,
                'message' => 'Show Data user',
                'data' => $user,
            ], 200);

        }else {
            return response()->json([
                'succes' => false,
                'message' => 'Data user tidak ditemukan',
                'data' => [],
            ], 404);
        }
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
        $user = User::find($id);
        if($user){
            return response()->json([
                'succes' => true,
                'message' => 'Show Data user',
                'data' => $user,
            ], 200);

        }else {
            return response()->json([
                'succes' => false,
                'message' => 'Data user tidak ditemukan',
                'data' => [],
            ], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if($user){
            $user->delete();
            return response()->json([
                'succes' => true,
                'message' => 'Data user berhasil dihapus',
                'data' => $user,
            ], 200);

        }else {
            return response()->json([
                'succes' => false,
                'message' => 'Data user tidak ditemukan',
                'data' => [],
            ], 404);
    }
}