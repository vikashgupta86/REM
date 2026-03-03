@extends('layouts.app')
@section('content')
    <div class="site-blocks-cover inner-page-cover overlay"
        style="background-image: url({{ asset('images/' . $singleprop->image ?? '') }});" data-aos="fade"
        data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-10">
                    <span class="d-inline-block text-white px-3 mb-3 property-offer-type rounded">Property Details of</span>
                    <h1 class="mb-2">All Request for Properties</h1>
                    <p class="mb-5"><strong
                            class="h2 text-success font-weight-bold">${{ number_format($singleprop->price ?? '') }}</strong>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="site-section site-section-sm bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="site-section-title mb-5">

                        <h2>All Request for Properties </h2>
                    </div>
                </div>
            </div>

            <div class="row mb-5">
                @if ($allrequests->count() > 0)
                    @foreach ($allrequests as $relatedprop)
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="property-entry h-100">




                                <a href="{{route('properties.details',$relatedprop->property_id)}}" class="alert alert-success">
                                     Go to this property details page


                                    <img src="{{ asset('images/' . $relatedprop->image ?? '') }}" alt="Image"
                                        class="img-fluid">
                                </a>
                             
                            </div>
                        </div>
                    @endforeach
                @else
                    <div>
                        <h3 class="text-center"> there are no requests found for this user .</h3>
                    </div>
                @endif

            </div>
        </div>
    </div>

    </div>

@endsection
