<x-layouts.app title="Blog">

<section class="bg-gradient-to-br from-gray-950 to-gray-900 text-white pt-36 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <span class="text-brand-400 text-sm font-semibold uppercase tracking-widest">Blog</span>
        <h1 class="text-4xl md:text-5xl font-extrabold mt-3 leading-tight">Thinking out loud</h1>
        <p class="text-gray-300 text-lg mt-4 max-w-xl">Engineering insights, technology strategy, and the occasional opinion from the Mokes Infotech team.</p>
    </div>
</section>

<section class="py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($posts as $post)
            <a href="{{ route('blog.show', $post['slug']) }}" class="card group block overflow-hidden">
                <div class="bg-gradient-to-br from-brand-600 to-brand-800 h-40 flex items-center justify-center">
                    <span class="text-white/30 text-7xl font-black">{{ strtoupper(substr($post['tag'], 0, 1)) }}</span>
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-3 mb-3">
                        <span class="text-xs font-semibold text-brand-600 bg-brand-50 px-2.5 py-1 rounded-full">{{ $post['tag'] }}</span>
                        <span class="text-xs text-gray-400">{{ $post['read'] }}</span>
                    </div>
                    <h2 class="font-bold text-gray-900 text-base leading-snug mb-2 group-hover:text-brand-600 transition-colors">{{ $post['title'] }}</h2>
                    <p class="text-sm text-gray-500 leading-relaxed mb-4">{{ $post['excerpt'] }}</p>
                    <p class="text-xs text-gray-400">{{ $post['date'] }}</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

{{-- Newsletter --}}
<section class="bg-gray-50 py-20">
    <div class="max-w-xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-2xl font-bold text-gray-900 mb-3">Stay in the loop</h2>
        <p class="text-gray-500 text-sm mb-6">Practical technology content — no spam, no fluff. About one email per month.</p>
        <form class="flex gap-3" onsubmit="event.preventDefault()">
            <input type="email" placeholder="you@company.com"
                   class="flex-1 border border-gray-300 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
            <button type="submit" class="btn-primary shrink-0">Subscribe</button>
        </form>
    </div>
</section>

</x-layouts.app>
