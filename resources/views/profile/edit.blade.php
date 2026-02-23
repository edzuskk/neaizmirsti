<x-layout>
    <div style="max-width: 500px; margin: 0 auto;">
    <h1>Profila rediģēšana</h1>
    <p>Jums nav obligāti jāmaina jūsu informācija!</p>

    <form class="aform" method="POST" action="/profile/edit">
        @csrf
        <div>
        <label>Jaunais vārds:</label><br>
        <input type="text" name="name" value="{{ Auth::user()->name }}" required><br>
        @error('name')<div class="field-error">{{ $message }}</div>@enderror
        </div>

        <div>
        <label>Jaunais e-pasts:</label><br>
        <input type="email" name="email" value="{{ Auth::user()->email }}" required><br>
        @error('email')<div class="field-error">{{ $message }}</div>@enderror<br>
        </div>

        <button type="submit">Rediģēt</button>
        <button type="button" onclick="window.location.href='/profile'">Atpakaļ uz profilu</button>
    </form>
</div>

        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</x-layout>