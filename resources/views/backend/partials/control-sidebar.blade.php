<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
        <h5>{{Auth::user()->name}}</h5>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <i class="fa fa-sign-out"></i>
            <x-dropdown-link :href="route('logout')"
                             onclick="event.preventDefault();
                                                this.closest('form').submit();">
                {{ __('Log out') }}
            </x-dropdown-link>
        </form>
    </div>
</aside>
