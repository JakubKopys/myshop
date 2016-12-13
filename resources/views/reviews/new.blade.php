@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            {!! Form::open(['url'=>"products/$product->id/reviews", 'method'=>'POST', 'class'=>'form']) !!}
                <div class="form-group">
                    <textarea name="comment" required placeholder="Your review..."></textarea>
                </div>

                <div class="form-group">
                    <input id="input-id" type="text" name="rating" class="rating" data-size="xs" required>
                </div>

                {{ Form::submit('Add Review', ['class'=>'btn btn-success']) }}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection