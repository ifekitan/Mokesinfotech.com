<x-layouts.app :title="$post['title']">

<div class="pt-36 pb-24">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Back --}}
        <a href="{{ route('blog') }}" class="inline-flex items-center gap-2 text-sm text-gray-500 hover:text-brand-600 transition-colors mb-8">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Back to Blog
        </a>

        {{-- Header --}}
        <div class="mb-8">
            <div class="flex items-center gap-3 mb-4">
                <span class="text-xs font-semibold text-brand-600 bg-brand-50 px-2.5 py-1 rounded-full">{{ $post['tag'] }}</span>
                <span class="text-xs text-gray-400">{{ $post['read'] }}</span>
                <span class="text-xs text-gray-400">{{ $post['date'] }}</span>
            </div>
            <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 leading-tight">{{ $post['title'] }}</h1>
        </div>

        {{-- Author --}}
        <div class="flex items-center gap-3 py-5 border-y border-gray-100 mb-8">
            <div class="w-10 h-10 bg-brand-600 rounded-full flex items-center justify-center text-white font-bold text-sm">MI</div>
            <div>
                <p class="text-sm font-semibold text-gray-900">Mokes Infotech Team</p>
                <p class="text-xs text-gray-400">Engineering & Strategy</p>
            </div>
        </div>

        {{-- Content --}}
        <div class="prose prose-gray prose-lg max-w-none
                    prose-headings:font-bold prose-headings:text-gray-900
                    prose-p:text-gray-600 prose-p:leading-relaxed
                    prose-a:text-brand-600 prose-a:no-underline hover:prose-a:underline">
            {!! $post['content'] !!}
        </div>

        {{-- CTA --}}
        <div class="mt-16 bg-brand-50 border border-brand-100 rounded-2xl p-8 text-center">
            <h3 class="font-bold text-gray-900 text-lg mb-2">Have a project in mind?</h3>
            <p class="text-gray-600 text-sm mb-5">We'd love to hear about it. No commitment required.</p>
            <a href="{{ route('contact') }}" class="btn-primary">Get in touch</a>
        </div>
    </div>
</div>

</x-layouts.app>
