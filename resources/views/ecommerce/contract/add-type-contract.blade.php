@extends('ecommerce.index')

@section('page-title', 'Add Contract Type')

@section('content')
    <section id="basic-input">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Basic Inputs</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-4 col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="basicInput">Basic Input</label>
                                    <input type="text" class="form-control" id="basicInput" placeholder="Enter email">
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="helpInputTop">Input text with help</label>
                                    <small class="text-muted">eg.<i>someone@example.com</i></small>
                                    <input type="text" class="form-control" id="helpInputTop">
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="disabledInput">Disabled Input</label>
                                    <input type="text" class="form-control" id="disabledInput" disabled="">
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="helperText">With Helper Text</label>
                                    <input type="text" id="helperText" class="form-control" placeholder="Name">
                                    <p><small class="text-muted">Find helper text here for given textbox.</small></p>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 col-12 mb-1 mb-md-0">
                                <label class="form-label" for="disabledInput">Readonly Input</label>
                                <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
                                    value="You can't update me :P">
                            </div>
                            <div class="col-xl-4 col-md-6 col-12">
                                <label class="form-label" for="disabledInput">Readonly Static Text</label>
                                <p class="form-control-static" id="staticInput">email@pixinvent.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('scripts')

    {{-- Delete contractType --}}
    <script>
        function confirmDestroy(id, refranec) {
            Swal.fire({
                title: 'You\'re close to delete contractType, are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    destroy(id, refranec);
                }
            });
        }

        function destroy(id, refranec) {
            // admin/contractType/{contractType}
            axios.delete('/admin/contractType/' + id)
                .then(function(response) {
                    // handle success
                    console.log(response);
                    refranec.closest('tr').remove();
                    location.reload();
                    showDeletingResult(response.data);
                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                    showDeletingResult(error.response.data);
                })
                .then(function() {
                    // always executed
                });
        }

        function showDeletingResult(data) {
            Swal.fire({
                icon: data.icon,
                title: data.title,
                text: data.text,
                showConfirmButton: false,
                timer: 2000
            });
        }
    </script>

    {{-- Add contractType --}}
    <script>
        function store() {
            // admin/contractType
            axios.post('/admin/contractType', {
                    name: document.getElementById('name').value,
                    phone: document.getElementById('phone').value,
                    email: document.getElementById('email').value,
                    location: document.getElementById('location').value,
                    password: document.getElementById('password').value,
                    status: document.getElementById('status').value,
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
    </script>
@endsection
