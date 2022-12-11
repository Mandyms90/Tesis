<?php

namespace App\Http\Controllers;

use App\Models\Boletin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Class BoletineController
 * @package App\Http\Controllers
 */
class BoletinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $boletines = Boletin::paginate(5);

        return view('boletines.index', compact('boletines'))
            ->with('i', (request()->input('page', 1) - 1) * $boletines->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $boletin = new Boletin();
        return view('boletines.create', compact('boletin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos=[
            'titulo'=>'required|string|max:100',
            'descripcion'=>'required|string|max:100',          
        ];
        
        $this->validate($request, $campos);

        
        // Recolectame todos los datos que te envien del formulario, excepto token
        
        $datosBoletin = request()->except('_token');
        
        if($request->hasFile('imagen')){
            $datosBoletin['imagen']=$request->file('imagen')->store('uploads','public');
            }
        if($request->hasFile('pdf')){
            $datosBoletin['pdf']=$request->file('pdf')->store('uploads','public');
            }
        
        Boletin::insert($datosBoletin);        
        
        return redirect('boletines/')->with('success','Boletín agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $boletin = Boletin::find($id);

        return view('boletines.show', compact('boletin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $boletin = Boletin::find($id);

        return view('boletines.edit', compact('boletin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Boletin $boletin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'titulo'=>'required|string|max:100',
            'descripcion'=>'required|string|max:100'          
        ];
                            
        $this->validate($request, $campos);

        $datosBoletin = request()->except('_token','_method');
        
        if($request->hasFile('imagen')){
            $boletin=Boletin::findOrFail($id);
            Storage::delete('public/'.$boletin->imagen);
            $datosBoletin['imagen']=$request->file('imagen')->store('uploads','public');            
        }
        if($request->hasFile('pdf')){
            $boletin=Boletin::findOrFail($id);
            Storage::delete('public/'.$boletin->pdf);
            $datosBoletin['pdf']=$request->file('pdf')->store('uploads','public');            
        }
                       
        Boletin::where('id','=',$id)->update($datosBoletin);
        $boletin=Boletin::findOrFail($id);
         
        return redirect('boletines/')->with('success','Boletín editado con exito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $boletin = Boletin::findOrFail($id);
        Storage::delete('public/'.$boletin->imagen);
        Storage::delete('public/'.$boletin->pdf);       
        $boletin->delete();
        return redirect()->route('boletines.index')
            ->with('success', 'Boletín borrado con exito');
    }
}
