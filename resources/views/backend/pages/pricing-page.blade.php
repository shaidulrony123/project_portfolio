@extends('backend.layouts.app')

@section('content')
    @include('backend.components.pricing.pricing-create')
    @include('backend.components.pricing.pricing-delete')
    @include('backend.components.pricing.pricing-list')
    @include('backend.components.pricing.pricing-update')
    
@endsection