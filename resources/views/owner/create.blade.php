@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Add Owner
                </div>
                <div class="float-end">
                    <a href="{{route('owner.index')}}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
            {!! Form::open(array('route' => 'owner.store','method'=>'POST','enctype'=>'multipart/form-data')) !!}
      
                    @csrf

 
            
                    <div class="mb-3 row">
                        <label for="owner_type" class="col-md-4 col-form-label text-md-end text-start">Owner Type</label>
                        <div class="col-md-6">
                        {!! Form::text('owner_type','', array('placeholder' => 'owner_type','class' => 'form-control w-100','required'=>'')) !!}
                            @if ($errors->has('owner_type'))
                                <span class="text-danger">{{ $errors->first('owner_type') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="owner_detail" class="col-md-4 col-form-label text-md-end text-start">Owner Detail</label>
                        <div class="col-md-6">
                        {!! Form::textarea('owner_detail','', array('placeholder' => 'owner_Detail','class' => 'form-control w-100' )) !!}
                            @if ($errors->has('owner_detail'))
                                <span class="text-danger">{{ $errors->first('owner_detail') }}</span>
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
     
 