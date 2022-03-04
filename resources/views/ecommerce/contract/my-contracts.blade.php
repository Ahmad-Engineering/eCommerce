@extends('ecommerce.index')

@section('page-title', 'Contracts')

@section('content')
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Contracts</h4>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        This is your contracts with your clients.<br>
                        <code>
                            note:
                        </code> Any contract his tax price is not paid, your account will blocked after 5 days.
                    </p>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Contract</th>
                                <th>Client</th>
                                <th>Status</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Price</th>
                                <th>Tax</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($contracts as $contract)
                                <tr>
                                    <td>
                                        {{ $no }}
                                    </td>
                                    <td>
                                        <span class="fw-bold">{{ $contract->type }}</span>
                                    </td>
                                    <td>
                                        {{ $contract->client->name }}
                                    </td>
                                    <td>
                                        @if ($contract->status)
                                            <span class="badge rounded-pill badge-light-primary me-1">Active</span>
                                        @else
                                            <span class="badge rounded-pill badge-light-warning me-1">Pending</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $contract->from_date }}
                                    </td>
                                    <td>
                                        {{ $contract->to_date }}
                                    </td>
                                    <td>
                                        {{ round($contract->price) }}
                                    </td>
                                    <td>
                                        {{ round($contract->tax_no) }}
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button"
                                                class="btn btn-sm dropdown-toggle hide-arrow waves-effect waves-float waves-light"
                                                data-bs-toggle="dropdown">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-more-vertical">
                                                    <circle cx="12" cy="12" r="1"></circle>
                                                    <circle cx="12" cy="5" r="1"></circle>
                                                    <circle cx="12" cy="19" r="1"></circle>
                                                </svg>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item"
                                                    href="{{ route('contract-type.edit', $contract->id) }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-edit-2 me-50">
                                                        <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                        </path>
                                                    </svg>
                                                    <span>Edit</span>
                                                </a>
                                                <a class="dropdown-item" href="#" id="Link"
                                                    onclick="confirmDestroy({{ $contract->id }}, this)">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-trash me-50">
                                                        <polyline points="3 6 5 6 21 6"></polyline>
                                                        <path
                                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                        </path>
                                                    </svg>
                                                    <span>Delete</span>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @php
                                    ++$no;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
