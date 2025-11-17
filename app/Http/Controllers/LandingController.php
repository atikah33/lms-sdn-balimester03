<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail; // Jika Anda berencana mengirim email

class LandingController extends Controller
{
    /**
     * Menampilkan halaman Beranda (Home).
     * Terhubung ke route: landing.home
     */
    public function index()
    {
        // Mengembalikan file view dari: resources/views/landing/home.blade.php
        return view('landing.home');
    }

    /**
     * Menampilkan halaman Tentang Kami.
     * Terhubung ke route: landing.about
     */
    public function about()
    {
        // Mengembalikan file view dari: resources/views/landing/about.blade.php
        return view('landing.about');
    }

    /**
     * Menampilkan halaman Program Sekolah.
     * Terhubung ke route: landing.programs
     */
    public function programs()
    {
        // Mengembalikan file view dari: resources/views/landing/programs.blade.php
        return view('landing.programs');
    }

    /**
     * Menampilkan halaman Galeri.
     * Terhubung ke route: landing.gallery
     */
    public function gallery()
    {
        // Mengembalikan file view dari: resources/views/landing/gallery.blade.php
        return view('landing.gallery');
    }

    /**
     * Menampilkan halaman Kontak (form).
     * Terhubung ke route: landing.contact (GET)
     */
    public function contact()
    {
        // Mengembalikan file view dari: resources/views/landing/contact.blade.php
        return view('landing.contact');
    }

    /**
     * Memproses data dari form kontak.
     * Terhubung ke route: landing.contact.send (POST)
     */
    public function sendContact(Request $request)
    {
        // 1. Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subjek' => 'required|string|max:255',
            'pesan' => 'required|string|min:10',
        ]);

        // 2. Logika untuk mengirim email (contoh)
        // Pastikan Anda sudah mengatur konfigurasi email di .env
        // try {
        //     Mail::to('admin@sekolah.com')->send(new \App\Mail\ContactFormMail($validated));
        // } catch (\Exception $e) {
        //     // Jika gagal kirim email, kembali dengan error
        //     return redirect()->route('landing.contact')
        //         ->with('error', 'Gagal mengirim pesan. Silakan coba lagi nanti.')
        //         ->withInput();
        // }

        // 3. Jika berhasil, kembali ke halaman kontak dengan pesan sukses
        return redirect()->route('landing.contact')
            ->with('success', 'Pesan Anda telah berhasil terkirim!');
    }
}