@extends('layouts.app')

@section('title', 'Tarifs')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">SERVICES</div>
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th colspan="2">
                                    <h4>Consultez les prix détaillés
                                        <a href="https://lemka.be/tarifs.pdf" target="_blank"> ici</a>
                                    </h4>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="2">Remplacer une tirette (découdre et placer)</td>
                            </tr>
                            <tr>
                                <td colspan="2">Raccourcir à la machine (sans rétrécir)</td>
                            </tr>
                            <tr>
                                <td colspan="2">Raccourcir à la main sans rétrécir</td>
                            </tr>
                            <tr>
                                <td colspan="2">Réctrécir à la machine (sans raccourcir)</td>
                            </tr>
                            <tr>
                                <td colspan="2">Coutures diverses</td>
                            </tr>
                            <tr>
                                <td colspan="2">Confection tentures et rideaux</td>
                            </tr>
                            <tr>
                                <td colspan="2">Confection</td>
                            </tr>
                            <tr>
                                <td colspan="2">Bords</td>
                            </tr>
                            <tr>
                                <td colspan="2">Autres</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
