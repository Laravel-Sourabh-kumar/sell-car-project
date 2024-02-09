@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Add Color
                </div>
                <div class="float-end">
                    <a href="{{route('color.index')}}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
            {!! Form::open(array('route' => 'color.store','method'=>'POST','enctype'=>'multipart/form-data')) !!}
      
                    @csrf

 
            
                    <div class="mb-3 row">
                        <label for="color_name" class="col-md-4 col-form-label text-md-end text-start">Color Name</label>
                        <div class="col-md-6">
                        {!! Form::text('color_name','', array('placeholder' => 'color_name','class' => 'form-control w-100','required'=>'')) !!}
                            @if ($errors->has('color_name'))
                                <span class="text-danger">{{ $errors->first('color_name') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="color_code" class="col-md-4 col-form-label text-md-end text-start">Color Code</label>
                        <div class="col-md-6">
                        {!! Form::textarea('color_code','', array('placeholder' => 'color code','class' => 'form-control w-100','required'=>'')) !!}
                            @if ($errors->has('color_code'))
                                <span class="text-danger">{{ $errors->first('color_code') }}</span>
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
     
 