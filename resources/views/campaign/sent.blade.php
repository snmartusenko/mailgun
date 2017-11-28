<?php
use App\models\template\Template;
use App\models\bunch\Bunch;

$models = $campaign->bunch->subscribers;
?>

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">

                <div class="panel panel-default">
                    <div class="panel-heading">The next Subscribers will receive the message:</div>

                    <div class="panel-body">

                        <table class="table table-bordered table-responsive table-striped">
                            <tr>
                                <th width="25%">Firstname</th>
                                <th width="30%">Lastname</th>
                                <th width="45%">Email</th>
                            </tr>
                            <tr>
                                <td colspan="3" class="light-green-background no-padding" title="Create new campaign">
                                    <div class="row centered-child">
                                        <div class="col-md-12">
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            @foreach ($models as $model)
                                <tr>
                                    <td>{{$model->firstname}}</td>
                                    <td>{{$model->lastname}}</td>
                                    <td>{{$model->email}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>

                    <div class="panel-body">

                        <a class="btn btn-info btn-xs col-md-1 col-sm-2 col-xs-2" href="{{route('campaign.index')}}">
                            <i class="fa fa-success" aria-hidden="true"></i> OK
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection