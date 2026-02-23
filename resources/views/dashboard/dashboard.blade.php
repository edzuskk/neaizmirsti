<x-layout>
    @if (empty($reminders) || count($reminders) == 0)
        <div class="empty-state">
            <p>Redzu, ka jums nav neaizmirstuļu!🫨 Kā būtu ar viena pievienošanu?😁</p>
            <a href="/create" style="background-color: #000000; color: white; padding: 0.75rem 1.5rem; border-radius: 4px; display: inline-block;">+ Pievienot neaizmirstuli</a>
        </div>
    @else
    <a href="/create" style="text-decoration: none;"><h2>+ Pievienot neaizmirstuli</h2></a>
    <p style="font-size: 19px;">Jūsu neaizmirstuļi: </p>
    <br>
    </form>
        <table>
            <tbody>
                @foreach ($reminders as $reminder)
                    <tr>
                    <td data-label="😱Notikums">{{ $reminder->reminder }}</td>
                    <td data-label="📅Kad beigsies">{{ $reminder->date }}</td>
                    <td data-label="🕒Cikos beigsies">{{ $reminder->time }}</td>
                    <td data-label="📊Status">
                        @if($reminder->is_done)
                            <span style="color: white; font-weight: bold; border: 1px solid blue; border-radius: 8px; background-color: #1e45f495; padding: 0 0.5rem">Izdarīts</span>
                        @elseif($reminder->expires_at->isPast())
                            <span style="color: white; font-weight: bold; border: 1px solid red; border-radius: 8px; background-color: #f41e1e95; padding: 0 0.3rem">Novecojis</span>
                        @elseif($reminder->expires_at->isFuture() && now()->diffInHours($reminder->expires_at) <= 24)
                            <span style="color: dark; font-weight: bold; border: 1px solid yellow; border-radius: 8px; background-color: #f6fb6795; padding: 0 0.3rem">Drīz beigsies</span>
                        @elseif($reminder->expires_at->isFuture())
                            <span style="color: white; font-weight: bold; border: 1px solid green; border-radius: 8px; background-color: #2cf41e95; padding: 0 0.3rem">Aktīvs</span>
                        @endif
                    </td>
                    <td data-label="Darbības">
                        <form action="{{ route('delete', $reminder->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" style="background-color: rgb(202, 39, 2)">Dzēst</button>
                        </form>
                        <form action="{{ route('edit', $reminder->id) }}" method="GET" style="display:inline;">
                            @csrf
                            <button type="submit" style="background-color: #666666;">Rediģēt</button>
                        </form>
                        @if (!$reminder->is_done)
                        <form action="{{ route('markAsDone', $reminder->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <button type="submit" style="background-color: #006713">Izdarīts</button>
                        </form>
                        @endif
                        @if ($reminder->is_done == true)
                        <form action="{{ route('renew.form', $reminder->id) }}" method="GET" style="display:inline;">
                            <button type="submit" style="background-color: #1e45f495;">Atjaunot</button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</x-layout>