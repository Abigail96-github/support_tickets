<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tickets;
use Illuminate\Validation\Rule;
use App\Mail\SupportTicket;
use Illuminate\Support\Facades\Mail;


class TicketsController extends Controller
{
    /**
     * Display the ticktes view.
     */
    public function index()
    {
        return view('tickets');
    }

    /**
     * Store all the data into the tickets' table.
     */
    public function store(Request $request)
    {
       // Validation rules to validate the form input fields
       $validation =[
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'phonenumber' => 'required|string|max:15',
            'emailaddress' => 'required|email|max:255',
            'summary' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id'=> 'required',];

        $validatedData = $request->validate($validation);

        // Insert the data into the tickets table using the Tickets model
        $ticket = Tickets::create([
            'first_name' => $validatedData['firstname'],
            'last_name' => $validatedData['lastname'],
            'phone_number' => $validatedData['phonenumber'],
            'email' => $validatedData['emailaddress'],
            'summary' => $validatedData['summary'],
            'reasons' => $validatedData['description'],
            'category' => $validatedData['category_id'],
            'status' => "Newly Logged",
        ]);

        //ID of the newly created ticket
        $ticketId = $ticket->id;

        $this->sendSupportEmail($validatedData['emailaddress'],$ticketId);

        return redirect()->back()->with('success', 'Ticket submitted successfully.Please check your email');

    }

    /**
    * This function constructs a support ticket URL based on the provided ID,
    * prepares an email with a predefined title and the generated URL,
    * and sends the email to the specified email address using the SupportTicket Mailable.
    *  */
    public function sendSupportEmail($email, $id)
    {
        $url = url('/guest_tickets/'.$id);
        $title = 'You have logged a support ticket with FoneWorx';
        $body = $url;

        Mail::to($email)->send(new SupportTicket($title, $body));

        return "Email sent successfully!";
    }

    /**
     * Update the ticket status
     */
    public function update(Request $request)
    {
        $newStatus = $request->input('status');
        $ticket_id = $request->input('ticket_id');
        // Update the status for all tickets in the database
        Tickets::where('id',  $ticket_id)->update(['status' => $newStatus]);
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Status updated successfully');
    }
}
