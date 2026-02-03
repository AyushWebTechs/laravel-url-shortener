<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Invitation;
use App\Models\Role;
use Illuminate\Http\Request;

class InvitationController extends Controller
{
    public function create()
    {
        return view('superadmin.invite-admin');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'company_name' => 'required|string|max:255',
            'email'        => 'required|email',
        ]);

        // 1. Create new company
        $company = Company::create([
            'name' => $data['company_name'],
        ]);

        // 2. Get Admin role
        $adminRole = Role::where('name', 'Admin')->firstOrFail();

        // 3. Create invitation
        Invitation::create([
            'email'      => $data['email'],
            'company_id' => $company->id,
            'role_id'    => $adminRole->id,
            'invited_by' => auth()->id(),
        ]);

        return redirect('/superadmin/dashboard')
            ->with('success', 'Admin invited and company created successfully');
    }
}
