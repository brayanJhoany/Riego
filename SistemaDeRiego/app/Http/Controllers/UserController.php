<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('rol.admin');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        $user=Auth::user();
        if($user->rol_id == 1){

            return Inertia::render("Usuarios/Index",[
                'usuarios'=>User::all(),
            ]);

            // if ( ! session()->has("search")) {
            //     session()->put("search", null);
            //     session()->put("trashed", null);
            // }
            // return Inertia::render("usuarios/Index", [
            //     "filters" => session()->only(["search", "trashed"]),
            //     "users"=> Auth::with('roles')->get(),
            //     "publicaciones" => User::with("rol")
            //         ->orderByDesc("id")
            //         ->filter(request()->only("search", "trashed"))
            //         ->paginate(5),
            // ]);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user=Auth::user();
        //si el usuario es administrador
        if($user->rol_id == 1){
            $usurios=User::all();
        }
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
        //
    }
}
