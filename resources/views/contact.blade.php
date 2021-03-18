@extends('layouts.app')

@section('title', 'Contact')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-1">
                <h5 class="card-header">Nos coordonnées</h5>
                <div class="card-body">
                    <h5 class="card-title">LEMKA - Atelier de couture</h5>
                    <p class="card-text">
                        <i class="fa fa-gavel" aria-hidden="true"></i>&nbsp;&nbsp;BE0650894447
                    </p>

                    <p class="card-text">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;&nbsp;Arthur Puesstraat, 89. 1502 - Lembeek
                    </p>

                    <p class="card-text">
                        <i class="fa fa-mobile" aria-hidden="true"></i>&nbsp;&nbsp;
                        <a href="tel: 0032472894621">+32 (0) 472 89 46 21</a>
                    </p>

                    <p class="card-text">
                        <i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;&nbsp;
                        <a href="mailto:elena@lemka.be">elena@lemka.be</a>
                    </p>
                </div>
            </div>

            <form>
                <div class="card p-1">
                    <h5 class="card-header">Vos coordonnés</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <label>Nom (*)</label>
                                <input type="text" class="form-control" placeholder="Nom :">
                            </div>

                            <div class="col">
                                <label>Prénom</label>
                                <input type="text" class="form-control" placeholder="Prénom :">
                            </div>

                            <div class="col">
                                <label>Sexe (*)</label>
                                <select required="" class="form-control">
                                    <option></option>
                                    <option name="sexe" value="M" title="Cochez ce bouton si vous Ãªtes un homme">Masculin</option>
                                    <option name="sexe" value="F" title="Cochez ce bouton si vous Ãªtes une femme">Féminin</option>
                                </select>
                            </div>
                        </div>

                        <div class="row pt-4">
                            <div class="col">
                                <label>Email (*)</label>
                                <input type="text" class="form-control" placeholder="First name">
                            </div>

                            <div class="col">
                                <label>GSM</label>
                                <input type="text" class="form-control" placeholder="Last name">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card p-1">
                    <h5 class="card-header">Votre message</h5>
                    <div class="card-body">
                        <div class="row-2">
                            <div class="col-3">
                                <label>Sujet (*)</label>
                                <select required="" class="form-control">
                                    <option></option>
                                    <optgroup label="Services Couture">
                                        <option value="Confection">Conféction</option>
                                        <option value="Reparation">Réparation</option>
                                        <option value="Retouche">Retouche</option>
                                    </optgroup>
                                    <optgroup label="Autres demande">
                                        <option value="Autre">Autre</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>

                        <div class="row p-3">
                            <div class="col">
                                <textarea class="form-control" placeholder="Message :" name="message" title="Veuillez écrire votre message" wrap="soft"></textarea>
                            </div>
                        </div>

                        <div class="row p-3">
                            <div class="col">
                                <input type="reset" class="btn btn-warning" name="" value="Réinitialiser le formulaire">
                            </div>

                            <div class="col">
                                <input type="submit" class="btn btn-primary" name="" value="Envoyer le formulaire">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
