@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Edit spinnyhubs
                </div>
                <div class="float-end">
                    <a href="{{route('spinnyhubs.index')}}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
            {{ Form::model($spinnyhubs, array('route' => array('spinnyhubs.update', $spinnyhubs->id), 'method' => 'PUT','enctype'=>'multipart/form-data')) }}

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
                        <label for="address" class="col-md-4 col-form-label text-md-end text-start">Address</label>
                        <div class="col-md-6">
                        {!! Form::text('address',null, array('placeholder' => 'address','class' => 'form-control w-100','required'=>'')) !!}
                            @if ($errors->has('address'))
                                <span class="text-danger">{{ $errors->first('address') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="pincode" class="col-md-4 col-form-label text-md-end text-start">Pin Code</label>
                        <div class="col-md-6">
                        {!! Form::number('pincode',null, array('placeholder' => 'pincode','class' => 'form-control w-100','required'=>'')) !!}
                            @if ($errors->has('pincode'))
                                <span class="text-danger">{{ $errors->first('pincode') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="state" class="col-md-4 col-form-label text-md-end text-start">State</label>
                        <div class="col-md-6">
                        {!! Form::text('state',null, array('placeholder' => 'state','class' => 'form-control w-100','required'=>'')) !!}
                            @if ($errors->has('state'))
                                <span class="text-danger">{{ $errors->first('state') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="city" class="col-md-4 col-form-label text-md-end text-start">City</label>
                        <div class="col-md-6">
                        {!! Form::text('city',null, array('placeholder' => 'city','class' => 'form-control w-100','required'=>'')) !!}
                            @if ($errors->has('city'))
                                <span class="text-danger">{{ $errors->first('city') }}</span>
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
     
 