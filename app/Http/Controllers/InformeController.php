<?php

namespace App\Http\Controllers;

use App\Models\Informe;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\DB;
use Illuminate\Support\Facades\Auth;

/**
 * Class InformeController
 * @package App\Http\Controllers
 */
class InformeController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-informe|crear-informe|editar-informe|borrar-informe')->only('index');
        $this->middleware('permission:crear-informe',['only'=>['create','store']]);
        $this->middleware('permission:editar-informe',['only'=>['edit','update']]);
        $this->middleware('permission:borrar-informe',['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informes = Informe::paginate(5);

        return view('informes.index', compact('informes'))
            ->with('i', (request()->input('page', 1) - 1) * $informes->perPage());
    }


    public function inf_publicos()
    {        
        $informes = Informe::where('private',0) -> paginate(5);
        return view('inf_publicos', compact('informes'))
            ->with('i', (request()->input('page', 1) - 1) * $informes->perPage());
    }

    public function inf_privados()
    {        
        // $informes = Informe::where('user_id',) -> paginate(5);

        $informes = Informe::where('user_id', Auth::user()->id) -> paginate(5);


        return view('inf_publicos', compact('informes'))
            ->with('i', (request()->input('page', 1) - 1) * $informes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $informe = new Informe();
        $users = User::pluck('name','id');
        return view('informes.create', compact('informe','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->input());
        // $campos=[
        //     'titulo'=>'required|string|max:100',
        //     'descripcion'=>'required|string|max:100',
                        
        // ];

        // $this->validate($request, $campos);
        
        $datosInforme = $request->validate([
            'titulo'=>'required|string|max:100',
            'descripcion'=>'required|string|max:100'
        ],[
            'titulo.required' => 'Este campo es requerido',
            'descripcion.required' =>'Este campo es requerido'

        ]);
 
        $datosInforme = request()->except('_token');

        
        $datosInforme['private'] = isset($request->private) ? 1 : 0; 
        if ($datosInforme['private'] === 1 and $datosInforme['user_id'] === NULL) {
           $datosInforme = $request->validate([
            'user_id'=>'required'
           ],[
            'user_id.required'=>'Es requerido seleccionar un usuario del listado'
           ]);
        }
    

        if($request->hasFile('imagen')){
            $datosInforme['imagen']=$request->file('imagen')->store('uploads','public');
            }
        if($request->hasFile('pdf')){
            $datosInforme['pdf']=$request->file('pdf')->store('uploads','public');
            }

        Informe::insert($datosInforme);

        return redirect('informes/')->with('success','Informe agregado con exito');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $informe = Informe::find($id);

        return view('informes.show', compact('informe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $informe = Informe::find($id);
        $users = User::pluck('name','id');
        return view('informes.edit', compact('informe','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Informe $informe
     * @return \Illuminate\Http\Response
     */
    // Informe $informe
    public function update(Request $request,$id)
    {
        $campos=[
            'titulo'=>'required|string|max:100',
            'descripcion'=>'required|string|max:100'
        ];
        // $mensaje=[
        //     'required'=>'El :attribute es requerido',
        //     'Foto.required'=>'La foto requerida',
        // ];

        $this->validate($request, $campos);

        $datosInforme = request()->except('_token','_method');

        if($request->hasFile('imagen')){
            $informe=Informe::findOrFail($id);
            Storage::delete('public/'.$informe->imagen);
            $datosInforme['imagen']=$request->file('imagen')->store('uploads','public');
        }
        if($request->hasFile('pdf')){
            $informe=Informe::findOrFail($id);
            Storage::delete('public/'.$informe->pdf);
            $datosInforme['pdf']=$request->file('pdf')->store('uploads','public');
        }

        Informe::where('id','=',$id)->update($datosInforme);
        $informe=Informe::findOrFail($id);

        return redirect('informes/')->with('success','Informe editado con exito');

        // request()->validate(Informe::$rules);

        // $informe->update($request->all());

        // return redirect()->route('informes.index')
        //     ->with('success', 'Informe updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $informe = Informe::findOrFail($id);
        Storage::delete('public/'.$informe->imagen);
        Storage::delete('public/'.$informe->pdf);
        $informe->delete();
        return redirect()->route('informes.index')
            ->with('success', 'Informe borrado con exito');
    }
}
