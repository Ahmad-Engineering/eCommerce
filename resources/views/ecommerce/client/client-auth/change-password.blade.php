@extends('ecommerce.index')

@section('page-title', 'Change Client Password')

@section('content')
    <div class="content-body">
        <!-- Validation -->
        <section class="bs-validation">
            <div class="row">
                <!-- Bootstrap Validation -->
                {{-- <div class="col-md-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ $client->name . ' Change Password' }}</h4>
                        </div>
                        <div class="card-body">
                            <form class="needs-validation" novalidate="" id="change-password">
                                <div class="mb-1">
                                    <label class="form-label" for="basic-addon-name">New Password</label>
                                    <input type="password" id="new_password" class="form-control"
                                        placeholder="New Password Like: !kajdsA21sa!^" aria-label="password"
                                        aria-describedby="basic-addon-name">
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="basic-addon-name">Re-New Password</label>
                                    <input type="password" id="re_new_password" class="form-control"
                                        placeholder="Add the same above password" aria-label="password"
                                        aria-describedby="basic-addon-name">
                                </div>
                                <button type="button" onclick="changePassword({{$client->id}})"
                                    class="btn btn-primary waves-effect waves-float waves-light">Submit</button>
                            </form>
                        </div>
                    </div>
                </div> --}}
                <!-- /Bootstrap Validation -->

                <!-- jQuery Validation -->
                <div class="col-md-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{$client->name . ' Change Password'}}</h4>
                        </div>
                        <div class="card-body">
                            <form id="jquery-val-form" method="post" novalidate="novalidate">
                                <div class="mb-1">
                                    <label class="form-label" for="basic-default-password">Password</label>
                                    <input type="password" id="new_password" name="basic-default-password"
                                        class="form-control" placeholder="············">
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="confirm-password">Confirm Password</label>
                                    <input type="password" id="re_new_password" name="confirm-password"
                                        class="form-control" placeholder="············">
                                </div>
                                <button type="button" class="btn btn-primary waves-effect waves-float waves-light" onclick="changePassword({{$client->id}})"
                                    name="submit" value="Submit">Change</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /jQuery Validation -->
            </div>
        </section>
        <!-- /Validation -->

    </div>
@endsection

@section('scripts')
    <script>
        function changePassword(id) {
            // admin/client/change-password
            axios.post('/admin/client/change-password/', {
                    new_password: document.getElementById('new_password').value,
                    re_new_password: document.getElementById('re_new_password').value,
                    client_id: id,
                })
                .then(function(response) {
                    // handle success
                    console.log(response);
                    toastr.success(response.data.message);
                    window.location.href = '/admin/client';
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
@endsection
