@extends('layouts.admin_dynamic')

@section('content')
<div class="content-wrapper">
    <div class="">
        @include('customer.customer')
    </div>
</div>
@include('partials.gadds')
@endsection
