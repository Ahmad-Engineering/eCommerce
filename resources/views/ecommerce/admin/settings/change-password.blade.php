@extends('ecommerce.index')

@section('page-title', 'Change ' . auth('admin')->user()->name . ' Password')

@section('content')
    <div class="content-body">
        <!-- Validation -->
        <section class="bs-validation">
            <div class="row">

                <!-- jQuery Validation -->
                <div class="col-md-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ auth('admin')->user()->name . ' Change Password' }}</h4>
                        </div>
                        <div class="card-body">
                            <form id="change-password-form" novalidate="novalidate">
                                <div class="mb-1">
                                    <label class="form-label" for="old_password">Current Password</label>
                                    <input type="password" id="old_password" name="basic-default-password"
                                        class="form-control" placeholder="············">
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="new_password">New Password</label>
                                    <input type="password" id="new_password" name="basic-default-password"
                                        class="form-control" placeholder="············">
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="re_new_password">Confirm Password</label>
                                    <input type="password" id="re_new_password" name="confirm-password"
                                        class="form-control" placeholder="············">
                                </div>
                                <button type="button" class="btn btn-primary waves-effect waves-float waves-light"
                                    onclick="changePassword()" name="submit" value="Submit">Change</button>
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
        function changePassword() {
            // admin/client/change-password
            axios.put('/admin/admin-settings/change-password/', {
                    old_password: document.getElementById('old_password').value,
                    new_password: document.getElementById('new_password').value,
                    re_new_password: document.getElementById('re_new_password').value,
                })
                .then(function(response) {
                    // handle success
                    console.log(response);
                    toastr.success(response.data.message);
                    document.getElementById('change-password-form').reset();
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
