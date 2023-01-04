<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Class NoticiaController
 * @package App\Http\Controllers
 */
class NoticiaController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-noticia|crear-noticia|editar-noticia|borrar-noticia')->only('index');
        $this->middleware('permission:crear-noticia',['only'=>['create','store']]);
        $this->middleware('permission:editar-noticia',['only'=>['edit','update']]);
        $this->middleware('permission:borrar-noticia',['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticias = Noticia::paginate(5);

        return view('noticias.index', compact('noticias'))
            ->with('i', (request()->input('page', 1) - 1) * $noticias->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $noticia = new Noticia();
        return view('noticias.create', compact('noticia'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosNoticia = request()->except('_token');
        
        if($request->hasFile('imagen')){
            $datosNoticia['imagen']=$request->file('imagen')->store('uploads','public');
            }
        
        Noticia::insert($datosNoticia);      
         
        $campos=[
            'titulo'=>'required|string|max:100',
            'descripcion'=>'required|string|max:100'          
        ];
        
        $this->validate($request, $campos);
        
        // Recolectame todos los datos que te envien del formulario, excepto token
        
        
        return redirect('noticias/')->with('success','Noticia creada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $noticia = Noticia::find($id);

        return view('noticias.show', compact('noticia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $noticia = Noticia::find($id);

        return view('noticias.edit', compact('noticia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Noticia $noticia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'titulo'=>'required|string|max:100',
            'descripcion'=>'required|string|max:100'          
        ];

        $this->validate($request, $campos);

        $datosNoticia = request()->except('_token','_method');
        
        if($request->hasFile('imagen')){
            $noticia=Noticia::findOrFail($id);
            Storage::delete('public/'.$noticia->imagen);
            $datosNoticia['imagen']=$request->file('imagen')->store('uploads','public');            
        }
                               
        Noticia::where('id','=',$id)->update($datosNoticia);
        $noticia=Noticia::findOrFail($id);
         
        return redirect('noticias/')->with('success','Noticia editada con exito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $noticia = Noticia::findOrFail($id);
        Storage::delete('public/'.$noticia->imagen);
        Storage::delete('public/'.$noticia->pdf);       
        $noticia->delete();
        return redirect()->route('noticias.index')
            ->with('success', 'Noticia borrada con exito');
    }
}
