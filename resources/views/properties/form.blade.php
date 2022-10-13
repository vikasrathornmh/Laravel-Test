@extends('layouts.app')
@section('content')

<div class="row">
<div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">{{ $property ? 'Edit' : 'Create' }} Property</h4>
                  <form enctype='multipart/form-data' class="forms-sample" action="{{ $property ? route('property.update', $property->id) : route('property.store')}} "  method="POST">
                  {{csrf_field()}}
                  @if($property)
                    @method('PUT')
                  @endif
                    <div class="form-group">
                      <label for="County">County</label>
                      <input type="text" class="form-control" name="county" placeholder="County" value="{{ $property ? $property->county : '' }}">
                        @if($errors->has('county'))
                            <div class="error">{{ $errors->first('county') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                      <label for="Country">Country</label>
                      <input type="text" class="form-control" name="country" placeholder="Country"  value="{{ $property ? $property->country : '' }}">
                      @if($errors->has('country'))
                            <div class="error">{{ $errors->first('country') }}</div>
                      @endif
                    </div>
                    <div class="form-group">
                      <label for="Town">Town</label>
                      <input type="text" class="form-control" name="town" placeholder="Town"  value="{{ $property ? $property->town : '' }}">
                      @if($errors->has('town'))
                            <div class="error">{{ $errors->first('town') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                      <label for="Postcode">Postcode</label>
                      <input type="text" class="form-control" name="postcode" placeholder="Postcode"  value="{{ $property ? $property->postcode : '' }}">
                      @if($errors->has('postcode'))
                            <div class="error">{{ $errors->first('postcode') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                      <label for="Description">Description</label>
                      <textarea class="form-control" name="description" rows="4">{{ $property ? $property->description : '' }}</textarea>
                      @if($errors->has('description'))
                            <div class="error">{{ $errors->first('description') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                      <label for="address">Displayable Address</label>
                      <input type="text" class="form-control" name="address" placeholder="Address"  value="{{ $property ? $property->address : '' }}">
                      @if($errors->has('address'))
                            <div class="error">{{ $errors->first('address') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                      <label for="image">Image</label>
                      <input type="file" class="form-control" name="image_full">
                      @if($errors->has('image_full'))
                            <div class="error">{{ $errors->first('image_full') }}</div>
                        @endif
                    </div>
                    
                    <div class="form-group">
                      <label for="bedrooms">Number of bedrooms</label>
                      <input type="text" class="form-control" name="num_bedrooms" placeholder="Number of bedrooms"  value="{{ $property ? $property->num_bedrooms : '' }}">
                      @if($errors->has('num_bedrooms'))
                            <div class="error">{{ $errors->first('num_bedrooms') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                      <label for="bathrooms">Number of bathrooms</label>
                      <input type="text" class="form-control" name="num_bathrooms" placeholder="Number of bathrooms"  value="{{ $property ? $property->num_bathrooms : '' }}">
                      @if($errors->has('num_bathrooms'))
                            <div class="error">{{ $errors->first('num_bathrooms') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                      <label for="Price">Price</label>
                      <input type="text" class="form-control" name="price" placeholder="price"  value="{{ $property ? $property->price : '' }}">
                      @if($errors->has('price'))
                            <div class="error">{{ $errors->first('price') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                      <label for="property_type">Property Type</label>
                      <select name="property_type_id" class="form-control">
                        @if($property_types)
                         @foreach($property_types as $key=>$property_type)
                            <option value="{{$property_type->id}}"  @if($property && $property_type->id == $property->property_type_id ) {{'selected'}} @endif>{{$property_type->title}}</option>
                         @endforeach
                        @endif
                      </select>
                      @if($errors->has('property_type_id'))
                            <div class="error">{{ $errors->first('property_type_id') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-form-label">Type</label>
                        <div class="col-sm-4">
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="type" value="sale" @if($property && $property->type == 'sale' ) {{'checked'}} @endif>
                            For Sale
                            <i class="input-helper"></i></label>
                        </div>
                        </div>
                        <div class="col-sm-5">
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="type" value="rent"  @if($property && $property->type == 'rent' ) {{'checked'}} @endif>
                            For Rent
                            <i class="input-helper"></i></label>
                        </div>
                        </div>
                        @if($errors->has('type'))
                            <div class="error">{{ $errors->first('type') }}</div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
</div>
<style>
    .error{
        color:red;
    }
</style>
@endsection