@extends('layouts.master')

@section('title', __('main.all_categories'))

@section('content')
<div class="container" style="margin-top: 150px;position: relative; background:#fff; z-index:2;">
    <div class="row">
        @foreach($categories as $category)
        <div class="col-6" style="position: relative; background:#fff; z-index:2;">
            <a class="avds_title pl-3 pt-1 pb-1" style="color: black" href="{{ route('category', $category->code) }}">
                {{-- <img src="{{ Storage::url($category->image) }}"> --}}
                <h2>{{ $category->__('name') }}</h2>
            </a>
            <p>
                {{ $category->__('description') }}
            </p>
        </div>
    @endforeach
    </div>
</div>

@endsection
