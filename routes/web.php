<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return inertia('Home', [
        'user' => "Joe doh"
    ]);
});

Route::get('/users', function () {
    return inertia('Users/Index', [
        'users' => User::query()
            ->when(request()->search, function ($query, $search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->paginate(10)
            ->withQueryString(),
        'filters' => request()->only('search')
    ]);
});

Route::get("users/create", function () {
    return inertia('Users/Create');
});

Route::post("/users", function (Request $request) {
    $validated =  $request->validate([
        'name' => [
            'required',
            "max:255",
            "string"
        ],
        'email' => [
            'required',
            "max:255",
            "string",
            "email"
        ],
        'password' => ['required', "max:255", "string"],
    ]);

    $validated['password'] = Hash::make($validated['password']);

    User::create($validated);

    return redirect('/users');
});

Route::get('/settings', function () {
    return inertia('Settings');
});

Route::post('/logout', fn (Request $request) => dd($request->data));
