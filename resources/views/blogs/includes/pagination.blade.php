<nav aria-label="Pagination">
    <hr class="my-0" />
    <ul class="pagination justify-content-center my-4">
        @if (isset($posts) && $posts->total() > 0)
            {{ $posts->appends(['keyword' => request()->get('keyword')])->links() }}
        @elseif (isset($blogs) && $blogs->total() > 0)
            {{ $blogs->appends(['keyword' => request()->get('keyword')])->links() }}
        @endif
    </ul>
</nav>
