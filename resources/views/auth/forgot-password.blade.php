<x-guest-layout>
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        @method('PUT') <!-- Fixes the error -->

        <!-- Email -->
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="w-full px-3 py-2 border rounded-md text-sm" required>
        </div>

        <!-- Security Question -->
        <div>
            <label for="security_question">Security Question</label>
            <select name="security_question" class="w-full px-3 py-2 border rounded-md text-sm" required>
                <option value="">Select your security question</option>
                <option value="What is your pet's name?">What is your pet's name?</option>
                <option value="What is your mother's maiden name?">What is your mother's maiden name?</option>
                <option value="What was the name of your first school?">What was the name of your first school?</option>
                <option value="What is your favorite food?">What is your favorite food?</option>
            </select>
        </div>

        <!-- Security Answer -->
        <div>
            <label for="security_answer">Security Answer</label>
            <input type="text" name="security_answer" class="w-full px-3 py-2 border rounded-md text-sm" required>
        </div>

        <!-- Generate OTP -->
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

        <!-- New Password -->
        <div>
            <label for="password">New Password</label>
            <input type="password" name="password" class="w-full px-3 py-2 border rounded-md text-sm" required>
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" class="w-full px-3 py-2 border rounded-md text-sm" required>
        </div>

        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-md mt-4">
            Reset Password
        </button>
    </form>

    <script>
        document.getElementById('generateOtp').addEventListener('click', function() {
            let email = document.getElementById('email').value;

            fetch('{{ route("password.email") }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ email: email })
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById('otpDisplay').innerText = "Your OTP: " + data.otp;
            })
            .catch(error => console.error('Error:', error));
        });
    </script>
</x-guest-layout>
