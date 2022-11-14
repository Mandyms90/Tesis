<?php

namespace App\Http\Controllers;

use App\Models\Carrucel;
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
        $carruceles = Carrucel::paginate();

        return view('carrucels.index', compact('carruceles'))
            ->with('i', (request()->input('page', 1) - 1) * $carruceles->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carrucel = new Carrucel();
        return view('carrucels.create', compact('carrucel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Carrucel::$rules);

        $carrucel = Carrucel::create($request->all());

        return redirect()->route('carrucels.index')
            ->with('success', 'Carrucel created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $carrucel = Carrucel::find($id);

        return view('carrucels.show', compact('carrucel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carrucel = Carrucel::find($id);

        return view('carrucels.edit', compact('carrucel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Carrucel $carrucel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carrucel $carrucel)
    {
        request()->validate(Carrucel::$rules);

        $carrucel->update($request->all());

        return redirect()->route('carrucels.index')
            ->with('success', 'Carrucel updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $carrucel = Carrucel::find($id)->delete();

        return redirect()->route('carrucels.index')
            ->with('success', 'Carrucel deleted successfully');
    }
}
