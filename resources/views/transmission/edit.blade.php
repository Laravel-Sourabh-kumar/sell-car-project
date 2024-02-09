@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Edit Transmission
                </div>
                <div class="float-end">
                    <a href="{{route('transmission.index')}}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
            {{ Form::model($transmission, array('route' => array('transmission.update', $transmission->id), 'method' => 'PUT','enctype'=>'multipart/form-data')) }}

                    @csrf

                   

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name</label>
                        <div class="col-md-6">
                        {!! Form::text('name',null, array('placeholder' => 'name','class' => 'form-control w-100','required'=>'')) !!}
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Detail</label>
                        <div class="col-md-6">
                        {!! Form::textarea('detail',null, array('placeholder' => 'Detail','class' => 'form-control w-100','required'=>'')) !!}
                            @if ($errors->has('detail'))
                                <span class="text-danger">{{ $errors->first('detail') }}</span>
                            @endif
                        </div>
                    </div>

                     
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Submit">
                    </div>

                    {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>    
@endsection

    <!-- ========== title-wrapper start ========== -->
     
 