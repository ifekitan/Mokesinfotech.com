<div>
    @if($submitted)
    <div class="text-center py-12">
        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
        </div>
        <h3 class="text-xl font-bold text-gray-900 mb-2">Message received!</h3>
        <p class="text-gray-600">We'll get back to you within one business day.</p>
        <button wire:click="$set('submitted', false)" class="mt-6 text-brand-600 text-sm font-semibold hover:underline">
            Send another message
        </button>
    </div>
    @else
    <form wire:submit="submit" class="space-y-5">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Full name <span class="text-red-500">*</span></label>
                <input wire:model="name" type="text" placeholder="Aisha Johnson"
                       class="w-full border border-gray-300 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent transition @error('name') border-red-400 bg-red-50 @enderror">
                @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Email address <span class="text-red-500">*</span></label>
                <input wire:model="email" type="email" placeholder="aisha@company.com"
                       class="w-full border border-gray-300 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent transition @error('email') border-red-400 bg-red-50 @enderror">
                @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Phone <span class="text-gray-400 font-normal">(optional)</span></label>
                <input wire:model="phone" type="tel" placeholder="+44 7700 900000"
                       class="w-full border border-gray-300 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent transition">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Subject <span class="text-red-500">*</span></label>
                <input wire:model="subject" type="text" placeholder="Custom software project"
                       class="w-full border border-gray-300 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent transition @error('subject') border-red-400 bg-red-50 @enderror">
                @error('subject') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1.5">Message <span class="text-red-500">*</span></label>
            <textarea wire:model="message" rows="6" placeholder="Tell us about your project — the problem, the timeline, and any constraints we should know about..."
                      class="w-full border border-gray-300 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent transition resize-none @error('message') border-red-400 bg-red-50 @enderror"></textarea>
            @error('message') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <button type="submit"
                class="btn-primary w-full justify-center text-base py-4"
                wire:loading.attr="disabled"
                wire:loading.class="opacity-75 cursor-not-allowed">
            <span wire:loading.remove>Send message</span>
            <span wire:loading class="flex items-center gap-2">
                <svg class="animate-spin w-4 h-4" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>
                Sending…
            </span>
        </button>
    </form>
    @endif
</div>
