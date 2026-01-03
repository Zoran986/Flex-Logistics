<x-layout title="New Contact Form Submission">
    <div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow">
        <h1 class="text-2xl font-bold text-blue-900 mb-6">New Contact Form Submission</h1>
        
        <div class="space-y-4">
            <div>
                <h2 class="font-semibold">From:</h2>
                <p>{{ $data['name'] }} &lt;{{ $data['email'] }}&gt;</p>
                @if($data['phone'])
                    <p>Phone: {{ $data['phone'] }}</p>
                @endif
            </div>
            
            <div>
                <h2 class="font-semibold">Subject:</h2>
                <p>{{ $data['subject'] }}</p>
            </div>
            
            <div>
                <h2 class="font-semibold">Message:</h2>
                <p class="whitespace-pre-line">{{ $data['message'] }}</p>
            </div>
        </div>
        
        <div class="mt-6 pt-6 border-t border-gray-200">
            <p class="text-sm text-gray-500">
                This message was sent via the contact form on the Traksi website.
            </p>
        </div>
    </div>
</x-layout>