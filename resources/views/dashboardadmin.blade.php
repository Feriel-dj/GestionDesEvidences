<h1>
    hello
    @can('manage-users')
    <a href="{{route('dashboardadmin')}}" :active="request()->routeIs('dashboardadmin')">
        {{ __('Ajouter un utilisateur')}}></a>
    @endcan
</h1>
