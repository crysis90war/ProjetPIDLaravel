@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">Dashboard</div>

        <div class="card-body">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <h5 class="card-title">Bienvenue</h5>
            <p class="card-text">Bienvenue dans le panneau d'administration.</p>
            <p class="card-text">Ici vous pouvez ajouter, editer et supprimer des articles</p>
            <p class="card-text">Mais aussi gérer les utilisateurs inscrits</p>
        </div>
    </div>
</div>

@endsection
