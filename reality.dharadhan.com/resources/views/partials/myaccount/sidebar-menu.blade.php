<li>
    <a href="{{ route('myaccount.home') }}"
        class="{{ request()->routeIs('myaccount.home') == 'myaccount.home' ? 'active' : '' }}">
        <i class="fa fa-dashboard mr-3"></i>Dashboard
    </a>
</li>
<li>
    <a href="{{ route('myaccount.profile') }}">
        <i class="fa fa-user mr-3"></i>Profile
    </a>
</li>
<li>
    <a href="{{ route('myaccount.properties') }}"
        class="{{ request()->routeIs('myaccount.properties') == 'myaccount.properties' ? 'active' : '' }}">
        <i class="fa fa-home mr-3" aria-hidden="true "></i>Properties
    </a>
</li>
<li>
    <a href="{{ route('post.property.primarydetails') }}"
        class="{{ request()->routeIs('post.property.primarydetails') == 'post.property.primarydetails' ? 'active' : '' }}">
        <i class="fa fa-plus mr-3" aria-hidden="true"></i>Add Property
    </a>
</li>
<li>
    <a href="{{ route('myaccount.leads') }}"
        class="{{ request()->routeIs('myaccount.leads') == 'myaccount.leads' ? 'active' : '' }}">
        <i class="fa fa-list mr-3" aria-hidden="true"></i>All Leads
    </a>
</li>
<!-- <li>
    <a href="{{ route('myaccount.transferred.leads') }}"
        class="{{ request()->routeIs('myaccount.transferred.leads') == 'myaccount.transferred.leads' ? 'active' : '' }}">
        <i class="fas fa-exchange-alt mr-3" aria-hidden="true"></i>Transferred Leads
    </a>
</li> -->
<li>
    <a href="{{ route('myaccount.change.password') }}">
        <i class="fa fa-lock mr-3"></i>Change Password
    </a>
</li>
<li>
    <a href="javascript:void(0);;" onClick="$('#logout-form').submit();">
        <i class="fas fa-sign-out-alt mr-3"></i>Log Out
    </a>
</li>
