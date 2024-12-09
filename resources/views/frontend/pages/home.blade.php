@extends('frontend.layouts.app')

@section('content')
    @include('frontend.components.home.about')
    @include('frontend.components.home.service')
    @include('frontend.components.home.work-with-me')
    @include('frontend.components.home.project')
    @include('frontend.components.home.feedback')
    @include('frontend.components.home.blog')
@endsection
