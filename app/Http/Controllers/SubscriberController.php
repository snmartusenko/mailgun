<?php

namespace App\Http\Controllers;

use App\models\subscriber\Subscriber;
use App\models\bunch\Bunch;
use Illuminate\Http\Request;
use App\Http\Requests\SubscriberRequest;

class SubscriberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @param  Bunch $bunch
     * @param  Subscriber $subscriber
     * @return \Illuminate\Http\Response
     */
    public function index(Bunch $bunch, Subscriber $subscriber)
    {
        $subscribers = $bunch->subscribers()->orderBy('id', 'ask')->get();
        return view('subscriber.index', compact('bunch','subscribers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  Bunch $bunch
     * @return \Illuminate\Http\Response
     */
    public function create(Bunch $bunch)
    {
        return view ('subscriber.create', compact('bunch'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Bunch $bunch
     * @param  Subscriber $subscriber
     * @param  SubscriberRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Bunch $bunch, Subscriber $subscriber, SubscriberRequest $request)
    {
        $model = $subscriber->create($request->all());
        $bunch->addSubscriber($model);
        return redirect()->route('bunch.subscriber.index', compact('bunch'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Bunch $bunch
     * @param  Subscriber $subscriber
     * @return \Illuminate\Http\Response
     */
    public function show(Bunch $bunch, Subscriber $subscriber)
    {

        return view('subscriber.show', compact('bunch','subscriber'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Bunch $bunch
     * @param  Subscriber $subscriber
     * @return \Illuminate\Http\Response
     */
    public function edit(Bunch $bunch, Subscriber $subscriber)
    {
        return view('subscriber.edit', compact('bunch','subscriber'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Bunch $bunch
     * @param  SubscriberRequest $request
     * @param  Subscriber $subscriber
     * @return \Illuminate\Http\Response
     */
    public function update(SubscriberRequest $request, Bunch $bunch, Subscriber $subscriber)
    {
        $subscriber->update($request->all());
        return redirect()->route('bunch.subscriber.index', compact('bunch'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Bunch $bunch
     * @param  Subscriber $subscriber
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bunch $bunch, Subscriber $subscriber)
    {
        $subscriber->delete();
        return redirect()->route('bunch.subscriber.index', compact('bunch'));
    }
}
