<!-- Add this right after the Dashboard navigation link -->
<x-nav-link :href="route('tasks.index')" :active="request()->routeIs('tasks.*')">
    {{ __('Tasks') }}
</x-nav-link>