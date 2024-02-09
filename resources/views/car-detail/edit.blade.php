@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Edit RTO
                </div>
                <div class="float-end">
                    <a href="{{route('rto.index')}}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
            {{ Form::model($rto, array('route' => array('rto.update', $rto->id), 'method' => 'PUT','enctype'=>'multipart/form-data')) }}

                    @csrf

                   
            
                    <div class="mb-3 row">
                        <label for="rto_full_name" class="col-md-4 col-form-label text-md-end text-start">RTO Full Name</label>
                        <div class="col-md-6">
                        {!! Form::text('rto_full_name',null, array('placeholder' => 'rto_full_name','class' => 'form-control w-100','required'=>'')) !!}
                            @if ($errors->has('rto_full_name'))
                                <span class="text-danger">{{ $errors->first('rto_full_name') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="rto_short_name" class="col-md-4 col-form-label text-md-end text-start">RTO Short Name</label>
                        <div class="col-md-6">
                        {!! Form::text('rto_short_name',null, array('placeholder' => 'rto_short_name','class' => 'form-control w-100','required'=>'')) !!}
                            @if ($errors->has('rto_short_name'))
                                <span class="text-danger">{{ $errors->first('rto_short_name') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="rto_address" class="col-md-4 col-form-label text-md-end text-start">RTO Address</label>
                        <div class="col-md-6">
                        {!! Form::text('rto_address',null, array('placeholder' => 'rto_address','class' => 'form-control w-100','required'=>'')) !!}
                            @if ($errors->has('rto_address'))
                                <span class="text-danger">{{ $errors->first('rto_address') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="rto_pincode" class="col-md-4 col-form-label text-md-end text-start">RTO Pin Code</label>
                        <div class="col-md-6">
                        {!! Form::number('rto_pincode',null, array('placeholder' => 'rto_pincode','class' => 'form-control w-100','required'=>'')) !!}
                            @if ($errors->has('rto_pincode'))
                                <span class="text-danger">{{ $errors->first('rto_pincode') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="rto_state" class="col-md-4 col-form-label text-md-end text-start">RTO State</label>
                        <div class="col-md-6">
                        {!! Form::text('rto_state',null, array('placeholder' => 'rto_state','class' => 'form-control w-100','required'=>'')) !!}
                            @if ($errors->has('rto_state'))
                                <span class="text-danger">{{ $errors->first('rto_state') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="rto_city" class="col-md-4 col-form-label text-md-end text-start">RTO City</label>
                        <div class="col-md-6">
                        {!! Form::text('rto_city',null, array('placeholder' => 'rto_city','class' => 'form-control w-100','required'=>'')) !!}
                            @if ($errors->has('rto_city'))
                                <span class="text-danger">{{ $errors->first('rto_city') }}</span>
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
     
 