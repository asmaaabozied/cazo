<li class="{{ Request::is('home') ? 'active' : '' }}">
    <a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
</li>

@if(Auth::user()->hasPermission("Roles"))
    <li class="{{ Request::is('roles*') ? 'active' : '' }}">
        <a href="{{ route('roles.index') }}"><i class="fa fa-lock"></i><span>Roles</span></a>
    </li>
@endif
@if(Auth::user()->hasPermission("Admins"))
    <li class="{{ Request::is('admins*') ? 'active' : '' }}">
        <a href="{{ route('admins.index') }}"><i class="fa fa-user-secret"></i><span>Admins</span></a>
    </li>
@endif
@if(Auth::user()->hasPermission("Clients"))
    <li class="{{ Request::is('clients*') ? 'active' : '' }}">
        <a href="{{ route('clients.index') }}"><i class="fa fa-users"></i><span>Clients</span></a>
    </li>
@endif

@if(Auth::user()->hasPermission("Categories"))
    <li class="{{ Request::is('categories*') ? 'active' : '' }}">
        <a href="{{ route('categories.index') }}"><i class="fa fa-database"></i><span>Categories</span></a>
    </li>
@endif

@if(Auth::user()->hasPermission("Clinics"))
    <li class="{{ Request::is('clinics*') ? 'active' : '' }}">
        <a href="{{ route('clinics.index') }}"><i class="fa fa-heartbeat"></i><span>Clinics</span></a>
    </li>
@endif
@if(Auth::user()->hasPermission("Specializations"))
    <li class="{{ Request::is('specializations*') ? 'active' : '' }}">
        <a href="{{ route('specializations.index') }}"><i class="fa fa-clone"></i><span>Specializations</span></a>
    </li>
@endif

@if(Auth::user()->hasPermission("Offers"))
    <li class="{{ Request::is('offers*') ? 'active' : '' }}">
        <a href="{{ route('type_offers') }}"><i class="fa fa-money"></i><span>TypeOffers</span></a>
    </li>
@endif

@if(Auth::user()->hasPermission("Offers"))
    <li class="{{ Request::is('offers*') ? 'active' : '' }}">
        <a href="{{ route('offers.index') }}"><i class="fa fa-money"></i><span>Offers</span></a>
    </li>
@endif
@if(Auth::user()->hasPermission("Coupons"))
    <li class="{{ Request::is('coupons*') ? 'active' : ''}}">
        <a href="{{ route('coupons.index') }}"><i class="fa fa-tags"></i><span>Coupons</span></a>
    </li>
@endif
{{-- @if(Auth::user()->hasPermission("Brands"))
    <li class="{{ Request::is('brands*') ? 'active' : '' }}">
        <a href="{{ route('brands.index') }}"><i class="fa fa-ship"></i><span>Brands</span></a>
    </li>
@endif --}}
@if(Auth::user()->hasPermission("Reviews"))
    <li class="{{ Request::is('reviews*') ? 'active' : '' }}">
        <a href="{{ route('reviews.index') }}"><i class="fa fa-hand-paper-o"></i><span>Reviews</span></a>
    </li>
@endif
@if(Auth::user()->hasPermission("Booking"))
    <li class="{{ Request::is('bookings*') ? 'active' : '' }}">
        <a href="{{ route('bookings.index') }}"><i class="fa fa-ticket"></i><span>Bookings</span></a>
    </li>
@endif

@if(Auth::user()->hasPermission("Regions"))
    <li class="{{ Request::is('regions*') ? 'active' : '' }}">
        <a href="{{ route('regions.index') }}"><i class="fa fa-map-pin"></i><span>Regions</span></a>
    </li>
@endif
@if(Auth::user()->hasPermission("Suburbs"))
    <li class="{{ Request::is('suburbs*') ? 'active' : '' }}">
        <a href="{{ route('suburbs.index') }}"><i class="fa fa-map"></i><span>Suburbs</span></a>
    </li>
@endif
@if(Auth::user()->hasPermission("Ads"))
    <li class="{{ Request::is('ads*') ? 'active' : '' }}">
        <a href="{{ route('ads.index') }}"><i class="glyphicon glyphicon-option-horizontal"></i><span>Ads</span></a>
    </li>
@endif
@if(Auth::user()->hasPermission("Informative Datas"))
    <li class="{{ Request::is('informativeDatas*') ? 'active' : '' }}">
        <a href="{{ route('informativeDatas.index') }}"><i class="fa fa-file"></i><span>Informative Data</span></a>
    </li>
@endif
@if(Auth::user()->hasPermission("FAQS"))
    <li class="{{ Request::is('fAQS*') ? 'active' : '' }}">
        <a href="{{ route('fAQS.index') }}"><i class="fa fa-question-circle"></i><span>F A Q S</span></a>
    </li>
@endif
@if(Auth::user()->hasPermission("Contact Us"))
    <li class="{{ Request::is('contactuses') ? 'active' : '' }}">
        <a href="{{ route('contactuses.index') }}"><i class="fa fa-envelope"></i><span>Contactus Messages</span></a>
    </li>
@endif
@if(Auth::user()->hasPermission("Complain Types"))
    <li class="{{ Request::is('complainTypes') ? 'active' : '' }}">
        <a href="{{ route('complainTypes.index') }}"><i class="fa fa-eyedropper"></i><span>Complain Types</span></a>
    </li>
@endif
@if(Auth::user()->hasPermission("Complains"))
    <li class="{{ Request::is('complains*') ? 'active' : '' }}">
        <a href="{{ route('complains.index') }}"><i class="fa fa-envelope-square"></i><span>Complains</span></a>
    </li>
@endif
@if(Auth::user()->hasPermission("Slider"))
    <li class="{{ Request::is('sliders*') ? 'active' : '' }}">
        <a href="{{ route('sliders.index') }}"><i class="fa fa-edit"></i><span>Sliders</span></a>
    </li>
@endif
@if(Auth::user()->hasPermission("Notification"))
    <li class="{{ Request::is('notifications*') ? 'active' : '' }}">
        <a href="{{ route('notifications.create') }}"><i class="fa fa-bell"></i><span>Notifications</span></a>
    </li>
@endif


{{-- <li class="{{ Request::is('brands*') ? 'active' : '' }}">
    <a href="{{ route('brands.index') }}"><i class="fa fa-edit"></i><span>Brands</span></a>
</li>

<li class="{{ Request::is('specializations*') ? 'active' : '' }}">
    <a href="{{ route('specializations.index') }}"><i class="fa fa-clone"></i><span>Specializations</span></a>
</li>

<li class="{{ Request::is('clinics*') ? 'active' : '' }}">
    <a href="{{ route('clinics.index') }}"><i class="fa fa-heartbeat"></i><span>Clinics</span></a>
</li>

<li class="{{ Request::is('offers*') ? 'active' : '' }}">
    <a href="{{ route('offers.index') }}"><i class="fa fa-money"></i><span>Offers</span></a>
</li>

<li class="{{ Request::is('categories*') ? 'active' : '' }}">
    <a href="{{ route('categories.index') }}"><i class="fa fa-database"></i><span>Categories</span></a>
</li>

<li class="{{ Request::is('regions*') ? 'active' : '' }}">
    <a href="{{ route('regions.index') }}"><i class="fa fa-map-pin"></i><span>Regions</span></a>
</li>

<li class="{{ Request::is('suburbs*') ? 'active' : '' }}">
    <a href="{{ route('suburbs.index') }}"><i class="fa fa-map"></i><span>Suburbs</span></a>
</li>

<li class="{{ Request::is('ads*') ? 'active' : '' }}">
    <a href="{{ route('ads.index') }}"><i class="glyphicon glyphicon-option-horizontal"></i><span>Ads</span></a>
</li>

<li class="{{ Request::is('clients*') ? 'active' : '' }}">
    <a href="{{ route('clients.index') }}"><i class="fa fa-users"></i><span>Clients</span></a>
</li>

<li class="{{ Request::is('informativeDatas*') ? 'active' : '' }}">
    <a href="{{ route('informativeDatas.index') }}"><i class="fa fa-file"></i><span>Informative Datas</span></a>
</li>

<li class="{{ Request::is('fAQS*') ? 'active' : '' }}">
    <a href="{{ route('fAQS.index') }}"><i class="fa fa-question-circle"></i><span>F A Q S</span></a>
</li>

<li class="{{ Request::is('contactuses*') ? 'active' : '' }}">
    <a href="{{ route('contactuses.index') }}"><i class="fa fa-envelope"></i><span>Contactus Messages</span></a>
</li>

<li class="{{ Request::is('complainTypes*') ? 'active' : '' }}">
    <a href="{{ route('complainTypes.index') }}"><i class="fa fa-eyedropper"></i><span>Complain Types</span></a>
</li>

<li class="{{ Request::is('complains*') ? 'active' : '' }}">
    <a href="{{ route('complains.index') }}"><i class="fa fa-envelope-square"></i><span>Complains</span></a>
</li>

<li class="{{ Request::is('admins*') ? 'active' : '' }}">
    <a href="{{ route('admins.index') }}"><i class="fa fa-user-secret"></i><span>Admins</span></a>
</li>

<li class="{{ Request::is('roles*') ? 'active' : '' }}">
    <a href="{{ route('roles.index') }}"><i class="fa fa-edit"></i><span>Roles</span></a>
</li>

<li class="{{ Request::is('permissions*') ? 'active' : '' }}">
    <a href="{{ route('permissions.index') }}"><i class="fa fa-edit"></i><span>Permissions</span></a>
</li>

<li class="{{ Request::is('coupons*') ? 'active' : '' }}">
    <a href="{{ route('coupons.index') }}"><i class="fa fa-edit"></i><span>Coupons</span></a>
</li>

<li class="{{ Request::is('reviews*') ? 'active' : '' }}">
    <a href="{{ route('reviews.index') }}"><i class="fa fa-hand-paper-o"></i><span>Reviews</span></a>
</li>
<li class="{{ Request::is('bookings*') ? 'active' : '' }}">
    <a href="{{ route('bookings.index') }}"><i class="fa fa-edit"></i><span>Bookings</span></a>
</li>

<li class="{{ Request::is('sliders*') ? 'active' : '' }}">
    <a href="{{ route('sliders.index') }}"><i class="fa fa-edit"></i><span>Sliders</span></a>
</li>

<li class="{{ Request::is('notifications*') ? 'active' : '' }}">
    <a href="{{ route('notifications.create') }}"><i class="fa fa-edit"></i><span>Notifications</span></a>
</li>

--}}


