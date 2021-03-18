@extends('layouts.master')

@section('title', 'Utilisateurs')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">Gestion des utilisateurs</div>
        <div class="card-deck"><a class="btn btn-primary" href="/Admin/Utilisateurs/create">Créer un utilisateur</a></div>
        <div class="card-body">
            @include('errors')
            <table class="table table-striped">
                <thead>
                    <th>Pseudo</th>
                    <th>Email</th>
                    <th>Pays</th>
                    <th>Sexe</th>
                    <th>Créé le</th>
                    <th>Modifié le</th>
                    <th>Admin</th>
                    <th>Action</th>
                </thead>

                <tbody>
                    @foreach ($utilisateurs as $utilisateur)
                    <tr>
                        <td>
                            <a class="badge badge-info" href="/Admin/Utilisateurs/{{ $utilisateur->id }}/edit">{{ $utilisateur->name }}</a>
                        </td>

                        <td>
                            {{ $utilisateur->email }}
                        </td>

                        <td>
                            @if ($utilisateur->pays == null)
                            X
                            @else
                            {{ $utilisateur->pays}}
                            @endif
                        </td>

                        <td>
                            @if ($utilisateur->sexe == null)
                            X
                            @else
                            {{ $utilisateur->sexe}}
                            @endif
                        </td>

                        <td>
                            {{ $utilisateur->created_at }}
                        </td>

                        <td>
                            {{ $utilisateur->updated_at }}
                        </td>

                        <td>
                            @if ($utilisateur->is_admin == 1)
                            <p class="text-success">ADMIN</p>
                            @else
                            <p class="text-danger">USER</p>
                            @endif
                        </td>

                        <td>
                            <form method="POST" action="{{ route('Utilisateurs.destroy', [$utilisateur->id]) }}">
                                {{-- /Admin/Utilisateurs/{{ $utilisateur->id }} --}}
                                @method('DELETE')
                                @csrf

                                <div class="field">
                                    <div class="control">
                                        <button type="submit" onclick="return confirm('Voulez-vous supprimer ce membre ?')" class="btn btn-danger btn-sm">Supprimer</button>
                                    </div>
                                    {{--  --}}
                                </div>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
