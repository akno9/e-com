@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Catalogue des Produits</h1>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Catégorie</th>
                        <th>Nom</th>
                        <th>Prix de Vente</th>
                        <th>Quantité</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $product as $item )
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->category->nom}}</td>
                            <td>{{$item->nom}}</td>
                            <td>{{$item->prix_vente}}</td>
                            <td>{{$item->qte}}</td>
                            <td>
                                <img src="{{asset('assets/uploads/product/'.$item->image)}}" alt="Image" class="cate-image">
                            </td>
                            <td>
                                <a href="{{url('edit-prod/'.$item->id)}}" class="btn">Modifier</a>
                                <a href="{{url('delete-prod/'.$item->id)}}" class="btn">Supprimer</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
