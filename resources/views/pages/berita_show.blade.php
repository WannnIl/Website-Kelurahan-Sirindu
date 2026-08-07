@extends('layouts.main')

@section('content')
<section id="berita-detail" style="padding-top: 5rem;">
    <div class="container" style="max-width: 800px;">
        <div style="margin-bottom: 2rem;">
            <a href="{{ route('berita') }}" style="color: var(--primary); text-decoration: none; font-weight: 500;">&larr; Kembali ke Daftar Berita</a>
        </div>
        
        <h1 style="color: var(--primary-dark); margin-bottom: 1rem; font-size: 2.5rem; line-height: 1.2;">{{ $article->title }}</h1>
        
        <div style="color: #64748b; margin-bottom: 2rem; display: flex; gap: 1rem; align-items: center;">
            <span>📅 {{ \Carbon\Carbon::parse($article->published_at)->format('d M Y') }}</span>
            <span>👤 Admin</span>
        </div>

        @if($article->image)
            <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" style="width: 100%; height: auto; border-radius: 12px; margin-bottom: 2rem; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);">
        @endif

        <div class="prose" style="font-size: 1.1rem; color: var(--text-main); line-height: 1.8;">
            {!! nl2br(e($article->content)) !!}
        </div>
    </div>
</section>
@endsection
