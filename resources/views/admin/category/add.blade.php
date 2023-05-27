@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Ajouter Catégorie</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('insert-category') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label" for="">Nom</label>
                        <input type="text" class="form-control" name="nom">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label" for="">Url</label>
                        <input type="text" class="form-control" name="url">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label" for="">Description</label>
                        <textarea name="description" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="form-check form-check-info text-start ps-0">
                        <label class="form-check-label text-body ms-3 text-truncate w-15 mb-0" for="">Statut</label>
                        <input class="form-check-input" type="checkbox" name="statut">
                    </div>
                    <div class="form-check form-check-info text-start ps-0">
                        <label class="form-check-label text-body ms-3 text-truncate w-15 mb-0" for="">Populaire</label>
                        <input class="form-check-input" type="checkbox" name="populaire">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label" for="">Titre (Meta)</label>
                        <input type="text" class="form-control" name="meta_titre">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label" for="">Description (Meta)</label>
                        <textarea name="meta_desc" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label" for="">Mots Clés (Meta)</label>
                        <textarea name="meta_motCle" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <input type="file" name="image" class="btn bg-gradient-dark px-3 mb-2 ms-2">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
