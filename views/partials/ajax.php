<?php
    if(isset($_POST['operation']))
    {
        if($_POST['operation']=="sendMail")
        {
            $isOk = "";
            $success= "";

            $imieNazwisko = $_POST['imieNazwisko'];
            $email = $_POST['email'];
            $telefon = $_POST['telefon'];
            $wiadomosc = $_POST['wiadomosc'];

            $imieNazwisko = htmlentities($imieNazwisko, ENT_QUOTES, "UTF-8");
            $email = htmlentities($email, ENT_QUOTES, "UTF-8");
            $telefon = htmlentities($telefon, ENT_QUOTES, "UTF-8");
            $wiadomosc = htmlentities($wiadomosc, ENT_QUOTES, "UTF-8");
            

            if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $isOk = "Podaj poprawny E-mail";
            }

            if($imieNazwisko=="" || $wiadomosc=="" || $email=="")
            {
                $isOk = "Wypełnij wymagane pola";
            }

            if($isOk=="")
            {
                $temat = "Wiadomość od ".$imieNazwisko."";
                if($telefon!="")
                    $temat = $temat.", nr. telefonu: ".$telefon;
                
                $headers = 'From: '.$email.'' . "\r\n" .
                    'Content-Type: text/html; charset=UTF-8';

                mail("kontakt@el-marsc.pl", $temat, $wiadomosc, $headers);

                $imieNazwisko = "";
                $email = "";
                $telefon = "";
                $wiadomosc = "";

                $success = "Wiadomość została wysłana";
            }

            echo '
                <div class="row">
                    <div class="col-12 col-lg-3">
                        <small>
                            <b><i class="fa-solid fa-house-chimney"></i> EL-MAR s.c. Marczak Piotr Marczak Łukasz</b><br>
                            NIP 918-210-77-18<br>
                            Teodorówka Kolonia 17B<br>
                            23-440 Frampol<br>
                            woj. lubelskie
                            <br><br>

                            <b><i class="fa-solid fa-phone"></i> 669 875 700</b><br>
                            <b><i class="fa-solid fa-phone"></i> 505 119 935</b><br>
                            <a href="mailto:kontakt@el-marsc.pl" class="mail"><b><i class="fa-solid fa-envelope"></i> kontakt@el-marsc.pl</b></a>
                        </small>
                    </div>
                    <div class="col-12 col-lg-3">
                        <input type="text" value="'.$imieNazwisko.'" name="imieNazwisko" class="mt-2" placeholder="*Imię i Nazwisko" maxlength="50">
                        <input type="text" value="'.$email.'" name="email" class="mt-2" placeholder="*E-mail" maxlength="50">
                        <input type="text" value="'.$telefon.'" name="telefon" class="mt-2" placeholder="Telefon" maxlength="25">
                    </div>
                    <div class="col-12 col-lg-6">
                        <textarea name="wiadomosc" class="mt-2" placeholder="*Wiadomość">'.$wiadomosc.'</textarea>
                        <button id="send">Wyślij</button>
                        <div class="responses">
                            <div class="response text-danger d-inline-block">'.$isOk.'</div> 
                            <div class="response text-success d-inline-block">'.$success.'</div>
                        </div>
                    </div>
                </div>
            ';
        }
    }
?>