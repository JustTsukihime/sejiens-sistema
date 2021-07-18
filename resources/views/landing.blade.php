@extends('layouts.app')

@section('content')
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#sejiens">Par Sējienu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#pieteikties">Pieteikties</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#seko">Seko</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<header class="masthead text-center text-white d-flex">
    <div class="container my-auto">
        <div class="row">
            <div class="col-lg-12 mx-auto mt-3 pt-5">
                <img src="images/logo.png" class="rounded mx-auto d-block img-fluid">
            </div>

            <div class="col-lg-8 mx-auto pt-5">
                <h1>{{ config('app.name', 'Sējiens') }}</h1>
                <h3>1. septembris</h3>
                <a class="btn btn-apply js-scroll-trigger mt-2" href="#pieteikties">PIETEIKTIES</a>
            </div>
        </div>
    </div>
</header>
<section class="bg-primary">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="section-heading text-white">Hey, pirmkursniek!</h2>
                <hr class="light my-4">
                <p class="text-faded mb-4">
                    Tu esi godam izturējis centralizēto eksāmenu kārtošanu, pinķerīgo pieteikuma veidošanu un ilgu neziņas un satraukuma brīdi! Nu Tev sācies jauns un piedzīvojumiem pilns dzīves posms un beidzot vari saukt sevi par Latvijas Universitātes Datorikas fakultātes studentu!
                </p>
                <p class="text-faded mb-4">
                    Jaunais akadēmiskais gads jau ir pavisam tuvu, lai to uzveiktu, būs jāiemācās izdzīvot studiju džungļos, tāpēc mūsu draudzīgais pitoniņš tev palīdzēs apgūt visas vajadzīgās iemaņas un iepazīt savus jaunos kursa biedrus, kuri būs tava atslēga uz panākumiem Datorikas fakultātē.
                    Universitātes savvaļas izdzīvošanas pamācības spēsim tev dot pasākumā "Sējiens", kur izbaudīsi pirmos soļus plašajā universitātes dzīve kopā ar jau pieredzējušajiem datoriķiem, kas nodos savas zināšanas.
                </p>
                <p class="text-faded mb-4">
                    <b>Tevi iespējams māc šaubas, vai viss būs labi, vai orientēsies universitātē, un iedraudzēsies ar jaunajiem kursabiedriem?</b>
                </p>

            </div>
        </div>
    </div>
</section>

<section id="sejiens">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Sējiens</h2>
                <hr class="my-4">
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-3 text-center">
                <div class="mt-5 mx-auto">
                    <div id="carouselExampleControls1" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="images/album/1.jpg" alt="1 slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/album/2.jpg" alt="2 slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/album/3.jpg" alt="3 slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/album/4.jpg" alt="4 slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/album/5.jpg" alt="5 slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/album/7.jpg" alt="7 slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/album/8.jpg" alt="8 slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/album/9.jpg" alt="9 slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/album/10.jpg" alt="10 slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/album/11.jpg" alt="11 slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/album/12.jpg" alt="12 slide">
                            </div>

                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls1" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls1" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <p class="text-dark mt-1">Pagājušā gada bildes</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-8 text-center">
                <div class="mt-5 mx-auto">
                    <p>Lai pirmajā studiju dienā universitātē Tu jau justos kā mājās, būtu iepazinies ar daudziem kursabiedriem,
                        mēs aicinām piedalīties vienā no spilgtākajiem mūsu fakultātes notikumiem –
                        <span class="text-primary font-weight-bold">pirmsaristotelī “Sējiens 2021”, kas notiks šī gada 1. septembrī.</span>
                    </p>
                    <p>
                        Piedalies aizraujošā pirmsstudiju piedzīvojumā,
                        kurā iegūtās prasmes varēsi izmantot arī turpmāk, lai neapjuktu, sastopoties ar negulētām naktīm,
                        kontroldarbiem un sesiju.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-8 text-center">
                <div class="mt-5 mx-auto">
                    <p><span class="text-primary font-weight-bold">Trešdienā, 1. septembrī, tiksimies Latvijas Universitātes galvenajā ēkā
                          (Raiņa bulvāris 19)</span>, lai iepazītu gan universitātes telpas, gan arī savus jaunos kursabiedrus,
                        iesaistoties dažādos interesantos piedzīvojumos. </p>
                    <p> 5. septembrī mēs tiksimies atkārtoti, lai <span class="text-primary font-weight-bold"> sagatavotos
                        Latvijas Universitātes studentu svētkiem “Aristotelis”</span> un parādītu pārējām fakultātēm, cik DF ir
                        saliedēta un “skaļa” fakultāte!</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-3 text-center">
                <div class="mt-5 mx-auto">
                    <div id="carouselExampleControls2" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="images/album/13.jpg" alt="13 slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/album/14.jpg" alt="14 slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/album/15.jpg" alt="15 slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/album/16.jpg" alt="16 slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/album/17.jpg" alt="17 slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/album/18.jpg" alt="18 slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/album/19.jpg" alt="19 slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/album/20.jpg" alt="20 slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/album/21.jpg" alt="21 slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/album/22.jpg" alt="22 slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/album/23.jpg" alt="23 slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/album/24.jpg" alt="24 slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls2" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls2" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <p class="text-dark mt-1">Pagājušā gada bildes</p>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12 text-center">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/s9sPLpHsm4s" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-12 text-center">
                <p class="text-secondary mt-3">Sējiens ir viens no nozīmīgākajiem Latvijas Universitātes Datorikas fakultātes pasākumiem, un  Datorikas fakultātes Studentu pašpārvalde parūpēsies, lai Tu un Tavi topošie kursa biedri iepazītos un sadraudzētos neformālā gaisotnē, pakustētos un padomātu dažādās interesnatās aktivitātēs, uzzinātu svarīgāko, kas sagaida universitātes dzīvē, un, protams, neaizmirstami pavadītu pēdējos brīvos brīžus pirms studiju sākuma!</p>
            </div>
        </div>
    </div>
</section>
<div class="bg-primary section-min">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 text-white pr-2 text-center mt-2 mb-2"><i class="fas fa-camera fa-6x"></i></div>
            <div class="col-lg-8 mx-auto text-center">
                <h5 class="text-white">Informējam, ka pasākuma laikā tiks fotografēts un filmēts. Apmeklējot pasākumu, Jūs piekrītat pasākuma laikā veiktajai fotografēšanai un filmēšanai, kā arī fotoattēlu un videomateriālu publiskai izmantošanai sabiedrisko attiecību vai reklāmas nolūkos LU Datorikas fakultātes un Datorikas fakultātes Studentu pašpārvaldes sociālajos medijos, tīmekļa vietnē internetā un citviet.
                </h5>
            </div>
            <div class="col-lg-2 text-white text-center mt-2 mb-2"><i class="fas fa-video fa-6x"></i></div>
        </div>
    </div>
</div>
<section class="bg-secondary text-white" id="pieteikties">
    <div class="container text-center">
        <h2 class="mb-4">Piesakies</h2>
        <h4 class="text-white mb-5">* Lai piedalītos pasākumā, lūdzu nodrošini, ka esi ieguvis digitālo COVID-19 sertifikātu!
        </h4>
        <div class="offset-lg-2 col-lg-8">
            @if(session()->has('application-success'))
                <div class="alert alert-primary" role="alert">{{ session()->get('application-success') }}</div>
            @endif
            {{ Form::open(['method' => 'POST', 'route' => ['student.store'], 'class' => 'form-horizontal', 'id' => 'application-form']) }}
            {{ Form::rowText('name', null, 'Vārds', ['required']) }}
            {{ Form::rowText('surname', null, 'Uzvārds', ['required']) }}
            {{ Form::rowEmail('email', null, 'E-pasts', ['required']) }}
            {{ Form::rowText('phone', null, 'Tālrunis', ['required']) }}
            {{ Form::rowSelect('tshirt', ['XS'=>'XS','S'=>'S','M'=>'M','L'=>'L','XL'=>'XL','XXL'=>'XXL'], 'T-krekla izmērs', ['required']) }}
            {{ Form::rowRadio('whatsapp', 'Tevi pievienot 1.kursa Whatsapp grupai?', null, [['label' => 'Jā', 'value' => 'yes'], ['label' => 'Nē', 'value' => 'no']], ['required']) }}
            {{ Form::rowSubmit('Pieteikties', ['class' => 'form-control btn btn-primary col-lg-6']) }}
            {{ Form::close() }}
        </div>
        <h4 class="text-white pt-2 mt-5">Mēs, Datorikas fakultātes Studentu pašpārvalde, apstrādāsim Tavus datus, lai informētu Tevi par pasākumu un jaunumiem, kas saistīti ar studiju uzsākšanu. Tavus datus mēs nenodosim trešajām personām. Ja Tev ir jautājumi, sazinies ar mums info@datoriki.lv.
        </h4>
    </div>
</section>
@endsection