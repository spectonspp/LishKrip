@extends('layouts.app')

@section('content')
    <div class="row mt-3">
        <div class="col-2 border py-1">Order No.</div>
        <div class="col-3 border py-1">Name</div>
        <div class="col-3 border py-1">Address</div>
        <div class="col-2 border py-1">Tel</div>
        <div class="col-2 border py-1">Status</div>
    </div>
    @foreach ($deliveries as $delivery)
        <div class="row m">
            <div class="col-2 border border-top-0 py-1">{{ $delivery->order_no }}</div>
            <div class="col-3 border border-top-0 py-1">{{ $delivery->fname }} {{ $delivery->lname }}</div>
            <div class="col-3 border border-top-0 py-1">{{ $delivery->address }}</div>
            <div class="col-2 border border-top-0 py-1">{{ $delivery->tel }}</div>
            <div class="col-2 border border-top-0 py-1">{{ $delivery->status }}</div>
        </div>
    @endforeach
@endsection
