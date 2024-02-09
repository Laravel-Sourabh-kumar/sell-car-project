@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Add Car Detail
                </div>
                <div class="float-end">
                    <a href="{{route('car-detail.index')}}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
            {!! Form::open(array('route' => 'car-detail.store','method'=>'POST','enctype'=>'multipart/form-data')) !!}
      
                    @csrf

 <div class="row">
    <div class="col-lg-6">
        <div class="mb-3 row">
            <label for="name" class="col-md-4 col-form-label text-md-end text-start">Category</label>
                <div class="col-md-8">
                {!! Form::text('category_id','', array( 'placeholder' => 'category','class' => 'form-control w-100','required'=>'',"list"=>'browsers' )) !!}
                <datalist id="browsers" >
                        @foreach ($category as $categorys)
                            <option value="{{$categorys->name}}">{{$categorys->name}}</option>
                        @endforeach
                </datalist>   
                
                
                @if ($errors->has('category_id'))
                        <span class="text-danger">{{ $errors->first('category_id') }}</span>
                    @endif
                </div>
        </div>
            

        <div class="mb-3 row">
            <label for="name" class="col-md-4 col-form-label text-md-end text-start"> Name</label>
                <div class="col-md-8">
                {!! Form::text('name','', array('placeholder' => 'name','class' => 'form-control w-100','required'=>'')) !!}
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
        </div>
            
        <div class="mb-3 row">
                        <label for="pincode" class="col-md-4 col-form-label text-md-end text-start">Pin Code</label>
                        <div class="col-md-8">
                        {!! Form::number('pincode','', array('placeholder' => 'pincode','class' => 'form-control w-100','required'=>'')) !!}
                            @if ($errors->has('pincode'))
                                <span class="text-danger">{{ $errors->first('pincode') }}</span>
                            @endif
                        </div>
                    </div>
                     
                    <div class="mb-3 row">
                        <label for="state" class="col-md-4 col-form-label text-md-end text-start">State</label>
                        <div class="col-md-8">
                        {!! Form::text('state','', array('placeholder' => 'state','class' => 'form-control w-100','required'=>'')) !!}
                            @if ($errors->has('state'))
                                <span class="text-danger">{{ $errors->first('state') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="fuel_type" class="col-md-4 col-form-label text-md-end text-start">Fuel Type</label>
                        <div class="col-md-8">
                        {!! Form::text('fuel_type','', array('placeholder' => 'fuel_type','class' => 'form-control w-100','required'=>'')) !!}
                            @if ($errors->has('fuel_type'))
                                <span class="text-danger">{{ $errors->first('fuel_type') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="body_type" class="col-md-4 col-form-label text-md-end text-start">Body Type</label>
                        <div class="col-md-8">
                        {!! Form::text('body_type','', array('placeholder' => 'body_type','class' => 'form-control w-100','required'=>'')) !!}
                            @if ($errors->has('body_type'))
                                <span class="text-danger">{{ $errors->first('body_type') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="transmission" class="col-md-4 col-form-label text-md-end text-start">Transmission</label>
                        <div class="col-md-8">
                        {!! Form::text('transmission','', array('placeholder' => 'transmission','class' => 'form-control w-100','required'=>'')) !!}
                            @if ($errors->has('transmission'))
                                <span class="text-danger">{{ $errors->first('transmission') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="color" class="col-md-4 col-form-label text-md-end text-start">Color</label>
                        <div class="col-md-8">
                        {!! Form::text('color','', array('placeholder' => 'color','class' => 'form-control w-100','required'=>'')) !!}
                            @if ($errors->has('color'))
                                <span class="text-danger">{{ $errors->first('color') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="owner" class="col-md-4 col-form-label text-md-end text-start">Owner</label>
                        <div class="col-md-8">
                        {!! Form::number('owner','', array('placeholder' => 'owner','class' => 'form-control w-100','required'=>'')) !!}
                            @if ($errors->has('owner'))
                                <span class="text-danger">{{ $errors->first('owner') }}</span>
                            @endif
                        </div>
                    </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-3 row">
            <label for="name" class="col-md-4 col-form-label text-md-end text-start">Brand</label>
                <div class="col-md-8">
                {!! Form::text('brand','', array('placeholder' => 'Brand','class' => 'form-control w-100','required'=>'',"list"=>'brands')) !!}
                <datalist id="brands" >
                        @foreach ($brand as $brands)
                            <option value="{{$brands->name}}">{{$brands->name}}</option>
                        @endforeach
                </datalist>      
                @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
        </div>
        <div class="mb-3 row">
            <label for="address" class="col-md-4 col-form-label text-md-end text-start">Address</label>
            <div class="col-md-8">
            {!! Form::text('address','', array('placeholder' => 'address','class' => 'form-control w-100','required'=>'')) !!}
                @if ($errors->has('address'))
                    <span class="text-danger">{{ $errors->first('address') }}</span>
                @endif
            </div>
        </div>
         
        <div class="mb-3 row">
                        <label for="city" class="col-md-4 col-form-label text-md-end text-start">City</label>
                        <div class="col-md-8">
                        {!! Form::text('city','', array('placeholder' => 'city','class' => 'form-control w-100','required'=>'')) !!}
                            @if ($errors->has('city'))
                                <span class="text-danger">{{ $errors->first('city') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="price" class="col-md-4 col-form-label text-md-end text-start">Price</label>
                        <div class="col-md-8">
                        {!! Form::text('price','', array('placeholder' => 'Price','class' => 'form-control w-100','required'=>'')) !!}
                            @if ($errors->has('price'))
                                <span class="text-danger">{{ $errors->first('price') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="year" class="col-md-4 col-form-label text-md-end text-start">Year</label>
                        <div class="col-md-8">
                        {!! Form::number('year','', array('placeholder' => 'year','class' => 'form-control w-100','required'=>'')) !!}
                            @if ($errors->has('year'))
                                <span class="text-danger">{{ $errors->first('year') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="kms_driven" class="col-md-4 col-form-label text-md-end text-start">Kms Driven</label>
                        <div class="col-md-8">
                        {!! Form::number('kms_driven','', array('placeholder' => 'kms_driven','class' => 'form-control w-100','required'=>'')) !!}
                            @if ($errors->has('kms_driven'))
                                <span class="text-danger">{{ $errors->first('kms_driven') }}</span>
                            @endif
                        </div>
                    </div>
                     <div class="mb-3 row">
                        <label for="seats" class="col-md-4 col-form-label text-md-end text-start">Seats</label>
                        <div class="col-md-8">
                        {!! Form::number('seats','', array('placeholder' => 'seats','class' => 'form-control w-100','required'=>'')) !!}
                            @if ($errors->has('seats'))
                                <span class="text-danger">{{ $errors->first('seats') }}</span>
                            @endif
                        </div>
                    </div>
            
                    <div class="mb-3 row">
                        <label for="rto" class="col-md-4 col-form-label text-md-end text-start">RTO</label>
                        <div class="col-md-8">
                        {!! Form::number('rto','', array('placeholder' => 'rto','class' => 'form-control w-100','required'=>'')) !!}
                            @if ($errors->has('rto'))
                                <span class="text-danger">{{ $errors->first('rto') }}</span>
                            @endif
                        </div>
                    </div>
                   
                    <div class="mb-3 row">
                        <label for="spinny_hubs" class="col-md-4 col-form-label text-md-end text-start">Spinny Hubs</label>
                        <div class="col-md-8">
                        {!! Form::number('spinny_hubs','', array('placeholder' => 'spinny_hubs','class' => 'form-control w-100','required'=>'')) !!}
                            @if ($errors->has('spinny_hubs'))
                                <span class="text-danger">{{ $errors->first('spinny_hubs') }}</span>
                            @endif
                        </div>
                    </div>
            
    </div>

</div>                    

                   
                    <div class="ml-4 mb-3 row">
                        <div class="col-md-12">
                        <label for="description" class=" col-form-label text-md-end text-start">Short Description</label>
                        
                        {!! Form::textarea('description','', array('placeholder' => 'Short Description','class' => 'form-control w-100','required'=>'',"id"=>"editor")) !!}
                            @if ($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="ml-4 mb-3 row">
                        <div class="col-md-12">
                        <label for="description" class=" col-form-label text-md-end text-start">Description</label>
                        
                        {!! Form::textarea('description','', array('placeholder' => ' Description','class' => 'form-control w-100','required'=>'',"id"=>"editor1")) !!}
                            @if ($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="ml-4 mb-3 row">
                        <div class="col-md-12">
                        <label for="description" class=" col-form-label text-md-end text-start">Features</label>
                        
                        {!! Form::textarea('features','', array('placeholder' => ' features','class' => 'form-control w-100','required'=>'',"id"=>"editor3")) !!}
                            @if ($errors->has('features'))
                                <span class="text-danger">{{ $errors->first('features') }}</span>
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
     
 