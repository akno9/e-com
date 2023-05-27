@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Catalogue des Catégories</h1>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $category as $item )
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->nom}}</td>
                            <td class="limited-content">{{$item->description}}</td>
                            <td>
                                <img src="{{asset('assets/uploads/category/'.$item->image)}}" alt="Image" class="cate-image">
                            </td>
                            <td>
                                <a href="{{url('edit-cat/'.$item->id)}}" class="btn">Modifier</a>
                                <a href="{{url('delete-cat/'.$item->id)}}" class="btn">Supprimer</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
