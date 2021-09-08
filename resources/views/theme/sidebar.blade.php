<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.') }}">

        @php
            $logo = DB::table('settings')->where('name', 'site_logo')->select('value')->first();
        @endphp
            <img src="{{asset('/images/'.$logo->value)}}" alt="logo site" width="150px">
   
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{request()->is('admin') ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('admin.') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    @canany(['Top Up Amount', 'Game Top Up','Game Card', 'Codes'])

    <hr class="sidebar-divider">


        <!-- Heading -->
        <div class="sidebar-heading">
            Products
        </div>
    @endcanany
    <!-- Card -->
    @canany(['Game Card', 'Codes'])
        <li class="nav-item {{request()->is('admin/card','admin/codes','admin/cardType') ? 'active' : ''}}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-credit-card fa-cog"></i>
                <span>Card</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Add & Show & Edit:</h6>
                    @can('Game Card')
                        <a class="collapse-item" href="{{ route('admin.card.index') }}">Game Cards</a>
                    @endcan
                    @can('Codes')
                        <a class="collapse-item" href="{{ route('admin.code.index') }}">Codes</a>
                    @endcan

                </div>
            </div>
        </li>
    @endcanany

    <!-- Top Up -->
    @canany(['Top Up Amount', 'Game Top Up'])
        <li class="nav-item {{request()->is('admin/topup') ? 'active' : ''}}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTopUp"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-mobile-alt"></i>
                <span>Direct Top Up</span>
            </a>
            <div id="collapseTopUp" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Add & Show & Edit:</h6>
                        @can('Game Top Up')
                            <a class="collapse-item" href="{{ route('admin.topUp.index') }}">Game Top Up</a>
                        @endcan
                        @can('Top Up Amount')
                            <a class="collapse-item" href="{{ route('admin.topUp.amount.index') }}">Top Up Amount</a>
                        @endcan
                    
                </div>
            </div>
        </li>
    @endcanany

    
    @canany([
        'Top Up/New Orders', 'Top Up/Failed Orders', 'Top Up/Confermed Orders', 'Top Up/Failed Payment',
        'Wallets',
        'Merchants',
        'Card/New Orders', 'Card/Failed Orders', 'Card/Confermed Orders', 'Card/Failed Payment'
        ])
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
          Orders
      </div>
    @endcanany  
      {{-- Wallets --}}

        @can('Wallets')
            <li class="nav-item {{request()->is('admin/wallet') ? 'active' : ''}}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collabseWallet"
                    aria-expanded="true" aria-controls="collabseWallet">
                    <i class="fas fa-wallet"></i>
                    <span>Wallets</span>
                </a>
                <div id="collabseWallet" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Add && Show && Edit</h6>
                        <a class="collapse-item" href="{{ route('admin.wallet.index') }}">New Order</a>
                        <a class="collapse-item" href="{{ route('admin.wallet.rejected.order') }}">Rejected Order</a>
                        <a class="collapse-item" href="{{ route('admin.wallet.confermed.order') }}">Confermed Order</a>
                    </div>
                </div>
            </li>
        @endcan
 
      

    {{-- Merchants --}}
        @can('Merchants')
            <li class="nav-item {{request()->is('admin/merchant') ? 'active' : ''}}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collabseMerchant"
                    aria-expanded="true" aria-controls="collabseMerchant">
                    <i class="fas fa-car-battery"></i>
                    <span>Merchants</span>
                </a>
                <div id="collabseMerchant" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Add && Show && Edit</h6>
                        <a class="collapse-item" href="{{ route('admin.merchant.order') }}">New Order</a>
                        <a class="collapse-item" href="{{ route('admin.merchant.all') }}">All merchant</a>
                    </div>
                </div>
            </li>
        @endcan
      
        {{-- Card Order --}}
    @canany(['Card/New Orders', 'Card/Failed Orders', 'Card/Confermed Orders', 'Card/Failed Payment'])
        <li class="nav-item {{request()->is('admin/card/order') ? 'active' : ''}}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collabseCardOrder"
                aria-expanded="true" aria-controls="collabseCardOrder">
                <i class="fas fa-credit-card"></i>
                <span>Card</span>
            </a>
            <div id="collabseCardOrder" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Add && Show && Edit</h6>
                    @can('Card/New Orders')
                        <a class="collapse-item" href="{{ route('admin.card.order') }}">New Orders</a>
                    @endcan
                    @can('Card/Failed Orders')
                        <a class="collapse-item" href="{{ route('admin.card.failed.order') }}">failed Orders</a>
                    @endcan
                    @can('Card/Confermed Orders')
                        <a class="collapse-item" href="{{ route('admin.card.confermed.order') }}">Confermed Orders</a>
                    @endcan
                    @can('Card/Failed Payment')
                        <a class="collapse-item" href="{{ route('admin.card.failed.payment') }}">Failed Payment</a>
                    @endcan
                </div>
            </div>
        </li>
    @endcanany
        {{-- Top Up Order --}}
    @canany(['Top Up/New Orders', 'Top Up/Failed Orders', 'Top Up/Confermed Orders', 'Top Up/Failed Payment']) 
        <li class="nav-item {{request()->is('admin/topup/order') ? 'active' : ''}}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collabseTopUpOrder"
                aria-expanded="true" aria-controls="collabseTopUpOrder">
                <i class="fas fa-mobile-alt"></i>
                <span>Top Up</span>
            </a>
            <div id="collabseTopUpOrder" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Add && Show && Edit</h6>
                    @can('Top Up/New Orders')
                        <a class="collapse-item" href="{{ route('admin.topUp.order') }}">New Orders</a>
                    @endcan
                    @can('Top Up/Failed Orders')
                        <a class="collapse-item" href="{{ route('admin.topup.failed.order') }}">failed Orders</a>
                    @endcan
                    @can('Top Up/Confermed Orders')
                        <a class="collapse-item" href="{{ route('admin.topup.confermed.order') }}">Confermed Orders</a>
                    @endcan
                    @can('Top Up/Failed Payment')
                        <a class="collapse-item" href="{{ route('admin.topup.failed.payment') }}">failed Payment</a>
                    @endcan

                </div>
            </div>
        </li>
    @endcanany

    @canany(['Users', 'Localisation', 'Configurations', 'Pages']) 
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Settings
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        {{-- Localisation --}}
        @can('Localisation')
            <li class="nav-item {{request()->is('admin/currency') ? 'active' : ''}}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLocalisation"
                    aria-expanded="true" aria-controls="collapseLocalisation">
                    <i class="fab fa-shirtsinbulk "></i>
                    <span>Localisation</span>
                </a>
                <div id="collapseLocalisation" class="collapse" aria-labelledby="headingLocalisation" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Add && Show && Edit</h6>
                        <a class="collapse-item" href="{{ route('admin.currency.index') }}">Currencies</a>
                    </div>
                </div>
            </li>
        @endcan
        
        {{-- Pages --}}
        @can('Pages')
            <li class="nav-item {{request()->is('admin/pages') ? 'active' : ''}}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fab fa-shirtsinbulk "></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Add && Show && Edit</h6>
                        <a class="collapse-item" href="{{ route('admin.pages.index') }}">Pages</a>
                        <a class="collapse-item" href="{{ route('admin.pages.create') }}">Create Page</a>
                    </div>
                </div>
            </li>
        @endcan

        @can('Configurations')
            <li class="nav-item {{request()->is('admin/setting', 'admin/payment', 'admin/email') ? 'active' : ''}}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSetting"
                    aria-expanded="true" aria-controls="collapseSetting">
                    <i class="fab fa-shirtsinbulk "></i>
                    <span>Configurations</span>
                </a>
                <div id="collapseSetting" class="collapse" aria-labelledby="headingSetting" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Add && Show && Edit</h6>
                        <a class="collapse-item" href="{{ route('admin.setting.index') }}">Store Config</a>
                        <a class="collapse-item" href="{{ route('admin.payment.index') }}">Payments</a>
                        <a class="collapse-item" href="{{ route('admin.email.index') }}">Email</a>
                    </div>
                </div>
            </li>
        @endcan

        @can('Users')

        {{-- Coupons --}}
            <li class="nav-item {{request()->is('admin/coupon') ? 'active' : ''}}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCoupons"
                    aria-expanded="true" aria-controls="collapseCoupons">
                    <i class="fas fa-gift"></i>
                    <span>Coupons</span>
                </a>
                <div id="collapseCoupons" class="collapse" aria-labelledby="headingCoupons" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Add && Show && Edit</h6>
                        <a class="collapse-item" href="{{ route('admin.coupon.index') }}">All Coupons</a>
                        <a class="collapse-item" href="{{ route('admin.roles.index') }}">Permissions</a>
                    </div>
                </div>
            </li>
        {{-- Users --}}
            <li class="nav-item {{request()->is('admin/user','admin/roles') ? 'active' : ''}}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers"
                    aria-expanded="true" aria-controls="collapseUsers">
                    <i class="fas fa-users"></i>
                    <span>Users</span>
                </a>
                <div id="collapseUsers" class="collapse" aria-labelledby="headingUsers" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Add && Show && Edit</h6>
                        <a class="collapse-item" href="{{ route('admin.user.all') }}">Users</a>
                        <a class="collapse-item" href="{{ route('admin.roles.index') }}">Permissions</a>
                    </div>
                </div>
            </li>
        @endcan
    @endcanany

    

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul>