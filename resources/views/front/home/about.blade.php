@extends('front.layout.template')

@section('content')
        <!-- Page content-->
        <div class="container mt-4">
            <div class="row">
                <div class="col-8" data-aos="fade-in">
                    <div class="card mb-4 shadow-sm">
                    <a href="">
                        <img class="card-img-top featured-img" src="{{ asset('front/img/about.jpg') }}" alt="..." >
                    </a>
                    <div class="card-body">
                        <h2 class="card-title">Perjalanan Kita</h2>
                        <p class="card-text">
                            <p>Setiap orang punya cerita. Setiap langkah membawa pengalaman, pelajaran, tawa, dan air mata. Di Perjalanan Kita, kami percaya bahwa kisah hidup seseorang bukan hanya tentang destinasi, tapi juga tentang perjalanan. Bagaimana kita jatuh, bangkit, dan menemukan makna di setiap langkah.</p>
                            <p>Di sini, kamu akan menemukan kisah nyata dari berbagai orang. Perjalanan yang menginspirasi, momen sederhana yang penuh arti, dan pengalaman yang mungkin membuatmu tersenyum, terharu, atau bahkan merenung. Karena pada akhirnya, setiap perjalanan, sekecil apa pun, pantas untuk diceritakan.</p>
                            <p>Mari berbagi cerita, merasakan pengalaman bersama, dan menemukan bahwa dalam perjalanan hidup ini, kita tidak pernah benar-benar sendiri.</p>
                            <p>Perjalanan Kita | setiap cerita adalah cermin dari hati, setiap langkah adalah bagian dari kita.</p>
                        </p>
                    </div>
                    </div>
                </div>
                
                <div class="col-4" data-aos="fade-left">
                    <div class="card mb-4 shadow-sm">
                    <a href="">
                        <img class="card-img-top featured-img" src="{{ asset('front/img/about2.jpg') }}" alt="..." />
                    </a>
                    <div class="card-body">
                        <h2 class="card-title">Di Balik Layar</h2>
                        <p class="card-text">
                            "Hai! Aku Afifah, orang di balik Perjalanan Kita. Aku bikin web ini karena aku percaya setiap orang punya cerita yang layak diceritain, baik itu cerita yang bikin senyum, bikin mikir, atau kadang bikin hati nyesek dikit.
                            Aku pengen tempat ini jadi rumah kecil di mana kita bisa berbagi pengalaman hidup, belajar dari perjalanan orang lain, dan merasakan bahwa kita nggak sendirian di jalan hidup ini.
                            Jadi, selamat datang! Jelajahi cerita-cerita di sini, ambil yang bisa bikin semangatmu nambah, atau cuma nikmatin perjalanan orang lain. Semoga setiap kisah yang kamu temuin bisa bikin perjalananmu sendiri lebih berwarna."
                        </p>
                    </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('footer')
    @include('front.layout.footer')
@endsection