@extends('layouts.app')

@section('content')
<div class="min-h-[70vh] flex flex-col justify-center py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md text-center">
        <h2 class="text-3xl font-extrabold text-slate-900">Join the Marketplace</h2>
        <p class="mt-2 text-slate-600">Select your role to get started.</p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-8 px-4 shadow sm:rounded-xl sm:px-10 border border-slate-200">
            <form action="/register" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-slate-700">Full Name</label>
                    <input name="name" type="text" required class="mt-1 block w-full border border-slate-300 rounded-md shadow-sm p-2">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700">Email</label>
                    <input name="email" type="email" required class="mt-1 block w-full border border-slate-300 rounded-md shadow-sm p-2">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700">I am a...</label>
                    <select name="role" class="mt-1 block w-full border border-slate-300 rounded-md shadow-sm p-2">
                        <option value="buyer">Potential Buyer</option>
                        <option value="seller">Business Owner (Seller)</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700">Password</label>
                    <input name="password" type="password" required class="mt-1 block w-full border border-slate-300 rounded-md shadow-sm p-2">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700">Confirm Password</label>
                    <input name="password_confirmation" type="password" required class="mt-1 block w-full border border-slate-300 rounded-md shadow-sm p-2">
                </div>
                <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded-md font-bold hover:bg-blue-700">Create Account</button>
            </form>
        </div>
    </div>
</div>
@endsection
