@extends('layouts.app')

@section('title', 'Horaire')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">HEURES D'OUVERTURE</div>
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th colspan="2">Nous sommes ouverts</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($horaires as $horaire)
                            <tr>
                                <td>{{ $horaire[0] }}</td>
                                <td>{{ $horaire[1] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
