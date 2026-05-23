<x-layouts.app title="Portfolio">

{{-- HERO --}}
<section class="bg-gradient-to-br from-gray-950 to-gray-900 text-white pt-36 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <span class="text-brand-400 text-sm font-semibold uppercase tracking-widest">Our work</span>
            <h1 class="text-4xl md:text-5xl font-extrabold mt-3 mb-5 leading-tight">Real clients. Real results.</h1>
            <p class="text-gray-300 text-lg leading-relaxed">
                From hotel SaaS platforms to government budget systems and enterprise CRMs — here's a selection of the problems we've solved across Nigeria and beyond.
            </p>
        </div>
    </div>
</section>

{{-- FILTER TABS --}}
<section class="py-6 bg-white border-b border-gray-100 sticky top-16 md:top-20 z-40"
     x-data="{ filter: 'All' }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex gap-2 overflow-x-auto scrollbar-none">
            @foreach(['All','Custom Software','SaaS','IT Consulting'] as $cat)
            <button @click="filter = '{{ $cat }}'"
                    :class="filter === '{{ $cat }}' ? 'bg-brand-600 text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200'"
                    class="shrink-0 px-4 py-2 rounded-full text-sm font-medium transition-colors">
                {{ $cat }}
            </button>
            @endforeach
        </div>
    </div>

    {{-- PROJECT GRID --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-12 pb-24">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            @foreach($projects as $project)
            <div x-show="filter === 'All' || filter === '{{ $project['category'] }}'"
                 x-transition
                 class="card overflow-hidden group">
                {{-- Cover --}}
                <div class="h-56 bg-gradient-to-br {{ $project['image_bg'] }} flex items-center justify-center text-7xl relative overflow-hidden">
                    <div class="absolute inset-0 bg-black/10 group-hover:bg-black/0 transition-colors"></div>
                    <span class="relative">{{ $project['icon'] }}</span>
                    <span class="absolute top-4 right-4 bg-white/20 backdrop-blur-sm text-white text-xs font-semibold px-3 py-1 rounded-full">
                        {{ $project['category'] }}
                    </span>
                    @if($project['year'])
                    <span class="absolute bottom-4 left-4 bg-black/30 text-white text-xs px-2.5 py-1 rounded-full">{{ $project['year'] }}</span>
                    @endif
                </div>

                {{-- Body --}}
                <div class="p-7">
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1">{{ $project['client'] }}</p>
                    <h2 class="text-xl font-bold text-gray-900 mb-3">{{ $project['title'] }}</h2>
                    <p class="text-sm text-gray-500 leading-relaxed mb-5">{{ $project['summary'] }}</p>

                    {{-- Tags --}}
                    <div class="flex flex-wrap gap-2 mb-5">
                        @foreach($project['tags'] as $tag)
                        <span class="bg-gray-100 text-gray-600 text-xs font-medium px-2.5 py-1 rounded-full">{{ $tag }}</span>
                        @endforeach
                    </div>

                    {{-- Result + Link --}}
                    <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                        <div class="flex items-center gap-2 text-sm text-green-700 font-semibold">
                            <svg class="w-4 h-4 text-green-500 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                            {{ $project['result'] }}
                        </div>
                        @if($project['url'])
                        <a href="{{ $project['url'] }}" target="_blank" rel="noopener" class="text-brand-600 text-sm font-semibold hover:underline inline-flex items-center gap-1">
                            View project
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        </a>
                        @else
                        <a href="{{ route('contact') }}" class="text-brand-600 text-sm font-semibold hover:underline">Work with us →</a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-20 bg-brand-600 text-white">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-extrabold mb-4">Your project could be next</h2>
        <p class="text-brand-100 text-lg mb-8">We work with a focused number of clients each quarter to ensure every engagement gets our full attention.</p>
        <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 bg-white text-brand-700 hover:bg-gray-100 font-bold px-8 py-4 rounded-xl transition-colors">
            Tell us about your project
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
        </a>
    </div>
</section>

</x-layouts.app>
