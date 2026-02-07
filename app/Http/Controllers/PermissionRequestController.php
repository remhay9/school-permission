<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PermissionRequest;
use Illuminate\Support\Facades\Auth;

class PermissionRequestController extends Controller
{
    public function index()
    {
        $user = auth()->user(); // get logged-in user

    if(!$user) {
        abort(403, 'Unauthorized'); // optional: prevent guests
    }

    if($user->hasRole('Admin') || $user->hasRole('Teacher')){
        $requests = PermissionRequest::all();
    } else {
        $requests = $user->permissionRequests;
    }

        return view('permissions.index', compact('requests'));
    }

    public function create()
    {
        return view('permissions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        $permission = PermissionRequest::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description
        ]);

        return redirect()->route('permissions.index')->with('success','Permission request created.');
    }

    public function approve(PermissionRequest $permission)
    {
        $this->authorize('approve', $permission);

        $permission->update(['status' => 'approved']);
        return redirect()->back()->with('success','Permission approved.');
    }

    public function reject(PermissionRequest $permission)
    {
        $this->authorize('approve', $permission);

        $permission->update(['status' => 'rejected']);
        return redirect()->back()->with('success','Permission rejected.');
    }
}
