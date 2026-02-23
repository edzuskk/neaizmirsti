<x-layout>
    <div style="max-width: 500px; margin: 0 auto;">
        <h1>Atjaunot neaizmirstuli</h1>
        <form class="aform" action="{{ route('renew', $reminder->id) }}" method="POST">
            @csrf
            @method('PATCH')
        <div>
            <label for="date">📅Kad beigsies?</label>
            <input id="date" type="date" name="date" value="{{ $reminder->date }}" required>
        </div>
        <div>
            <label for="time">🕒Cikos beigsies?</label>
            <input id="time" type="time" name="time" value="{{ $reminder->time }}" required>
            <p style="font-size: 14px; color: grey">AM - Rīts, PM - Vakars</p>
        </div>
        <div>
            <button type="submit">Atjaunot</button>
            <a href="/dashboard" style="padding: 0.5rem 1.2rem; border: 1px solid #999999; border-radius: 4px; display: inline-block; color: var(--text-dark); text-decoration: none; margin-left: 1rem; background-color: #f5f5f5;">Atcelt</a>
        </div>
    </form>
    </div>
</x-layout>