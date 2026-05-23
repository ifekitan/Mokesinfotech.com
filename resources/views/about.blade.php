<x-layouts.app title="About">

{{-- HERO --}}
<section class="bg-gradient-to-br from-gray-950 to-gray-900 text-white pt-36 pb-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <span class="text-brand-400 text-sm font-semibold uppercase tracking-widest">About us</span>
                <h1 class="text-4xl md:text-5xl font-extrabold mt-3 mb-5 leading-tight">
                    A team that builds software and shapes strategy
                </h1>
                <p class="text-gray-300 text-lg leading-relaxed">
                    Mokes Infotech was founded by a technology leader with deep roots in enterprise architecture, data governance, and software delivery. We combine hands-on engineering with senior-level consulting to give clients both execution and direction.
                </p>
            </div>
            <div class="grid grid-cols-2 gap-4">
                @foreach([['11+','Projects delivered'],['10+','Clients served'],['8+','Years in business'],['Abuja','Nigeria HQ']] as [$n,$l])
                <div class="bg-white/5 border border-white/10 rounded-2xl p-6 text-center">
                    <div class="text-3xl font-extrabold text-white">{{ $n }}</div>
                    <div class="text-gray-400 text-sm mt-1">{{ $l }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- STORY --}}
<section class="py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">
            <div>
                <h2 class="section-title mb-6">Our story</h2>
                <div class="prose prose-gray max-w-none text-gray-600 space-y-4">
                    <p>Mokes Infotech was founded by Moke Clement Ayodele, a business technology leader with deep experience in enterprise architecture, data governance, and the full lifecycle of software delivery. Having worked across government, hospitality, real estate, and enterprise sectors, the firm was built to bridge the gap between strategic IT advisory and practical software execution.</p>
                    <p>We started with a single principle: understand the business problem deeply before writing a single line of code. That approach has driven word-of-mouth growth from day one, earning long-term relationships with clients ranging from federal government ministries to hotel chains and property firms.</p>
                    <p>Today our team covers custom software development, SaaS products, and enterprise IT consulting — serving clients across Nigeria and beyond from our base in Abuja.</p>
                </div>
            </div>
            <div class="space-y-6">
                <div class="card p-7">
                    <h3 class="font-bold text-gray-900 text-lg mb-3">🎯 Mission</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">To deliver technology solutions that create measurable business value — combining the rigor of enterprise consulting with the speed of modern software development.</p>
                </div>
                <div class="card p-7">
                    <h3 class="font-bold text-gray-900 text-lg mb-3">👁 Vision</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">To be the most trusted technology partner for organisations in Nigeria and Africa — where every technology decision is made with full context and executed with craft.</p>
                </div>
                <div class="card p-7">
                    <h3 class="font-bold text-gray-900 text-lg mb-3">💡 Values</h3>
                    <ul class="space-y-2">
                        @foreach(['Honesty over comfort','Outcomes over output','Simplicity over cleverness','Ownership from start to finish'] as $v)
                        <li class="flex items-center gap-2 text-sm text-gray-600">
                            <span class="w-1.5 h-1.5 bg-brand-500 rounded-full shrink-0"></span>{{ $v }}
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- CEO EXPERTISE --}}
<section class="py-20 bg-brand-600 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <span class="text-brand-200 text-sm font-semibold uppercase tracking-widest">Leadership expertise</span>
                <h2 class="text-3xl md:text-4xl font-extrabold mt-3 mb-5">Moke Clement Ayodele</h2>
                <p class="text-brand-100 text-base leading-relaxed mb-4">CEO & Founding Partner, Mokes Infotech — MD & Founding Partner, Bethpez Limited.</p>
                <p class="text-brand-100 text-sm leading-relaxed">
                    Clement brings decades of combined experience in enterprise technology, software architecture, and business transformation. He leads the firm's strategic consulting practice while remaining hands-on in solution design for key clients.
                </p>
                <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 mt-6 bg-white text-brand-700 hover:bg-gray-100 font-bold px-6 py-3 rounded-xl transition-colors">
                    Contact Clement
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
                <p class="mt-2 text-brand-200 text-xs">mokeclement@mokesinfotech.com</p>
            </div>
            <div class="grid grid-cols-2 gap-4">
                @foreach([
                    ['🏢','Enterprise Intelligence (EI)','Aligning technology capability with business intelligence strategy at the enterprise level.'],
                    ['🛡️','Data Governance & Productivity','Establishing policies, standards, and processes that make data a trusted business asset.'],
                    ['🏗️','Enterprise & Solution Architecture','Designing scalable technology landscapes that support growth and organisational agility.'],
                    ['📂','Information Management','Structuring how organisations capture, store, and derive value from their information assets.'],
                    ['📊','Big Data & Analytics Programs','Leading end-to-end analytics initiatives from data platform selection to insight delivery.'],
                    ['🔄','IT Strategy & Digital Transformation','Translating business ambition into a technology roadmap with clear priorities and measurable outcomes.'],
                ] as [$icon, $title, $desc])
                <div class="bg-white/10 border border-white/20 rounded-2xl p-5">
                    <div class="text-2xl mb-2">{{ $icon }}</div>
                    <h4 class="font-bold text-white text-sm mb-1">{{ $title }}</h4>
                    <p class="text-brand-100 text-xs leading-relaxed">{{ $desc }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- TEAM --}}
<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="section-title">The people behind the work</h2>
            <p class="section-subtitle mx-auto">A focused team with direct client impact at every level.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($team as $member)
            <div class="card p-7 group">
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-14 h-14 {{ $member['color'] }} rounded-2xl flex items-center justify-center text-white text-lg font-bold shrink-0 group-hover:scale-110 transition-transform">
                        {{ $member['initials'] }}
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 text-base">{{ $member['name'] }}</h3>
                        <p class="text-brand-600 text-sm font-medium">{{ $member['role'] }}</p>
                    </div>
                </div>
                @if($member['bio'])
                <p class="text-gray-500 text-sm leading-relaxed">{{ $member['bio'] }}</p>
                @endif
                @if($member['email'])
                <a href="mailto:{{ $member['email'] }}" class="inline-flex items-center gap-1 mt-3 text-xs text-gray-400 hover:text-brand-600 transition-colors">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    {{ $member['email'] }}
                </a>
                @endif
            </div>
            @endforeach
        </div>

        <div class="text-center mt-12">
            <p class="text-gray-500 text-sm">Interested in joining a focused team doing impactful work?</p>
            <a href="{{ route('contact') }}" class="btn-primary mt-4 inline-flex">Get in touch</a>
        </div>
    </div>
</section>

{{-- RECOGNITION --}}
<section class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10">
            <h2 class="text-2xl font-bold text-gray-900">Sectors we serve</h2>
        </div>
        <div class="flex flex-wrap justify-center gap-4">
            @foreach(['Hospitality & Hotels','Government & Public Sector','Real Estate','Enterprise & Corporate','Digital Media','Consulting & Advisory'] as $badge)
            <div class="bg-gray-100 rounded-xl px-6 py-3 text-sm font-semibold text-gray-600">{{ $badge }}</div>
            @endforeach
        </div>
    </div>
</section>

</x-layouts.app>
