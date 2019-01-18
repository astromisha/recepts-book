<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Recept;
use App\Ingridient;
use App\Recept_Ingridient;
use Illuminate\Support\Facades\Input;

class ReceptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recepties = Recept::all()->where('user_id', Auth::id());

        return view('recepties.index', compact('recepties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ingridients = Ingridient::all();

        return view('recepties.create', compact('countIngridientsType', 'ingridients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'recept_name' => 'required',
            'recept_description' => 'required',
            'recept_short_description' => 'required'
        ]);

        $ingridients = Input::get('ingridients');
        $ingridientsCount = Input::get('ingridient_count');

        $recept = new Recept([
            'user_id' => Auth::id(),
            'recept_name' => $request->get('recept_name'),
            'recept_description' => $request->get('recept_description'),
            'recept_short_description' => $request->get('recept_short_description'),
        ]);

        $recept->save();

        foreach ($ingridients as $key => $n) {
            $receptIngridient = new Recept_Ingridient([
                'recept_id' => $recept->id,
                'ingridient_name' => $ingridients[$key],
                'ingridient_count' => $ingridientsCount[$key]
            ]);

            $receptIngridient->save();
        }

        return redirect('/home/recepties')->with('success', 'Stock has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ingridients = Ingridient::all();
        $receptIngridient = Recept_Ingridient::all()->where('recept_id', $id);
        $recept = Recept::find($id);

        return view('recepties.show', compact('recept', 'ingridients', 'receptIngridient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ingridients = Ingridient::all();
        $receptIngridient = Recept_Ingridient::all()->where('recept_id', $id);
        $recept = Recept::find($id);

        return view('recepties.edit', compact('recept', 'ingridients', 'receptIngridient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $ingridients = Input::get('ingridients');
        $ingridientsCount = Input::get('ingridient_count');

        $recept = Recept::find($id);

        if ($request->get('recept_name')) {
            $request->validate([
                'recept_name' => 'required',
                'recept_description' => 'required',
                'recept_short_description' => 'required'
            ]);

            $recept->recept_name = $request->get('recept_name');
            $recept->recept_description = $request->get('recept_description');
            $recept->recept_short_description = $request->get('recept_short_description');

            $recept->save();
        }

        $receptsIngridients = DB::table('recept__ingridients')->where('recept_id', $recept->id)->get();

        foreach ($receptsIngridients as $key => $receptIngridient) {
            if ($request->get('recept_name')) {
                DB::table('recept__ingridients')->where('id', $receptsIngridients[$key]->id)->update([
                    'ingridient_name' => $ingridients[$key],
                    'ingridient_count' => $ingridientsCount[$key]
                ]);
            } else {
                DB::table('recept__ingridients')->where('id', $receptsIngridients[$key]->id)->update([
                    'ingridient_count' => $ingridientsCount[$key]
                ]);
            }
        }

        return redirect('/home/recepties')->with('success', 'Stock has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recipe = Recept::find($id);
        $recipe->delete();

        return redirect('home/recepties')->with('success', 'Stock has been deleted Successfully');
    }
}
