@extends("layouts.app")
@section("content")
<div class="content-wrapper">
    <div class="row">

        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">ajouter un article</h4>
                    <p class="card-description">
                        formulaire d'ajout d'article
                    </p>
                    <form class="forms-sample" method="POST" action="{{ route("authors.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">nom complet</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control" id="exampleInputUsername2" placeholder="">
                                </div>

                            </div>

                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">email</label>
                                <div class="col-sm-9">
                                    <input type="text" name="email" class="form-control" id="exampleInputUsername2" placeholder="">
                                </div>

                            </div>
                            <div class="col-6">
                                <label for="exampleInputUsername3" class="col-sm-3 col-form-label">telephone</label>
                                <div class="col-sm-9">
                                    <input type="text" name="phone" class="form-control" id="exampleInputUsername3" placeholder="">
                                </div>

                            </div>

                        </div>
                        <div class="form-group row">
                            <div class="col-8">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">image</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" id="exampleInputEmail2" name="avatar">
                                </div>

                            </div>

                        </div>

                        {{-- <div class="mb-3">
                            <label for="" class="form-label">Excerpt</label>
                            <textarea class="form-control" name="slug" id="" rows="3"></textarea>
                        </div> --}}

                        <div class="mb-3">
                            <label for="" class="form-label">Description</label>
                            <textarea class="form-control" name="about"  rows="3"></textarea>

                        </div>


                        <button type="submit" class="btn btn-primary me-2">enregistrer</button>
                        <button class="btn btn-light">Annuler</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

