@extends('backend.layouts.app')

@section('content')
    @include('backend.components.category.category-create')
    @include('backend.components.category.category-delete')
    @include('backend.components.category.category-list')
    @include('backend.components.category.category-update')
    
@endsection