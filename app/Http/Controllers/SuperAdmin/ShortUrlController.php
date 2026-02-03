<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\ShortUrl;

class ShortUrlController extends Controller
{
    public function index()
    {
        // SuperAdmin can see ALL short URLs
        $shortUrls = ShortUrl::with(['company', 'creator'])
            ->latest()
            ->get();

        return view('superadmin.short-urls', compact('shortUrls'));
    }
}
