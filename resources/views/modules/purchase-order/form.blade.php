@extends('layouts.main')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Purchase Order') }}</div>

                <div class="card-body">

                    @include('components.flash-message')

                    <form method="POST" action="{{ route($submitRoute, $po->transaction_code) }}" enctype="multipart/form-data">
                        @csrf

                        @if ($po->transaction_code)
                        {{ method_field('PATCH') }}
                        @endif

                        <div class="form-group row">
                            <label for="transaction_code" class="col-sm-4 col-form-label text-md-right">{{ __('Transaction Code') }}</label>

                            <div class="col-md-6">
                                <input type="text" 
                                       class="form-control{{ $errors->has('transaction_code') ? ' is-invalid' : '' }}" 
                                       name="transaction_code" 
                                       value="{{ old('transaction_code', $po->transaction_code) }}" >

                                @if ($errors->has('transaction_code'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('transaction_code') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="vendor" class="col-sm-4 col-form-label text-md-right">{{ __('Vendor') }}</label>

                            <div class="col-md-6">
                                <input type="text" 
                                       class="form-control{{ $errors->has('vendor') ? ' is-invalid' : '' }}" 
                                       name="vendor" 
                                       value="{{ old('vendor', $po->vendor) }}" >

                                @if ($errors->has('vendor'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('vendor') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="total_amount" class="col-sm-4 col-form-label text-md-right">{{ __('Total Amount') }} (Temporary only)</label>

                            <div class="col-md-6">
                                <input type="text" 
                                       class="form-control{{ $errors->has('total_amount') ? ' is-invalid' : '' }}" 
                                       name="total_amount" 
                                       value="{{ old('total_amount', $po->total_amount) }}" >

                                @if ($errors->has('total_amount'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('total_amount') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="total_amount" class="col-sm-4 col-form-label text-md-right">{{ __('Total Amount') }} (Temporary only)</label>

                            <div class="col-md-6">
                                <input type="text" 
                                       class="form-control{{ $errors->has('total_amount') ? ' is-invalid' : '' }}" 
                                       name="total_amount" 
                                       value="{{ old('total_amount', $po->total_amount) }}" >

                                @if ($errors->has('total_amount'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('total_amount') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="supporting_document" class="col-sm-4 col-form-label text-md-right">{{ __('Supporting Document') }}</label>

                            <div class="col-md-6">

                                @if($po->supporting_document_url)
                                <a href="{{ $po->supporting_document_url }}">Download</a>
                                @endif

                                <input type="file" 
                                       class="form-control{{ $errors->has('supporting_document') ? ' is-invalid' : '' }}" 
                                       name="supporting_document" >

                                @if ($errors->has('supporting_document'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('supporting_document') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save Purchase Order') }}
                                </button>

                                <a href="{{ route('po.index') }}" class="btn btn-default">
                                    {{ __('Close') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection