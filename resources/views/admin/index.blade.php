@extends('theme.default')
@section('title', $title)
@section('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
@endsection    

@section('content')


    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        @can('Wallets')
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <a href="{{ route('admin.wallet.index') }}"><div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                New Order (Wallet)</div></a>
                            
                                <div class="h5 mb-0 mt-3 font-weight-bold text-gray-800">{{ $data['wallet']}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-wallet fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endcan
       
        @can('Merchants')
            <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                
                                <a href="{{ route('admin.merchant.order') }}">New Order (Merchants)</a>
                            </div>
                           
                                <div class="h5 mb-0 mt-1 font-weight-bold text-gray-800">{{  $data['merchant']}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-car-battery fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endcan
        
        @can('Card/New Orders')
             <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">New Order (Card)</div>
                            <div class="h5 mb-0 mt-3 font-weight-bold text-gray-800">{{ count(collect($data['card']))}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-credit-card fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endcan
       
        @can('Top Up/New Orders')
            <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                New Order (TopUp)
                            </div>
                            <div class="h5 mb-0 mt-3 font-weight-bold text-gray-800">{{ count(collect($data['topup']))}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-mobile-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endcan

        
    </div>

    <!-- Content Row -->

    <div class="row">
        @if (Auth::user()->hasRole('Admin'))

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    TOTAL SALES</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">${{$data['total_sales']}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    THIS MONTH SALES</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">${{$data['month_sales']}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    TOTAL ORDER DELIVERED</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$data['total_order']}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    THIS MONTH ORDER DELIVERED</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$data['month_order']}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    USERS</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$data['total_user']}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    MERCHANT</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$data['total_merchant']}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    CODES IN STOCK</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$data['codes_stock']}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    TOPUP IN STOCK</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$data['topup_stock']}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endif
    </div>
    

    <!-- Content Row -->
    <div class="row">

        @can('Card/New Orders')
        <!-- Content Column -->
        <div class="col-lg-12 mb-4">

            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">New Order (Card)</h6>
                </div>
                <div class="card-body">
                            <div class="table-responsive">
                                <table id="table_card" class=" table table-stribed text-left">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">payment_method</th>
                                            <th class="text-center">Created at</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data['card'] as $row)
                                            <tr>
                                                <td><a href="{{ route('admin.card.order.show', $row->id) }}">Order#{{$row->id}}</a></td>
                                                <td class="text-center">{{ $row->email }}</td>
                                                <td class="text-center">{{ $row->payment_method }}</td>
                                                <td>{{ $row->created_at }}</td>
                                            </tr>
                                        @endforeach    
                                    </tbody>
                                </table>
                            </div>
                </div>
            </div>

        </div>
        @endcan
        
        @can('Top Up/New Orders')
        <div class="col-lg-12 mb-4">

            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">New Order (Top Up)</h6>
                </div>
                <div class="card-body">
                            <div class="table-responsive">
                                <table id="table_topup" class=" table table-stribed text-left">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">payment_method</th>
                                            <th class="text-center">Created at</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data['topup'] as $row)
                                            <tr>
                                                <td><a href="{{ route('admin.topup.order.show', $row->id) }}">Order#{{$row->id}}</a></td>
                                                <td class="text-center">{{ $row->email }}</td>
                                                <td class="text-center">{{ $row->payment_method }}</td>
                                                <td>{{ $row->created_at }}</td>
                                            </tr>
                                        @endforeach    
                                    </tbody>
                                </table>
                            </div>
                </div>
            </div>

        </div>
        @endcan
    </div>


  <!-- Content Row -->
  



    {{-- Chart.js --}}

    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Monthly Order</h6>
                </div>
                <div class="card-body">
                     <canvas id="ordersChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Monthly User Joined</h6>
                </div>
                <div class="card-body">
                     <canvas id="usersChart"  ></canvas>
                </div>
            </div>
        </div>
    </div>



@endsection
@section('script')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
<script>

    $(document).ready( function () {
        $('#table_card').DataTable();
        $('#table_topup').DataTable();
    });
</script>


<script>

    // Chart js
    
    var month = <?php echo $month; ?>;

    var user = <?php echo $user; ?>;


    var barChartData = {

        labels: month,

        datasets: [
            {

            label: 'User',

            backgroundColor: "pink",

            data: user,
           

            },
   
                ]

    };


    window.onload = function() {

        var ctx = document.getElementById("usersChart").getContext("2d");

        window.myBar = new Chart(ctx, {

            type: 'bar',

            data: barChartData,

            options: {
                scales: {
                    y: {
                        beginAtZero: false
                    }
                }
            }

        });

    };



    var order_topup_month = <?php echo $order_topup_month; ?>;
    var order_card_month = <?php echo $order_card_month; ?>;

var ctx = document.getElementById('ordersChart');

var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: month,
        datasets: [
            {
            
                label: '# of Top Up',
                data: order_topup_month,
                backgroundColor: [
                    'rgba(31, 135, 239, 1)',
                ],
                borderColor: [
                    'rgba(31, 135, 239, 1)',
    
                ],
                borderWidth: 1,
  
            },
            {
            
                label: '# of Card',
                data: order_card_month,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',

                ],
                borderWidth: 1,

            }
       

            ]
                },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

</script>
@endsection