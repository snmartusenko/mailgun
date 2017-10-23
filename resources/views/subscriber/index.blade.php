@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Subscriber</div>

                    <div class="panel-body">

                        {{ link_to_route('bunch.subscriber.create', 'create', ['bunch' => $bunch], ['class' => 'btn btn-info btn-xs']) }}

                        <table class="table table-bordered table-responsive table-striped">
                            <tr>
                                {{--<th width="5%">id</th>--}}
                                <th width="20%">Firstname</th>
                                <th width="30%">Lastname</th>
                                <th width="35%">Email</th>
                                <th width="15%">Action</th>
                            </tr>
                            <tr>
                                <td colspan="3" class="light-green-background no-padding" title="Create new subscriber">
                                    <div class="row centered-child">
                                        <div class="col-md-12">
                                            {{--{{ link_to_route('subscriber.create', 'create new subscriber', null, [--}}
                                            {{--'class' => 'table-cell fa-green padding-sm',--}}
                                            {{--]) }}--}}
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            @foreach ($subscribers as $model)
                                <tr>
{{--                                    <td>{{$model->id}}</td>--}}
                                    <td>{{$model->firstname}}</td>
                                    <td>{{$model->lastname}}</td>
                                    <td>{{$model->email}}</td>
                                    <td>
                                        {{Form::open([
                                            'class' => 'confirm-delete',
                                            'route' => ['bunch.subscriber.destroy', $bunch, $model->id],
                                            'method' => 'DELETE'
                                            ])}}
                                        {{ link_to_route('bunch.subscriber.show', 'info',
                                            [$bunch, $model->id], ['class' => 'btn btn-info btn-xs']) }}
                                        |
                                        {{ link_to_route('bunch.subscriber.edit', 'edit',
                                            [$bunch, $model->id], ['class' => 'btn btn-success btn-xs']) }}
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