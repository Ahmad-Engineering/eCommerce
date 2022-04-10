@extends('ecommerce.index')

@section('page-title', 'Admin Activities')

@section('content')
    <table>
        <tr>
            <th>#</th>
            <th>Activity</th>
            <th>at</th>
        </tr>
        @php
            $no = 1;
        @endphp
        @foreach ($activities as $activity)
            <tr>
                <td>{{$no}}</td>
                <td>{{$activity->activity}}</td>
                <td>{{$activity->created_at->format('d-m-y')}}</td>
            </tr>
            @php
                ++$no;
            @endphp
        @endforeach
    </table>
@endsection
