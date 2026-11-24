
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $article->title }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <a href="{{ route('articles.index') }}"
       class="btn btn-outline-secondary mb-4">
        Back to Articles
    </a>

    <article class="card">
        <div class="card-body p-4">
            <h1 class="mb-3">{{ $article->title }}</h1>

            <div class="text-muted mb-4">
                <span>
                    Category:
                    {{ $article->category->name ?? 'Uncategorized' }}
                </span>

                <span class="mx-2">|</span>

                <span>
                    Published:
                    {{ $article->published_at?->format('d M Y') ?? 'Not published' }}
                </span>
            </div>

            <div class="article-body">
                {!! nl2br(e($article->body)) !!}
            </div>
        </div>
    </article>
</div>

</body>
</html>

