<?php

namespace App\Http\Controllers;

use App\Models\Carrucel;
use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Class CarrucelController
 * @package App\Http\Controllers
 */
class CarrucelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carr = Carrucel::paginate(5);

        return view('carrucels.index', compact('carr'))
            ->with('i', (request()->input('page', 1) - 1) * $carr->perPage());
    }
    public function welcome()
    {
        $carr = Carrucel::paginate();
        $noticias = Noticia::paginate();
        return view('welcome', compact('carr','noticias'));            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carr = new Carrucel();
        return view('carrucels.create', compact('carr'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosCarr = request()->except('_token');

        if($request->hasFile('foto')){
        $datosCarr['foto']=$request->file('foto')->store('uploads','public');
        }     
        Carrucel::insert($datosCarr);        
     
        return redirect('carrucels/')->with('success','Imagen agregada con exito');       
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $carr = Carrucel::find($id);

        return view('carrucels.show', compact('carr'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carr = Carrucel::find($id);

        return view('carrucels.edit', compact('carr'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Carrucel $carrucel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosCarr = request()->except('_token','_method');
        
        if($request->hasFile('foto')){
            $carr=Carrucel::findOrFail($id);
            Storage::delete('public/'.$carr->foto);
            $datosCarr['foto']=$request->file('foto')->store('uploads','public');            
        }       
                       
        Carrucel::where('id','=',$id)->update($datosCarr);
        $carr=Carrucel::findOrFail($id);
         
        return redirect('carrucels/')->with('success','Imagen editada con exito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        
        $carr = Carrucel::findOrFail($id);
        Storage::delete('public/'.$carr->foto);               
        $carr->delete();
        return redirect()->route('carrucels.index')
            ->with('success', 'Imagen borrada con exito');       
    }
}
