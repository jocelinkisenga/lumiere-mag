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
                    <form class="forms-sample" method="POST" action="{{ route("posts.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="my-select">categorie</label>
                            <select id="my-select" class="form-control" name="category_id">
                                <option selected>selectionner une categorie</option>
                                @foreach ($categories as $item)
                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">titre</label>
                                <div class="col-sm-9">
                                    <input type="text" name="title" class="form-control" id="exampleInputUsername2" placeholder="">
                                </div>

                            </div>
                            <div class="col-6">
                                <label for="exampleInputUsername3" class="col-sm-3 col-form-label">auteur</label>
                                <div class="col-sm-9">
                                    <input type="text" name="author" class="form-control" id="exampleInputUsername3" placeholder="">
                                </div>

                            </div>

                        </div>
                        <div class="form-group row">
                            <div class="col-8">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">image</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" id="exampleInputEmail2" name="image">
                                </div>

                            </div>

                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Excerpt</label>
                            <textarea class="form-control" name="slug" id="" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="myeditorinstance" rows="3"></textarea>

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
