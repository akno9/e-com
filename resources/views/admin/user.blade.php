@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Utilisateurs de E-Comm</h1>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Prénom</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Adresse</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $user as $item )
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>{{$item->lname}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->phone}}</td>
                            <td class="limited-content">
                                <p>{{$item->adress1}}</p>
                                <p>{{$item->adress2}}</p>
                                <p>{{$item->city}}</p>
                                <p>{{$item->country}}</p>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
