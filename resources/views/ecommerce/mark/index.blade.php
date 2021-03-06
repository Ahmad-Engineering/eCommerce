@extends('ecommerce.index')

@section('page-title', 'Market')

@section('content')
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Shop</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">eCommerce</a>
                                </li>
                                <li class="breadcrumb-item active">Shop
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                <div class="mb-1 breadcrumb-right">
                    <div class="dropdown">
                        <button
                            class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle waves-effect waves-float waves-light"
                            type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg
                                xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-grid">
                                <rect x="3" y="3" width="7" height="7"></rect>
                                <rect x="14" y="3" width="7" height="7"></rect>
                                <rect x="14" y="14" width="7" height="7"></rect>
                                <rect x="3" y="14" width="7" height="7"></rect>
                            </svg></button>
                        <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="app-todo.html"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-check-square me-1">
                                    <polyline points="9 11 12 14 22 4"></polyline>
                                    <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                                </svg><span class="align-middle">Todo</span></a><a class="dropdown-item"
                                href="app-chat.html"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-message-square me-1">
                                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                                </svg><span class="align-middle">Chat</span></a><a class="dropdown-item"
                                href="app-email.html"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail me-1">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c    -1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                    </path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg><span class="align-middle">Email</span></a><a class="dropdown-item"
                                href="app-calendar.html"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar me-1">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                </svg><span class="align-middle">Calendar</span></a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-detached content-right">
            <div class="content-body">
                <!-- E-commerce Content Section Starts -->
                <section id="ecommerce-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="ecommerce-header-items">
                                <div class="result-toggler">
                                    <button class="navbar-toggler shop-sidebar-toggler" type="button"
                                        data-bs-toggle="collapse">
                                        <span class="navbar-toggler-icon d-block d-lg-none"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
                                                <line x1="3" y1="12" x2="21" y2="12"></line>
                                                <line x1="3" y1="6" x2="21" y2="6"></line>
                                                <line x1="3" y1="18" x2="21" y2="18"></line>
                                            </svg></span>
                                    </button>
                                    <div class="search-results">16285 results found</div>
                                </div>
                                <div class="view-options d-flex">
                                    <div class="btn-group dropdown-sort">
                                        <button type="button"
                                            class="btn btn-outline-primary dropdown-toggle me-1 waves-effect"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="active-sorting">Featured</span>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Featured</a>
                                            <a class="dropdown-item" href="#">Lowest</a>
                                            <a class="dropdown-item" href="#">Highest</a>
                                        </div>
                                    </div>
                                    <div class="btn-group" role="group">
                                        <input type="radio" class="btn-check" name="radio_options" id="radio_option1"
                                            autocomplete="off" checked="">
                                        <label class="btn btn-icon btn-outline-primary view-btn grid-view-btn waves-effect"
                                            for="radio_option1"><svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-grid font-medium-3">
                                                <rect x="3" y="3" width="7" height="7"></rect>
                                                <rect x="14" y="3" width="7" height="7"></rect>
                                                <rect x="14" y="14" width="7" height="7"></rect>
                                                <rect x="3" y="14" width="7" height="7"></rect>
                                            </svg></label>
                                        <input type="radio" class="btn-check" name="radio_options" id="radio_option2"
                                            autocomplete="off">
                                        <label class="btn btn-icon btn-outline-primary view-btn list-view-btn waves-effect"
                                            for="radio_option2"><svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-list font-medium-3">
                                                <line x1="8" y1="6" x2="21" y2="6"></line>
                                                <line x1="8" y1="12" x2="21" y2="12"></line>
                                                <line x1="8" y1="18" x2="21" y2="18"></line>
                                                <line x1="3" y1="6" x2="3.01" y2="6"></line>
                                                <line x1="3" y1="12" x2="3.01" y2="12"></line>
                                                <line x1="3" y1="18" x2="3.01" y2="18"></line>
                                            </svg></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- E-commerce Content Section Starts -->

                <!-- background Overlay when sidebar is shown  starts-->
                <div class="body-content-overlay"></div>
                <!-- background Overlay when sidebar is shown  ends-->

                <!-- E-commerce Search Bar Starts -->
                <section id="ecommerce-searchbar" class="ecommerce-searchbar">
                    <div class="row mt-1">
                        <div class="col-sm-12">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control search-product" id="shop-search"
                                    placeholder="Search Product" aria-label="Search..." aria-describedby="shop-search">
                                <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="14"
                                        height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-search text-muted">
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                    </svg></span>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- E-commerce Search Bar Ends -->

                <!-- E-commerce Products Starts -->
                <section id="ecommerce-products" class="grid-view">
                    <div class="card ecommerce-card">
                        <div class="item-img text-center">
                            <a href="app-ecommerce-details.html">
                                <img class="img-fluid card-img-top" src="../../../app-assets/images/pages/eCommerce/1.png"
                                    alt="img-placeholder"></a>
                        </div>
                        <div class="card-body">
                            <div class="item-wrapper">
                                <div class="item-rating">
                                    <ul class="unstyled-list list-inline">
                                        <li class="ratings-list-item"><svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-star filled-star">
                                                <polygon
                                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                </polygon>
                                            </svg></li>
                                        <li class="ratings-list-item"><svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-star filled-star">
                                                <polygon
                                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                </polygon>
                                            </svg></li>
                                        <li class="ratings-list-item"><svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-star filled-star">
                                                <polygon
                                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                </polygon>
                                            </svg></li>
                                        <li class="ratings-list-item"><svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-star filled-star">
                                                <polygon
                                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                </polygon>
                                            </svg></li>
                                        <li class="ratings-list-item"><svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-star unfilled-star">
                                                <polygon
                                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                </polygon>
                                            </svg></li>
                                    </ul>
                                </div>
                                <div>
                                    <h6 class="item-price">$339.99</h6>
                                </div>
                            </div>
                            <h6 class="item-name">
                                <a class="text-body" href="app-ecommerce-details.html">Apple Watch Series 5</a>
                                <span class="card-text item-company">By <a href="#" class="company-name">Apple</a></span>
                            </h6>
                            <p class="card-text item-description">
                                On Retina display that never sleeps, so it???s easy to see the time and other important
                                information, without
                                raising or tapping the display. New location features, from a built-in compass to current
                                elevation, help users
                                better navigate their day, while international emergency calling1 allows customers to call
                                emergency services
                                directly from Apple Watch in over 150 countries, even without iPhone nearby. Apple Watch
                                Series 5 is available
                                in a wider range of materials, including aluminium, stainless steel, ceramic and an all-new
                                titanium.
                            </p>
                        </div>
                        <div class="item-options text-center">
                            <div class="item-wrapper">
                                <div class="item-cost">
                                    <h4 class="item-price">$339.99</h4>
                                </div>
                            </div>
                            <a href="#" class="btn btn-light btn-wishlist waves-effect waves-float waves-light">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-heart">
                                    <path
                                        d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                    </path>
                                </svg>
                                <span>Wishlist</span>
                            </a>
                            <a href="#" class="btn btn-primary btn-cart waves-effect waves-float waves-light">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-shopping-cart">
                                    <circle cx="9" cy="21" r="1"></circle>
                                    <circle cx="20" cy="21" r="1"></circle>
                                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                </svg>
                                <span class="add-to-cart">Add to cart</span>
                            </a>
                        </div>
                    </div>
                </section>
                <!-- E-commerce Products Ends -->

                <!-- E-commerce Pagination Starts -->
                <section id="ecommerce-pagination">
                    <div class="row">
                        <div class="col-sm-12">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center mt-2">
                                    <li class="page-item prev-item"><a class="page-link" href="#"></a></li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item" aria-current="page"><a class="page-link"
                                            href="#">4</a></li>
                                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                                    <li class="page-item"><a class="page-link" href="#">6</a></li>
                                    <li class="page-item"><a class="page-link" href="#">7</a></li>
                                    <li class="page-item next-item"><a class="page-link" href="#"></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </section>
                <!-- E-commerce Pagination Ends -->

            </div>
        </div>
        <div class="sidebar-detached sidebar-left">
            <div class="sidebar">
                <!-- Ecommerce Sidebar Starts -->
                <div class="sidebar-shop">
                    <div class="row">
                        <div class="col-sm-12">
                            <h6 class="filter-heading d-none d-lg-block">Filters</h6>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <!-- Price Filter starts -->
                            <div class="multi-range-price">
                                <h6 class="filter-title mt-0">Multi Range</h6>
                                <ul class="list-unstyled price-range" id="price-range">
                                    <li>
                                        <div class="form-check">
                                            <input type="radio" id="priceAll" name="price-range" class="form-check-input"
                                                checked="">
                                            <label class="form-check-label" for="priceAll">All</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input type="radio" id="priceRange1" name="price-range"
                                                class="form-check-input">
                                            <label class="form-check-label" for="priceRange1">&lt;=$10</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input type="radio" id="priceRange2" name="price-range"
                                                class="form-check-input">
                                            <label class="form-check-label" for="priceRange2">$10 - $100</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input type="radio" id="priceARange3" name="price-range"
                                                class="form-check-input">
                                            <label class="form-check-label" for="priceARange3">$100 - $500</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input type="radio" id="priceRange4" name="price-range"
                                                class="form-check-input">
                                            <label class="form-check-label" for="priceRange4">&gt;= $500</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- Price Filter ends -->

                            <!-- Price Slider starts -->
                            <div class="price-slider">
                                <h6 class="filter-title">Price Range</h6>
                                <div class="price-slider">
                                    <div class="range-slider mt-2 noUi-target noUi-ltr noUi-horizontal noUi-txt-dir-ltr"
                                        id="price-slider">
                                        <div class="noUi-base">
                                            <div class="noUi-connects">
                                                <div class="noUi-connect"
                                                    style="transform: translate(29.2786%, 0px) scale(0.404122, 1);"></div>
                                            </div>
                                            <div class="noUi-origin"
                                                style="transform: translate(-707.214%, 0px); z-index: 5;">
                                                <div class="noUi-handle noUi-handle-lower" data-handle="0" tabindex="0"
                                                    role="slider" aria-orientation="horizontal" aria-valuemin="51.0"
                                                    aria-valuemax="3500.0" aria-valuenow="1500.0" aria-valuetext="1500">
                                                    <div class="noUi-touch-area"></div>
                                                    <div class="noUi-tooltip">1500</div>
                                                </div>
                                            </div>
                                            <div class="noUi-origin"
                                                style="transform: translate(-303.092%, 0px); z-index: 4;">
                                                <div class="noUi-handle noUi-handle-upper" data-handle="1" tabindex="0"
                                                    role="slider" aria-orientation="horizontal" aria-valuemin="1500.0"
                                                    aria-valuemax="5000.0" aria-valuenow="3500.0" aria-valuetext="3500">
                                                    <div class="noUi-touch-area"></div>
                                                    <div class="noUi-tooltip">3500</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Price Range ends -->

                            <!-- Categories Starts -->
                            <div id="product-categories">
                                <h6 class="filter-title">Categories</h6>
                                <ul class="list-unstyled categories-list">
                                    <li>
                                        <div class="form-check">
                                            <input type="radio" id="category1" name="category-filter"
                                                class="form-check-input" checked="">
                                            <label class="form-check-label" for="category1">Appliances</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input type="radio" id="category2" name="category-filter"
                                                class="form-check-input">
                                            <label class="form-check-label" for="category2">Audio</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input type="radio" id="category3" name="category-filter"
                                                class="form-check-input">
                                            <label class="form-check-label" for="category3">Cameras &amp;
                                                Camcorders</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input type="radio" id="category4" name="category-filter"
                                                class="form-check-input">
                                            <label class="form-check-label" for="category4">Car Electronics &amp;
                                                GPS</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input type="radio" id="category5" name="category-filter"
                                                class="form-check-input">
                                            <label class="form-check-label" for="category5">Cell Phones</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input type="radio" id="category6" name="category-filter"
                                                class="form-check-input">
                                            <label class="form-check-label" for="category6">Computers &amp; Tablets</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input type="radio" id="category7" name="category-filter"
                                                class="form-check-input">
                                            <label class="form-check-label" for="category7">Health, Fitness &amp;
                                                Beauty</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input type="radio" id="category8" name="category-filter"
                                                class="form-check-input">
                                            <label class="form-check-label" for="category8">Office &amp; School
                                                Supplies</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input type="radio" id="category9" name="category-filter"
                                                class="form-check-input">
                                            <label class="form-check-label" for="category9">TV &amp; Home Theater</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input type="radio" id="category10" name="category-filter"
                                                class="form-check-input">
                                            <label class="form-check-label" for="category10">Video Games</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- Categories Ends -->

                            <!-- Brands starts -->
                            <div class="brands">
                                <h6 class="filter-title">Brands</h6>
                                <ul class="list-unstyled brand-list">
                                    <li>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="productBrand1">
                                            <label class="form-check-label" for="productBrand1">Insignia???</label>
                                        </div>
                                        <span>746</span>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="productBrand2" checked="">
                                            <label class="form-check-label" for="productBrand2">Samsung</label>
                                        </div>
                                        <span>633</span>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="productBrand3">
                                            <label class="form-check-label" for="productBrand3">Metra</label>
                                        </div>
                                        <span>591</span>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="productBrand4">
                                            <label class="form-check-label" for="productBrand4">HP</label>
                                        </div>
                                        <span>530</span>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="productBrand5" checked="">
                                            <label class="form-check-label" for="productBrand5">Apple</label>
                                        </div>
                                        <span>442</span>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="productBrand6">
                                            <label class="form-check-label" for="productBrand6">GE</label>
                                        </div>
                                        <span>394</span>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="productBrand7">
                                            <label class="form-check-label" for="productBrand7">Sony</label>
                                        </div>
                                        <span>350</span>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="productBrand8">
                                            <label class="form-check-label" for="productBrand8">Incipio</label>
                                        </div>
                                        <span>320</span>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="productBrand9">
                                            <label class="form-check-label" for="productBrand9">KitchenAid</label>
                                        </div>
                                        <span>318</span>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="productBrand10">
                                            <label class="form-check-label" for="productBrand10">Whirlpool</label>
                                        </div>
                                        <span>298</span>
                                    </li>
                                </ul>
                            </div>
                            <!-- Brand ends -->

                            <!-- Rating starts -->
                            <div id="ratings">
                                <h6 class="filter-title">Ratings</h6>
                                <div class="ratings-list">
                                    <a href="#">
                                        <ul class="unstyled-list list-inline">
                                            <li class="ratings-list-item"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="14" height="14" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="feather feather-star filled-star">
                                                    <polygon
                                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                    </polygon>
                                                </svg></li>
                                            <li class="ratings-list-item"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="14" height="14" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="feather feather-star filled-star">
                                                    <polygon
                                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                    </polygon>
                                                </svg></li>
                                            <li class="ratings-list-item"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="14" height="14" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="feather feather-star filled-star">
                                                    <polygon
                                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                    </polygon>
                                                </svg></li>
                                            <li class="ratings-list-item"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="14" height="14" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="feather feather-star filled-star">
                                                    <polygon
                                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                    </polygon>
                                                </svg></li>
                                            <li class="ratings-list-item"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="14" height="14" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="feather feather-star unfilled-star">
                                                    <polygon
                                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                    </polygon>
                                                </svg></li>
                                            <li>&amp; up</li>
                                        </ul>
                                    </a>
                                    <div class="stars-received">160</div>
                                </div>
                                <div class="ratings-list">
                                    <a href="#">
                                        <ul class="unstyled-list list-inline">
                                            <li class="ratings-list-item"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="14" height="14" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="feather feather-star filled-star">
                                                    <polygon
                                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                    </polygon>
                                                </svg></li>
                                            <li class="ratings-list-item"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="14" height="14" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="feather feather-star filled-star">
                                                    <polygon
                                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                    </polygon>
                                                </svg></li>
                                            <li class="ratings-list-item"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="14" height="14" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="feather feather-star filled-star">
                                                    <polygon
                                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                    </polygon>
                                                </svg></li>
                                            <li class="ratings-list-item"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="14" height="14" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="feather feather-star unfilled-star">
                                                    <polygon
                                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                    </polygon>
                                                </svg></li>
                                            <li class="ratings-list-item"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="14" height="14" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="feather feather-star unfilled-star">
                                                    <polygon
                                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                    </polygon>
                                                </svg></li>
                                            <li>&amp; up</li>
                                        </ul>
                                    </a>
                                    <div class="stars-received">176</div>
                                </div>
                                <div class="ratings-list">
                                    <a href="#">
                                        <ul class="unstyled-list list-inline">
                                            <li class="ratings-list-item"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="14" height="14" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="feather feather-star filled-star">
                                                    <polygon
                                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                    </polygon>
                                                </svg></li>
                                            <li class="ratings-list-item"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="14" height="14" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="feather feather-star filled-star">
                                                    <polygon
                                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                    </polygon>
                                                </svg></li>
                                            <li class="ratings-list-item"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="14" height="14" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="feather feather-star unfilled-star">
                                                    <polygon
                                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                    </polygon>
                                                </svg></li>
                                            <li class="ratings-list-item"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="14" height="14" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="feather feather-star unfilled-star">
                                                    <polygon
                                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                    </polygon>
                                                </svg></li>
                                            <li class="ratings-list-item"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="14" height="14" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="feather feather-star unfilled-star">
                                                    <polygon
                                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                    </polygon>
                                                </svg></li>
                                            <li>&amp; up</li>
                                        </ul>
                                    </a>
                                    <div class="stars-received">291</div>
                                </div>
                                <div class="ratings-list">
                                    <a href="#">
                                        <ul class="unstyled-list list-inline">
                                            <li class="ratings-list-item"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="14" height="14" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="feather feather-star filled-star">
                                                    <polygon
                                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                    </polygon>
                                                </svg></li>
                                            <li class="ratings-list-item"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="14" height="14" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="feather feather-star unfilled-star">
                                                    <polygon
                                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                    </polygon>
                                                </svg></li>
                                            <li class="ratings-list-item"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="14" height="14" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="feather feather-star unfilled-star">
                                                    <polygon
                                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                    </polygon>
                                                </svg></li>
                                            <li class="ratings-list-item"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="14" height="14" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="feather feather-star unfilled-star">
                                                    <polygon
                                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                    </polygon>
                                                </svg></li>
                                            <li class="ratings-list-item"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="14" height="14" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="feather feather-star unfilled-star">
                                                    <polygon
                                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                    </polygon>
                                                </svg></li>
                                            <li>&amp; up</li>
                                        </ul>
                                    </a>
                                    <div class="stars-received">190</div>
                                </div>
                            </div>
                            <!-- Rating ends -->

                            <!-- Clear Filters Starts -->
                            <div id="clear-filters">
                                <button type="button"
                                    class="btn w-100 btn-primary waves-effect waves-float waves-light">Clear All
                                    Filters</button>
                            </div>
                            <!-- Clear Filters Ends -->
                        </div>
                    </div>
                </div>
                <!-- Ecommerce Sidebar Ends -->

            </div>
        </div>
    </div>
@endsection
