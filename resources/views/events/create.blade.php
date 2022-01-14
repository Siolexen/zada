@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card-header">Event</div>
                <div class="card-body">
                {!! Form::open(['route' => ['events.store'], 'method' => 'POST']) !!}

                <!-- name -->
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Nazwa</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('messages.Status') }} API</label>

                        <div class="col-md-6">
                            {!! Form::select('status', array('active' => 'active', 'inactive' => 'inactive'), null, ['class' => 'form-control']) !!}
                        </div>
                    </div>



                    <div class="form-group row">
                        <label for="api_key" class="col-md-4 col-form-label text-md-right">Start</label>

                        <div class="col-md-6">
                            <input id="start" type="datetime-local" class="form-control" name="start" >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="api_key" class="col-md-4 col-form-label text-md-right">End</label>

                        <div class="col-md-6">
                            <input type="datetime-local" id="end" type="text" class="form-control"  name="end" >

                        </div>
                    </div>

                    <!-- buttons -->
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('messages.Add') }}
                            </button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
