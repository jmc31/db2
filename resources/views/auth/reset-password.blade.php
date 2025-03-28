<x-guest-layout>
    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ request()->route('token') }}">

        <!-- Email -->
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" class="w-full px-3 py-2 border rounded-md text-sm" required>
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

        <!-- OTP -->
        <div>
            <label for="otp">Enter OTP</label>
            <input type="text" name="otp" class="w-full px-3 py-2 border rounded-md text-sm" required>
        </div>

        <!-- Password -->
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
</x-guest-layout>
