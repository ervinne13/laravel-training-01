@extends('layouts.main')

@push('vendor_js')
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
@endpush

@push('js')
<script type="text/javascript" src="{{ asset('/js/modules/po/index.js') }}"></script>

<script>
IndexPage.init('{{ route("po.index") }}');</script>

@endpush

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    {{ __('Purchase Order Listing') }}
                    <a href="{{ route('po.create') }}">Create New</a>
                </div>

                <div class="card-body">

                    @include('components.flash-message')

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Transaction Code</th>
                                <th>Transaction Date</th>
                                <th>Vendor</th>
                                <th>Total Amount</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($purchaseOrders as $po)
                            <tr>
                                <td>{{ $po->transaction_code }}</td>
                                <td>@datetime($po->transaction_date)</td>
                                <td>{{ $po->vendor }}</td>
                                <td>{{ $po->total_amount }}</td>
                                <td>
                                    <a href="{{ route('po.edit', $po->transaction_code) }}">Edit</a>
                                    <a href="javascript:;" onclick="IndexPage.deletePO('{{ $po->transaction_code }}')">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection