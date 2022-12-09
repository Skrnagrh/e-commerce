@extends('admin.partials.main')

@section('content')
    <div class="content-wrapper">
        <div class="row mx-2">
                <div class="card m-2">
                    <div class="card-header">
                        <h3 class="card-title">Order Toko {{ Auth()->user()->name }}</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-sm">
                            <thead class="text-center">
                                <tr>
                                    <th style="width: 10px">No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Product</th>
                                    <th>quantity</th>
                                    <th>price</th>
                                    <th>payment status</th>
                                    <th>Delivery processing</th>
                                    <th>image</th>
                                    <th style="width: 40px" colspan="4">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders as $order)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $order->name }}</td>
                                        <td>{{ $order->email }}</td>
                                        <td>{{ $order->phone }}</td>
                                        <td>{{ $order->address }}</td>
                                        <td>{{ $order->product_title }}</td>
                                        <td>{{ $order->quantity }}</td>
                                        <td>Rp{{ $order->price }}</td>
                                        <td>{{ $order->payment_status }}</td>
                                        <td>{{ $order->delivery_status }}</td>
                                        <td><img src="{{ asset('storage/' . $order->image) }}"></td>
                                        <td><a href="/admin/order/{{ $order->title }}" class="badge bg-success"><i class="nav-icon fas fa-eye"></i> Show</a>
                                        </td>

                                        <td>
                                            @if ($order->delivery_status == 'processing')
                                                
                                            <a href="/admin/order/{{ $order->id }}" class="badge bg-primary" onclick="return confirm('Are you sure this product is delivered')"><i class="nav-icon fas fa-truck"></i> Delivered</a>
                                            @else
                                            <p style="color: green">Delivered</p>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('print_pdf', $order->id) }}" class="badge bg-secondary">Print</a>
                                        </td>
                                        <td>
                                            <a href="{{ url('send_email', $order->id) }}" class="badge bg-info">send email</a>
                                        </td>
                                        
                                    </tr>
                                    @empty
                                        
                                    <tr>
                                        <td colspan="16" style="text-align: center">
                                            No Data Fund
                                        </td>
                                    </tr>
                                    
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7">Total Semua</td>
                                    <td>Rp{{ number_format($total_revenue,3,'.','.') }}
                                    </td>
                                </tr>
                            </tfoot>
                            
                        </table>
                    </div>
                    <div class="card-footer clearfix">
                        <div class="justify-content-between pagination-sm">
                            {{ $orders->links() }}
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
