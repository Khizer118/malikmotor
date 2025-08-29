<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\Booking;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('booking.contact');
    }




    public function submit(Request $request)
    {
        // Save to DB or send email (future extension)
        return back()->with('success', 'Your message has been sent!');
    }






    // public function myaccount()
    // {
    //     $user = Auth::user(); // logged-in user

    //     // user ki sari bookings + car relation
    //     $bookings = Booking::with('car')
    //         ->where('user_id', $user->id)
    //         ->latest()
    //         ->get();

    //     return view('my-account', compact('bookings'));
    // }





}
