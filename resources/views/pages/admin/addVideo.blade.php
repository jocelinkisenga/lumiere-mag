@extends("layouts.app")
@section("content")
<div class="content-wrapper">
    <div class="row">

        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">ajouter une video</h4>
                    <p class="card-description">
                    </p>
                    <form class="forms-sample" method="POST" action="{{ route("video.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">titre</label>
                                <div class="col-sm-6">
                                    <input type="text" name="title" class="form-control" id="exampleInputUsername2" placeholder="">
                                </div>

                            </div>
                            <div class="col-6">
                                <label for="exampleInputUsername3" class="col-sm-3 col-form-label">auteur</label>
                                <div class="col-sm-6">
                                    <input type="text" name="author" class="form-control" id="exampleInputUsername3" placeholder="">
                                </div>

                            </div>

                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">image de couverture</label>
                                <div class="col-sm-6">
                                    <input type="file" class="form-control" id="exampleInputEmail2" name="cover_video">
                                </div>

                            </div>
                            <div class="col-12">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">votre fichier Video</label>
                                <div class="col-sm-6">
                                    <input type="file" class="form-control" id="exampleInputEmail2" name="video_name">
                                </div>

                            </div>


                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="" rows="3"></textarea>
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
