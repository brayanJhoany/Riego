<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\Rol;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Illuminate\Validation\Rule;
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
        $entrada = $request->only('name', 'email', 'password', 'rol_id', 'profile_photo_path');
        //VALIDACIONES
        $this->validate(request(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'nullable'],
            'rol_id' => ['required'],
            'profile_photo_path' => ['nullable', 'image', 'max:8192']
        ]);

        try {
            if ($request->hasFile('profile_photo_path')) {
                // Si es así , almacenamos en la carpeta public/avatars
                // esta estará dentro de public/defaults/
                $imagen = $request->profile_photo_path->store('public/profile-photos');
                $url = Storage::url($imagen);
            }
            $user = new User();
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->password = bcrypt($request['password']);
            $user->rol_id = $request['rol_id'];
            $user->profile_photo_path = $url;
            $user->save();
            return redirect()->route('usuarios.index')->with('success', 'Usuario creado!');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->route('usuarios.index')->with('error', 'error al crear el usuario');
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
        $user = User::find($id);

        return Inertia::render('Usuarios/Edit', [
            'usuario' =>
            [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'password' => null,
                'rol_id' => $user->rol_id,
                'profile_photo_path' =>$user->profile_photo_path
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
    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'name' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'string', 'email', 'max:255',  Rule::unique('users')->ignore($id)],
            'password' => ['nullable', 'string', 'nullable'],
            'rol_id' => ['nullable'],
            'profile_photo_path' => ['nullable', 'image', 'max:8192']
        ]);

        try {
            $url=null;
            if ($request->hasFile('profile_photo_path')) {
                // Si es así , almacenamos en la carpeta public/avatars
                // esta estará dentro de public/defaults/
                $imagen = $request->profile_photo_path->store('public/profile-photos');
                $url = Storage::url($imagen);
            }
            $user = User::find($id);
            if($request->name != null){
                $user->name = $request['name'];
            }
            if($request->email != null){
                $user->email = $request['email'];
            }
            if($request->name != null){
                $user->name = $request['name'];
            }
            if($request->password != null){
                $user->password = bcrypt($request['password']);
            }
            if($request->rol_id != null){
                $user->rol_id = $request['rol_id'];
            }
            if($request->profile_photo_path != null){
                $user->profile_photo_path = $url;
            }

            $user->save();
            return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado!');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->route('usuarios.index')->with('error', 'error al actualizado el usuario');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id)->delete();
        return redirect()->route('usuarios.index')->with('success', 'usuario eliminado!');
    }
}
