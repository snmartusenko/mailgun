<?php
use App\models\template\Template;
use App\models\bunch\Bunch;

?>

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Campaigns</div>

                    <div class="panel-body">

                        {{ link_to_route('campaign.create', 'create', null, ['class' => 'btn btn-info btn-xs']) }}

                        <table class="table table-bordered table-responsive table-striped">
                            <tr>
                                {{--<th width="5%">id</th>--}}
                                <th width="15%">Name</th>
                                <th width="40%">Description</th>
                                <th width="15%">Template</th>
                                <th width="15%">Bunch</th>
                                <th width="15%">Action</th>
                            </tr>
                            <tr>
                                <td colspan="3" class="light-green-background no-padding" title="Create new campaign">
                                    <div class="row centered-child">
                                        <div class="col-md-12">
                                            {{--{{ link_to_route('campaign.create', 'create new campaign', null, [--}}
                                            {{--'class' => 'table-cell fa-green padding-sm',--}}
                                            {{--]) }}--}}
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            @foreach ($campaigns as $model)
                                <tr>
{{--                                    <td>{{$model->id}}</td>--}}
                                    <td>{{$model->name}}</td>
                                    <td>{{$model->description}}</td>
                                    <td>{{Template::find($model->template_id)->name}}</td>
                                    <td>{{Bunch::find($model->bunch_id)->name}}</td>
                                    <td>
                                        {{Form::open(['class' => 'confirm-delete', 'route' => ['campaign.destroy', $model->id], 'method' => 'DELETE'])}}
                                        {{ link_to_route('campaign.show', 'info', [$model->id], ['class' => 'btn btn-info btn-xs']) }}
                                        |
                                        {{ link_to_route('campaign.edit', 'edit', [$model->id], ['class' => 'btn btn-success btn-xs']) }}
                                        {{Form::button('Delete', ['class' => 'btn btn-danger btn-xs', 'type' => 'submit'])}}
                                        {{Form::close()}}
                                    </td>

                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection