<x-app-layout>
    <section class="container">
        <form class="row g-3 my-4 p-4 bg-white rounded shadow" method="POST" action="{{ route('send_tickets.store') }}">
            @csrf
            
            @if($errors->any())
                <div class="alert alert-danger alert-danger alert-dismissible fade show" role="alert">
                    <span>Errors</span>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="col-md-10">
                <label for="category_id" class="form-label">Category</label>
                <!-- Add a disabled input field to show the category -->
                <input type="text" class="form-control" id="category_id" name="category_id" value="{{ request()->route('category_id') }}" readonly>
            </div>
            <div class="col-md-10">
                <label for="firstname" class="form-label">First Name</label>
                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter FirstName" required>
            </div>
            <div class="col-md-10">
                <label for="lastname" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter LastName" required>
            </div>
            <div class="col-md-10">
                <label for="phonenumber" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="phonenumber" name="phonenumber" placeholder="Enter Phone Number" required>
            </div>
            <div class="col-md-10">
                <label for="emailaddress" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="emailaddress" name="emailaddress" placeholder="example@gmail.com" required>
            </div>
            <div class="col-md-10">
                <label for="summary" class="form-label">Ticket Summary</label>
                <input type="text" class="form-control" id="summary" name="summary" placeholder="Enter Summary" required>
            </div>
            <div class="col-md-10">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" style="font-weight: bold; color: #343a40;" required></textarea>
            </div>
            <div class="col-6">
                <x-primary-button class="ms-3">
                    {{ __('Submit') }}
                </x-primary-button>
            </div>
        </form>
    </section>
</x-app-layout>
