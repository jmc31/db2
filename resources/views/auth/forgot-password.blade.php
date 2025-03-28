<x-guest-layout>
    {{-- <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form> --}}
    <div>
        <label for="security_question">Security Question</label>
        <input type="text" name="security_question" class="w-full px-3 py-2 border rounded-md text-sm" required>
    </div>

    <div>
        <label for="security_answer">Security Answer</label>
        <input type="text" name="security_answer" class="w-full px-3 py-2 border rounded-md text-sm" required>
    </div>

    <!-- Generate OTP Button -->
    <button type="button" id="generateOtp" class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 rounded-md">
        Generate OTP
    </button>

    <!-- Display OTP -->
    <div id="otpDisplay" class="text-xl font-bold text-red-600 mt-2"></div>

    <!-- OTP Input -->
    <div>
        <label for="otp">Enter OTP</label>
        <input type="text" name="otp" class="w-full px-3 py-2 border rounded-md text-sm" required>
    </div>

    <script>
        document.getElementById('generateOtp').addEventListener('click', function() {
            fetch('/generate-otp', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({})
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById('otpDisplay').innerText = "Your OTP: " + data.otp;
            });
        });
        </script>
</x-guest-layout>
