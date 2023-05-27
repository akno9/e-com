@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Modifier Produit</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('update-prod/'.$product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="input-group input-group-outline mb-3">
                        <label for="">Catégorie {{$product->category->nom}}</label>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label" for="">Nom</label>
                        <input type="text" value="{{$product->nom}}" class="form-control" name="nom">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label" for="">Petite Description</label>
                        <textarea name="mini_desc" rows="3" class="form-control">{{$product->mini_desc}}</textarea>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label" for="">Description</label>
                        <textarea name="description" rows="3" class="form-control">{{$product->description}}</textarea>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label" for="">Prix d'originne</label>
                        <input type="text" value="{{$product->prix_orig}}" class="form-control" name="prix_orig">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label" for="">Prix de vente</label>
                        <input type="text" value="{{$product->prix_vente}}" class="form-control" name="prix_vente">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label" for="">Quantité</label>
                        <input type="text" value="{{$product->qte}}" class="form-control" name="qte">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label" for="">Taxe</label>
                        <input type="text" value="{{$product->taxe}}" class="form-control" name="taxe">
                    </div>
                    <div class="form-check form-check-info text-start ps-0">
                        <label class="form-check-label text-body ms-3 text-truncate w-15 mb-0" for="">Statut</label>
                        <input class="form-check-input" type="checkbox" {{ $product->staut==1 ? 'checked':''}} name="statut">
                    </div>
                    <div class="form-check form-check-info text-start ps-0">
                        <label class="form-check-label text-body ms-3 text-truncate w-15 mb-0" for="">Populaire</label>
                        <input class="form-check-input" type="checkbox" {{ $product->populaire==1 ? 'checked':''}} name="populaire">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label" for="">Titre (Meta)</label>
                        <input type="text" value="{{$product->meta_titre}}" class="form-control" name="meta_titre">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label" for="">Description (Meta)</label>
                        <textarea name="meta_desc" rows="3" class="form-control">{{$product->meta_desc}}</textarea>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label" for="">Mots Clés (Meta)</label>
                        <textarea name="meta_motCle" rows="3" class="form-control">{{$product->meta_motCle}}</textarea>
                    </div>
                    @if($product->image)
                    <img src="{{asset('assets/uploads/product/'.$product->image)}}" alt="Image" class="cate-image">
                    @endif
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
