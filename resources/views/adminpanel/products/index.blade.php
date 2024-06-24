@extends('layouts.header')
@section('content')
<div class="container">
    <div class="mt-3">
        <div class="d-flex">
            <div class="mr-auto">
                <h1 class="h3 mb-0 text-gray-800">Products</h1>
            </div>
            <div class="">
                <a href="{{url('/products/add')}}" class="btn btn-add" >Add Product</a>
            </div>
        </div>
    </div>
    <div class="mt-3">
        <div class="card">
            <table id="example"class="table table-striped table-bordered nowrap" style="width:100% ;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Project Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php 
                    $no =1;
                    @endphp
                    @foreach($products as $product)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$product->product_name}}</td>
                        <td>
                            @if($product->status == 1) <span class="service-active"> Active</span>
                            @else
                            <span class="service-inactive"> Inactive</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex action-page" >
                               
                                <form method="POST" action="{{ url('products/delete/'.$product->id) }}">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <a href="" type="submit" class="show_confirm" data-toggle="tooltip"><i class="ri-delete-bin-6-line icon-edit"  ></i></a>
                                </form>
                                </div>
                            </div>
                        </td> 
                    </tr>
                    @endforeach
                    {!! $products->withQueryString()->links('pagination::bootstrap-5') !!}
                </tbody>
            </table>
        </div>
    </div>
</div> 
@endsection