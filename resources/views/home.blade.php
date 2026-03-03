@extends('layouts.app')

@section('content')
    {{-- <div class="col-md-8"> --}}
    {{-- <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div> --}}
 
    <div class="slide-one-item home-slider owl-carousel">
        @foreach ($properties as $property)
            <div class="site-blocks-cover overlay" style="background-image: url({{ asset('images/' . $property->image) }});"
                data-aos="fade" data-stellar-background-ratio="0.5">

                <div class="container">
                    <div class="row align-items-center justify-content-center text-center">
                        <div class="col-md-10">

                            <span class="d-inline-block bg-success text-white px-3 mb-3 property-offer-type rounded">
                                {{ $property->offer_type }}
                            </span>

                            <h1 class="mb-2">{{ $property->title }}</h1>

                            <p class="mb-5">
                                <strong class="h2 text-success font-weight-bold">
                                    {{ $property->price }}
                                </strong>
                            </p>

                            <p>
                                <a href="{{ route('properties.details', $property->id) }}"
                                    class="btn btn-white btn-outline-white py-3 px-5 rounded-0 btn-2">
                                    See Details
                                </a>
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>




    <div class="site-section site-section-sm pb-0">
        <div class="container">
            <div class="row">
                <form  action="{{ route('properties.search') }}" method="POST" class="form-search col-md-12" style="margin-top: -100px;">
                        @csrf
                    <div class="row  align-items-end">
                        <div class="col-md-3">
                            <label for="list-types">Listing Types</label>
                            <div class="select-wrap">
                                <span class="icon icon-arrow_drop_down"></span>
                                <select name="list_types" id="list-types" class="form-control d-block rounded-0">
                                    <option value="Condo">Condo</option>
                                    <option value="Commercial Building">Commercial Building</option>
                                    <option value="Land Property">Land Property</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="offer-types">Offer Type</label>
                            <div class="select-wrap">
                                <span class="icon icon-arrow_drop_down"></span>
                                <select name="offer_types" id="offer-types" class="form-control d-block rounded-0">
                                    <option value="Sale">For Sale</option>
                                    <option value="Rent">For Rent</option>
                                    <option value="Lease">For Lease</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="select-city">Select City</label>
                            <div class="select-wrap">
                                <span class="icon icon-arrow_drop_down"></span>
                                <select name="city_types" id="select-city" class="form-control d-block rounded-0">
                                    <option value="">New York</option>
                                    <option value="">Brooklyn</option>
                                    <option value="">London</option>
                                    <option value="">Japan</option>
                                    <option value="">Philippines</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <input type="submit" class="btn btn-success text-white btn-block rounded-0" value="Search">
                        </div>
                    </div>
                </form>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="view-options bg-white py-3 px-3 d-md-flex align-items-center">
                        <div class="mr-auto">
                            <a href="index.html" class="icon-view view-module active"><span
                                    class="icon-view_module"></span></a>
                            <a href="view-list.html" class="icon-view view-list"><span class="icon-view_list"></span></a>

                        </div>
                        <div class="ml-auto d-flex align-items-center">
                            <div>
                                <a href="{{ route('properties.index') }}" class="view-list px-3 border-right active">All</a>
                                <a href="{{ route('properties.buy') }}" class="view-list px-3 border-right">Rent</a>
                                <a href="{{ route('properties.rent') }}" class="view-list px-3">Sale</a>
                                <a href="{{ route('properties.priceasc') }}" class="view-list px-3">Price Ascending</a>
                                <a href="{{ route('properties.pricedesc') }}" class="view-list px-3">Price Descending   </a>

                            </div>


                            <div class="select-wrap">
                                <span class="icon icon-arrow_drop_down"></span>
                                <select class="form-control form-control-sm d-block rounded-0">
                                    <option value="">Sort by</option>
                                    <option value="">Price Ascending</option>
                                    <option value="">Price Descending</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="site-section site-section-sm bg-light">
        <div class="container">
             <div class="row mb-5">
                @foreach ($properties as $property)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="property-entry h-100">
                            <a href="{{ route('properties.details', $property->id) }}" class="property-thumbnail">
                                <div class="offer-type-wrap">
                                    <span class="offer-type bg-danger">Sale</span>
                                    <span class="offer-type bg-success">{{ $property->type }}</span>
                                </div>
                                <img src="{{ asset('/images/' . $property->image) }}" alt="Image" class="img-fluid">
                            </a>
                            <div class="p-4 property-body">
                                <a href="#" class="property-favorite"><span class="icon-heart-o"></span></a>
                                <h2 class="property-title"><a href="property-details.html">{{ $property->title }}</a></h2>
                                <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span>
                                    {{ $property->location }}</span>
                                <strong
                                    class="property-price text-primary mb-3 d-block text-success">{{ $property->price }}</strong>
                                <ul class="property-specs-wrap mb-3 mb-lg-0">
                                    <li>
                                        <span class="property-specs">Beds</span>
                                        <span class="property-specs-number">{{ $property->beds }}</span>
 
                                    </li>
                                    <li>
                                        <span class="property-specs">Baths</span>
                                        <span class="property-specs-number">{{ $property->baths }}</span>

                                    </li>
                                    <li>
                                        <span class="property-specs">SQ FT</span>
                                        <span class="property-specs-number">{{ $property->sq_ft }}</span>
                                      </li>
                                </ul>
                             </div>
                        </div>
                    </div>
                @endforeach
                {{-- <div class="col-md-6 col-lg-4 mb-4">
                    <div class="property-entry h-100">
                        <a href="property-details.html" class="property-thumbnail">
                            <div class="offer-type-wrap">
                                <span class="offer-type bg-danger">Sale</span>
                                <span class="offer-type bg-success">Rent</span>
                            </div>
                            <img src="images/img_2.jpg" alt="Image" class="img-fluid">
                        </a>
                        <div class="p-4 property-body">
                            <a href="#" class="property-favorite active"><span class="icon-heart-o"></span></a>
                            <h2 class="property-title"><a href="property-details.html">871 Crenshaw Blvd</a></h2>
                            <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span> 1
                                New York Ave, Warners Bay, NSW 2282</span>
                            <strong class="property-price text-primary mb-3 d-block text-success">$2,265,500</strong>
                            <ul class="property-specs-wrap mb-3 mb-lg-0">
                                <li>
                                    <span class="property-specs">Beds</span>
                                    <span class="property-specs-number">2 <sup>+</sup></span>

                                </li>
                                <li>
                                    <span class="property-specs">Baths</span>
                                    <span class="property-specs-number">2</span>

                                </li>
                                <li>
                                    <span class="property-specs">SQ FT</span>
                                    <span class="property-specs-number">1,620</span>

                                </li>
                            </ul>

                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="property-entry h-100">
                        <a href="property-details.html" class="property-thumbnail">
                            <div class="offer-type-wrap">
                                <span class="offer-type bg-info">Lease</span>
                            </div>
                            <img src="images/img_3.jpg" alt="Image" class="img-fluid">
                        </a>
                        <div class="p-4 property-body">
                            <a href="#" class="property-favorite"><span class="icon-heart-o"></span></a>
                            <h2 class="property-title"><a href="property-details.html">853 S Lucerne Blvd</a></h2>
                            <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span> 853
                                S Lucerne Blvd Unit 101 Los Angeles, CA 90005</span>
                            <strong class="property-price text-primary mb-3 d-block text-success">$2,265,500</strong>
                            <ul class="property-specs-wrap mb-3 mb-lg-0">
                                <li>
                                    <span class="property-specs">Beds</span>
                                    <span class="property-specs-number">2 <sup>+</sup></span>

                                </li>
                                <li>
                                    <span class="property-specs">Baths</span>
                                    <span class="property-specs-number">2</span>

                                </li>
                                <li>
                                    <span class="property-specs">SQ FT</span>
                                    <span class="property-specs-number">5,500</span>

                                </li>
                            </ul>

                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="property-entry h-100">
                        <a href="property-details.html" class="property-thumbnail">
                            <div class="offer-type-wrap">
                                <span class="offer-type bg-danger">Sale</span>
                                <span class="offer-type bg-success">Rent</span>
                            </div>
                            <img src="images/img_4.jpg" alt="Image" class="img-fluid">
                        </a>
                        <div class="p-4 property-body">
                            <a href="#" class="property-favorite"><span class="icon-heart-o"></span></a>
                            <h2 class="property-title"><a href="property-details.html">625 S. Berendo St</a></h2>
                            <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span> 625
                                S. Berendo St Unit 607 Los Angeles, CA 90005</span>
                            <strong class="property-price text-primary mb-3 d-block text-success">$2,265,500</strong>
                            <ul class="property-specs-wrap mb-3 mb-lg-0">
                                <li>
                                    <span class="property-specs">Beds</span>
                                    <span class="property-specs-number">2 <sup>+</sup></span>

                                </li>
                                <li>
                                    <span class="property-specs">Baths</span>
                                    <span class="property-specs-number">2</span>

                                </li>
                                <li>
                                    <span class="property-specs">SQ FT</span>
                                    <span class="property-specs-number">7,000</span>

                                </li>
                            </ul>

                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="property-entry h-100">
                        <a href="property-details.html" class="property-thumbnail">
                            <div class="offer-type-wrap">
                                <span class="offer-type bg-danger">Sale</span>
                                <span class="offer-type bg-success">Rent</span>
                            </div>
                            <img src="images/img_5.jpg" alt="Image" class="img-fluid">
                        </a>
                        <div class="p-4 property-body">
                            <a href="#" class="property-favorite"><span class="icon-heart-o"></span></a>
                            <h2 class="property-title"><a href="property-details.html">871 Crenshaw Blvd</a></h2>
                            <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span> 1
                                New York Ave, Warners Bay, NSW 2282</span>
                            <strong class="property-price text-primary mb-3 d-block text-success">$2,265,500</strong>
                            <ul class="property-specs-wrap mb-3 mb-lg-0">
                                <li>
                                    <span class="property-specs">Beds</span>
                                    <span class="property-specs-number">2 <sup>+</sup></span>

                                </li>
                                <li>
                                    <span class="property-specs">Baths</span>
                                    <span class="property-specs-number">2</span>

                                </li>
                                <li>
                                    <span class="property-specs">SQ FT</span>
                                    <span class="property-specs-number">1,620</span>

                                </li>
                            </ul>

                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="property-entry h-100">
                        <a href="property-details.html" class="property-thumbnail">
                            <div class="offer-type-wrap">
                                <span class="offer-type bg-info">Lease</span>
                            </div>
                            <img src="images/img_6.jpg" alt="Image" class="img-fluid">
                        </a>
                        <div class="p-4 property-body">
                            <a href="#" class="property-favorite"><span class="icon-heart-o"></span></a>
                            <h2 class="property-title"><a href="property-details.html">853 S Lucerne Blvd</a></h2>
                            <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span> 853
                                S Lucerne Blvd Unit 101 Los Angeles, CA 90005</span>
                            <strong class="property-price text-primary mb-3 d-block text-success">$2,265,500</strong>
                            <ul class="property-specs-wrap mb-3 mb-lg-0">
                                <li>
                                    <span class="property-specs">Beds</span>
                                    <span class="property-specs-number">2 <sup>+</sup></span>

                                </li>
                                <li>
                                    <span class="property-specs">Baths</span>
                                    <span class="property-specs-number">2</span>

                                </li>
                                <li>
                                    <span class="property-specs">SQ FT</span>
                                    <span class="property-specs-number">5,500</span>

                                </li>
                            </ul>

                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="property-entry h-100">
                        <a href="property-details.html" class="property-thumbnail">
                            <div class="offer-type-wrap">
                                <span class="offer-type bg-danger">Sale</span>
                                <span class="offer-type bg-success">Rent</span>
                            </div>
                            <img src="images/img_7.jpg" alt="Image" class="img-fluid">
                        </a>
                        <div class="p-4 property-body">
                            <a href="#" class="property-favorite"><span class="icon-heart-o"></span></a>
                            <h2 class="property-title"><a href="property-details.html">625 S. Berendo St</a></h2>
                            <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span> 625
                                S. Berendo St Unit 607 Los Angeles, CA 90005</span>
                            <strong class="property-price text-primary mb-3 d-block text-success">$2,265,500</strong>
                            <ul class="property-specs-wrap mb-3 mb-lg-0">
                                <li>
                                    <span class="property-specs">Beds</span>
                                    <span class="property-specs-number">2 <sup>+</sup></span>

                                </li>
                                <li>
                                    <span class="property-specs">Baths</span>
                                    <span class="property-specs-number">2</span>

                                </li>
                                <li>
                                    <span class="property-specs">SQ FT</span>
                                    <span class="property-specs-number">7,000</span>

                                </li>
                            </ul>

                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="property-entry h-100">
                        <a href="property-details.html" class="property-thumbnail">
                            <div class="offer-type-wrap">
                                <span class="offer-type bg-danger">Sale</span>
                                <span class="offer-type bg-success">Rent</span>
                            </div>
                            <img src="images/img_8.jpg" alt="Image" class="img-fluid">
                        </a>
                        <div class="p-4 property-body">
                            <a href="#" class="property-favorite"><span class="icon-heart-o"></span></a>
                            <h2 class="property-title"><a href="property-details.html">871 Crenshaw Blvd</a></h2>
                            <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span> 1
                                New York Ave, Warners Bay, NSW 2282</span>
                            <strong class="property-price text-primary mb-3 d-block text-success">$2,265,500</strong>
                            <ul class="property-specs-wrap mb-3 mb-lg-0">
                                <li>
                                    <span class="property-specs">Beds</span>
                                    <span class="property-specs-number">2 <sup>+</sup></span>

                                </li>
                                <li>
                                    <span class="property-specs">Baths</span>
                                    <span class="property-specs-number">2</span>

                                </li>
                                <li>
                                    <span class="property-specs">SQ FT</span>
                                    <span class="property-specs-number">1,620</span>

                                </li>
                            </ul>

                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="property-entry h-100">
                        <a href="property-details.html" class="property-thumbnail">
                            <div class="offer-type-wrap">
                                <span class="offer-type bg-info">Lease</span>
                            </div>
                            <img src="images/img_1.jpg" alt="Image" class="img-fluid">
                        </a>
                        <div class="p-4 property-body">
                            <a href="#" class="property-favorite"><span class="icon-heart-o"></span></a>
                            <h2 class="property-title"><a href="property-details.html">853 S Lucerne Blvd</a></h2>
                            <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span> 853
                                S Lucerne Blvd Unit 101 Los Angeles, CA 90005</span>
                            <strong class="property-price text-primary mb-3 d-block text-success">$2,265,500</strong>
                            <ul class="property-specs-wrap mb-3 mb-lg-0">
                                <li>
                                    <span class="property-specs">Beds</span>
                                    <span class="property-specs-number">2 <sup>+</sup></span>

                                </li>
                                <li>
                                    <span class="property-specs">Baths</span>
                                    <span class="property-specs-number">2</span>

                                </li>
                                <li>
                                    <span class="property-specs">SQ FT</span>
                                    <span class="property-specs-number">5,500</span>

                                </li>
                            </ul>

                        </div>
                    </div>
                </div> --}}
            </div>


        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 text-center">
                    <div class="site-section-title">
                        <h2>Why Choose Us?</h2>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis maiores quisquam saepe architecto
                        error corporis aliquam. Cum ipsam a consectetur aut sunt sint animi, pariatur corporis, eaque,
                        deleniti cupiditate officia.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <a href="#" class="service text-center">
                        <span class="icon flaticon-house"></span>
                        <h2 class="service-heading">Research Subburbs</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt iure qui natus perspiciatis ex
                            odio molestia.</p>
                        <p><span class="read-more">Read More</span></p>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4">
                    <a href="#" class="service text-center">
                        <span class="icon flaticon-sold"></span>
                        <h2 class="service-heading">Sold Houses</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt iure qui natus perspiciatis ex
                            odio molestia.</p>
                        <p><span class="read-more">Read More</span></p>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4">
                    <a href="#" class="service text-center">
                        <span class="icon flaticon-camera"></span>
                        <h2 class="service-heading">Security Priority</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt iure qui natus perspiciatis ex
                            odio molestia.</p>
                        <p><span class="read-more">Read More</span></p>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <div class="site-section bg-light">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-md-7">
                    <div class="site-section-title text-center">
                        <h2>Our Agents</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero magnam officiis ipsa eum pariatur
                            labore fugit amet eaque iure vitae, repellendus laborum in modi reiciendis quis! Optio minima
                            quibusdam, laboriosam.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4 mb-5 mb-lg-5">
                    <div class="team-member">

                        <img src="images/person_1.jpg" alt="Image" class="img-fluid rounded mb-4">

                        <div class="text">

                            <h2 class="mb-2 font-weight-light text-black h4">Megan Smith</h2>
                            <span class="d-block mb-3 text-white-opacity-05">Real Estate Agent</span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi dolorem totam non quis facere
                                blanditiis praesentium est. Totam atque corporis nisi, veniam non. Tempore cupiditate, vitae
                                minus obcaecati provident beatae!</p>
                            <p>
                                <a href="#" class="text-black p-2"><span class="icon-facebook"></span></a>
                                <a href="#" class="text-black p-2"><span class="icon-twitter"></span></a>
                                <a href="#" class="text-black p-2"><span class="icon-linkedin"></span></a>
                            </p>
                        </div>

                    </div>
                </div>

                <div class="col-md-6 col-lg-4 mb-5 mb-lg-5">
                    <div class="team-member">

                        <img src="images/person_2.jpg" alt="Image" class="img-fluid rounded mb-4">

                        <div class="text">

                            <h2 class="mb-2 font-weight-light text-black h4">Brooke Cagle</h2>
                            <span class="d-block mb-3 text-white-opacity-05">Real Estate Agent</span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis, cumque vitae voluptates
                                culpa earum similique corrupti itaque veniam doloribus amet perspiciatis recusandae sequi
                                nihil tenetur ad, modi quos id magni!</p>
                            <p>
                                <a href="#" class="text-black p-2"><span class="icon-facebook"></span></a>
                                <a href="#" class="text-black p-2"><span class="icon-twitter"></span></a>
                                <a href="#" class="text-black p-2"><span class="icon-linkedin"></span></a>
                            </p>
                        </div>

                    </div>
                </div>

                <div class="col-md-6 col-lg-4 mb-5 mb-lg-5">
                    <div class="team-member">

                        <img src="images/person_3.jpg" alt="Image" class="img-fluid rounded mb-4">

                        <div class="text">

                            <h2 class="mb-2 font-weight-light text-black h4">Philip Martin</h2>
                            <span class="d-block mb-3 text-white-opacity-05">Real Estate Agent</span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores illo iusto, inventore, iure
                                dolorum officiis modi repellat nobis, praesentium perspiciatis, explicabo. Atque cupiditate,
                                voluptates pariatur odit officia libero veniam quo.</p>
                            <p>
                                <a href="#" class="text-black p-2"><span class="icon-facebook"></span></a>
                                <a href="#" class="text-black p-2"><span class="icon-twitter"></span></a>
                                <a href="#" class="text-black p-2"><span class="icon-linkedin"></span></a>
                            </p>
                        </div>

                    </div>
                </div>



            </div>
        </div>



    </div>

    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="mb-5">
                        <h3 class="footer-heading mb-4">About Homeland</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe pariatur reprehenderit vero
                            atque, consequatur id ratione, et non dignissimos culpa? Ut veritatis, quos illum totam quis
                            blanditiis, minima minus odio!</p>
                    </div>



                </div>
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <div class="row mb-5">
                        <div class="col-md-12">
                            <h3 class="footer-heading mb-4">Navigations</h3>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Buy</a></li>
                                <li><a href="#">Rent</a></li>
                                <li><a href="#">Properties</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Terms</a></li>
                            </ul>
                        </div>
                    </div>


                </div>

                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h3 class="footer-heading mb-4">Follow Us</h3>

                    <div>
                        <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                        <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                        <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                        <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
                    </div>



                </div>

            </div>
            <div class="row pt-5 mt-5 text-center">
                <div class="col-md-12">
                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | This template is made with <i
                            class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com"
                            target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>

            </div>
        </div>
    </footer>
@endsection
