<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Mokes Infotech' }} – Custom Software & IT Consulting</title>
    <meta name="description" content="{{ $description ?? 'Mokes Infotech builds custom software, SaaS products, and provides expert IT consulting to help businesses scale.' }}">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-white text-gray-900 font-sans">

{{-- Sticky Navigation --}}
<header
    x-data="{ open: false, scrolled: false }"
    x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 20 })"
    :class="scrolled ? 'bg-white/95 backdrop-blur-sm shadow-sm' : 'bg-transparent'"
    class="fixed inset-x-0 top-0 z-50 transition-all duration-300"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 md:h-20">

            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center gap-2 group">
                <div class="w-8 h-8 bg-brand-600 rounded-lg flex items-center justify-center text-white font-bold text-sm group-hover:bg-brand-700 transition-colors">M</div>
                <span class="font-bold text-lg text-gray-900">Mokes<span class="text-brand-600">Infotech</span></span>
            </a>

            {{-- Desktop Nav --}}
            <nav class="hidden md:flex items-center gap-8">
                @foreach([['home','Home'],['services','Services'],['portfolio','Portfolio'],['about','About'],['blog','Blog']] as [$r,$l])
                <a href="{{ route($r) }}"
                   class="text-sm font-medium {{ request()->routeIs($r) ? 'text-brand-600' : 'text-gray-600 hover:text-gray-900' }} transition-colors">
                    {{ $l }}
                </a>
                @endforeach
                <a href="https://mokesbridge.mokesinfotech.com" target="_blank" rel="noopener noreferrer"
                   class="inline-flex items-center gap-1.5 text-sm font-semibold text-emerald-600 hover:text-emerald-700 transition-colors">
                    MokesBridge
                    <span class="bg-emerald-100 text-emerald-700 text-[10px] font-bold px-1.5 py-0.5 rounded-full leading-none">LIVE</span>
                </a>
            </nav>

            {{-- CTA + Hamburger --}}
            <div class="flex items-center gap-4">
                <a href="{{ route('contact') }}" class="hidden md:inline-flex btn-primary text-sm py-2 px-5">
                    Get in Touch
                </a>
                <button @click="open = !open" class="md:hidden p-2 rounded-lg text-gray-600 hover:bg-gray-100">
                    <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    <svg x-show="open"  class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
        </div>

        {{-- Mobile menu --}}
        <div x-show="open" x-transition class="md:hidden border-t border-gray-100 py-4 space-y-1">
            @foreach([['home','Home'],['services','Services'],['portfolio','Portfolio'],['about','About'],['blog','Blog'],['contact','Contact']] as [$r,$l])
            <a href="{{ route($r) }}" @click="open = false"
               class="block px-4 py-2 rounded-lg text-sm font-medium {{ request()->routeIs($r) ? 'bg-brand-50 text-brand-600' : 'text-gray-700 hover:bg-gray-50' }}">
                {{ $l }}
            </a>
            @endforeach
            <a href="https://mokesbridge.mokesinfotech.com" target="_blank" rel="noopener noreferrer" @click="open = false"
               class="flex items-center gap-2 px-4 py-2 rounded-lg text-sm font-semibold text-emerald-600 hover:bg-emerald-50">
                MokesBridge
                <span class="bg-emerald-100 text-emerald-700 text-[10px] font-bold px-1.5 py-0.5 rounded-full leading-none">LIVE</span>
            </a>
        </div>
    </div>
</header>

{{-- Page Content --}}
<main>
    {{ $slot }}
</main>

{{-- Footer --}}
<footer class="bg-gray-950 text-gray-400 pt-16 pb-8 mt-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-10 pb-12 border-b border-gray-800">
            <div class="md:col-span-2">
                <a href="{{ route('home') }}" class="flex items-center gap-2 mb-4">
                    <div class="w-8 h-8 bg-brand-600 rounded-lg flex items-center justify-center text-white font-bold text-sm">M</div>
                    <span class="font-bold text-lg text-white">Mokes<span class="text-brand-400">Infotech</span></span>
                </a>
                <p class="text-sm leading-relaxed max-w-xs mb-5">Custom software, SaaS platforms, and IT consulting — built for growth from Abuja, Nigeria.</p>
                <ul class="space-y-2 text-sm mb-5">
                    <li class="flex items-center gap-2">
                        <span class="text-brand-400">✉</span>
                        <a href="mailto:info@mokesinfotech.com" class="hover:text-white transition-colors">info@mokesinfotech.com</a>
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="text-brand-400">📞</span>
                        <a href="tel:+2347025605090" class="hover:text-white transition-colors">+234 702 560 5090</a>
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="text-brand-400 mt-0.5">📍</span>
                        <span>NO.1 Nairobi Street, off Aminu Kano Crescent,<br>Wuse 2, Abuja, Nigeria</span>
                    </li>
                </ul>
                <div class="flex gap-3">
                    <a href="#" class="w-9 h-9 bg-gray-800 hover:bg-brand-600 rounded-lg flex items-center justify-center transition-colors" aria-label="Twitter/X">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                    </a>
                    <a href="#" class="w-9 h-9 bg-gray-800 hover:bg-brand-600 rounded-lg flex items-center justify-center transition-colors" aria-label="LinkedIn">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                    </a>
                    <a href="#" class="w-9 h-9 bg-gray-800 hover:bg-brand-600 rounded-lg flex items-center justify-center transition-colors" aria-label="GitHub">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"/></svg>
                    </a>
                </div>
            </div>

            <div>
                <h4 class="text-white font-semibold mb-4 text-sm uppercase tracking-wider">Services</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('services') }}#custom-software" class="hover:text-white transition-colors">Custom Software</a></li>
                    <li><a href="{{ route('services') }}#saas" class="hover:text-white transition-colors">SaaS Products</a></li>
                    <li><a href="{{ route('services') }}#consulting" class="hover:text-white transition-colors">IT Consulting</a></li>
                    <li><a href="{{ route('services') }}#advisory" class="hover:text-white transition-colors">IT Advisory</a></li>
                    <li><a href="{{ route('services') }}#cloud" class="hover:text-white transition-colors">Cloud Migration</a></li>
                </ul>
                <h4 class="text-white font-semibold mt-6 mb-3 text-sm uppercase tracking-wider">Live Apps</h4>
                <ul class="space-y-2 text-sm">
                    <li>
                        <a href="https://mokesbridge.mokesinfotech.com" target="_blank" rel="noopener noreferrer"
                           class="inline-flex items-center gap-1.5 hover:text-white transition-colors">
                            MokesBridge
                            <span class="bg-emerald-600 text-white text-[9px] font-bold px-1.5 py-0.5 rounded-full leading-none">LIVE</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div>
                <h4 class="text-white font-semibold mb-4 text-sm uppercase tracking-wider">Company</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('about') }}"   class="hover:text-white transition-colors">About Us</a></li>
                    <li><a href="{{ route('portfolio') }}" class="hover:text-white transition-colors">Our Work</a></li>
                    <li><a href="{{ route('blog') }}"    class="hover:text-white transition-colors">Blog</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-white transition-colors">Contact</a></li>
                </ul>
            </div>
        </div>

        <div class="pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs">
            <p>&copy; {{ date('Y') }} Mokes Infotech. All rights reserved. Abuja, Nigeria.</p>
            <p>Built with Laravel &amp; Livewire</p>
        </div>
    </div>
</footer>

@livewireScripts
</body>
</html>
