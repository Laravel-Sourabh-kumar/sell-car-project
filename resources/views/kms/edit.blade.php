@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Edit Year
                </div>
                <div class="float-end">
                    <a href="{{route('kms-driven.index')}}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
            {{ Form::model($kms, array('route' => array('kms-driven.update', $kms->id), 'method' => 'PUT','enctype'=>'multipart/form-data')) }}

                    @csrf

                    
                     
                    <div class="mb-3 row">
                        <label for="kms-driven" class="col-md-4 col-form-label text-md-end text-start">kms-driven</label>
                        <div class="col-md-6">
                        {!! Form::number('kms',null, array('placeholder' => 'kms Driven','class' => 'form-control w-100','required'=>'','maxlength'=>'4',"pattern"=>"\d{4}")) !!}
                            @if ($errors->has('kms'))
                                <span class="text-danger">{{ $errors->first('kms') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Detail</label>
                        <div class="col-md-6">
                        {!! Form::textarea('detail',null, array('placeholder' => 'Detail','class' => 'form-control w-100' )) !!}
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
     
 