<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ingridient;

class IngridientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingridients = Ingridient::all();

        return view('ingridienties.index', compact('ingridients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ingridienties.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'ingridient_name'=>'required|unique:ingridients'
        ]);
        $ingridient = new Ingridient([
            'ingridient_name' => $request->get('ingridient_name'),
        ]);
        $ingridient->save();
        return redirect('/home/ingridienties')->with('success', 'Stock has been added');
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
        $ingridient = Ingridient::find($id);

        return view('ingridienties.edit', compact('ingridient'));
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
        $request->validate([
            'ingridient_name'=>'unique:ingridients'
        ]);

        $ingridient = Ingridient::find($id);
        $ingridient->ingridient_name = $request->get('ingridient_name');
        $ingridient->save();

        return redirect('/home/ingridienties')->with('success', 'Stock has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ingridient = Ingridient::find($id);
        $ingridient->delete();

        return redirect('home/ingridienties')->with('success', 'Stock has been deleted Successfully');
    }
}
