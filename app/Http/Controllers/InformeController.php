<?php

namespace App\Http\Controllers;

use App\Models\Informe;
use Illuminate\Http\Request;

/**
 * Class InformeController
 * @package App\Http\Controllers
 */
class InformeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informes = Informe::paginate();

        return view('informes.index', compact('informes'))
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
        return view('informes.create', compact('informe'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Informe::$rules);

        $informe = Informe::create($request->all());

        return redirect()->route('informes.index')
            ->with('success', 'Informe created successfully.');
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

        return view('informes.edit', compact('informe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Informe $informe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Informe $informe)
    {
        request()->validate(Informe::$rules);

        $informe->update($request->all());

        return redirect()->route('informes.index')
            ->with('success', 'Informe updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $informe = Informe::find($id)->delete();

        return redirect()->route('informes.index')
            ->with('success', 'Informe deleted successfully');
    }
}
