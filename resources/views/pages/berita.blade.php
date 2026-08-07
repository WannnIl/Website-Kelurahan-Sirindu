@extends('layouts.main')

@section('content')
<section id="berita" class="bg-light">
    <div class="container">
        <div class="section-title">
            <h2>Berita & Kegiatan</h2>
            <p>Informasi terbaru seputar Kelurahan Sirindu</p>
        </div>
        
        <div class="card-grid">
            @forelse($articles as $article)
                <div class="article-card">
                    @if($article->image)
                        <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="article-img">
                    @else
                        <div class="article-img" style="background: linear-gradient(135deg, #f1f5f9, #cbd5e1); display:flex; align-items:center; justify-content:center; color:#64748b;">
                            <svg width="48" height="48" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                    @endif
                    <div class="article-content">
                        <div class="article-meta">
                            <span>📅 {{ \Carbon\Carbon::parse($article->published_at)->format('d M Y') }}</span>
                        </div>
                        <h3 class="article-title">{{ $article->title }}</h3>
                        <p class="prose" style="font-size: 0.95rem;">{{ Str::limit(strip_tags($article->content), 100) }}</p>
                        <a href="{{ route('berita.show', $article->slug) }}" style="display:inline-block; margin-top:1rem; color:var(--primary); text-decoration:none; font-weight:600;">Baca selengkapnya &rarr;</a>
                    </div>
                </div>
            @empty
                <p style="text-align: center; grid-column: 1 / -1;">Belum ada berita terbaru.</p>
            @endforelse
        </div>

        <div style="margin-top: 3rem; display: flex; justify-content: center;">
            {{ $articles->links() }}
        </div>
    </div>
</section>
@endsection
