<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invitation;
use App\Models\Role;
use Illuminate\Http\Request;

class InvitationController extends Controller
{
    public function create()
    {
        return view('admin.invite-user');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'role'  => 'required|in:Admin,Member',
        ]);

        $role = Role::where('name', $data['role'])->firstOrFail();

        Invitation::create([
            'email'      => $data['email'],
            'company_id' => auth()->user()->company_id, // SAME company
            'role_id'    => $role->id,
            'invited_by' => auth()->id(),
        ]);

        return redirect('/admin/dashboard')
            ->with('success', 'Invitation sent successfully');
    }
}
