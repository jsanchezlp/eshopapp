@extends('home.app')

@section('section-banner')
    @include('home.partials.sectionbanner')
@endsection

@section('content')
    @include('home.partials.sectionminibanner')
        
    <!-- START SECTION SHOP -->
    @include('home.partials.sectionexclusiveproducts')
    <!-- END SECTION SHOP -->

    <!-- START SECTION SINGLE BANNER --> 
    @include('home.partials.sectionsinglebanner')
    <!-- END SECTION SINGLE BANNER --> 

    <!-- START SECTION SHOP -->
    @include('home.partials.secttionfeaturedproducts')
    <!-- END SECTION SHOP -->

    <!-- START SECTION TESTIMONIAL -->
    @include('home.partials.sectiontestimonial')
    <!-- END SECTION TESTIMONIAL -->

    <!-- START SECTION SHOP INFO -->
    @include('home.partials.sectionshopinfo')
    <!-- END SECTION SHOP INFO -->
@endsection