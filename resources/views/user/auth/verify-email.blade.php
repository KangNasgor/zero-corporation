@vite('resources/css/app.css')
<div class="bg-slate-900 h-screen pt-10">
    <h1 class="text-3xl text-white text-center mb-5">Verifikasi email mu kang, coba dibuka gmail nya</h1>
    <p class="text-xl text-white text-center mb-3">Kalo ga dapet emailnya klik tombol ini masbro</p>
    <form method="POST" action="{{ route('verification.resend') }}" class="bg-slate-700 text-white w-fit p-3 rounded-md mx-auto">
        @csrf
        <button type="submit">Kirim ulang email</button>
    </form>
    
    <div class="hidden text-white text-center" id="resentMessage">
        {{ session('resent') }}
    </div>
</div>
<script>
    let resentMessage = document.getElementById('resentMessage');
    if(resentMessage){
        resentMessage.style.display = "block";
    } 
</script>