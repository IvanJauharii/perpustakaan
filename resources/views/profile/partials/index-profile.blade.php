@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold">Profil Pengguna</h1>
        <p>Nama: {{ $user->name }}</p>
        <p>Email: {{ $user->email }}</p>
        <a href="{{ route('profile.edit') }}" class="text-blue-500">Edit Profil</a>
    </div>
@endsection
