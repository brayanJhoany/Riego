<?php

namespace App\Http\Controllers;

use App\Models\Campo;
use App\Models\TexturaDelSuelo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
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
        if (!session()->has("search")) {
            session()->put("search", null);
            session()->put("trashed", null);
        }
        $user = Auth::user();
        //si el usuario es administrador
        if ($user->rol_id == 1) {
            return Inertia::render("Campos/Index", [
                "filters" => session()->only(["search", "trashed"]),
                // "campos" => User::with('campos')
                'campos' => Campo::with('usuario')
                    ->filter(request()->only("search", "trashed"))
                    ->paginate(6),
            ]);
        } else {
            return Inertia::render("Campos/Index", [
                "filters" => session()->only(["search", "trashed"]),
                //  "campos" =>Auth::user()->campos
                "camposUsuario" => Campo::with('usuario')
                    ->where('user_id', $user->id)
                    ->orderByDesc("id")
                    ->filter(request()->only("search", "trashed"))
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

        
        $usuario = Auth::user();
        if($usuario->rol_id != 1){
            return Inertia::render("Campos/Create", [
                "texturasSuelo" => TexturaDelSuelo::all()
            ]);
        }
        return Inertia::render("Campos/Create", [
            "texturasSuelo" => TexturaDelSuelo::all(),
            "listaUsuarios" => User::all()
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
        //  return $request;
        $user = Auth::user();
        // $entradas = $request->only('nombre', 'texturaDeSuelo_id','user_id');
        $this->validate(request(), [
            'nombre' => ['required', 'string', 'max:255'], 
            'texturaDeSuelo_id' => ['required'],
            'user_id' => ['required'],
        ]);
        try {
            $campo = new Campo();
            if ($user->rol_id == 1) {
                $campo->nombre =$request['nombre'];
                $campo->texturaDeSuelo_id =$request['texturaDeSuelo_id'];
                $campo->user_id = $request['user_id'];
                $campo->save();
                return redirect()->route('campos.index')->with('success', 'Se registro el campo exitosamente!');
            } else {
                $campo->nombre =$request['nombre'];
                $campo->texturaDeSuelo_id =$request['texturaDeSuelo_id'];
                $campo->user_id =$user->id;
                $campo->save();
                return redirect()->route('campos.index')->with('success','Se registro el campo exitosamente!');
            }
               
        } catch (\Illuminate\Database\QueryException $ex) {
            //return redirect()->route('campos.index')->with('error', 'error en los datos');
        }
        
         
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
        $user = Auth::user();
        $campo = Campo::find($id);
        //si el usuario en la aplicacion es administrador
        // necesitamos enviarle la lista de usuario.
        if ($user->rol_id == 1) {
            return Inertia::render('Campos/Edit', [
                'campo' =>
                [
                    'id' => $campo->id,
                    'nombre' =>$campo->nombre,
                    'user_id' =>$campo->user_id,
                    'texturaDeSuelo_id' =>$campo->texturaDeSuelo_id,
                ],
                'listaUsuarios' => User::all(),
                'texturasSuelo' =>TexturaDelSuelo::all()
            ]);

        } else {
            return Inertia::render('Campos/Edit', [
                'campo' =>
                [
                    'id' => $campo->id,
                    'nombre' => $campo->nombre,
                    'user_id' => $campo->user_id,
                    'texturaDeSuelo_id' => $campo->texturaDeSuelo_id,
                ],
                'texturasSuelo' =>TexturaDelSuelo::all()
            ]);
        }
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
        $entrada = $request->only('id', 'nombre', 'texturaDeSuelo_id', 'user_id');
         Validator::make($entrada, [
            'id' => ['required'],
            'nombre' => "required|string|max:255",
            'texturaDeSuelo_id' => ['required'],
            'user_id' => ['required']
        ])->validate();
        Campo::find($id)->update($request->all());
        return redirect()->route('campos.index')->with('success', 'Se modifico la información del campo exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Campo::find($id)->delete();
        return redirect()->route('campos.index')->with('success', 'campo eliminado!');
    }
}
