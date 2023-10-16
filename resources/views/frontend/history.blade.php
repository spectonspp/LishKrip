@extends('layouts.user')
@section('content')
<div class="container">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="in-progress-tab" data-bs-toggle="tab"
                data-bs-target="#in-progress-tab-pane" type="button" role="tab" aria-controls="in-progress-tab-pane"
                aria-selected="true">In
                Progress</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="accept-tab" data-bs-toggle="tab" data-bs-target="#accept-tab-pane"
                type="button" role="tab" aria-controls="accept-tab-pane" aria-selected="false">Accept</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="reject-tab" data-bs-toggle="tab" data-bs-target="#reject-tab-pane"
                type="button" role="tab" aria-controls="reject-tab-pane" aria-selected="false">Reject</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="cancel-tab" data-bs-toggle="tab" data-bs-target="#cancel-tab-pane"
                type="button" role="tab" aria-controls="cancel-tab-pane" aria-selected="false">Cancel</button>
        </li>
    </ul>
    <div class="tab-content p-3 shadow" id="myTabContent"
        style="border-left: solid 1px #dee2e6; border-right: solid 1px #dee2e6">
        <div class="tab-pane fade show active" id="in-progress-tab-pane" role="tabpanel"
            aria-labelledby="in-progress-tab" tabindex="0">
            @forelse (Auth::user()->ordersInProgress as $order)
            <div class="card p-3 mt-3">
                @php
                $running = 1;
                $total = 0;
                @endphp
                <table class="table table-borderless" style="table-layout: fixed !important;">
                    <thead>
                        <tr>
                            <td style="width: 40px !important;"></td>
                            <td style="width: 200px !important;"></td>
                            <td style="width: 50px !important;"></td>
                            <td style="width: 100px !important;text-align: right !important;"></td>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td colspan="4">
                                Order No. {{ $order->order_no }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <hr>
                            </td>
                        </tr>
                        @foreach ($order->orderDetails as $item)
                        @php
                        $sum = $item->quantity * $item->product->product_costprice;
                        @endphp
                        <tr>
                            <td style="width: 20px !important;">{{ $running }}.</td>
                            <td style="width: 200px !important;"><a
                                    href="{{ asset('images/' . $item->product->product_image) }}"
                                    data-fancybox="products_{{ $order->order_id }}"> <i
                                        class="fas fa-info-circle text-dark"></i></a>
                                <span>{{ $item->product->product_name }}</span>
                            </td>
                            <td style="width: 50px !important;">{{ $item->quantity }}</td>
                            <td style="width: 100px !important;text-align: right !important;">
                                {{ number_format($sum, 2) }}</td>
                        </tr>
                        @php
                        $running++;
                        $total += $sum;

                        @endphp
                        @endforeach
                        <tr>
                            <td colspan="4">
                                <hr>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" style="text-align: right">
                                {{ number_format($total, 2) }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                @if (!$order->slip)
                                <form action="{{ route('upload.slip') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="order_id" value="{{ $order->order_id }}">
                                    <input type="file" name="slip" id="slip" class="form-control">
                                    <div class="text-end">
                                        <button type="submit"
                                            class="btn btn-outline-primary mt-2 rounded-0">Upload</button>
                                    </div>
                                </form>
                                @else
                                <button type="button" class="btn btn-outline-success float-end rounded-0"
                                    data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    Show Slip
                                </button>
                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Show Slip</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="{{ asset('images/slip/' . $order->slip) }}" class="w-100">
                                            </div>
                                            <div class="modal-footer py-1">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            @empty
            <div class="card p-3 mt-3">
                Not found
            </div>
            @endforelse
        </div>
        <div class="tab-pane fade" id="accept-tab-pane" role="tabpanel" aria-labelledby="accept-tab" tabindex="0">
            @forelse (Auth::user()->ordersApprove as $order)
            <div class="card p-3 mt-3">
                @php
                $running = 1;
                $total = 0;
                @endphp
                <table class="table table-borderless" style="table-layout: fixed !important;">
                    <thead>
                        <tr>
                            <td style="width: 40px !important;"></td>
                            <td style="width: 200px !important;"></td>
                            <td style="width: 50px !important;"></td>
                            <td style="width: 100px !important;text-align: right !important;"></td>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td colspan="4">
                                Order No. {{ $order->order_no }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <hr>
                            </td>
                        </tr>
                        @foreach ($order->orderDetails as $item)
                        @php
                        $sum = $item->quantity * $item->price;
                        @endphp
                        <tr>
                            <td style="width: 20px !important;">{{ $running }}.</td>
                            <td style="width: 200px !important;"><a
                                    href="{{ asset('images/' . $item->product->product_image) }}"
                                    data-fancybox="products_{{ $order->id }}"> <i
                                        class="fas fa-info-circle text-dark"></i></a>
                                <span>{{ $item->product->product_name }}</span>
                            </td>
                            <td style="width: 50px !important;">{{ $item->quantity }}</td>
                            <td style="width: 100px !important;text-align: right !important;">
                                {{ number_format($sum, 2) }}</td>
                        </tr>
                        @php
                        $running++;
                        $total += $sum;
                        @endphp
                        @endforeach
                        <tr>
                            <td colspan="4">
                                <hr>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" style="text-align: right">
                                {{ number_format($total, 2) }}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            @empty
            <div class="card p-3 mt-3">
                Not found
            </div>
            @endforelse
        </div>
        <div class="tab-pane fade" id="reject-tab-pane" role="tabpanel" aria-labelledby="reject-tab" tabindex="0">
            @forelse (Auth::user()->ordersReject as $order)
            <div class="card p-3 mt-3">
                @php
                $running = 1;
                $total = 0;
                @endphp
                <table class="table table-borderless" style="table-layout: fixed !important;">
                    <thead>
                        <tr>
                            <td style="width: 40px !important;"></td>
                            <td style="width: 200px !important;"></td>
                            <td style="width: 50px !important;"></td>
                            <td style="width: 100px !important;text-align: right !important;"></td>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td colspan="4">
                                Order No. {{ $order->order_no }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <hr>
                            </td>
                        </tr>
                        @foreach ($order->orderDetails as $item)
                        @php $sum = $item->quantity * $item->price; @endphp
                        <tr>
                            <td style="width: 20px !important;">{{ $running }}.</td>
                            <td style="width: 200px !important;"><a
                                    href="{{ asset('images/' . $item->product->product_image) }}"
                                    data-fancybox="products_{{ $order->id }}"> <i
                                        class="fas fa-info-circle text-dark"></i></a>
                                <span>{{ $item->product->product_name }}</span>
                            </td>
                            <td style="width: 50px !important;">{{ $item->quantity }}</td>
                            <td style="width: 100px !important;text-align: right !important;">
                                {{ number_format($sum, 2) }}</td>
                        </tr>
                        @php
                        $running++;
                        $total += $sum;
                        @endphp
                        @endforeach
                        <tr>
                            <td colspan="4">
                                <hr>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" style="text-align: right">
                                {{ number_format($total, 2) }}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            @empty
            <div class="card p-3 mt-3">
                Not found
            </div>
            @endforelse
        </div>
        <div class="tab-pane fade" id="cancel-tab-pane" role="tabpanel" aria-labelledby="cancel-tab" tabindex="0">
            @forelse (Auth::user()->ordersCancel as $order)
            <div class="card p-3 mt-3">
                @php
                $running = 1;
                $total = 0;
                @endphp
                <table class="table table-borderless" style="table-layout: fixed !important;">
                    <thead>
                        <tr>
                            <td style="width: 40px !important;"></td>
                            <td style="width: 200px !important;"></td>
                            <td style="width: 50px !important;"></td>
                            <td style="width: 100px !important;text-align: right !important;"></td>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td colspan="4">
                                Order No. {{ $order->order_no }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <hr>
                            </td>
                        </tr>
                        @foreach ($order->orderDetails as $item)
                        @php $sum = $item->quantity * $item->price; @endphp
                        <tr>
                            <td style="width: 20px !important;">{{ $running }}.</td>
                            <td style="width: 200px !important;"><a
                                    href="{{ asset('images/' . $item->product->product_image) }}"
                                    data-fancybox="products_{{ $order->id }}"> <i
                                        class="fas fa-info-circle text-dark"></i></a>
                                <span>{{ $item->product->product_name }}</span>
                            </td>
                            <td style="width: 50px !important;">{{ $item->quantity }}</td>
                            <td style="width: 100px !important;text-align: right !important;">
                                {{ number_format($sum, 2) }}</td>
                        </tr>
                        @php
                        $running++;
                        $total += $sum;
                        @endphp
                        @endforeach
                        <tr>
                            <td colspan="4">
                                <hr>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" style="text-align: right">
                                {{ number_format($total, 2) }}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            @empty
            <div class="card p-3 mt-3">
                Not found
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
