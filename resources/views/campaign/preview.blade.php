<?php
use App\models\template\Template;
use App\models\bunch\Bunch;
use App\Mail\SendCampaign;

$subject = $campaign->name . ' (' . $campaign->description . ')';
$bunch = $campaign->bunch;
$models = $bunch->subscribers;

$to = [];
$emails = [];
foreach (
    $models as $model) {
    $emails[] = $model->email;
}
$to = implode(', ', $emails);

$domain = $_ENV['MAILGUN_DOMAIN'];
$message = $campaign->template->content;

?>

@extends('layouts.app')

@section('content')
    <div class="row">

        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">
                <div class="panel-heading">Campaign preview:</div>

                <div class="panel-body">

                    <table class="table table-bordered table-responsive table-striped">
                        <tr>
                            <td width="25%">Subject</td>
                            <td>{{$subject}}</td>
                        </tr>
                        <tr>
                            <td width="25%">To</td>
                            <td>{{$to}}</td>
                        </tr>
                        <tr>
                            <td width="25%">From</td>
                            <td>{{$domain}}</td>
                        </tr>
                        <tr>
                            <td width="25%">Message</td>
                            <td>{{$message}}</td>
                        </tr>
                    </table>
                </div>

                <div class="panel-body">

                    <a class="btn btn-info btn-xs col-md-1 col-sm-2 col-xs-2"
                       href="{{route('campaign.index')}}">
                        <i class="fa fa-backward" aria-hidden="true"></i> Cancel
                    </a>
                    <div class="col-md-1 col-sm-2 col-xs-2">
                        {{ link_to_route('campaign.send', '-> Send <-', [$campaign->id], ['class' => 'btn btn-danger btn-xs']) }}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection