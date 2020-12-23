<?php

namespace App\Http\Controllers;

use App\Models\Campo;
use App\Models\TexturaDelSuelo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class CampoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        if ( ! session()->has("search")) {
            session()->put("search", null);
            session()->put("trashed", null);
        }
        $user = Auth::user();
        //si el usuario es administrador
        if($user->rol_id == 1){
            return Inertia::render("Campos/Index",[
               "filters" => session()->only(["search","trashed"]),
                // "campos" => User::with('campos')
                'campos'=> Campo::with('usuario')
                ->filter(request()->only("search","trashed"))
                ->paginate(5),
            ]);
        }else{
            return Inertia::render("Campos/Index",[
                "filters" => session()->only(["search","trashed"]),
                //  "campos" =>Auth::user()->campos
                "campos" =>Campo::with('usuario')
                ->where('user_id'.$user->id)
                 ->orderByDesc("id")
                 ->filter(request()->only("search","trashed"))
                 ->paginate(5),
            ]);
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render("Campos/Create", [
            "Texturas" => TexturaDelSuelo::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        $campo = Campo::find($id);

        return Inertia::render('Campos/Edit', [
            'Campo' =>
            [
                'id' => $campo->id,
    
            ],
            'texturas' => TexturaDelSuelo::all()
        ]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=Campo::find($id)->delete();
        return redirect()->route('campos.index')->with('success', 'campo eliminado!');
    }
}
