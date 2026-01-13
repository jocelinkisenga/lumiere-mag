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
                        <div class="row">
                            <div class="col-12">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">titre</label>
                                <div class="">
                                    <input type="text" name="title" class="form-control" id="exampleInputUsername2" placeholder="">
                                </div>

                            </div>
                            <div class="col-6">
                                <label for="my-select">Auteur</label>
                                <select id="my-select" class="form-control" name="author_id">
                                    <option selected>selectionner un auteur</option>
                                    @foreach (\App\Models\Author::get() as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="col-6">
                                <div class="form-group row">
                                    <label for="my-select">categorie</label>
                                    <select id="my-select" class="form-control" name="category_id">
                                        <option selected>selectionner une categorie</option>
                                        @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="col-12">
                                <div class="form-group>
                    <label for=" exampleInputEmail2" class="col-sm-3 col-form-label">image de couverture</label>
                                    <input type="file" class="form-control" id="exampleInputEmail2" name="image">


                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">tags de votre article <span class="text-danger">(ex : separés par des virgules)</span></label>

                                    <input type="text" class="form-control" id="exampleInputEmail2" name="tags" placeholder="ex: technologie, culture, a la une ">
                                </div>

                            </div>

                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">petit somaire</label>
                            <textarea class="form-control" name="excerpt" rows="3"></textarea>

                        </div>


                        <div class="mb-3">
                            <label for="" class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="edit" rows="3"></textarea>

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
