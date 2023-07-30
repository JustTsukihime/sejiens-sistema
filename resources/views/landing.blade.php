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
            <div class="col-lg-7 mx-auto mt-3 pt-5">
                <img src="images/logo2023.png" class="rounded mx-auto d-block img-fluid">
            </div>

            <div class="col-lg-8 mx-auto pt-5">
                <h1 style = "font-size:75px">{{ config('app.name', 'Sējiens') }}</h1>
                <h3 style = "font-size:50px">1. - 3. septembris</h3>
                <br>
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
                    Nu ko, tas brīdis ir klāt - centralizētie eksāmeni aiz muguras, dokumenti universitātē iesniegti un parakstīti. Tas nozīmē, ka ir sācies jauns, ar piedzīvojumiem bagāts posms tavā dzīvē - studijas Latvijas Universitātes Datorikas fakultātē!
                </p>
                <p class="text-faded mb-4">
                    Jaunais studiju gads jau ir tepat aiz stūra, un lai to pievarētu, būs jāiemācās jaunas prasmes un paņēmienus, lai izdzīvotu universitātes gaiteņos un auditorijās. Tāpēc mūsu pīlīte tev iemācīs visas nepieciešamās dzīves gudrības, un palīdzēs iepazīt savus jaunos kursabiedrus, kuri būs tavi labākie draugi turpmākos 4 gadus! Pirmo palīdzību un iemaņas, kā izdzīvot universitātē, dosim mācību gada pirmajā pasākumā - "Sējiens", kura laikā spēsi izjust, kāda tad ir tā studentu dzīve vecāku kursu studentu pavadībā, kuri savas zināšanas par studijām nodos tev! 
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
                                <img class="d-block w-100" src="images/album/6.jpg" alt="6 slide">
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
                            <div class="carousel-item">
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
                    <div class="text-center">
                    <p class="text-dark mt-1">Pagājušo gadu bildes</p>
                </div>
            </div>
            <div class="text-center">
                <div class="mt-5 mx-auto">
                    <p>Lai pirmajā studiju dienā universitātē Tu jau justos kā mājās, būtu iepazinies ar daudziem kursabiedriem, mēs aicinām piedalīties vienā no spilgtākajiem mūsu fakultātes notikumiem – 
                        <span class="text-primary font-weight-bold">pirmsaristotelī “Sējiens 2023”, kas notiks no 1. līdz 3. septembrim</span>
                    </p>
                    <p>
                        Piedalies aizraujošā pirmsstudiju piedzīvojumā, kurā iegūtās prasmes varēsi izmantot arī turpmāk, lai neapjuktu, sastopoties ar negulētām naktīm, kontroldarbiem un sesiju.
                    </p><p><span class="text-primary font-weight-bold">Piektdienā, 1. septembrī, tiksimies Latvijas Universitātes galvenajā ēkā (Raiņa bulvāris 19)</span>, lai iepazītu gan universitātes telpas, gan arī savus jaunos kursabiedrus,
                        iesaistoties dažādos interesantos piedzīvojumos. Vakarā dodamies ārpus Rīgas, lai turpinātu studentu saliedēšanu. </p>
                </div>
            </div>
        </div>
        <div class="row">
            
            <div class="text-center">
                <div class="mt-5 mx-auto">
                    <div id="carouselExampleControls2" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="images/album/24.jpg" alt="24 slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/album/25.jpg" alt="25 slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/album/26.jpg" alt="26 slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/album/27.jpg" alt="27 slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/album/28.jpg" alt="28 slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/album/29.jpg" alt="29 slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/album/30.jpg" alt="30 slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/album/31.jpg" alt="31 slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/album/32.jpg" alt="32 slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/album/33.jpg" alt="33 slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/album/34.jpg" alt="34 slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/album/35.jpg" alt="35 slide">
                            </div>
                           <div class="carousel-item">
                                <img class="d-block w-100" src="images/album/36.jpg" alt="36 slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/album/37.jpg" alt="37 slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/album/38.jpg" alt="38 slide">
                            </div>
                             <div class="carousel-item">
                                <img class="d-block w-100" src="images/album/39.jpg" alt="39 slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/album/40.jpg" alt="40 slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/album/41.jpg" alt="41 slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/album/42.jpg" alt="42 slide">
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
                    <p class="text-dark mt-1">Pagājušo gadu bildes</p>
                </div>
            </div>
            <div class="text-center">
                <div class="mt-5 mx-auto">
                    
                    <p><span class="text-primary font-weight-bold">Sestdienā, 2. septembrī</span>, studentus sagaida dažādas sportiskas disciplīnas, komandas darbs un izturība, kā arī jautras aktivitātes un kopumā labākā pavadītā diena studentu dzīvē. Šī būs diena, kad students nostiprinās saikni ar saviem jaunajiem kursabiedriem.</p>
                </div>
            </div>
        </div>
        <div class="row">
            
            <div class="text-center">
                <div class="mt-5 mx-auto">
                    <div id="carouselExampleControls3" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="images/album/43.jpg" alt="43 slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/album/44.jpg" alt="44 slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/album/45.jpg" alt="45 slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/album/46.jpg" alt="46 slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/album/47.jpg" alt="47 slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/album/48.jpg" alt="48 slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/album/49.jpg" alt="49 slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/album/50.jpg" alt="50 slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/album/51.jpg" alt="51 slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/album/52.jpg" alt="52 slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/album/53.jpg" alt="53 slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/album/54.jpg" alt="54 slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/album/55.jpg" alt="55 slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/album/56.jpg" alt="56 slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/album/57.jpg" alt="57 slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls3" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls3" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <p class="text-dark mt-1">Pagājušo gadu bildes</p>
                </div>
            </div>
            <div class="text-center">
                <div class="mt-5 mx-auto">
                    <p> 3. septembrī mēs dosimies atpakaļ uz Rīgu, lai <span class="text-primary font-weight-bold"> sagatavotos
                        Latvijas Universitātes studentu svētkiem “Aristotelis”</span> un parādītu pārējām fakultātēm, cik DF ir
                        saliedēta un “skaļa” fakultāte!</p>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12 text-center">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" width="560" height="315" src="https://www.youtube.com/embed/OoLdJO9Zv60" title="Sejiens video" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
                <h5 class="text-white">Informējam, ka pasākuma laikā tiks fotografēts un filmēts. Apmeklējot pasākumu, Jūs piekrītat pasākuma laikā veiktajai fotografēšanai un filmēšanai, kā arī fotoattēlu un videomateriālu publiskai izmantošanai sabiedrisko attiecību vai reklāmas nolūkos LU Datorikas fakultātes un Datorikas fakultātes Studentu pašpārvaldes sociālajos medijos, tīmekļa vietnē internetā un citviet.<br><br>Piedaloties pasākumā, Jūs piekrītat uzņemties atbildību paši par sevi. Ierodoties uz pasākumu, būs nepieciešams parakstīties, apliecinot to, ka piekrītat šiem nosacījumiem.
                </h5>
            </div>
            <div class="col-lg-2 text-white text-center mt-2 mb-2"><i class="fas fa-video fa-6x"></i></div>
        </div>
    </div>
</div>
<section class="bg-secondary text-white" id="pieteikties">
    <div class="container text-center">
        <h2 class="mb-4">Piesakies</h2>
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
