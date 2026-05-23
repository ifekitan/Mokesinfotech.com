<x-layouts.app title="Home">

{{-- HERO --}}
<section class="relative overflow-hidden bg-gradient-to-br from-gray-950 via-brand-950 to-gray-900 text-white pt-32 pb-24 md:pt-44 md:pb-36">
    <div class="absolute -top-40 -right-40 w-96 h-96 bg-brand-600/20 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-20 -left-20 w-72 h-72 bg-brand-800/20 rounded-full blur-3xl pointer-events-none"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="inline-flex items-center gap-2 bg-brand-600/20 border border-brand-500/30 text-brand-300 text-sm font-medium px-4 py-1.5 rounded-full mb-6">
            <span class="w-1.5 h-1.5 bg-brand-400 rounded-full animate-pulse"></span>
            Custom Software · SaaS · IT Consulting · Abuja, Nigeria
        </span>

        <h1 class="text-4xl md:text-6xl lg:text-7xl font-extrabold leading-tight tracking-tight">
            Software, SaaS &amp; IT Consulting<br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-400 to-cyan-400">Built for your growth</span>
        </h1>

        <p class="mt-6 text-lg md:text-xl text-gray-300 max-w-2xl mx-auto leading-relaxed">
            We deliver custom software, scalable SaaS platforms, and expert IT consulting — from Abuja, Nigeria to the world. Strategy to production, under one roof.
        </p>

        <div class="mt-10 flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('services') }}" class="btn-primary text-base px-8 py-4">
                Explore our services
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
            <a href="{{ route('portfolio') }}" class="btn-outline border-white/30 text-white hover:bg-white hover:text-gray-900 text-base px-8 py-4">
                See our work
            </a>
            <a href="https://mokesbridge.mokesinfotech.com" target="_blank" rel="noopener noreferrer"
               class="inline-flex items-center justify-center gap-2 bg-emerald-500 hover:bg-emerald-400 text-white font-bold text-base px-8 py-4 rounded-xl transition-colors shadow-lg">
                <span>🌉</span> Launch MokesBridge
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
            </a>
        </div>

        <div class="mt-16 flex flex-wrap justify-center gap-6 text-sm text-gray-400">
            <span class="flex items-center gap-1.5"><svg class="w-4 h-4 text-brand-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>Hospitality & Hotels</span>
            <span class="flex items-center gap-1.5"><svg class="w-4 h-4 text-brand-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>Government & Enterprise</span>
            <span class="flex items-center gap-1.5"><svg class="w-4 h-4 text-brand-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>Real Estate & Consulting</span>
        </div>
    </div>
</section>

{{-- CLIENT LOGO STRIP --}}
<section class="bg-gray-50 py-12 border-y border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <p class="text-center text-sm text-gray-400 mb-8 font-medium uppercase tracking-widest">Trusted by organisations across Nigeria</p>
        <div class="flex flex-wrap items-center justify-center gap-8 opacity-50 grayscale">
            @foreach(['CheckInn Hotels','Avant-Garde Hotel','FMITI','Wbytripletees','Bethpez Limited','Swizzhomes'] as $logo)
            <span class="font-bold text-lg text-gray-600">{{ $logo }}</span>
            @endforeach
        </div>
    </div>
</section>

{{-- SERVICES OVERVIEW --}}
<section class="py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="section-title">What we do best</h2>
            <p class="section-subtitle mx-auto">From greenfield builds to enterprise IT advisory, our three service pillars cover the full spectrum of technology delivery.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach([
                ['icon'=>'🖥️','title'=>'Custom Software Development','color'=>'bg-blue-50 text-blue-600','href'=>route('services').'#custom-software','desc'=>'Purpose-built web applications engineered for your exact workflow. We own the delivery from discovery to deployment — hotel management, CRMs, government systems, and more.'],
                ['icon'=>'☁️','title'=>'SaaS Products','color'=>'bg-emerald-50 text-emerald-600','href'=>route('services').'#saas','desc'=>'We design, build, and launch subscription software platforms — multi-tenant architecture, billing integration, onboarding flows, and operational analytics included.'],
                ['icon'=>'🎯','title'=>'IT Consulting & Advisory','color'=>'bg-amber-50 text-amber-600','href'=>route('services').'#consulting','desc'=>'Enterprise Intelligence, Data Governance, Solution Architecture, and Digital Transformation — strategy-level consulting backed by engineers who have actually shipped the work.'],
            ] as $s)
            <div class="card p-8 group cursor-pointer" onclick="window.location='{{ $s['href'] }}'">
                <div class="w-14 h-14 {{ $s['color'] }} rounded-2xl flex items-center justify-center text-2xl mb-6 group-hover:scale-110 transition-transform">
                    {{ $s['icon'] }}
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $s['title'] }}</h3>
                <p class="text-gray-500 text-sm leading-relaxed">{{ $s['desc'] }}</p>
                <a href="{{ $s['href'] }}" class="inline-flex items-center gap-1 text-brand-600 text-sm font-semibold mt-5 group-hover:gap-2 transition-all">
                    Learn more <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- STATS COUNTER --}}
<section class="bg-brand-600 py-20 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            @foreach([
                ['target'=>11,'suffix'=>'+','label'=>'Projects delivered'],
                ['target'=>10,'suffix'=>'+','label'=>'Happy clients'],
                ['target'=>8,'suffix'=>' yrs','label'=>'Industry experience'],
                ['target'=>5,'suffix'=>'','label'=>'Team members'],
            ] as $stat)
            <div x-data="counter({{ $stat['target'] }})" x-init="start()">
                <div class="text-4xl md:text-5xl font-extrabold">
                    <span x-text="display"></span><span>{{ $stat['suffix'] }}</span>
                </div>
                <p class="mt-2 text-brand-100 text-sm font-medium">{{ $stat['label'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- FEATURED WORK --}}
<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-12">
            <div>
                <h2 class="section-title">Recent work</h2>
                <p class="section-subtitle">A sample of the real clients we've served and the value delivered.</p>
            </div>
            <a href="{{ route('portfolio') }}" class="btn-outline shrink-0">View all projects</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($featuredProjects as $p)
            <div class="card overflow-hidden group">
                <div class="h-44 bg-gradient-to-br {{ $p['image_bg'] }} flex items-center justify-center text-6xl group-hover:scale-105 transition-transform duration-500 origin-center">
                    {{ $p['icon'] }}
                </div>
                <div class="p-6">
                    <span class="text-xs font-semibold text-brand-600 bg-brand-50 px-2.5 py-1 rounded-full">{{ $p['category'] }}</span>
                    <h3 class="text-lg font-bold text-gray-900 mt-3 mb-2">{{ $p['title'] }}</h3>
                    <p class="text-sm text-gray-500 flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-green-500 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        {{ $p['result'] }}
                    </p>
                    @if($p['url'])
                    <a href="{{ $p['url'] }}" target="_blank" rel="noopener" class="inline-flex items-center gap-1 text-brand-600 text-xs font-semibold mt-3 hover:underline">
                        View project <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    </a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- PROCESS --}}
<section class="py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="section-title">How we work</h2>
            <p class="section-subtitle mx-auto">A transparent, collaborative process that keeps you in control at every stage.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach([
                ['step'=>'01','title'=>'Discovery','desc'=>'We run structured workshops to map your problem space, success criteria, and technical constraints before any code is written.'],
                ['step'=>'02','title'=>'Design & Plan','desc'=>'Architecture diagrams, UI wireframes, and a project plan with milestones you sign off on before development begins.'],
                ['step'=>'03','title'=>'Build & Iterate','desc'=>'Agile sprints with regular demos. You see working software early and often — no black-box development.'],
                ['step'=>'04','title'=>'Launch & Support','desc'=>'Production deployment, monitoring setup, team training, and ongoing support to keep things running smoothly.'],
            ] as $idx => $step)
            <div class="relative">
                @if($idx < 3)
                <div class="hidden lg:block absolute top-8 left-full w-6 border-t-2 border-dashed border-gray-200 -translate-x-3 z-10"></div>
                @endif
                <div class="card p-6">
                    <span class="text-4xl font-extrabold text-gray-100">{{ $step['step'] }}</span>
                    <h3 class="text-base font-bold text-gray-900 mt-2 mb-2">{{ $step['title'] }}</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">{{ $step['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- TESTIMONIAL --}}
<section class="bg-gray-50 py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <svg class="w-10 h-10 text-brand-200 mx-auto mb-6" fill="currentColor" viewBox="0 0 32 32"><path d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.8 3.456-8.256 9.12-8.256 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z"/></svg>
        <blockquote class="text-xl md:text-2xl font-medium text-gray-900 leading-relaxed">
            "Mokes Infotech didn't just deliver the software — they became a genuine technology partner. Their consulting expertise helped us avoid costly architectural mistakes from the very start."
        </blockquote>
        <div class="mt-8 flex items-center justify-center gap-3">
            <div class="w-10 h-10 bg-brand-600 rounded-full flex items-center justify-center text-white font-bold text-sm">BA</div>
            <div class="text-left">
                <p class="font-semibold text-gray-900">Business Director</p>
                <p class="text-sm text-gray-500">Bethpez Limited</p>
            </div>
        </div>
    </div>
</section>

{{-- CTA BANNER --}}
<section class="py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-gradient-to-r from-brand-600 to-brand-800 rounded-3xl p-10 md:p-16 text-center text-white overflow-hidden relative">
            <div class="absolute -top-20 -right-20 w-72 h-72 bg-white/5 rounded-full"></div>
            <div class="absolute -bottom-10 -left-10 w-48 h-48 bg-white/5 rounded-full"></div>
            <div class="relative">
                <h2 class="text-3xl md:text-4xl font-extrabold mb-4">Ready to build something great?</h2>
                <p class="text-brand-100 text-lg mb-8 max-w-xl mx-auto">Tell us about your project and we'll come back within one business day with a clear next step.</p>
                <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 bg-white text-brand-700 hover:bg-gray-50 font-bold px-8 py-4 rounded-xl transition-colors shadow-lg">
                    Start a conversation
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
        </div>
    </div>
</section>

</x-layouts.app>
