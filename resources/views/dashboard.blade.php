<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-grey-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <ul class="navbar-nav">
                <li class="nav-item dropdown ml-12">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Log Support Ticket
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('tickets.index', ['category_id' => 'Accounts']) }}" id="Accounts">Accounts</a></li>
                        <li><a class="dropdown-item" href="{{ route('tickets.index', ['category_id' => 'Sales']) }}" id="Sales">Sales</a></li>
                        <li><a class="dropdown-item" href="{{ route('tickets.index', ['category_id' => 'IT']) }}" id="IT">IT</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.dropdown-item').on('click', function() {
                var idValue = $(this).attr('id');
                // Set the value of the category ID in the hidden input field
                $('#category').val(idValue);
            });
        });
    </script>
</x-app-layout>
