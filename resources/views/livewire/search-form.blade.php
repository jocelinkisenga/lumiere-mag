<div>
    <div class="filter-section">
        <div class="row g-3 align-items-center">
            {{-- <div class="col-md-4">
                       <label for="categoryFilter" class="form-label fw-bold">Catégorie</label>
                       <select class="form-select" id="categoryFilter">
                           <option value="">Toutes les catégories</option>
                           @foreach(\App\Models\Category::limit(4)->get() as $category)
                           <option value="technologie">{{ $category->title }}</option>
            @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <label for="sortBy" class="form-label fw-bold">Trier par</label>
            <select class="form-select" id="sortBy">
                <option value="newest">Plus récents</option>
                <option value="popular">Plus populaires</option>
                <option value="trending">Tendances</option>
            </select>
        </div> --}}
        <div class="col-12">
            <label class="form-label fw-bold">Recherche un article</label>
            <div class="input-group">
                <input type="text" wire:model="searchWord" class="form-control" placeholder="Rechercher un article...">
                <button class="btn btn-primary" type="button" wire:click="search">

                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </div>
</div>


</div>
