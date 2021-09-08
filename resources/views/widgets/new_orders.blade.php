
<a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-bell fa-fw"></i>
    <!-- Counter - Alerts -->
    <span class="badge badge-danger badge-counter">{{ count(array_filter($new_orders_alert)) }}</span>
</a>
<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
    
   <h6 class="dropdown-header">
        Alerts 
    </h6>

    @can('Top Up/New Orders')
        @if ($new_orders_alert['new_orders_topup'])
            <a class="dropdown-item d-flex align-items-center" href="{{ route('admin.topUp.order') }}">
                <div class="mr-3">
                    <div class="icon-circle bg-success">
                        <i class="fas fa-mobile-alt text-white"></i>
                    </div>
                </div>
                <div>
                    <span class="font-weight-bold">You Have New Top Up Order!</span>
                </div>
            </a>
        @endif
    @endcan        

    @can('Card/New Orders')
        @if ($new_orders_alert['new_orders_card'])
            <a class="dropdown-item d-flex align-items-center" href="{{ route('admin.card.order') }}">
                <div class="mr-3">
                    <div class="icon-circle bg-success">
                        <i class="fas fa-credit-card text-white"></i>
                    </div>
                </div>
                <div>
                    <span class="font-weight-bold">You Have New Card Order!</span>
                </div>
            </a>
        @endif
    @endcan

    @can('Merchants')
        @if ($new_orders_alert['new_orders_merchant'])
            <a class="dropdown-item d-flex align-items-center" href="{{ route('admin.merchant.order') }}">
                <div class="mr-3">
                    <div class="icon-circle bg-success">
                        <i class="fas fa-car-battery text-white"></i>
                    </div>
                </div>
                <div>
                    <span class="font-weight-bold">You Have New Merchant Order!</span>
                </div>
            </a>
        @endif
    @endcan 

    @can('Wallets')
        @if ($new_orders_alert['new_orders_wallet'])
            <a class="dropdown-item d-flex align-items-center" href="{{ route('admin.wallet.index') }}">
                <div class="mr-3">
                    <div class="icon-circle bg-success">
                        <i class="fas fa-wallet text-white"></i>
                    </div>
                </div>
                <div>
                    <span class="font-weight-bold">You Have New Wallet Order!</span>
                </div>
            </a>
        @endif
    @endcan 

    @if (count(array_filter($new_orders_alert)) == 0)
    <a class="dropdown-item d-flex align-items-center" href="#">
        <div class="mr-3">
           
        </div>
        <div class="text-center">
            There are no notifications
        </div>
    </a>
    @endif
    
</div>
