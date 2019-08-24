@extends('layouts.frontend')

@php
    $settings = Helper::getSettings();
@endphp
@section('title',$settings->title)

@section('header')

@endsection
@section('content')
    @include('frontend.partials.homeslide')
    @include('frontend.partials.featured-product')
    @include('frontend.partials.gallery')
@endsection
