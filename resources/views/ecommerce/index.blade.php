@extends('ecommerce.parent')


@section('content')

@endsection


@section('aside')
<li class="nav-item has-sub" style=""><a class="d-flex align-items-center" href="index.html"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg><span class="menu-title text-truncate" data-i18n="Dashboards">Dashboards</span><span class="badge badge-light-warning rounded-pill ms-auto me-1">2</span></a>
    <ul class="menu-content">
        <li><a class="d-flex align-items-center" href="dashboard-analytics.html"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg><span class="menu-item text-truncate" data-i18n="Analytics">Analytics</span></a>
        </li>
        <li><a class="d-flex align-items-center" href="dashboard-ecommerce.html"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg><span class="menu-item text-truncate" data-i18n="eCommerce">eCommerce</span></a>
        </li>
    </ul>
</li>

<li class="nav-item has-sub sidebar-group-active" style=""><a class="d-flex align-items-center" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg><span class="menu-title text-truncate" data-i18n="User">User</span></a>
    <ul class="menu-content">
        <li><a class="d-flex align-items-center" href="app-user-list.html"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg><span class="menu-item text-truncate" data-i18n="List">List</span></a>
        </li>
        <li><a class="d-flex align-items-center" href="app-user-view.html"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg><span class="menu-item text-truncate" data-i18n="View">View</span></a>
        </li>
    </ul>
</li>
@endsection
