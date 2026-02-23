<x-layout>
    <h1>Sveicināti savā profilā {{ Auth::user()->name }}!</h1>
    <p style="color: black;">Šeit jūs varat redzēt un rediģēt savu profilu.</p>
    <p style="color: black;">Jūsu e-pasts: {{ Auth::user()->email }}</p>

    <button class="profile-btn-change" onclick="window.location.href='/change'">Mainīt paroli</button>
    <button class="profile-btn-edit" onclick="window.location.href='/profile/edit'">Rediģēt profilu</button>
    <form method="POST" action="/profile/delete" style="display:inline;">
        @csrf
        <button class="profile-btn-delete" type="submit" onclick="return confirm('Vai tiešām vēlaties dzēst savu profilu? Šī darbība ir neatgriezeniska.')">Dzēst profilu</button> 
    </form>

</x-layout>