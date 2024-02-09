@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Edit Brand
                </div>
                <div class="float-end">
                    <a href="{{route('brand.index')}}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
            {{ Form::model($brand, array('route' => array('brand.update', $brand->id), 'method' => 'PUT','enctype'=>'multipart/form-data')) }}

                    @csrf

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Image</label>
                        <div class="col-md-6">
                        {!! Form::file('image', array('placeholder' => 'image','class' => 'form-control w-100', )) !!}
                         <input type="hidden" value="{{$brand->image}}" name="image">
                        @if ($errors->has('image'))
                                <span class="text-danger">{{ $errors->first('image') }}</span>
                            @endif
                        </div>
                        <div class="col-md-2">
                            <img src="{{asset('storage/'.$brand->image)}}" style="width:100%; height:100px;">
                        </div>
                    </div>

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
     
 