@extends('layouts.app')

@section('title', 'Support & FAQ - Teer Khela Results')

@section('content')
<!-- Support Hero -->
<section class="support-hero">
    <div class="container">
        <div class="support-hero-content">
            <h1>How Can We Help?</h1>
            <p>Find answers to common questions or get in touch with our support team</p>
        </div>
    </div>
</section>

<!-- Contact Options -->
<section class="contact-options-section">
    <div class="container">
        <div class="contact-options-grid">
            <a href="https://wa.me/919876543210" target="_blank" class="contact-option-card whatsapp">
                <div class="option-icon"><i class="fab fa-whatsapp"></i></div>
                <h3>WhatsApp</h3>
                <p>Chat with us on WhatsApp for instant support</p>
                <span class="option-link">Open WhatsApp <i class="fas fa-arrow-right"></i></span>
            </a>

            <a href="mailto:support@teerkhelaresults.com" class="contact-option-card email">
                <div class="option-icon"><i class="fas fa-envelope"></i></div>
                <h3>Email Support</h3>
                <p>Send us an email and we'll respond within 24 hours</p>
                <span class="option-link">Send Email <i class="fas fa-arrow-right"></i></span>
            </a>

            <div class="contact-option-card form">
                <div class="option-icon"><i class="fas fa-paper-plane"></i></div>
                <h3>Contact Form</h3>
                <p>Fill out the form below and we'll get back to you</p>
                <span class="option-link">Scroll Down <i class="fas fa-arrow-down"></i></span>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="faq-section">
    <div class="container">
        <div class="section-header">
            <h2>Frequently Asked Questions</h2>
            <p>Quick answers to common questions</p>
        </div>

        <div class="faq-accordion">
            @foreach($faqs as $index => $faq)
            <div class="faq-item {{ $index === 0 ? 'active' : '' }}">
                <button class="faq-question">
                    {{ $faq['question'] }}
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="faq-answer">
                    <p>{{ $faq['answer'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Contact Form Section -->
<section class="contact-form-section">
    <div class="container">
        <div class="contact-form-wrapper">
            <div class="contact-form-info">
                <h2>Get in Touch</h2>
                <p>Have a question that's not in the FAQ? Send us a message and our team will get back to you within 24 hours.</p>

                <div class="contact-info-items">
                    <div class="contact-info-item">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <h4>Email</h4>
                            <p>support@teerkhelaresults.com</p>
                        </div>
                    </div>

                    <div class="contact-info-item">
                        <i class="fab fa-whatsapp"></i>
                        <div>
                            <h4>WhatsApp</h4>
                            <p>+91 98765 43210</p>
                        </div>
                    </div>

                    <div class="contact-info-item">
                        <i class="fas fa-clock"></i>
                        <div>
                            <h4>Response Time</h4>
                            <p>Within 24 hours</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="contact-form-card">
                @if(session('success'))
                    <div class="alert alert-success">
                        <i class="fas fa-check-circle"></i>
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-error">
                        <i class="fas fa-exclamation-circle"></i>
                        Please fix the errors below.
                    </div>
                @endif

                <form action="{{ route('contact.submit') }}" method="POST" class="contact-form">
                    @csrf

                    <div class="form-group">
                        <label for="name">Your Name *</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required placeholder="Enter your name">
                        @error('name')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address *</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required placeholder="Enter your email">
                        @error('email')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="subject">Subject *</label>
                        <input type="text" id="subject" name="subject" value="{{ old('subject') }}" required placeholder="What is this about?">
                        @error('subject')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="message">Message *</label>
                        <textarea id="message" name="message" rows="5" required placeholder="Write your message here...">{{ old('message') }}</textarea>
                        @error('message')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary btn-full">
                        <i class="fas fa-paper-plane"></i> Send Message
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    // FAQ Accordion
    document.querySelectorAll('.faq-question').forEach(button => {
        button.addEventListener('click', () => {
            const faqItem = button.parentElement;
            const isActive = faqItem.classList.contains('active');

            document.querySelectorAll('.faq-item').forEach(item => {
                item.classList.remove('active');
            });

            if (!isActive) {
                faqItem.classList.add('active');
            }
        });
    });
</script>
@endsection
