<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Sējiens 2021</title>
</head>
<body style="font-family: arial; letter-spacing: 0.5px;">
<table width="100%" style="background-color:rgba(140, 198, 62, 0.55);font-size:13px;"
       align="center" bgcolor="#8cc63e" cellpadding="0" cellspacing="0">
    <tr>
        <td align="center" style="background: #ff83b5; "><img style="margin-bottom: -3px; " width="600px" src="{{ asset('/images/banner.png') }}"  ></td>
    </tr>
    <tr>
        <td width="100%" style="background: #ff83b5;">
            <div><p></p></div>
        </td>
    </tr>
    <tr>
        <td width="100%" >
            <div><p></p></div>
        </td>
    </tr>
    <tr>
        <td style="position: relative;" width="80%" align="center">
            <table width="80%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td>
                        <table width="100%" style="background-color:rgba(255,255,255,0.94);" bgcolor="#FFFFFF" cellpadding="0"
                               cellspacing="0">
                            <tr>
                                <td height="60"></td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="85%" align="center">
                                        <tr>
                                            <td style="text-align: center"><b style="font-size: 24px;">Čau, {{ $student->name }}!</b></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td height="15"></td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="85%" align="center">
                                        <tr>
                                            <td style="line-height:1.5; font-size: 11.5pt" >Ja tu saņēmi šo e-pastu, tad Tu esi pieteicies Datorikas fakultātes pirmsaristotelim <b>"Sējiens 2021"</b>.
                                                <p>Atgādinām, ka pasākums ir <b>bez dalības maksas</b>, par ko izsakām milzīgu paldies mūsu draugiem – <b>Accenture</b>!</p>
                                                <p><b>Gaidīsim Tevi Sējiena pirmajā daļā piektdien, 3. septembrī</b> Datorikas fakultātes telpās, Raiņa bulvārī 19. Šīs daļas laikā iepazīsies ar jaunajiem kursabiedriem un universitātes telpām.</p>
                                                <p>Turpinot ar Sējienu iesākto pēdējo nedēļas nogali pirms studiju sākuma, <b>aicinām Tevi sestdien, 4. septembrī, piedalīties</b> Datorikas fakultātes Studentu pašpārvaldes rīkotajā semestra uzsākšanas <b>pasākumā otrajā daļā</b>, kurā sportiskās un saliedējošās aktivitātes varēsi iepazīt kursabiedrus svaigā gaisā.</p>
                                                <p>Ja vēl neesi to izdarījis, lūdzu, aizpildi <a href="{{ route('student.confirmation', $student->hash) }}"> <font color='#cf374b'><b>apstiprinājuma anketu</b></font></a> dalībai pasākumā! (Būs pieejama līdz 1. septembrim.)</p>
                                                Kad esi to izdarījis – apsveicam, tagad Tu esi dalībnieku sarakstā, tāpēc vari sākt gatavoties pasākumam. Iesakam arī uzmest aci uz šīs dienas laikapstākļu prognozei.
                                                <p>Pat tad, ja neplāno doties uz Sējienu, noteikti atzīmē sev kalendārā, ka <b>6. septembrī plkst. 16.00 mēs visi tiekamies pie Latvijas Nacionālās bibliotēkās, lai kopīgi dotos uz Aristoteļa svētkiem LU Akadēmiskajā centrā!</b> Dalība brīvprātīgā piespiedu kārtā.</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="line-height:1.25; font-size: 20px"><b><font color='#af192d'>*** Atgādinam, lai piedalītos pasākumos, tev ir nepieciešams COVID-19 vakcinācijas sertifikāts vai arī COVID-19 pārslimošanas sertifikāts! ***</b></td>
                                        </tr>
                                        <tr>
                                            <td height="15"></td>
                                        </tr>
                                        <tr>
                                            <td style="line-height:1.5; font-size: 11.5pt" >COVID-19 vakcinācijas sertifikātu var iegūt <a href="https://covid19sertifikats.lv"> <font color='#cf374b'><b>COVID-19 digitālā sertifikāta lapā</b></font></a>.
                                                <br>Šis sertifikāts apliecina, ka esi vakcinējies pret COVID-19 un ir pagājušas četrpadsmit dienas pēc pilna vakcinācijas kursa pabeigšanas.</br>
                                                <p>COVID-19 pārslimošanas sertifikāts ir nepieciešams tiem, kuri ir pārslimojuši COVID-19 infekciju.</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="40"><hr></td>
                                        </tr>
                                        <tr>
                                            <td height="15"></td>
                                        </tr>
                                        <tr>
                                            <td><font color='#000' style="line-height:1.5; font-size: 18px"><b>Svarīgi!</b></font>
                                                <font style="line-height:1.5; font-size: 11.5pt">
                                                    <br>Sējiena pirmā daļa norisināsies 3. septembrī. Tās sākums ir <b>plkst.10.00</b> <a href="https://goo.gl/maps/Nw87VyMxQ832" style="text-decoration: none;"><font color='#cf374b'><b>Raiņa bulvārī 19</b></font></a>. Reģistrācija no plkst. 9.30.
                                                    <br>Sējiena otrā daļa norisināsies 4. septembrī. Tās sākums ir <b>plkst.11.00</b> <a href="https://goo.gl/maps/CAaTEJYQsrQBs8uj8" style="text-decoration: none;"><font color='#cf374b'><b>Biķernieku mežā</b></font></a>. Ierašanās no plkst. 10.30.</font>
                                            </td>
                                        </tr>
                                        <!-- <tr>
                                            <td height="15"></td>
                                        </tr>
                                        <tr>
                                            <td id='packing'><font style="line-height:1.5; font-size: 18px"><b>Vajadzīgo mantu saraksts:</b></font>
                                        </tr>
                                        <td width="100%" style="line-height:1.5; font-size: 11.5pt" valign="top">
                                            <table width="100%" align="center">
                                                <tr>
                                                    <td width="10%"></td>
                                                    <td valign="top">
                                                        <u>Vispārīgi:</u>
                                                        <ul type="none" style="line-height:2; padding-left: 10px; margin-top: 0">
                                                            <li><input type="checkbox"> Siltas zeķes un apģērbu</li>
                                                            <li><input type="checkbox"> Personīgās higiēnas līdzekļi</li>
                                                            <li><input type="checkbox"> Dvielis</li>
                                                            <li><input type="checkbox"> Guļammaiss</li>
                                                            <li><input type="checkbox"> Paklājiņš vai matracis</li>
                                                            <li><input type="checkbox"> Nedaudz skaidras naudas</li>

                                                        </ul>
                                                    </td>
                                                    <td valign="top">
                                                        <u>Nakts trasei un citām aktivitātēm:</u>
                                                        <ul type="none" style="line-height:2; padding-left: 10px; margin-top: 0">
                                                            <li><input type="checkbox"> Drēbes, kuru nav žēl</li>
                                                            <li><input type="checkbox"> Lukturītis</li>
                                                            <li><input type="checkbox"> Gumijas zābaki/citi ērti un izturīgi apavi</li>
                                                            <li><input type="checkbox"> Maiņas drēbes, apavi</li>
                                                            <li><input type="checkbox"> Lietusmētelis</li>
                                                            <li><input type="checkbox"> Uzkodas un dzeramais naktstrasei</li>
                                                        </ul>
                                                    </td>

                                                    <td width="10%"></td>
                                                </tr> -->
                                            </table>
                                            <!-- <span>Ņem vērā, <b>laikapstākļi mēdz būt dažādi</b>, tāpēc šeit ir pieminēts tikai survival-kit, bez kura nekādi nevarēsi iztikt. Par visu pārējo parūpējies pats.
                                                            <br><br><b>Nakts trase</b> ir nopietns pārbaudījums gan ķermenim, gan prātam, un dažreiz gadās tā, ka drēbes to neiztur, tāpēc paņem līdzi kādu maiņas apģērba komplektu. -->
                                                            <br><p style="text-align: center;">Ja rodas kādas neskaidrības - raksti uz <span class="text-primary" href="mailto:sejiens@datoriki.lv"><b>sejiens@datoriki.lv</b></span>.</p>
                                                            <br>
                                        </td>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td height="40"></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <!-- <tr>
                    <td>
                        <table width="100%" style="background-color:rgb(179, 215, 182);" bgcolor="#e9e9e9" cellpadding="0"
                               cellspacing="0">
                        </table>
                    </td>
                </tr> -->
                <tr>
                    <td>
                        <table width="100%" style="background-color:rgb(255,255,255)" bgcolor="#ffffff" cellpadding="0"
                               align="center" cellspacing="0">
                            <tr>
                                <td height="40"></td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="85%" align="center">
                                        <tr>
                                            <td style="line-height:1.5; font-size: 11.5pt; text-align: center;"><font color="#000"><b>Esi notikumu centrā un neaizmirsti sekot LU Datorikas fakultātes un LU DF Studentu pašpārvaldes sociālajiem tīkliem:</b></font></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td height="15"></td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="80%" align="center">
                                        <tr>
                                            <td><font color="#ffffff">
                                        <tr>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td rowspan="2"><a href="https://www.facebook.com/ludfsp/"><img style="height: 45px;"
                                                                                                                        src="{{ asset('/images/facebook.png') }}"
                                                                                                                        alt="FB logo"></a></td>
                                                        <td style="text-indent: 10px;" ><a href="https://www.facebook.com/ludfsp/" style="text-decoration: none;">
                                                                <font color="#cf374b" ><b>/ludfsp</b></font></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-indent: 10px;" >
                                                            <a href="https://www.facebook.com/LUDatorikasfakultate/" style="text-decoration: none;">
                                                                <font color="#cf374b"><b>/LUDatorikasfakultate</b></font></a>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td rowspan="2"><a href="http://datoriki.lv/"><img style="height: 55px;"
                                                                                                           src="{{ asset('/images/home.png') }}"
                                                                                                           alt="WEB logo"></a></td>
                                                        <td style="text-indent: 10px;" ><a href="http://datoriki.lv/" style="text-decoration: none;">
                                                                <font color="#cf374b"><b>datoriki.lv</b></font></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-indent: 10px;" ><a href="http://www.df.lu.lv/" style="text-decoration: none;">
                                                                <font color="#cf374b"><b>df.lu.lv</b></font></a></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td rowspan="2"><a href="https://www.instagram.com/datoriki/"><img style="height: 45px;"
                                                                                                                           src="{{ asset('/images/instagram.png') }}"
                                                                                                                           alt="Instagram logo"></a></td>
                                                        <td style="text-indent: 10px;" ><a href="https://www.instagram.com/datoriki/" style="text-decoration: none;">
                                                                <font color="#cf374b"><b>@datoriki</b></font></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-indent: 10px;" ><a href="https://www.instagram.com/lu_datorikasfakultate/" style="text-decoration: none;">
                                                                <font color="#cf374b"><b>@lu_datorikasfakultate</b></font></a></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <!-- <td>
                                                <table>
                                                    <tr>
                                                        <td rowspan="2"><a href="https://www.facebook.com/events/955436328262160/"><img style="height: 45px;"
                                                                                                                                        src="{{ asset('/images/event.png') }}"
                                                                                                                                        alt="Event logo"></a></td>
                                                        <td style="text-indent: 10px;" ><a href="https://www.facebook.com/events/955436328262160/" style="text-decoration: none;">
                                                                <font color="#cf374b"><b>Sējiens FB pasākums</b></font></a></td>
                                                    </tr>
                                                </table>
                                            </td> -->
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td height="20"></td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="85%" align="center">
                                        <!-- <tr>
                                            <td style="line-height:1.5; font-size: 11.5pt; text-align: center;"><font color="#000">Esam sarūpējuši <a style="text-decoration: none;" href="https://www.facebook.com/groups/2571684193162234"><font color='#cf374b'><b>kursa Facebook grupu. </b></font></a></td>
                                        </tr>
                                        <tr>
                                            <td style="line-height:1.5; font-size: 11.5pt; text-align: center;"><font color="#000">Kā arī <a style="text-decoration: none;" href="https://discord.gg/bT5CkVU"><font color='#cf374b'><b>kursa Discord serveri. </b></font></a></td>
                                        </tr>
                                        <tr>
                                            <td style="line-height:1.5; font-size: 11.5pt; text-align: center;"><font color="#000">Tāpat neaizmirsti atzīmēties <a style="text-decoration: none;" href="https://www.facebook.com/events/951030595414200"><font color='#cf374b'><b>Pļāviens FB pasākumā. </b></font></a></td>
                                        </tr> -->
                                        <tr>
                                            <td style="line-height:1.5; font-size: 11.5pt; text-align: center; font-style:italic; padding-top: 15px;"><font color="#000">P.S. Sējienā būs arī iespējams iegūt savā īpašumā <a href="http://datoriki.lv/suveniri/"><font color='#000'>Datorikas fakultātes suvenīrus. </font></a></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td height="40"></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td height="50"></td>
    </tr>
</table>
</body>
</html>