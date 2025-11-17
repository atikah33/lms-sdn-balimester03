<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    /**
     * Display landing page home
     */
    public function index()
    {
        return view('landing.home');
    }

    /**
     * Display about page
     */
    public function about()
    {
        return view('landing.about');
    }

    /**
     * Display programs page
     */
    public function programs()
    {
        return view('landing.programs');
    }

    /**
     * Display gallery page
     */
    public function gallery()
    {
        $photos = [
            ['title' => 'Kegiatan Belajar Kelas 1', 'image' => 'gallery-1.jpg'],
            ['title' => 'Upacara Bendera', 'image' => 'gallery-2.jpg'],
            ['title' => 'Olahraga Pagi', 'image' => 'gallery-3.jpg'],
            ['title' => 'Ekstrakurikuler Seni', 'image' => 'gallery-4.jpg'],
            ['title' => 'Perpustakaan', 'image' => 'gallery-5.jpg'],
            ['title' => 'Lomba 17 Agustus', 'image' => 'gallery-6.jpg'],
        ];

        return view('landing.gallery', compact('photos'));
    }

    /**
     * Display contact page
     */
    public function contact()
    {
        return view('landing.contact');
    }

    /**
     * Handle contact form submission
     */
    public function sendContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10',
        ]);

        // TODO: Send email or save to database
        // For now, just return success message

        return back()->with('success', 'Pesan Anda telah terkirim! Kami akan menghubungi Anda segera.');
    }
}