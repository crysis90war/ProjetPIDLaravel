@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">LEMKA - Atelier de couture</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h5 class="card-title">Histoire</h5>
                    <p class="card-text">
                        L’atelier Couture Lemka vous offre maintenant ses services avec plus de 10 ans d’expérience dans la couture, après la confection de divers vêtements et costumes, après de nombreuses retouches, réparations et plus encore pour une entreprise spécialisée reconnue.
                    </p>
                    <p class="card-text">
                        Nous serions ravis de mettre tout notre savoir à votre disposition pour un travail de qualité autant pour les particuliers que pour les professionnels.
                    </p>
                    <p class="card-text">
                        Vous pouvez voir nos réalisations dans la section galerie ou sur notre page Facebook <a href="https://www.facebook.com/couturelemka/">Couture Lemka</a>.
                    </p>
                    <p class="card-text">
                        Consultez nos tarifs, pour toutes demandes supplémentaires, contactez-nous par téléphone ou par mail via notre section contact, nous mettrons tout en œuvre pour réaliser vos demandes.
                    </p>
                    <p class="card-text">
                        Bonne visite.
                    </p>

                    <h5 class="card-title">Que propose donc Lemka Couture ?</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Confection</li>
                        <li class="list-group-item">Retouche</li>
                        <li class="list-group-item">Réparation</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
