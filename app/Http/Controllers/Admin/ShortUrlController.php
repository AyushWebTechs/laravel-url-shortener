<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ShortUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ShortUrlController extends Controller
{
    /**
     * Admin can see URLs of their own company only
     */
    public function index()
    {
        $shortUrls = ShortUrl::where('company_id', auth()->user()->company_id)
            ->latest()
            ->get();

        return view('admin.short-urls.index', compact('shortUrls'));
    }

    /**
     * Create form
     */
    public function create()
    {
        return view('admin.short-urls.create');
    }

    /**
     * Store short URL
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'original_url' => 'required|url',
        ]);

        ShortUrl::create([
            'original_url' => $data['original_url'],
            'code'         => Str::random(6),
            'company_id'   => auth()->user()->company_id,
            'created_by'   => auth()->id(),
        ]);

        return redirect('/admin/short-urls')
            ->with('success', 'Short URL created successfully');
    }
}
