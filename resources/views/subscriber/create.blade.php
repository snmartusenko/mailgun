@extends('layouts.panel')

<?php
/** @var \Illuminate\Support\ViewErrorBag $errors */
?>

@section('panel')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="panel-heading container-fluid">
        <div class="form-group">
            <div class="centered-child col-md-11 col-sm-10 col-xs-10"><b>New Subscriber</b></div>
        </div>
    </div>

    <div class="panel-body">
        {!! Form::open(['route' => ['bunch.subscriber.store', $bunch,]]) !!}

        @include('subscriber._form')

        <div class="form-group">
            {!! Form::button('Create', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>

@endsection