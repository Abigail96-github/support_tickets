<x-guest-layout>
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form method="POST" action="{{ route('send_tickets.update') }}">
        @csrf

        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email Address</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Summary</th>
                    <th scope="col">Category</th>
                    <th scope="col">Ticket Description</th>
                    <th scope="col">Status</th>
                    <th scope="col">Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tickets_data as $ticket)
                    <tr>
                        <th scope="row" name="id">{{ $ticket->id }}</th>
                        <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                        <td class="text-wrap">{{ $ticket->first_name }}</td>
                        <td class="text-wrap">{{ $ticket->last_name }}</td>
                        <td class="text-wrap">{{ $ticket->email }}</td>
                        <td class="text-wrap">{{ $ticket->phone_number }}</td>
                        <td class="text-wrap">{{ $ticket->summary }}</td>
                        <td class="text-wrap">{{ $ticket->category }}</td>
                        <td class="text-wrap">{{ $ticket->reasons }}</td>
                        <td>
                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="status">
                                <option selected>{{ $ticket->status }}</option>
                                <option value="In Progress">In Progress</option>
                                <option value="Resolved">Resolved</option>
                            </select>
                        </td>
                        <td class="text-wrap">{{ $ticket->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="col-6 mt-3">
            <x-primary-button class="ms-3" type="submit">
                {{ __('Update') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
