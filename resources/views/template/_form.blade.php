<div class="form-group">
    {!!Form::label('name', 'Name') !!}
    {!!Form::text('name', null, ['class' => 'form-control']) !!}

    {!!Form::label('content', 'Content') !!}
    {!!Form::textarea('content', null, ['class' => 'form-control', 'name' => 'content' , 'id' => 'editor1']) !!}
</div>