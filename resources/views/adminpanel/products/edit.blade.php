@extends('layouts.header')
@section('content')
<div class="container">
    <div class="d-flex gap-2">
        <h4><a href="{{url('products')}}" class="back-arrow"><i class="ri-arrow-left-line"></i></a> Add Project</h4>
    </div>
    @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="card mt-3">
        <form id="feature-form" action="{{url('products/store')}}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="row p-3">
            <div class="col-6 mt-3">
                <label for="">Product Name <span class="required">*</span></label>
                <input type="text" class="form-control" required name="products_name">
            </div>
          
            <div class="col-6 mt-3">
                <label for="">Price</label>
                <input type="text" class="form-control" name="price">
            </div>
            <div class="col-6 mt-3">
                <label for="">Long Description</label>
                <textarea  class="form-control" name="long_description"></textarea>
            </div>
          
            <div class="col-6 mt-3">
                <label for="">Status</label>
                <select name="status" required class="form-control form-select" id="">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-6 mt-3">
                <div class="form-group">
                    <label for="product_image">Images <span class="required">*</span></label>
                    <input type="file" required class="form-control" name="product_images[]" id="product_image" multiple>
                    <label for="product_image" class="required" style="font-size: 15px"> Max size 4Mb each</label>
                </div>
                <div id="image_preview" class="mb-3"></div>

            </div>
        </div>
        
        <div class="row mb-3">
                <div class="col-11 d-flex justify-content-end" >
                    <input type="submit" class=" btn-save" value="save">
                </div>
        </div>

    </form>
    </div>
</div>

@endsection