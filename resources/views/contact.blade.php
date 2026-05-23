<x-layouts.app title="Contact">

<section class="pt-36 pb-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-5 gap-16">

            {{-- Left info column --}}
            <div class="lg:col-span-2">
                <span class="text-brand-600 text-sm font-semibold uppercase tracking-widest">Get in touch</span>
                <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 mt-3 mb-5 leading-tight">
                    Let's talk about your project
                </h1>
                <p class="text-gray-600 leading-relaxed mb-8">
                    Whether you have a detailed spec or just an idea — we're happy to explore it. Fill in the form and we'll be in touch within one business day.
                </p>

                <div class="space-y-5">
                    <div class="flex gap-4">
                        <div class="w-10 h-10 bg-brand-50 rounded-xl flex items-center justify-center text-lg shrink-0">📧</div>
                        <div>
                            <p class="text-xs text-gray-400 font-medium">General enquiries</p>
                            <a href="mailto:info@mokesinfotech.com" class="text-sm font-semibold text-gray-800 hover:text-brand-600 transition-colors">info@mokesinfotech.com</a>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="w-10 h-10 bg-brand-50 rounded-xl flex items-center justify-center text-lg shrink-0">👤</div>
                        <div>
                            <p class="text-xs text-gray-400 font-medium">CEO direct</p>
                            <a href="mailto:mokeclement@mokesinfotech.com" class="text-sm font-semibold text-gray-800 hover:text-brand-600 transition-colors">mokeclement@mokesinfotech.com</a>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="w-10 h-10 bg-brand-50 rounded-xl flex items-center justify-center text-lg shrink-0">📞</div>
                        <div>
                            <p class="text-xs text-gray-400 font-medium">Phone / WhatsApp</p>
                            <a href="tel:+2347025605090" class="text-sm font-semibold text-gray-800 hover:text-brand-600 transition-colors">+234 702 560 5090</a>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="w-10 h-10 bg-brand-50 rounded-xl flex items-center justify-center text-lg shrink-0">📍</div>
                        <div>
                            <p class="text-xs text-gray-400 font-medium">Office address</p>
                            <p class="text-sm font-semibold text-gray-800">NO.1 Nairobi Street<br>off Aminu Kano Crescent<br>Wuse 2, Abuja, Nigeria</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="w-10 h-10 bg-brand-50 rounded-xl flex items-center justify-center text-lg shrink-0">🕒</div>
                        <div>
                            <p class="text-xs text-gray-400 font-medium">Office hours</p>
                            <p class="text-sm font-semibold text-gray-800">Mon–Fri, 9am–6pm WAT</p>
                        </div>
                    </div>
                </div>

                {{-- Map placeholder --}}
                <div class="mt-8 rounded-2xl overflow-hidden border border-gray-200 bg-gray-100 h-48 flex items-center justify-center">
                    <div class="text-center text-gray-400 p-4">
                        <div class="text-3xl mb-2">📍</div>
                        <p class="text-sm font-medium">NO.1 Nairobi Street, Wuse 2, Abuja</p>
                        <a href="https://maps.google.com/?q=Nairobi+Street+Wuse+2+Abuja+Nigeria"
                           target="_blank" rel="noopener"
                           class="inline-flex items-center gap-1 mt-2 text-xs text-brand-600 font-semibold hover:underline">
                            View on Google Maps
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        </a>
                    </div>
                </div>

                {{-- What happens next --}}
                <div class="mt-8 bg-gray-50 rounded-2xl p-6">
                    <h3 class="font-bold text-gray-900 mb-4 text-sm">What happens next?</h3>
                    <ol class="space-y-3">
                        @foreach(['We review your message and match you with the right team member','You receive a personalised response (not a template) within 24 hours','We schedule a discovery call at your convenience','We send a no-obligation proposal within 3 business days'] as $i => $step)
                        <li class="flex gap-3 text-sm text-gray-600">
                            <span class="w-5 h-5 bg-brand-600 text-white rounded-full flex items-center justify-center text-xs font-bold shrink-0 mt-0.5">{{ $i+1 }}</span>
                            {{ $step }}
                        </li>
                        @endforeach
                    </ol>
                </div>
            </div>

            {{-- Form column --}}
            <div class="lg:col-span-3">
                <div class="bg-white border border-gray-100 rounded-3xl shadow-sm p-8 md:p-10">
                    <livewire:contact-form />
                </div>
            </div>
        </div>
    </div>
</section>

</x-layouts.app>
