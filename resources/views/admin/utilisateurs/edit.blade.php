@extends('layouts.master')

@section('title', 'Creation utilisateur')

@section('content')

<div class="container">
    <div class="card">
        <h1>Editer le membre</h1>
        <a href="/Admin/Utilisateurs" class="btn btn-primary">Retour</a>

        @include('errors')

        <form method="POST" action="/Admin/Utilisateurs/{{ $user->id }}">
            @method('PATCH')
            @csrf

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <br/><label for="name">Nom</label>
                </div>
                <input type="text" class="form-control" name="name" placeholder="name" value="{{ $user->name }}" aria-label="Username" aria-describedby="basic-addon1">
            </div><br/>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label for="email">Email</label>
                </div>
                <input type="text" class="form-control" name="email" placeholder="email" value="{{ $user->email }}" aria-label="Username" aria-describedby="basic-addon1">
            </div>

            <div class="input-group mb-3"><br/>
                <select class="form-control" name="is_admin" id="is_admin">

                    @if ($user->is_admin == 1)

                    <option value="1">Admin</option>
                    <option value="0">User</option>

                    @else

                    <option value="0">User</option>
                    <option value="1">Admin</option>

                    @endif

                </select>
            </div><br/>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label>Sexe</label>
                </div>

                <select class="form-control" name="ref_sexe" id="ref_sexe">

                    @if ($user->ref_sexe == null)

                    <option value=""></option>

                    @foreach ($sexe as $item)

                    <option value="{{ $item->id }}">{{ $item->nom }}</option>

                    @endforeach

                    @else

                        @foreach ($sexe as $item)

                        <option value="{{ $item->id }}" @if ($user->ref_sexe == $item->id) selected @endif>{{ $item->nom }}</option>

                        @endforeach

                        @endif

                </select>
            </div><br/>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label>Pays</label>
                </div>

                <select class="form-control" name="ref_pays" id="ref_pays">

                    @if ($user->ref_pays == null)

                    <option value=""></option>

                    @foreach ($pays as $item)

                    <option value="{{ $item->id }}">{{ $item->nom }}</option>

                    @endforeach

                    @else

                        @foreach ($pays as $item)

                        <option value="{{ $item->id }}" @if ($user->ref_pays == $item->id) selected @endif>{{ $item->nom }}</option>

                        @endforeach

                        @endif

                </select>
            </div><br/>

            <div class="field">
                <div class="control">
                    <button type="submit" class="btn btn-success">UPDATE</button>
                </div>
            </div>
        </form>



    </div>
</div>

@endsection
