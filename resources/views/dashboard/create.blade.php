<x-layout>
    <div style="max-width: 500px; margin: 0 auto;">
        <h1>Pievienot jaunu neaizmirstuli</h1>
        <form class="aform" action="/create/create" method="POST">
            @csrf
        <div>
            <label for="reminder">😱Notikums</label>
            <input id="reminder" type="text" name="reminder" placeholder="Ievadiet atgādinājuma tekstu" required>
        </div>
        <div>
            <label for="date">📅Kad beigsies?</label>
            <input id="date" type="date" name="date" required>
        </div>
        <div>
            <label for="time">🕒Cikos beigsies?</label>
            <input id="time" type="time" name="time" required>
            <p style="font-size: 14px; color: grey">AM - Rīts, PM - Vakars</p>
        </div>
        <div>
            <button type="submit">Pievienot neaizmirstuli</button>
            <a href="/dashboard" style="font-size: 16px; padding: 0.5rem 1.2rem; border: 1.2px solid #999999; border-radius: 6px; display: inline-block; color: var(--text-dark); text-decoration: none; margin-left: 1rem; background-color: #f5f5f5;">Atcelt</a>
        </div>
    </form>
    </div>
</x-layout>