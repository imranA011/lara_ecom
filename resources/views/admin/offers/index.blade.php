@extends('layouts.admin-master')
@section('page-title', 'Offers')

@section('content')
    <div class="sl-pagebody">
        <div class="row row-sm mb-4">
            <div class="col-lg-12 mg-t-25 mg-xl-t-0">
                <div class="card form-layout form-layout-4">
                    <h6 class="h4 mb-4">Add Offer </h6>
                    @if (session('create-message'))
                        <h5 class="text-success text-center mb-3">{{ session('create-message') }}</h5>
                    @endif
                    <form action="{{ route('offer.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mg-b-10">
                            <div class="col-lg-4 mb-2">
                                <div class="form-group">
                                    <label class="form-control-label">Offer Name: <small class="tx-danger"> (required) </small></label>
                                    <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
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
                                    <input class="form-control @error('type') is-invalid @enderror" type="text" name="type"
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
                                    <input class="form-control @error('amount') is-invalid @enderror" type="number" name="amount"
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
                                        name="start">
                                    @error('start')
                                        <span class="text-danger fst-italic">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Offer End: <small class="tx-danger"> (required)
                                        </small></label>
                                    <input class="form-control @error('end') is-invalid @enderror" type="datetime-local" name="end">
                                    @error('end')
                                        <span class="text-danger fst-italic">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-layout-footer ">
                            <button type="submit" class="btn btn-info mg-r-5">Add New</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card form-layout form-layout-4">
                    <h6 class="h4 mb-4">Offer Lists</h6>
                    @if (session('update-message'))
                    <h6 class="text-success text-center mb-3">{{ session('update-message') }}</h6>
                    @endif
                    @if (session('delete-message'))
                        <h5 class="text-danger text-center mb-3">{{ session('delete-message') }}</h5>
                    @endif
                    @if (session('status-message'))
                        <h5 class="text-primary text-center mb-3">{{ session('status-message') }}</h5>
                    @endif
                    <table class="table table-hover text-center table-responsive">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Type</th>
                                <th class="text-center">Amount</th>
                                <th class="text-center">Offer Start</th>
                                <th class="text-center">Offer End</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($offers as $offer)
                                <tr>
                                    <td class="text-center">{{ $offer->id }}</td>
                                    <td class="text-center">{{ $offer->offer_name }}</td>
                                    <td class="text-center">{{ $offer->offer_type }}</td>
                                    <td class="text-center">{{ $offer->offer_amount }}</td>
                                    <td class="text-center">
                                        {{ Carbon\Carbon::parse($offer->offer_start)->format('Y/m/d  H:i:s A') }}</td>
                                    <td class="text-center">
                                        {{ Carbon\Carbon::parse($offer->offer_end)->format('Y/m/d  H:i:s A') }}</td>
                                    <td class="text-center">
                                        <input type="checkbox" class="offer_status" data-toggle="toggle" data-on="Active" data-off="Inactive" data-onstyle="success" data-offstyle="danger" data-id={{ $offer->id }} {{ $offer->status == 'active' ? 'checked' : 'inactive' }}>
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-primary my-1 py-1 rounded d-block" href="{{route('view.offer.products', $offer->id)}}">View Products</a>
                                        <a class="btn btn-info my-1 py-1 rounded d-block" href="{{route('show.edit.offer', $offer->id)}}">Edit</a>
                                        <a class="btn btn-danger my-1 py-1 rounded d-block" onclick="return confirm('Sure?')" href="{{route('delete.offer', $offer->id)}}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    $(document).ready(function(){
        $(".offer_status").change(function(){
            var fid = $(this).attr('data-id');
            if(this.checked){
                var fstatus = 'active';
            }else{
                var fstatus = 'inactive';
            }

            $.ajax({
                url: '/admin/offer/'+fid+'/'+fstatus,
                type: 'GET',
                success: function(result){
                    console.log(result);
                },
                error: function(error){
                    console.log(error);
                }
            });

        });

    });
</script>
@endpush
