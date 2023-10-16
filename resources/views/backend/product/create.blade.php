@extends('layouts.app')

@section('content')
    <form action="{{ route('product.store') }}" enctype="multipart/form-data" method="POST">
        @csrf
        @include('backend.product.form')
        <div class="row justify-content-end">
            <div class="col-2 m-2">
                <div class="row">
                    <div class="col">
                        <button type="button" class="btn btn-warning text-white form-control"
                            onclick="window.location='{{ route('product.index') }}'">Back</button>
                    </div>
                    <div class="col"><button type="submit" class="btn btn-primary form-control">Submit</button></div>
                </div>
            </div>
        </div>
    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
    integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
