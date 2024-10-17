@vite('resources/css/app.css')
<div class="bg-slate-900 h-screen pt-10">
    <h1 class="text-3xl text-white text-center mb-5">Verifikasi email mu kang, coba dibuka gmail nya</h1>

    @if (session('resent'))
        <p>A fresh verification link has been sent to your email address.</p>
    @endif
    <p class="text-xl text-white text-center mb-3">Kalo ga dapet emailnya klik tombol ini kang</p>
    <form method="POST" action="{{ route('verification.resend') }}" class="bg-slate-700 text-white w-fit p-3 rounded-md mx-auto">
        @csrf
        <button type="submit">Kirim ulang email</button>
    </form>
</div>