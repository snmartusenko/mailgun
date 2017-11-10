<?php

namespace App\Http\Controllers;

use App\models\campaign\Campaign;
use Illuminate\Http\Request;
use App\Http\Requests\CampaignRequest;

class CampaignController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @param  Campaign $campaign
     * @return \Illuminate\Http\Response
     */
    public function index(Campaign $campaign)
    {
        $campaigns = $campaign->orderBy('id', 'ask')->get();
        return view('campaign.index', compact('campaigns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Campaign::class);

        return view ('campaign.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Campaign $campaign
     * @param  CampaignRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Campaign $campaign, CampaignRequest $request)
    {
        $campaign->create($request->all());
        return redirect()->route('campaign.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Campaign $campaign
     * @return \Illuminate\Http\Response
     */
    public function show(Campaign $campaign)
    {
        $this->authorize('view', $campaign);

        return view('campaign.show', compact('campaign'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Campaign $campaign
     * @return \Illuminate\Http\Response
     */
    public function edit(Campaign $campaign)
    {
        $this->authorize('update', $campaign);

        return view('campaign.edit', compact('campaign'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CampaignRequest $request
     * @param  Campaign $campaign
     * @return \Illuminate\Http\Response
     */
    public function update(CampaignRequest $request, Campaign $campaign)
    {
        $this->authorize('update', $campaign);

        $campaign->update($request->all());
        return redirect()->route('campaign.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Campaign $campaign
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campaign $campaign)
    {
        $this->authorize('delete', $campaign);

        $campaign->delete();
        return redirect()->route('campaign.index');
    }

    public function send(Campaign $campaign)
    {
        $this->authorize('send', $campaign);

        return $campaign->send();
    }
}
