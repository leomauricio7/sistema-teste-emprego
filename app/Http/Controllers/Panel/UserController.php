<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{

    public function index(){
        $users = User::all();
        return view('panel.users.index', compact('users'));
    }

    public function create(){
        return view('panel.users.create');
    }

    public function store(Request $request,User $user){
    
        $this->validate($request, $user->rules);
        
        $request['password'] = bcrypt($request->input('password'));
        $save = $user->create($request->all());
        if ($save)
        return redirect()
                    ->route('panel.users.index')
                    ->with('success', 'Cliente cadastrado com sucesso!');
        return redirect()
                    ->back()
                    ->with('error', 'Falha ao cadastrar cliente');
    }
    
    public function show(){
       
    }
    
    public function edit($id){
        $user = User::findOrFail($id);
        return view('panel.users.edit', compact('user'));
    }

    public function profile(){
        $user = User::findOrFail(Auth()->user()->id);
        return view('panel.profile.index', compact('user'));
    }

    
    public function update(Request $request){
        //$user = User::findOrFail($id);
        $user = User::findOrFail(Auth()->user()->id);
        $update = $user->update([
            'name'  => $request->input('name'),
            'email' => $request->input('email')
        ]);
        if ($update)
        return redirect()
                    ->route('panel.profile.index')
                    ->with('success', 'Cliente editado com sucesso!');
        return redirect()
                    ->back()
                    ->with('error', 'Falha ao editar cliente');

    }

    public function resetPassword(){
        return view('panel.users.reset_password');
    }

    public function reset(Request $request){
        $user = User::find(Auth()->user()->id);
        $update = $user->update([
            'password' => bcrypt($request->input('password'))
        ]);
        if ($update)
        return redirect()
                    ->route('panel.users.index')
                    ->with('success', 'Senha editada com sucesso!');
        return redirect()
                    ->back()
                    ->with('error', 'Falha ao editar senha');

    }
    
    public function destroy($id,User $user){
        $delete = $user->find($id);
        $delete->delete();
        if ($delete)
        return redirect()
                    ->route('panel.users.index')
                    ->with('success', 'Cliente excluido com sucesso!');
        return redirect()
                    ->route('panel.users.index')
                    ->with('error', 'Falha ao excluir cliente');
    }
}
