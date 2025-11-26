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

                                <h4 class="card-title">liste des commentaire</h4>
                            </div>

                            <div class="col-6">

                            </div>

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
                                            description
                                        </th>
                                        <th>
                                            Date ajout
                                        </th>
                                        <th>
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($comments as $key => $item)
                                    <tr>
                                        <td class="py-1">
                                            {{ $key + 1 }}
                                        </td>
                                        <td>
                                            {{ $item->description }}
                                        </td>
                                        <td>
                                            {{ $item->created_at }}
                                        </td>
                                        <td>
                                            <a href="{{ route("comment.delete", ["id" => $item->id]) }}" class="btn btn-danger btn-sm"> effacer</a>


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

