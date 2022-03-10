@extends('ecommerce.index')

@section('page-title', 'Edit Client')

@section('content')
    @if (is_null($client->clientInfo))
        <section id="alerts-with-title">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Complete Client Informations</h4>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Please, complete your client information
                                <code>{{ $client->email }}</code></p>
                            <div class="demo-spacing-0">
                                <div class="alert alert-warning" role="alert">
                                    <h4 class="alert-heading">Complete Infos</h4>
                                    <div class="alert-body">
                                        Without completing your client <a href="{{ route('client.edit', $client->id) }}"
                                            class="alert-link">{{ $client->name }}</a>
                                        You cannt printing or deal with him with your contract!
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- users edit start -->
            <section class="app-user-edit">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-pills" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center active" id="account-tab" data-bs-toggle="tab"
                                    href="#account" aria-controls="account" role="tab" aria-selected="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-user">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg><span class="d-none d-sm-block">Account</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center" id="information-tab" data-bs-toggle="tab"
                                    href="#information" aria-controls="information" role="tab" aria-selected="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-info">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <line x1="12" y1="16" x2="12" y2="12"></line>
                                        <line x1="12" y1="8" x2="12.01" y2="8"></line>
                                    </svg><span class="d-none d-sm-block">Information</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center" id="social-tab" data-bs-toggle="tab"
                                    href="#social" aria-controls="social" role="tab" aria-selected="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-share-2">
                                        <circle cx="18" cy="5" r="3"></circle>
                                        <circle cx="6" cy="12" r="3"></circle>
                                        <circle cx="18" cy="19" r="3"></circle>
                                        <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line>
                                        <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line>
                                    </svg><span class="d-none d-sm-block">Social</span>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <!-- Account Tab starts -->
                            <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                                <!-- users edit start -->
                                <div class="d-flex mb-2">
                                    <img src="{{ asset('ecommerce/app-assets/images/avatars/7.png') }}" alt="users avatar"
                                        class="user-avatar users-avatar-shadow rounded me-2 my-25 cursor-pointer"
                                        height="90" width="90">
                                    <div class="mt-50">
                                        <h4>{{ $client->name }}</h4>
                                        <div class="col-12 d-flex mt-1 px-0">
                                            <label class="btn btn-primary me-75 mb-0 waves-effect waves-float waves-light"
                                                for="change-picture">
                                                <span class="d-none d-sm-block">Change</span>
                                                <input class="form-control" type="file" id="change-picture" hidden=""
                                                    accept="image/png, image/jpeg, image/jpg">
                                                <span class="d-block d-sm-none">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-edit me-0">
                                                        <path
                                                            d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                        </path>
                                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                        </path>
                                                    </svg>
                                                </span>
                                            </label>
                                            <button
                                                class="btn btn-outline-secondary d-none d-sm-block waves-effect">Remove</button>
                                            <button class="btn btn-outline-secondary d-block d-sm-none waves-effect">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-trash-2 me-0">
                                                    <polyline points="3 6 5 6 21 6"></polyline>
                                                    <path
                                                        d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                    </path>
                                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- users edit ends -->
                                <!-- users edit account form start -->
                                <form class="form-validate" novalidate="novalidate" id="edit-form">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-1">
                                                <label class="form-label" for="name">Name</label>
                                                <input type="text" class="form-control" placeholder="Name"
                                                    value="{{ $client->name }}" name="name" id="name"
                                                    aria-invalid="false">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-1">
                                                <label class="form-label" for="phone">Phone</label>
                                                <input type="text" class="form-control" placeholder="Phone"
                                                    value="{{ $client->phone }}" name="phone" id="phone"
                                                    aria-invalid="false">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-1">
                                                <label class="form-label" for="email">E-mail</label>
                                                <input type="email" class="form-control" placeholder="Email"
                                                    value="{{ $client->email }}" name="email" id="email"
                                                    aria-invalid="false">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-1">
                                                <label class="form-label" for="status">Status</label>
                                                <select class="form-select" id="status" aria-invalid="false" id="status">
                                                    <option value="active"
                                                        @if ($client->status) selected @endif>Active</option>
                                                    <option value="blocked"
                                                        @if (!$client->status) selected @endif>Blocked</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-1">
                                                <label class="form-label" for="location">Location</label>
                                                <input type="text" class="form-control" value="{{ $client->location }}"
                                                    placeholder="Location" id="location" aria-invalid="false">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-1">
                                                <label class="form-label" for="position">Position</label>
                                                <input type="text" class="form-control" placeholder="Position" readonly
                                                    value="{{ $client->position }}" name="position" id="position"
                                                    aria-invalid="false">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="notes">Note</label>
                                                <input type="text" class="form-control" value="{{ $client->notes }}"
                                                    placeholder="Remember this note ..." id="notes" aria-invalid="false">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="table-responsive border rounded mt-1">
                                                <h6 class="py-1 mx-1 mb-0 font-medium-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-lock font-medium-3 me-25">
                                                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                                    </svg>
                                                    <span class="align-middle">Permission</span>
                                                </h6>
                                                <table class="table table-striped table-borderless">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th>Module</th>
                                                            <th>Read</th>
                                                            <th>Write</th>
                                                            <th>Create</th>
                                                            <th>Delete</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Admin</td>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input"
                                                                        id="admin-read" checked="">
                                                                    <label class="form-check-label"
                                                                        for="admin-read"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input"
                                                                        id="admin-write">
                                                                    <label class="form-check-label"
                                                                        for="admin-write"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input"
                                                                        id="admin-create">
                                                                    <label class="form-check-label"
                                                                        for="admin-create"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input"
                                                                        id="admin-delete">
                                                                    <label class="form-check-label"
                                                                        for="admin-delete"></label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Staff</td>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input"
                                                                        id="staff-read">
                                                                    <label class="form-check-label"
                                                                        for="staff-read"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input"
                                                                        id="staff-write" checked="">
                                                                    <label class="form-check-label"
                                                                        for="staff-write"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input"
                                                                        id="staff-create">
                                                                    <label class="form-check-label"
                                                                        for="staff-create"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input"
                                                                        id="staff-delete">
                                                                    <label class="form-check-label"
                                                                        for="staff-delete"></label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Author</td>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input"
                                                                        id="author-read" checked="">
                                                                    <label class="form-check-label"
                                                                        for="author-read"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input"
                                                                        id="author-write">
                                                                    <label class="form-check-label"
                                                                        for="author-write"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input"
                                                                        id="author-create" checked="">
                                                                    <label class="form-check-label"
                                                                        for="author-create"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input"
                                                                        id="author-delete">
                                                                    <label class="form-check-label"
                                                                        for="author-delete"></label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Contributor</td>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input"
                                                                        id="contributor-read">
                                                                    <label class="form-check-label"
                                                                        for="contributor-read"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input"
                                                                        id="contributor-write">
                                                                    <label class="form-check-label"
                                                                        for="contributor-write"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input"
                                                                        id="contributor-create">
                                                                    <label class="form-check-label"
                                                                        for="contributor-create"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input"
                                                                        id="contributor-delete">
                                                                    <label class="form-check-label"
                                                                        for="contributor-delete"></label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>User</td>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input"
                                                                        id="user-read">
                                                                    <label class="form-check-label"
                                                                        for="user-read"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input"
                                                                        id="user-create">
                                                                    <label class="form-check-label"
                                                                        for="user-create"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input"
                                                                        id="user-write">
                                                                    <label class="form-check-label"
                                                                        for="user-write"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input"
                                                                        id="user-delete" checked="">
                                                                    <label class="form-check-label"
                                                                        for="user-delete"></label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                                            <button type="button"
                                                class="btn btn-primary mb-1 mb-sm-0 me-0 me-sm-1 waves-effect waves-float waves-light"
                                                onclick="update({{ $client->id }})">Save
                                                Changes</button>
                                            <button type="button" onclick="reloadPage()"
                                                class="btn btn-outline-secondary waves-effect">Reset</button>
                                        </div>
                                    </div>
                                </form>
                                <!-- users edit account form ends -->
                            </div>
                            <!-- Account Tab ends -->

                            <!-- Information Tab starts -->
                            <div class="tab-pane" id="information" aria-labelledby="information-tab" role="tabpanel">
                                <!-- users edit Info form start -->
                                <form class="form-validate" novalidate="novalidate">
                                    <div class="row mt-1">
                                        <div class="col-12">
                                            <h4 class="mb-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-user font-medium-4 me-25">
                                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                    <circle cx="12" cy="7" r="4"></circle>
                                                </svg>
                                                <span class="align-middle">{{ $client->name }} Personal
                                                    Information</span>
                                            </h4>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-1">
                                                <label class="form-label" for="age">Age</label>
                                                <input id="age" type="number" class="form-control"
                                                    @if (!is_null($client->clientInfo)) value="{{ $client->clientInfo->age }}" @endif
                                                    name="age">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-1">
                                                <label class="form-label" for="mobile">Mobile</label>
                                                <input id="mobile" type="text" class="form-control"
                                                    @if (!is_null($client->clientInfo)) value="{{ $client->clientInfo->mobile }}" @endif
                                                    name="phone">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-1">
                                                <label class="form-label" for="website">Website</label>
                                                <input id="website" type="text" class="form-control"
                                                    placeholder="Website here..."
                                                    @if (!is_null($client->clientInfo)) value="{{ $client->clientInfo->website }}" @endif
                                                    name="website">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-1">
                                                <label class="form-label" for="language">Languages</label>
                                                <select id="language" class="form-select">
                                                    <option value="English"
                                                        @if (!is_null($client->clientInfo)) @if ($client->clientInfo->native_lan == 'English')
                                                            selected @endif
                                                        @endif
                                                        >English</option>
                                                    <option value="Spanish"
                                                        @if (!is_null($client->clientInfo)) @if ($client->clientInfo->native_lan == 'Spanish')
                                                            selected @endif
                                                        @endif
                                                        >Spanish</option>
                                                    <option value="French"
                                                        @if (!is_null($client->clientInfo)) @if ($client->clientInfo->native_lan == 'French')
                                                            selected @endif
                                                        @endif
                                                        >French</option>
                                                    <option value="Russian"
                                                        @if (!is_null($client->clientInfo)) @if ($client->clientInfo->native_lan == 'Russian')
                                                            selected @endif
                                                        @endif
                                                        >Russian</option>
                                                    <option value="German"
                                                        @if (!is_null($client->clientInfo)) @if ($client->clientInfo->native_lan == 'German')
                                                            selected @endif
                                                        @endif
                                                        >German</option>
                                                    <option value="Arabic"
                                                        @if (!is_null($client->clientInfo)) @if ($client->clientInfo->native_lan == 'Arabic')
                                                            selected @endif
                                                        @endif
                                                        >Arabic</option>
                                                    <option value="Sanskrit"
                                                        @if (!is_null($client->clientInfo)) @if ($client->clientInfo->native_lan == 'Sanskrit')
                                                            selected @endif
                                                        @endif
                                                        >Sanskrit</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-1">
                                                <label class="d-block form-label mb-1">Gender</label>
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" id="male" name="gender" class="form-check-input"
                                                        @if (!is_null($client->clientInfo)) @if ($client->clientInfo->gender == 'M')
                                                            checked @endif
                                                        @endif
                                                    >
                                                    <label class="form-check-label" for="male">Male</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" id="female" name="gender" class="form-check-input"
                                                        @if (!is_null($client->clientInfo)) @if ($client->clientInfo->gender == 'F')
                                                            checked @endif
                                                        @endif
                                                    >
                                                    <label class="form-check-label" for="female">Female</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-1">
                                                <label class="d-block form-label mb-1">Contact Options</label>
                                                <div class="form-check form-check-inline">
                                                    <input type="checkbox" class="form-check-input" id="email_contact"
                                                        @if (!is_null($client->clientInfo)) @if ($client->clientInfo->email_contact)
                                                            checked @endif
                                                        @endif
                                                    >
                                                    <label class="form-check-label" for="email_contact">Email</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="checkbox" class="form-check-input" id="chat_contact"
                                                        @if (!is_null($client->clientInfo)) @if ($client->clientInfo->chat_contact)
                                                            checked @endif
                                                        @endif
                                                    >
                                                    <label class="form-check-label" for="chat_contact">Message</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="checkbox" class="form-check-input" id="phone_contact"
                                                        @if (!is_null($client->clientInfo)) @if ($client->clientInfo->phone_contact)
                                                            checked @endif
                                                        @endif
                                                    >
                                                    <label class="form-check-label" for="phone_contact">Phone</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <h4 class="mb-1 mt-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-map-pin font-medium-4 me-25">
                                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                                    <circle cx="12" cy="10" r="3"></circle>
                                                </svg>
                                                <span class="align-middle">Address</span>
                                            </h4>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-1">
                                                <label class="form-label" for="address_one">Address Line 1</label>
                                                <input id="address_one" type="text" class="form-control"
                                                    @if (!is_null($client->clientInfo)) value="{{ $client->clientInfo->first_address }}" @endif
                                                    name="address_one">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-1">
                                                <label class="form-label" for="address_two">Address Line 2</label>
                                                <input id="address_two" type="text" class="form-control"
                                                    @if (!is_null($client->clientInfo)) value="{{ $client->clientInfo->second_address }}" @endif
                                                    placeholder="T-78, Groove Street">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-1">
                                                <label class="form-label" for="postcode">Postcode</label>
                                                <input id="postcode" type="text" class="form-control"
                                                    @if (!is_null($client->clientInfo)) value="{{ $client->clientInfo->post_code }}" @endif
                                                    placeholder="597626" name="zip">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-1">
                                                <label class="form-label" for="city">City</label>
                                                <input id="city" type="text" class="form-control"
                                                    @if (!is_null($client->clientInfo)) value="{{ $client->clientInfo->city }}" @endif
                                                    name="city">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-1">
                                                <label class="form-label" for="state">State</label>
                                                <input id="state" type="text" class="form-control" name="state"
                                                    @if (!is_null($client->clientInfo)) value="{{ $client->clientInfo->state }}" @endif
                                                    placeholder="Manhattan">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-1">
                                                <label class="form-label" for="country">Country</label>
                                                <input id="country" type="text" class="form-control" name="country"
                                                    @if (!is_null($client->clientInfo)) value="{{ $client->clientInfo->country }}" @endif
                                                    placeholder="United States">
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                                            <button type="button" onclick="addClientInfos({{ $client->id }})"
                                                class="btn btn-primary mb-1 mb-sm-0 me-0 me-sm-1 waves-effect waves-float waves-light">Save
                                                Changes</button>
                                            <button type="reset"
                                                class="btn btn-outline-secondary waves-effect">Reset</button>
                                        </div>
                                    </div>
                                </form>
                                <!-- users edit Info form ends -->
                            </div>
                            <!-- Information Tab ends -->

                            <!-- Social Tab starts -->
                            <div class="tab-pane" id="social" aria-labelledby="social-tab" role="tabpanel">
                                <!-- users edit social form start -->
                                <form class="form-validate" novalidate="novalidate">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 mb-1">
                                            <label class="form-label" for="twitter-input">Twitter</label>
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text" id="basic-addon3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-twitter font-medium-2">
                                                        <path
                                                            d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                                                        </path>
                                                    </svg>
                                                </span>
                                                <input id="twitter" type="text" class="form-control"
                                                    @if (!is_null($client->clientSocial)) value="{{ $client->clientSocial->twitter }}" @endif
                                                    placeholder="https://www.twitter.com/" aria-describedby="basic-addon3">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 mb-1">
                                            <label class="form-label" for="facebook-input">Facebook</label>
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text" id="basic-addon4">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-facebook font-medium-2">
                                                        <path
                                                            d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z">
                                                        </path>
                                                    </svg>
                                                </span>
                                                <input id="facebook" type="text" class="form-control"
                                                    @if (!is_null($client->clientSocial)) value="{{ $client->clientSocial->facebook }}" @endif
                                                    placeholder="https://www.facebook.com/" aria-describedby="basic-addon4">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 mb-1">
                                            <label class="form-label" for="instagram-input">Instagram</label>
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text" id="basic-addon5">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-instagram font-medium-2">
                                                        <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                                        <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                                    </svg>
                                                </span>
                                                <input id="instagram" type="text" class="form-control"
                                                    @if (!is_null($client->clientSocial)) value="{{ $client->clientSocial->instagram }}" @endif
                                                    placeholder="https://www.instagram.com/"
                                                    aria-describedby="basic-addon5">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 mb-1">
                                            <label class="form-label" for="github-input">Github</label>
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text" id="basic-addon9">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-github font-medium-2">
                                                        <path
                                                            d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22">
                                                        </path>
                                                    </svg>
                                                </span>
                                                <input id="github" type="text" class="form-control"
                                                    @if (!is_null($client->clientSocial)) value="{{ $client->clientSocial->github }}" @endif
                                                    placeholder="https://www.github.com/" aria-describedby="basic-addon9">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 mb-1">
                                            <label class="form-label" for="codepen-input">Codepen</label>
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text" id="basic-addon12">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-codepen font-medium-2">
                                                        <polygon points="12 2 22 8.5 22 15.5 12 22 2 15.5 2 8.5 12 2">
                                                        </polygon>
                                                        <line x1="12" y1="22" x2="12" y2="15.5"></line>
                                                        <polyline points="22 8.5 12 15.5 2 8.5"></polyline>
                                                        <polyline points="2 15.5 12 8.5 22 15.5"></polyline>
                                                        <line x1="12" y1="2" x2="12" y2="8.5"></line>
                                                    </svg>
                                                </span>
                                                <input id="codepen" type="text" class="form-control"
                                                    @if (!is_null($client->clientSocial)) value="{{ $client->clientSocial->codepen }}" @endif
                                                    placeholder="https://www.codepen.com/" aria-describedby="basic-addon12">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 mb-1">
                                            <label class="form-label" for="slack-input">Slack</label>
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text" id="basic-addon11">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-slack font-medium-2">
                                                        <path
                                                            d="M14.5 10c-.83 0-1.5-.67-1.5-1.5v-5c0-.83.67-1.5 1.5-1.5s1.5.67 1.5 1.5v5c0 .83-.67 1.5-1.5 1.5z">
                                                        </path>
                                                        <path
                                                            d="M20.5 10H19V8.5c0-.83.67-1.5 1.5-1.5s1.5.67 1.5 1.5-.67 1.5-1.5 1.5z">
                                                        </path>
                                                        <path
                                                            d="M9.5 14c.83 0 1.5.67 1.5 1.5v5c0 .83-.67 1.5-1.5 1.5S8 21.33 8 20.5v-5c0-.83.67-1.5 1.5-1.5z">
                                                        </path>
                                                        <path
                                                            d="M3.5 14H5v1.5c0 .83-.67 1.5-1.5 1.5S2 16.33 2 15.5 2.67 14 3.5 14z">
                                                        </path>
                                                        <path
                                                            d="M14 14.5c0-.83.67-1.5 1.5-1.5h5c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5h-5c-.83 0-1.5-.67-1.5-1.5z">
                                                        </path>
                                                        <path
                                                            d="M15.5 19H14v1.5c0 .83.67 1.5 1.5 1.5s1.5-.67 1.5-1.5-.67-1.5-1.5-1.5z">
                                                        </path>
                                                        <path
                                                            d="M10 9.5C10 8.67 9.33 8 8.5 8h-5C2.67 8 2 8.67 2 9.5S2.67 11 3.5 11h5c.83 0 1.5-.67 1.5-1.5z">
                                                        </path>
                                                        <path
                                                            d="M8.5 5H10V3.5C10 2.67 9.33 2 8.5 2S7 2.67 7 3.5 7.67 5 8.5 5z">
                                                        </path>
                                                    </svg>
                                                </span>
                                                <input id="slack" type="text" class="form-control"
                                                    @if (!is_null($client->clientSocial)) value="{{ $client->clientSocial->slack }}" @endif
                                                    placeholder="https://www.slack.com/" aria-describedby="basic-addon11">
                                            </div>
                                        </div>

                                        <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                                            <button type="button" onclick="store({{ $client->id }})"
                                                class="btn btn-primary mb-1 mb-sm-0 me-0 me-sm-1 waves-effect waves-float waves-light">Save
                                                Changes</button>
                                            <button type="reset"
                                                class="btn btn-outline-secondary waves-effect">Reset</button>
                                        </div>
                                    </div>
                                </form>
                                <!-- users edit social form ends -->
                            </div>
                            <!-- Social Tab ends -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- users edit ends -->

        </div>
    </div>
@endsection


@section('scripts')
    {{-- Update Client --}}
    <script>
        function update(id) {
            // admin/client/{client}
            axios.put('/admin/client/' + id, {
                    name: document.getElementById('name').value,
                    phone: document.getElementById('phone').value,
                    email: document.getElementById('email').value,
                    status: document.getElementById('status').value,
                    location: document.getElementById('location').value,
                    notes: document.getElementById('notes').value,
                })
                .then(function(response) {
                    // handle success
                    console.log(response);
                    toastr.success(response.data.message);
                    location.reload();
                    // document.getElementById('create-form').reset();
                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                    toastr.error(error.response.data.message)
                })
                .then(function() {
                    // always executed
                });
        }
    </script>

    <script>
        function reloadPage() {
            location.reload();
        }
    </script>

    <script>
        function store(id) {
            // admin/client-social
            axios.post('/admin/client-social', {
                    twitter: document.getElementById('twitter').value,
                    facebook: document.getElementById('facebook').value,
                    instagram: document.getElementById('instagram').value,
                    github: document.getElementById('github').value,
                    codepen: document.getElementById('codepen').value,
                    slack: document.getElementById('slack').value,
                    client_id: id,
                })
                .then(function(response) {
                    // handle success
                    console.log(response);
                    toastr.success(response.data.message);
                    document.getElementById('create-form').reset();
                    location.reload();
                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                    toastr.error(error.response.data.message)
                })
                .then(function() {
                    // always executed
                });
        }

        function addClientInfos(id) {
            // admin/client-social
            clientInfo = new FormData();
            clientInfo.append('age', document.getElementById('age').value);
            clientInfo.append('mobile', document.getElementById('mobile').value);
            clientInfo.append('website', document.getElementById('website').value);
            clientInfo.append('language', document.getElementById('language').value);
            clientInfo.append('gender', document.getElementById('male').checked == 1 ? 'M' : 'F');
            clientInfo.append('email_contact', document.getElementById('email_contact').checked ? 1 : 0);
            clientInfo.append('chat_contact', document.getElementById('chat_contact').checked ? 1 : 0);
            clientInfo.append('phone_contact', document.getElementById('phone_contact').checked ? 1 : 0);
            clientInfo.append('address_one', document.getElementById('address_one').value);
            clientInfo.append('address_two', document.getElementById('address_two').value);
            clientInfo.append('postcode', document.getElementById('postcode').value);
            clientInfo.append('city', document.getElementById('city').value);
            clientInfo.append('state', document.getElementById('state').value);
            clientInfo.append('country', document.getElementById('country').value);
            clientInfo.append('client_id', id);
            axios.post('/admin/client-info', clientInfo)
                .then(function(response) {
                    // handle success
                    console.log(response);
                    toastr.success(response.data.message);
                    location.reload();
                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                    toastr.error(error.response.data.message)
                })
                .then(function() {
                    // always executed
                });
        }
    </script>
@endsection
