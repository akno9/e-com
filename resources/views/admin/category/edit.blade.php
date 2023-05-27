@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Modifier Catégorie</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('update-cat/'.$category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label" for="">Nom</label>
                        <input type="text" value="{{$category->nom}}" class="form-control" name="nom">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label" for="">Url</label>
                        <input type="text" value="{{$category->url}}" class="form-control" name="url">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label" for="">Description</label>
                        <textarea name="description" rows="3" class="form-control">{{$category->description}}</textarea>
                    </div>
                    <div class="form-check form-check-info text-start ps-0">
                        <label class="form-check-label text-body ms-3 text-truncate w-15 mb-0" for="">Statut</label>
                        <input class="form-check-input" type="checkbox" {{ $category->staut==1 ? 'checked':''}} name="statut">
                    </div>
                    <div class="form-check form-check-info text-start ps-0">
                        <label class="form-check-label text-body ms-3 text-truncate w-15 mb-0" for="">Populaire</label>
                        <input class="form-check-input" type="checkbox" {{ $category->populaire==1 ? 'checked':''}} name="populaire">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label" for="">Titre (Meta)</label>
                        <input type="text" value="{{$category->meta_titre}}" class="form-control" name="meta_titre">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label" for="">Description (Meta)</label>
                        <textarea name="meta_desc" rows="3" class="form-control">{{$category->meta_desc}}</textarea>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label" for="">Mots Clés (Meta)</label>
                        <textarea name="meta_motCle" rows="3" class="form-control">{{$category->meta_motCle}}</textarea>
                    </div>
                    @if($category->image)
                    <img src="{{asset('assets/uploads/category/'.$category->image)}}" alt="Image" class="cate-image">
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
