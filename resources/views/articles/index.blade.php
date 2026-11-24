
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Articles</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <h1 class="mb-4">Articles</h1>

    <input
        type="text"
        id="searchInput"
        class="form-control mb-4"
        placeholder="Search articles by title..."
    >

    <div class="row" id="articleList">
        @forelse ($articles as $article)
            <div class="col-md-6 col-lg-4 mb-4 article-card">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title article-title">
                            {{ $article->title }}
                        </h5>

                        <p class="text-muted small">
                            {{ $article->category->name ?? 'Uncategorized' }}
                        </p>

                        <p class="card-text">
                            {{ $article->summary }}
                        </p>

                        <a href="{{ route('articles.show', $article->permalink) }}"
                           class="btn btn-primary">
                            Read More
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <p>No articles found.</p>
        @endforelse
    </div>

    <p id="noResults" class="text-muted d-none">
        No matching articles found.
    </p>
</div>

<script>
    const searchInput = document.getElementById('searchInput');
    const articleCards = document.querySelectorAll('.article-card');
    const noResults = document.getElementById('noResults');

    searchInput.addEventListener('input', function () {
        const keyword = this.value.toLowerCase().trim();
        let visibleCount = 0;

        articleCards.forEach(card => {
            const title = card.querySelector('.article-title')
                .textContent.toLowerCase();

            const matches = title.includes(keyword);

            card.classList.toggle('d-none', !matches);

            if (matches) {
                visibleCount++;
            }
        });

        noResults.classList.toggle('d-none', visibleCount > 0);
    });
</script>

</body>
</html>

