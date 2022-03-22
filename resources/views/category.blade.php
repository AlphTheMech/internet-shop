@extends('layouts.master')

@section('title', __('main.category') . $category->__('name'))

@section('content')
    <h1>
        {{ $category->__('name') }}
    </h1>
    <p>
        {{ $category->__('description') }}
    </p>
    <div style="position: relative; background:white; z-index:2"> 
  
    <div class="container" >
        <div class="row">
            @foreach ($category->products->map->skus->flatten() as $sku)
                <div class="col-sm-3 col-xl-4 col-lg-4 col-md-4 ">
                    @include('layouts.card', compact('sku'))
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
