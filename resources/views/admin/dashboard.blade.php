@extends('layouts.admin')
@push('style')
<link rel="stylesheet" href="{{ asset('assets/') }}/vendor/vector-map/jqvmap.css">
<link rel="stylesheet" href="{{ asset('assets/') }}/vendor/jvectormap/jquery-jvectormap-2.0.2.css">
@endpush
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <div class="card shadow p-2">
                    <form action="{{ route('dashboard') }}" method="get" class="row">
                        <div class="col-3">
                            <div class="card p-2 shadow-lg">
                                <span style="font-size: 10pt; font-weight:bold">PRODUCT</span>
                                <select name="product" id="product" class="form-control">
                                    <option value="all">All</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}" {{ request('product')==$product->id?'selected':'' }}>{{ $product->product_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card p-2 shadow-lg">
                                <span style="font-size: 10pt; font-weight:bold">SHIPING COMPANY</span>
                                <select name="shipment" id="shipment" class="form-control">
                                    <option value="all">All</option>
                                    @foreach ($shipments as $shipment)
                                        <option value="{{ $shipment->id }}" {{ request('shipment')==$shipment->id?'selected':'' }}>{{ $shipment->company_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card p-2 shadow-lg">
                                <span style="font-size: 10pt; font-weight:bold">PAYMENT METHOD</span>
                                <select name="payment_method" id="payment_method" class="form-control">
                                    <option value="all">All</option>
                                    @foreach ($payment_methods as $payment_method)
                                        <option value="{{ $payment_method->id }}" {{ request('payment_method')==$payment_method->id ? 'selected' : '' }}>{{ $payment_method->payment_method }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card p-2 shadow-lg">
                                <span style="font-size: 10pt; font-weight:bold">RATING</span>
                                <select name="rating" id="rating" class="form-control">
                                    <option {{ request('rating')=='all'?'selected':'' }} value="all">All</option>
                                    <option {{ request('rating')==1?'selected':'' }} value="1">1</option>
                                    <option {{ request('rating')==2?'selected':'' }} value="2">2</option>
                                    <option {{ request('rating')==3?'selected':'' }} value="3">3</option>
                                    <option {{ request('rating')==4?'selected':'' }} value="4">4</option>
                                    <option {{ request('rating')==5?'selected':'' }} value="5">5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-sm btn-primary" type="submit">Filter</button>
                        </div>
                        {{-- <div class="col-12 mt-2">
                            <hr>
                            <div class="d-flex flex-wrap" style="gap:10px">
                                <label><input type="checkbox" name="month[]" value="01"> Januari</label>
                                <label><input type="checkbox" name="month[]" value="02"> Februari</label>
                                <label><input type="checkbox" name="month[]" value="03"> Maret</label>
                                <label><input type="checkbox" name="month[]" value="04"> April</label>
                                <label><input type="checkbox" name="month[]" value="05"> Mei</label>
                                <label><input type="checkbox" name="month[]" value="06"> Juni</label>
                                <label><input type="checkbox" name="month[]" value="07"> Juli</label>
                                <label><input type="checkbox" name="month[]" value="08"> Agustus</label>
                                <label><input type="checkbox" name="month[]" value="09"> September</label>
                                <label><input type="checkbox" name="month[]" value="10"> Oktober</label>
                                <label><input type="checkbox" name="month[]" value="11"> November</label>
                                <label><input type="checkbox" name="month[]" value="12"> Desember</label>
                            </div>
                        </div> --}}
                    </form>
                </div>
            </div>
            <div class="col-4">
                <span style="font-size: 18pt; font-weight:bold">DASHBOARD ECOMMERCE</span>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-inline-block">
                            <h5 class="text-muted">TOTAL PENJUALAN</h5>
                            <h2 class="mb-0"> Rp. {{ number_format($profit) }}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-inline-block">
                            <h5 class="text-muted">TOTAL PRODUCT SELLING</h5>
                            <h2 class="mb-0"> {{ number_format($product_selling) }}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-inline-block">
                            <h5 class="text-muted">TOTAL TRANSACTION</h5>
                            <h2 class="mb-0">{{ number_format($orders->count()) }}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-inline-block">
                            <h5 class="text-muted">TOTAL STOCK PRODUCT</h5>
                            <h2 class="mb-0"> {{ number_format($products->sum('stock')) }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-xl-8 col-lg-12 col-md-8 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Revenue</h5>
                    <div class="card-body">
                        <canvas id="myChart"></canvas>
                    </div>
                    <div class="card-body border-top">
                        <div class="row">
                            <div class="offset-xl-1 col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 p-3">
                                <h4> Total Penjualan Hari ini: Rp. {{ number_format($penjualan_now) }}</h4>
                            </div>
                            <div class="offset-xl-1 col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 p-3">
                                <h4 class="font-weight-normal mb-3"><span>Rp. {{ number_format($penjualan_before_total) }}</span></h4>
                                <div class="mb-0 mt-3 legend-item">
                                    <span class="fa-xs text-primary mr-1 legend-title "><i class="fa fa-fw fa-square-full"></i></span>
                                    <span class="legend-text">Penjualan Tahun {{ date('Y') - 1 }}</span></div>
                            </div>
                            <div class="offset-xl-1 col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 p-3">
                                <h4 class="font-weight-normal mb-3"><span>Rp. {{ number_format($penjualan_after_total) }}</span></h4>
                                <div class="text-muted mb-0 mt-3 legend-item"> <span class="fa-xs text-secondary mr-1 legend-title"><i class="fa fa-fw fa-square-full"></i></span><span class="legend-text">Penjualan Tahun {{ date('Y') }}</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end reveune  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- total sale  -->
            <!-- ============================================================== -->
            <div class="col-xl-4 col-lg-12 col-md-4 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Total Sale</h5>
                    <div class="card-body">
                        <canvas id="myChart1"></canvas>
                    </div>
                    <div class="card-body border-top">
                        <div class="chart-widget-list">
                            @foreach ($category_name as $idx => $name)
                            <p>
                                <span class="fa-xs text-primary mr-1 legend-title"><i class="fa fa-fw fa-square-full"></i></span><span class="legend-text"> {{ $name }}</span>
                                <span class="float-right">{{ $category_total[$idx] }} Item</span>
                            </p>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end total sale  -->
            <!-- ============================================================== -->
        </div>

    </div>
@endsection


@push('script')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('myChart');
    const ctx1 = document.getElementById('myChart1');
    let date = new Date();
    let year = date.getFullYear();
    let before = parseInt(year) - 1;
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'July', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
            datasets: [{
                label: 'Laporan Penjualan Tahun '+ before,
                data: @json($penjualan_before),
                borderWidth: 1
            },{
                label: 'Laporan Penjualan Tahun '+ year,
                data: @json($penjualan_after),
                borderWidth: 1
            }
            ]},
        options: {
            scales: {
            y: {
                beginAtZero: true
            }
            }
        }
    });
    new Chart(ctx1, {
        type: 'pie',
        data: {
            labels: @json($category_name),
            datasets: [{
                data: @json($category_total),
                borderWidth: 1
            }
            ]},
        options: {
            scales: {
            y: {
                beginAtZero: true
            }
            }
        }
    });
</script>
@endpush
