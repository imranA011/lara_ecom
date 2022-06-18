@extends('layouts.admin-master')
@section('page-title', 'Offers')

@section('content')
    <div class="sl-pagebody">
        <div class="row row-sm mb-4">
            <div class="col-lg-12 mg-t-25 mg-xl-t-0">
                <div class="card form-layout form-layout-4">
                    <h6 class="h4 mb-4">Update Offer </h6>
                    <form action="{{ route('submit.edit.offer', $offer->id) }}" method="POST">
                        @csrf
                        <div class="row mg-b-10">
                            <div class="col-lg-4 mb-2">
                                <div class="form-group">
                                    <label class="form-control-label">Offer Name: <small class="tx-danger"> (required) </small></label>
                                    <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{$offer->offer_name}}"
                                        placeholder="Enter Offer Name">
                                    @error('name')
                                        <span class="text-danger fst-italic">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4 mb-2">
                                <div class="form-group">
                                    <label class="form-control-label">Offer Type: <small class="tx-danger"> (required)
                                        </small></label>
                                    <input class="form-control @error('type') is-invalid @enderror" type="text" name="type" value="{{$offer->offer_type}}"
                                        placeholder="Enter Offer Type">
                                    @error('type')
                                        <span class="text-danger fst-italic">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4 mb-2">
                                <div class="form-group">
                                    <label class="form-control-label">Offer Amount: <small class="tx-danger"> (required)
                                        </small></label>
                                    <input class="form-control @error('amount') is-invalid @enderror" type="number" name="amount" value="{{$offer->offer_amount}}"
                                        placeholder="Enter Offer Amount">
                                    @error('amount')
                                        <span class="text-danger fst-italic">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Offer Start: <small class="tx-danger"> (required)
                                        </small></label>
                                    <input class="form-control @error('start') is-invalid @enderror" type="datetime-local"
                                        name="start" value="{{$offer->offer_start}}">
                                    @error('start')
                                        <span class="text-danger fst-italic">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Offer End: <small class="tx-danger"> (required)
                                        </small></label>
                                    <input class="form-control @error('end') is-invalid @enderror" type="datetime-local" name="end" value="{{$offer->offer_end}}">
                                    @error('end')
                                        <span class="text-danger fst-italic">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-layout-footer ">
                            <button type="submit" class="btn btn-info mg-r-5">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
