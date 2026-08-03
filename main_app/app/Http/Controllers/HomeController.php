<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Gallery;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Display the main landing page.
     */
    public function index()
    {
        // Fetch 6 latest articles for the homepage
        $articles = Article::orderBy('published_at', 'desc')->take(6)->get();
        
        // Fetch gallery items
        $galleries = Gallery::all();

        // Fetch school statistics from settings
        $stats = [
            'siswa_aktif' => \App\Models\Setting::get('siswa_aktif', '1250'),
            'guru_staff' => \App\Models\Setting::get('guru_staff', '84'),
            'ruang_kelas' => \App\Models\Setting::get('ruang_kelas', '36'),
            'akreditasi' => \App\Models\Setting::get('akreditasi', 'A'),
        ];

        return view('home', compact('articles', 'galleries', 'stats'));
    }

    /**
     * Display the profile page with the active tab.
     */
    public function profile($tab = 'sejarah')
    {
        $validTabs = ['sejarah', 'potensi', 'visimisi', 'target', 'sasaran', 'motto'];
        if (!in_array($tab, $validTabs)) {
            $tab = 'sejarah';
        }

        return view('profile', compact('tab'));
    }

    /**
     * Display the academics page.
     */
    public function academics()
    {
        return view('academics');
    }

    /**
     * Display the facilities page.
     */
    public function facilities()
    {
        return view('facilities');
    }

    /**
     * Display the full news list page.
     */
    public function news()
    {
        $articles = Article::orderBy('published_at', 'desc')->paginate(6);
        return view('news', compact('articles'));
    }

    /**
     * Display the full gallery page.
     */
    public function gallery()
    {
        $galleries = Gallery::orderBy('created_at', 'desc')->paginate(9);
        return view('gallery', compact('galleries'));
    }

    /**
     * Handle contact form submission.
     */
    public function storeContact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'subject' => 'required|string|max:150',
            'message' => 'required|string|max:2000',
        ], [
            'name.required' => 'Nama lengkap wajib diisi.',
            'email.required' => 'Alamat email wajib diisi.',
            'email.email' => 'Format alamat email tidak valid.',
            'subject.required' => 'Subjek pesan wajib diisi.',
            'message.required' => 'Pesan wajib diisi.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('contact_error', 'Gagal mengirim pesan. Silakan periksa kembali formulir Anda.');
        }

        // Store contact message
        ContactMessage::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('contact_success', 'Pesan Anda telah berhasil dikirim! Tim Humas kami akan segera menghubungi Anda melalui email.');
    }
}
