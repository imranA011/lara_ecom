@extends('layouts.admin-master')
@section('page-title', 'Orders')

@section('content')
    <div class="sl-pagebody">
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card form-layout form-layout-4">
                    <h6 class="h4 mb-3">Order Lists</h6>

                    @if (session('update-message'))
                        <h5 class="text-success text-center">{{ session('update-message') }}</h5>
                    @endif
                    @if (session('delete-message'))
                        <h5 class="text-danger text-center">{{ session('delete-message') }}</h5>
                    @endif
                    @if (session('status-message'))
                        <h5 class="text-primary text-center">{{ session('status-message') }}</h5>
                    @endif
                    <form action="{{ route('update.order.status') }}" method="POST">
                        @csrf
                        <div class="table-wrapper">
                            <table class="table display responsive nowrap">
                                <thead>
                                    <tr>
                                        <td>
                                            <label class="ckbox mg-b-0">
                                                <input type="checkbox" id="checkAll"><span></span>
                                            </label>
                                        </td>
                                        <th class="wd-15p">Invoice</th>
                                        <th class="wd-15p">Date</th>
                                        <th class="wd-15p">Status</th>
                                        <th class="wd-15p">Amount</th>
                                        <th class="wd-15p">Payment Type</th>
                                        <th class="wd-20p">Order By</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>
                                                <label class="ckbox mg-b-0">
                                                    <input type="checkbox" class="checkboxes" name="order_checked[]" value={{$order->id}}><span></span>
                                                </label>
                                            </td>
                                            <td>{{ $order->invoice }}</td>
                                            <td>{{ Carbon\Carbon::parse($order->created_at)->format('Y-m-d') }}</td>
                                            <td>{{ $order->status }}</td>
                                            <td>{{ number_format($order->total, 2) }}</td>
                                            <td>{{ $order->payment_type }}</td>
                                            <td>{{ $order->billingAddress->fname }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <select style="padding:6px; " name="update_order_status" id="">
                                <option label="Bulk actions"></option>
                                <option value="processing">Change status to processing</option>
                                <option value="on-hold">Change status to on-hold</option>
                                <option value="cancelled">Change status to cancelled</option>
                                <option value="completed">Change status to completed</option>
                                <option value="refunded">Change status to refunded</option>
                                <option value="delete">Move to Trash</option>
                            </select>
                            <input type="submit" name="submit" value="Apply"
                                style="width:80px; margin-bottom:1px; padding:5px 0" class="btn btn-sm btn-primary rounded">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>

    $(document).ready(function(){

        $('#checkAll').change(function(){
            
            if ($(this).is(":checked"))
            {
                $('.checkboxes').prop("checked", true);
            }
            else
            {
                $('.checkboxes').prop("checked", false);
            }
        });
    });

</script>
@endpush
