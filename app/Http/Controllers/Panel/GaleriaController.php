<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Galeria;
use App\Models\Imagem;
use App\User;

class GaleriaController extends Controller
{
    public function index()
    {
        $galerias = User::find(Auth()->user()->id)->galerias;
        //dd($galerias);
        return view('panel.galeria.index', compact('galerias'));
    }

    public function create()
    {
        return view('panel.galeria.create');
    }

    public function store(Request $request, Galeria $galeria)
    {

        $this->validate($request, $galeria->rules);

        $request['id_user'] = Auth()->user()->id;
        unset($request['images']);
        //dd($request->all());
        $save = $galeria->create($request->all());
        if ($save)
            return redirect()
                ->route('panel.galeria.index')
                ->with('success', 'Galeria cadastrada com sucesso!');
        return redirect()
            ->back()
            ->with('error', 'Falha ao cadastrar galeria');
    }

    public function show($id)
    {
        $galeria = Galeria::find($id);
        $images = $galeria->imagems;
        $data = date('Y-m-d');
        return view('panel.galeria.show', compact('galeria', 'images', 'data'));
    }

    public function images(Request $request, $galeria)
    {
        $request['id_galeria'] = $galeria;

        $this->validate($request, [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);

        if ($request->hasfile('images')) {

            foreach ($request->file('images') as $image) {
                $name = kebab_case($image->getClientOriginalName());
                $image->move(public_path() . '/galeria/'.$galeria.'/', $name);
                Imagem::create(['image'=>$name, 'id_galeria'=>$galeria]);
            }
        }
        return back()->with('success', 'Imagens salvas com sucesso.');
    }

    public function edit($id)
    {
        $galeria = Galeria::findOrFail($id);
        return view('panel.galeria.edit', compact('galeria'));
    }

    public function update(Request $request, $id)
    {
        $galeria = Galeria::findOrFail($id);
        $update = $galeria->update([
            'title'  => $request->input('title'),
            'description' => $request->input('description')
        ]);
        if ($update)
            return redirect()
                ->route('panel.galeria.index')
                ->with('success', 'Galeria editada com sucesso!');
        return redirect()
            ->back()
            ->with('error', 'Falha ao editar galeria');
    }

    public function resetPassword()
    {
        return view('panel.galeria.reset_password');
    }

    public function reset(Request $request)
    {
        $user = User::find(Auth()->user()->id);
        $update = $user->update([
            'password' => bcrypt($request->input('password'))
        ]);
        if ($update)
            return redirect()
                ->route('panel.galeria.index')
                ->with('success', 'Senha editada com sucesso!');
        return redirect()
            ->back()
            ->with('error', 'Falha ao editar senha');
    }

    public function destroy($id)
    {
        $galeria = Galeria::find($id);
        $delete = $galeria->delete();
        if ($delete)
            return redirect()
                ->route('panel.galeria.index')
                ->with('success', 'Cliente excluido com sucesso!');
        return redirect()
            ->route('panel.galeria.index')
            ->with('error', 'Falha ao excluir cliente');
    }
}
