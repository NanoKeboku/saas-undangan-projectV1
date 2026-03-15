@extends('invitations.layouts.main')

@section('title', 'The Wedding of ' . ($nama_pria ?? 'Pria') . ' & ' . ($nama_wanita ?? 'Wanita'))

@section('content')
   @php
    // Memastikan variabel didefinisikan jika belum ada
    $pria = isset($pria) ? $pria : "Nama Mempelai Pria";
    $wanita = isset($wanita) ? $wanita : "Nama Mempelai Wanita";
@endphp
    <div class="container text-center my-5" data-aos="fade-up">
        <h1 class="font-cormorant">{{ $pria }} & {{ $wanita }}</h1>
        <p>15 / 02 / 2026</p>
        </div>
@endsection