@extends('layouts.app')
@section('content')
    <div class="site-blocks-cover inner-page-cover overlay"
        style="background-image: url({{ asset('images/' . $singleprop->image) }});" data-aos="fade"
        data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-10">
                    <span class="d-inline-block text-white px-3 mb-3 property-offer-type rounded">Property Details of</span>
                    <h1 class="mb-2">{{ $singleprop->title }}</h1>
                    <p class="mb-5"><strong
                            class="h2 text-success font-weight-bold">${{ number_format($singleprop->price) }}</strong></p>
                </div>
            </div>
        </div>
    </div>
    <div class="site-section site-section-sm">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div>
                        <div class="slide-one-item home-slider owl-carousel">
                            @foreach ($propimages as $propimage)
                                <div><img src="{{ asset('images/' . $propimage->image) }}" alt="Image" class="img-fluid">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="bg-white property-body border-bottom border-left border-right">
                        <div class="row mb-5">
                            <div class="col-md-6">
                                <strong class="text-success h1 mb-3">${{ number_format($singleprop->price) }}</strong>
                            </div>
                            <div class="col-md-6">
                                <ul class="property-specs-wrap mb-3 mb-lg-0  float-lg-right">
                                    <li>
                                        <span class="property-specs">Beds</span>
                                        <span class="property-specs-number">{{ $singleprop->beds }} <sup>+</sup></span>

                                    </li>
                                    <li>
                                        <span class="property-specs">Baths</span>
                                        <span class="property-specs-number">{{ $singleprop->baths }}</span>
                                    </li>
                                    <li>
                                        <span class="property-specs">SQ FT</span>
                                        <span class="property-specs-number">{{ $singleprop->sq_ft }}</span>
                                    </li>
                                </ul>
                            </div>
                          </div>
                        <div class="row mb-5">
                            <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                                <span class="d-inline-block text-black mb-0 caption-text">Home Type</span>
                                <strong class="d-block">{{ $singleprop->home_type }}</strong>
                            </div>
                            <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                                <span class="d-inline-block text-black mb-0 caption-text">Year Built</span>
                                <strong class="d-block">{{ $singleprop->year_built }}</strong>
                            </div>
                            <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                                <span class="d-inline-block text-black mb-0 caption-text">Price/Sqft</span>
                                <strong class="d-block">${{ number_format($singleprop->price_sqft) }}</strong>
                            </div>
                        </div>
                        <h2 class="h4 text-black">More Info</h2>
                        <p>{{ $singleprop->more_info }}</p>
                         
                        <div class="row no-gutters mt-5">
                            <div class="col-12">
                                <h2 class="h4 text-black mb-3">Gallery</h2>
                            </div>
                            @foreach ($propimages as $propimage)
                                <div class="col-sm-6 col-md-4 col-lg-3">
                                    <a href="{{ asset('images/' . $propimage->image) }}" class="image-popup gal-item"><img
                                            src="{{ asset('images/' . $propimage->image) }}" alt="Image"
                                            class="img-fluid"></a>
                                </div>
                            @endforeach
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    @if (session('success'))

                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('save'))

                        <div class="alert alert-success">
                            {{ session('save') }}
                        </div>
                    @endif
                    {{-- ================= CONTACT AGENT SECTION ================= --}}
                    <div class="bg-white widget border rounded p-4 mb-4">
                        <h3 class="h4 text-black widget-title mb-3">Contact Agent</h3>

                        @if (isset(Auth::user()->id))

                            {{-- Flash Messages --}}
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif

                            {{-- If already requested --}}
                            @if ($validateFormCount > 0)
                                <div class="alert alert-success">
                                    You have already sent a request for this property.
                                </div>
                            @else
                                <form action="{{ route('properties.insertRequest', $singleprop->id) }}" method="POST">
                                    @csrf

                                    <input type="hidden" name="property_id" value="{{ $singleprop->id }}">

                                    {{-- Name --}}
                                    <div class="form-group mb-3">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ old('name', auth()->user()->name ?? '') }}">
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Email --}}
                                    <div class="form-group mb-3">
                                        <label>Email</label>
                                        <input type="text" name="email" class="form-control"
                                            value="{{ old('email', auth()->user()->email ?? '') }}">
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Phone --}}
                                    <div class="form-group mb-3">
                                        <label>Phone</label>
                                        <input type="text" name="phone" class="form-control"
                                            value="{{ old('phone') }}">
                                        @error('phone')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary w-100">
                                            Send Message
                                        </button>
                                    </div>

                                </form>
                            @endif

                        @else
                            <div class="alert alert-info">
                                Please <a href="{{ route('login') }}">login</a> to contact the agent.
                            </div>
                        @endif
                    </div>



                    {{-- ================= SAVE PROPERTY SECTION ================= --}}
                    <div class="bg-white widget border rounded p-4">

                        <h3 class="h4 text-black widget-title mb-3">Save Property</h3>

                        @if (session('save_success'))
                            <div class="alert alert-success">
                                {{ session('save_success') }}
                            </div>
                        @endif

                        @if (session('save_error'))
                            <div class="alert alert-danger">
                                {{ session('save_error') }}
                            </div>
                        @endif

                        @if(isset(Auth::user()->id))
                            @if ($validateFormCount > 0)
                                <div class="alert alert-success">
                                    You have already saved this property details.
                                </div>
                                <div class="form-group">
                                    <input type="submit" id="submit" class="btn btn-primary" disabled value="Save Property">
                                </div>
                            @else
                                <form action="{{ route('properties.saveProperty', $singleprop->id) }}" method="POST"
                                    class="form-contact-agent">
                                    @csrf
                                    <div class="form-group">
                                        {{-- <label for="property_id " > Property Id</label> --}}
                                        <input type="hidden" id="property_id" name="property_id"
                                            value="{{ $singleprop->id }}" class="form-control">

                                    </div>
                                    <div class="form-group">
                                        {{-- <label for="agent_name">Agent Name</label> --}}
                                        <input type="hidden" id="title" name="title"
                                            value="{{ $singleprop->title }}" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        {{-- <label for="image">Image</label> --}}
                                        <input type="hidden" id="image" name="image"
                                            value="{{ $singleprop->image }}" class="form-control">
                                        @error('image')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        {{-- <label for="location">Location</label> --}}
                                        <input type="hidden" id="location" name="location"
                                            value="{{ $singleprop->location }}" class="form-control">
                                        @error('location')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        {{-- <label for="location">price</label> --}}
                                        <input type="hidden" id="price" name="price"
                                            value="{{ $singleprop->price }}" class="form-control">
                                        @error('price')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" id="submit" class="btn btn-primary" value="Save Property">
                                    </div>
                                </form>
                            @endif
                        @else
                            <div class="alert alert-info">
                                Please <a href="{{ route('login') }}">login</a> to save this property.
                            </div>
                        @endif
                    </div>
                    <div class="bg-white widget border rounded">
                        <h3 class="h4 text-black widget-title mb-3 ml-0">Share</h3>
                        <div class="px-3" style="margin-left: -15px;">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('properties.details', $singleprop->id) }}&quote={{ $singleprop->title }}"
                                class="pt-3 pb-3 pr-3 pl-0"><span class="icon-facebook"></span></a>
                            <a href="https://twitter.com/intent/tweet?text={{ $singleprop->title }}&url={{ route('properties.details', $singleprop->id) }}"
                                class="pt-3 pb-3 pr-3 pl-0"><span class="icon-twitter"></span></a>
                            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ route('properties.details', $singleprop->id) }}  "
                                class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <div class="site-section site-section-sm bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="site-section-title mb-5">
                        <h2>Related Properties</h2>
                    </div>
                </div>
            </div>

            <div class="row mb-5">
                @if ($relatedprops->count() > 0)
                    @foreach ($relatedprops as $relatedprop)
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="property-entry h-100">
                                <a href="property-details.html" class="property-thumbnail">
                                    <div class="offer-type-wrap">
                                        <span class="offer-type bg-danger">Sale</span>
                                        <span class="offer-type bg-success">Rent</span>
                                    </div>
                                    <img src="{{ asset('images/' . $relatedprop->image) }}" alt="Image"
                                        class="img-fluid">
                                </a>
                                <div class="p-4 property-body">
                                    <a href="#" class="property-favorite"><span class="icon-heart-o"></span></a>
                                    <h2 class="property-title"><a
                                            href="{{ route('properties.details', $relatedprop->id) }}">{{ $relatedprop->title }}</a>
                                    </h2>
                                    <span class="property-location d-block mb-3"><span
                                            class="property-icon icon-room"></span> {{ $relatedprop->location }}</span>
                                    <strong
                                        class="property-price text-primary mb-3 d-block text-success">${{ number_format($relatedprop->price) }}
                                    </strong>
                                    <ul class="property-specs-wrap mb-3 mb-lg-0">
                                        <li>
                                            <span class="property-specs">Beds</span>
                                            <span class="property-specs-number">{{ $relatedprop->beds }}
                                                <sup>+</sup></span>

                                        </li>
                                        <li>
                                            <span class="property-specs">Baths</span>
                                            <span class="property-specs-number">{{ $relatedprop->baths }}</span>

                                        </li>
                                        <li>
                                            <span class="property-specs">SQ FT</span>
                                            <span class="property-specs-number">{{ $relatedprop->sqft }}</span>

                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div>
                        <h3 class="text-center">No related properties found.</h3>
                    </div>
                @endif
                 
            </div>
        </div>
    </div>

    </div>
@endsection
