<?php

namespace App\Http\Controllers;

use App\models\template\Template;
use Illuminate\Http\Request;
use App\Http\Requests\TemplateRequest;

class TemplateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @param  Template $template
     * @return \Illuminate\Http\Response
     */
    public function index(Template $template)
    {
        $templates = $template->orderBy('id', 'ask')->get();
        return view('template.index', compact('templates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Template::class);

        return view ('template.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Template $template
     * @param  TemplateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Template $template, TemplateRequest $request)
    {
        $template->create($request->all());
        return redirect()->route('template.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Template $template
     * @return \Illuminate\Http\Response
     */
    public function show(Template $template)
    {
        $this->authorize('view', $template);

        return view('template.show', compact('template'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Template $template
     * @return \Illuminate\Http\Response
     */
    public function edit(Template $template)
    {
        $this->authorize('update', $template);

        return view('template.edit', compact('template'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TemplateRequest $request
     * @param  Template $template
     * @return \Illuminate\Http\Response
     */
    public function update(TemplateRequest $request, Template $template)
    {
        $this->authorize('update', $template);

        $template->update($request->all());
        return redirect()->route('template.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Template $template
     * @return \Illuminate\Http\Response
     */
    public function destroy(Template $template)
    {
        $this->authorize('delete', $template);

        $template->delete();
        return redirect()->route('template.index');
    }
}
