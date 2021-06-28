<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::where('tipo_usuario','<','4')->orderBy('id', 'desc')->get();
        //dd($users);
        return view('admin.users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( Request $request)
    {
        //
        if ($request->ajax()) {
            # code...
            $roles=Role::where('id',$request->role_id)->first();
            $permissions=$roles->permisos;
            return $permissions;
        }
        $roles=Role::all();
        return view('admin.users.create',['roles'=>$roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'name'=>'required|max:255',
            'email'=>'required|unique:users|email|max:255',
            'password'=>'required|between:8,255|confirmed',
            'password_confirmation'=>'required',
            'tipo_usuario'=>'required|integer',
        ]);

        $user=new User;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->tipo_usuario=$request->tipo_usuario;
        $user->password= Hash::make($request->password);
        $user->save();

        if($request->role != null){
            $user->roles()->attach($request->role);
            $user->save();
        }

        if($request->permissions != null){
            foreach ($request->permissions as $permission) {
                $user->permissions()->attach($permission);
                $user->save();
            }
        }

        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        $users=User::find($user->id);
        return view('admin.users.show',['user'=>$users]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::get();
        $userRole = $user->roles->first();
        if($userRole != null){
            $rolePermissions = $userRole->allRolePermisos;
        }else{
            $rolePermissions = null;
        }
        $userPermissions = $user->permissions;
        return view('admin.users.edit',[
            'user'=>$user,
            'userRole'=>$userRole,
            'roles'=>$roles,
            'rolePermissions'=>$rolePermissions,
            'userPermissions'=>$userPermissions,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        //dd($request);
        $request->validate([
            'name'=>'required|max:255',
            'email'=>'required|email|max:255',
            'password'=>'confirmed',
            'tipo_usuario'=>'required|integer',
        ]);
        $user->name= $request->name;
        $user->email= $request->email;
        $user->tipo_usuario= $request->tipo_usuario;
        if ($request->password != null) {
            # code...
            $user->password= Hash::make( $request->password);
        }
        $user->save();

        $user->roles()->detach();
        $user->permissions()->detach();

        if($request->role != null){
            $user->roles()->attach($request->role);
            $user->save();
        }

        if($request->permissions != null){
            foreach ($request->permissions as $permission) {
                $user->permissions()->attach($permission);
                $user->save();
            }
        }


        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        $user->roles()->detach();
        $user->permissions()->detach();
        //$user->delete();
        $user->tipo_usuario=4;
        //dd($user);
        $user->save();
        return redirect('/users');
    }
}
