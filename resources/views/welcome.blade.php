<x-layout>
    <div class="welcome-box">
        <h1 style="font-size: 30px;">Sveicināti pakalpojumā: "Neaizmirsti!" 👋</h1>
        @guest
            <p style="font-size: 19px;">Lūdzu, <a href="/login" style="color: #6900a6c9; text-decoration: none">ieejat profilā</a> vai <a href="/register" style="color: #6900a6c9; text-decoration: none">reģistrējaties</a>, lai izmantotu palīgu "Neaizmirsti!".</p>
        @endguest
        @auth
            <p>Esiet sveicināti, {{ auth()->user()->name }}! Jūs esat veiksmīgi pieslēdzies savam profilam.</p>
            <a href="/dashboard" style="font-size: 16px; background-color: #000000; color: white; padding: 0.75rem 1.5rem; border-radius: 4px; display: inline-block;">Dodaties uz saviem neaizmirstuļiem📝</a>
        @endauth
        <br></br>
        <hr/>
        <br/>
        <p style="color: black">Kas ir "Neaizmirsti!"?🤔</p>
        <p>
        "Neaizmirsti!" ir palīgs, kas nedos jums aizmirst par savām darīšanām, piemēram, kā "Vizīte pie ārsta" 
        vai "Nopirkt pienu". Šajā palīgā, <br> jus varat pievienot neaizmirstuļus (atgādinājumus), lai neaizmirstu 
        par saviem notikumiem. Šis palīgs jums arī dod iespēju redzēt <br> savus neaizmirstuļus, rediģēt tos, 
        atzīmēt kā izdarītus vai dzēst tos. Jūs varat arī redzēt, neaizmirstuļa statusu, <br> piemēram: drīz beigsies, 
        ir aktīvs, ir novecojis vai ir izdarīts
        </p>
        <p style="font-size: 15px; color: black">Rodas problēma? 🙃<br> 
        Nezināt kā izdzēst, rediģēt vai atjaunot neaizmirstuli? 
        Spiediet <a href="/helper" style="color: #6900a6c9">šeit</a> 
        vai uz pogas "Palīgs", kura atrodas augšā (Poga būs redzama tad, 
        kad būsiet autentificējies vai reģistrējies)</p>
        </div>
</x-layout>