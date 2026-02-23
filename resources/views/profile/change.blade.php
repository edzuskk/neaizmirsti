<x-layout>
    <div style="max-width: 500px; margin: 0 auto;">
    <h1>Paroles maiņa</h1>
    <p>Jums nav obligāti jāmaina jūsu informācija!</p>


    <form class="aform" method="POST" action="/profile/change">
        @csrf

        <label for="current_password">Pašreizējā parole:</label><br>
        <input type="password" id="current_password" name="current_password" required><br>
        @error('current_password')<div class="field-error">{{ $message }}</div>@enderror
        <br>

        <label for="new_password">Jaunā parole:</label><br>
        <input type="password" id="new_password" name="new_password" required><br>
        @error('new_password')<div class="field-error">{{ $message }}</div>@enderror
        <br>

        <label for="new_password_confirmation">Apstipriniet jauno paroli:</label><br>
        <input type="password" id="new_password_confirmation" name="new_password_confirmation" required><br>
        @error('new_password_confirmation')<div class="field-error">{{ $message }}</div>@enderror
        <br>

        <button type="submit">Mainīt paroli</button>
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