<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\Rol;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;

use function GuzzleHttp\Promise\all;

class UserController extends Controller
{
    use PasswordValidationRules;

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
        if (!session()->has("search")) {
            session()->put("search", null);
            session()->put("trashed", null);
        }

        return Inertia::render("Usuarios/Index", [
            "filters" => session()->only(["search", "trashed"]),
            'usuarios' => User::with('rol')
                ->orderByDesc("id")
                ->filter(\request()->only("search", "trashed"))
                ->paginate(5),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render("Usuarios/Create", [
            "roles" => Rol::all() 
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
        $entrada=$request->only('name','rol_id','email','password','imagen');
   

        User::create(
            $this->validate(request(), [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'nullable'],
                'rol_id' => ['required'],
            ])
        );
        return redirect()->route('usuarios.index')->with('success', 'Usuario creado!');
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
        $user = User::find($id);

        if ($user->rol_id == 1) {
            $rol = 'Administrador';
        } else {
            $rol = 'Regular';
        }
        return Inertia::render('Usuarios/Edit', [
            'usuario' =>
            [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'password' => $user->password,
                'rol_id' => $user->rol_id,
                'rol' => $rol
            ],
            'roles' => Rol::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $entrada = $request->only('name', 'email', 'password', 'rol_id');
         Validator::make($entrada, [
            'name' => ['required', 'string', 'max:255'],
            'email' => "required|string|email|max:255|unique:users,email,".$id,
            'password' => ['required', 'string', 'nullable'],
            'rol_id' => ['required']
        ])->validate();
        User::find($id)->update($request->all());
        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id)->delete();
        return redirect()->route('usuarios.index')->with('success', 'usuario eliminado!');
    }
}
