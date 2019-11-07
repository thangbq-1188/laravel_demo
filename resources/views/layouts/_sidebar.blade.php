<!-- Search Widget -->
<div class="card">
  <h5 class="card-header">Search</h5>
  <div class="card-body">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Search for...">
      <span class="input-group-btn">
        <button class="btn btn-secondary" type="button">Go!</button>
      </span>
    </div>
  </div>
</div>

<!-- Categories Widget -->
<div class="card my-4">
  <h5 class="card-header">Categories</h5>
  <div class="card-body">
    <div class="row">
        @foreach (arrayChunkCategories($sidebarCategories) as $categories)
            <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                    @foreach ($categories as $category)
                      <li>
                        <a href="{{ route('posts.index', ['category_id' => $category->id]) }}">
                            {{ $category->name }}
                        </a>
                      </li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>
  </div>
</div>
