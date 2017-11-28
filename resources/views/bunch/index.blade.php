@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Bunches</div>

                    <div class="panel-body">

                        {{ link_to_route('bunch.create', 'create', null, ['class' => 'btn btn-info btn-xs']) }}

                        <table class="table table-bordered table-responsive table-striped">
                            <tr>
                                {{--<th width="5%">id</th>--}}
                                <th width="20%">Name</th>
                                <th width="60%">Description</th>
                                <th width="15%">Action</th>
                            </tr>
                            <tr>
                                <td colspan="3" class="light-green-background no-padding" title="Create new bunch">
                                    <div class="row centered-child">
                                        <div class="col-md-12">
                                            {{--{{ link_to_route('bunch.create', 'create new bunch', null, [--}}
                                            {{--'class' => 'table-cell fa-green padding-sm',--}}
                                            {{--]) }}--}}
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            @foreach ($bunches as $model)
                                <tr data-link="row">
                                    <td>{{ link_to_route('bunch.show', '', [$model->id], []) }}{{$model->name}}</td>
                                    <td>{{$model->description}}</td>
                                    <td class="rowlink-skip">
                                    {{Form::open([
                                            'class' => 'confirm-delete',
                                            'route' => ['bunch.destroy', $model->id],
                                            'method' => 'DELETE'
                                            ])}}
                                        {{ link_to_route('bunch.subscriber.index', 'subscribers',
                                            [$model->id], ['class' => 'btn btn-info btn-xs']) }}
                                        |
                                        {{ link_to_route('bunch.show', 'info',
                                            [$model->id], ['class' => 'btn btn-info btn-xs']) }}
                                        |
                                        {{ link_to_route('bunch.edit', 'edit',
                                            [$model->id], ['class' => 'btn btn-success btn-xs']) }}

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