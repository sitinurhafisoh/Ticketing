<?php

namespace App\Http\Controllers\API; // Pastikan namespace sesuai

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Validator;

class CustomerController extends Controller
{
    // Metode untuk registrasi, login, dll...

    public function show($id)
    {
        {
            // Ambil data pengguna berdasarkan user_id
            $user = User::findOrFail($id);

            // Kembalikan data pengguna dalam format JSON
            return response()->json($user);
        }
    }
    }

