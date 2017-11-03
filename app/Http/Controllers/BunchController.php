<?php

namespace App\Http\Controllers;

use App\models\bunch\Bunch;
use Illuminate\Http\Request;
use App\Http\Requests\BunchRequest;

class BunchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @param  Bunch $bunch
     * @return \Illuminate\Http\Response
     */
    public function index(Bunch $bunch)
    {
        $bunches = $bunch->orderBy('id', 'ask')->get();
        return view('bunch.index', compact('bunches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Bunch::class);

        return view ('bunch.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Bunch $bunch
     * @param  BunchRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Bunch $bunch, BunchRequest $request)
    {
        $bunch->create($request->all());
        return redirect()->route('bunch.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Bunch $bunch
     * @return \Illuminate\Http\Response
     */
    public function show(Bunch $bunch)
    {
        $this->authorize('view', $bunch);

        return view('bunch.show', compact('bunch'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Bunch $bunch
     * @return \Illuminate\Http\Response
     */
    public function edit(Bunch $bunch)
    {
        $this->authorize('update', $bunch);

        return view('bunch.edit', compact('bunch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BunchRequest $request
     * @param  Bunch $bunch
     * @return \Illuminate\Http\Response
     */
    public function update(BunchRequest $request, Bunch $bunch)
    {
        $this->authorize('update', $bunch);

        $bunch->update($request->all());
        return redirect()->route('bunch.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Bunch $bunch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bunch $bunch)
    {
        $this->authorize('delete', $bunch);

        $bunch->delete();
        return redirect()->route('bunch.index');
    }
}
