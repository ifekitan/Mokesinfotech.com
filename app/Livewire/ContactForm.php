<?php

namespace App\Livewire;

use App\Models\ContactMessage;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ContactForm extends Component
{
    #[Validate('required|string|max:100')]
    public string $name = '';

    #[Validate('required|email|max:150')]
    public string $email = '';

    #[Validate('nullable|string|max:30')]
    public string $phone = '';

    #[Validate('required|string|max:150')]
    public string $subject = '';

    #[Validate('required|string|min:20|max:2000')]
    public string $message = '';

    public bool $submitted = false;

    public function submit(): void
    {
        $this->validate();

        ContactMessage::create([
            'name'    => $this->name,
            'email'   => $this->email,
            'phone'   => $this->phone ?: null,
            'subject' => $this->subject,
            'message' => $this->message,
        ]);

        $this->reset(['name', 'email', 'phone', 'subject', 'message']);
        $this->submitted = true;
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
