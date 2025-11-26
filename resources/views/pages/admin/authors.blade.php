@extends('layouts.app')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">

                                <h4 class="card-title">liste des categories</h4>
                            </div>

                            <div class="col-6"> <a href="{{ route("authors.create") }}" class="btn btn-primary">
                                    <i class="fas fa-plus me-2"></i>Nouvel Auteur
                                </a></div>

                        </div>


                        <p class="card-description">
                            <code> </code>
                        </p>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>
                                            N°
                                        </th>
                                        <th>
                                            nom
                                        </th>
                                        <th>
                                            telephone
                                        </th>
                                        <th>
                                            email
                                        </th>

                                        <th>
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($authors as $key => $item)
                                    <tr>
                                        <td class="py-1">
                                            {{ $key + 1 }}
                                        </td>
                                        <td>
                                            {{ $item->name }}
                                        </td>
                                        <td>
                                            {{ $item->phone }}
                                        </td>
                                        <td>
                                           
  {{ $item->email }}

                                        </td>

                                        <td>
                                            

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

