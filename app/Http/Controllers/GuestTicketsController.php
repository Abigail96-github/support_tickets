<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tickets;

class GuestTicketsController extends Controller
{
    /**
     * Retrieve all tickets from the database
     * Pass the tickets data to the 'guest_tickets' view
     */
    public function show(string $id)
    {
        $tickets_data = Tickets::all();

        return view('guest_tickets', ['tickets_data' => $tickets_data]);
    }
}
