<x-layout>
    <div style="max-width: 400px; margin: 3rem auto;">
        <h1 style="text-align: center; margin-bottom: 2rem;">Reģistrējiet savu kontu</h1>
        <form class="aform" method="POST" action="{{ route('register') }}">
            @csrf
            <div>
                <label for="name">Vārds</label>
                <input id="name" type="text" name="name" required>
            </div>
            <div>
                <label for="email">E-pasts</label>
                <input id="email" type="email" name="email" required>
            </div>
            <div>
                <label for="password">Parole</label>
                <input id="password" type="password" name="password" required>
            </div>
            @error('name')
                <div class="alert alert-error">{{ $message }}</div>
            @enderror
            @error('email')
                <div class="alert alert-error">{{ $message }}</div>
            @enderror
            @error('password')
                <div class="alert alert-error">{{ $message }}</div>
            @enderror
            <div>
                <button type="submit">Reģistrēties</button>
            </div>
        </form>
        <p style="text-align: center; margin-top: 1.5rem;">Vai jums jau ir konts? <a href="{{ route('login') }}">Autentificējaites</a>.</p>
    </div>
</x-layout>