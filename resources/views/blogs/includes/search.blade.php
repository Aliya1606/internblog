<div class="col-lg-4">
    <!-- Search Widget -->
    <div class="card mb-4">
        <h5 class="card-header">Search</h5>
        <div class="card-body">
            @if(Route::is('blogs.index'))
                <!-- Search Blogs -->
                <form action="{{ route('blogs.index') }}" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" name="keyword" value="{{ request()->get('keyword') }}" placeholder="Search blog titles...">
                        <span class="input-group-append">
                            <button class="btn btn-primary" type="submit">Go!</button>
                        </span>
                    </div>
                </form>
            @elseif(Route::is('blogs.show'))
                <!-- Search Posts -->
                <form action="{{ route('blogs.show', $blog->id) }}" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" name="keyword" value="{{ request()->get('keyword') }}" placeholder="Search post titles...">
                        <span class="input-group-append">
                            <button class="btn btn-primary" type="submit">Go!</button>
                        </span>
                    </div>
                </form>
            @endif
        </div>
    </div>
</div>
