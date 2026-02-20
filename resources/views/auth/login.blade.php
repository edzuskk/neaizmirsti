<x-layout>
    <div style="max-width: 400px; margin: 3rem auto;">
        <h1 style="text-align: center; margin-bottom: 2rem;">Autentificējaties savā kontā</h1>
        <form class="aform" method="POST" action="{{ route('login') }}">
            @csrf
            <div>
                <label for="email">E-pasts</label>
                <input id="email" type="email" name="email" required autofocus>
            </div>
            <div>
                <label for="password">Parole</label>
                <input id="password" type="password" name="password" required>
            </div>
            @error('email')
                <div class="alert alert-error">{{ $message }}</div>
            @enderror
            @error('password')
                <div class="alert alert-error">{{ $message }}</div>
            @enderror
            <div>
                <button type="submit">Autentificēties</button>
            </div>
        </form>
        <p style="text-align: center; margin-top: 1.5rem;">Vai jums nav konta? <a href="{{ route('register') }}">Reģistrējieties</a>.</p>
    </div>
</x-layout>