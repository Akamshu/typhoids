<?php
session_start();
include 'php/db_config.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title>iConsult | Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/style.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        .cards {
            min-height: 300px;
        }

        .inputs {
            min-width: 300px;
        }

        body {
            background-image: url("assets/images/bg.jpg");
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
    </style>
</head>

<body>
    <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh; " data-aos="flip-right">
        <div class="card round-1 m-3 border-0 shadow-sm" style="max-width: 1000px;">
            <div class="card-body">
                <div class="row">

                    <div class="col-md-5">
                        <div>
                            <div class="">
                                <img src="assets/images/logo.PNG?" alt="" height="30" />
                            </div>

                            <div class="d-flex align-items-center mb-3 d-none d-md-block">
                                <img src="assets/images/login.jpg" style="object-fit: contain; width: 400px" alt="" />
                            </div>

                            <img src="img/consultation.jpg" alt="" style="width: 100%;" class="round-2 mb-3">
                            <div class="smallTxt text-center">Already have account?</div>
                            <a href="login.php" class="btn  btn-light shadow-sm w-100 mb-3 ">Login</a>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div>
                            <form action="" method="post" id="signup-form" data-aos="fade-up">
                                <div class="h4 fw-bold text-primary">Sign up</div>
                                <div class="smallTxt fw-bold">Personal Information</div>
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <div class="smallTxt">Firstname</div>
                                        <input type="text" class="form-control mb-2 round-2" name="firstname" id="fname" required>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="smallTxt">Middlename</div>
                                        <input type="text" class="form-control mb-2 round-2" name="middlename">
                                    </div>
                                    <div class="col-md-4">
                                        <div class="smallTxt">Lastname</div>
                                        <input type="text" class="form-control mb-2 round-2" name="lastname" id="lname" required>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="smallTxt">Birthday</div>
                                        <input type="date" class="form-control mb-2 round-2" name="birthday" id="dob" required>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="smallTxt">Gender</div>
                                        <select class="form-select round-2 mb-2" name="gender" required>
                                            <option value="">- - -</option>
                                            <option value="0">Male</option>
                                            <option value="1">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="smallTxt fw-bold">Contact Information</div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="smallTxt">Email</div>
                                        <input type="email" class="form-control mb-2 round-2" name="email" id="email" required>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="smallTxt">Phonenumber</div>
                                        <input type="text" class="form-control mb-2 round-2" name="phone" required>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="smallTxt">Country</div>
                                        <select id="h" name="region" class="form-select round-2 mb-2" required>
                                        <option value="">Select Country</option>
                                            <option value="Nigeria">Nigeria</option>
                                        </select>
                                        
                                    </div>
                                    <div class="col-md-4">
                                        <div class="smallTxt">State of Origin:</div>
                                        <select id="state" name="province" required class="form-select round-2 mb-2">
                                            <option value="">Select a state</option>
                                            <option value="Abia">Abia</option>
                                            <option value="Adamawa">Adamawa</option>
                                            <option value="AkwaIbom">Akwa Ibom</option>
                                            <option value="Anambra">Anambra</option>
                                            <option value="Bauchi">Bauchi</option>
                                            <option value="Bayelsa">Bayelsa</option>
                                            <option value="Benue">Benue</option>
                                            <option value="Borno">Borno</option>
                                            <option value="Cross River">Cross River</option>
                                            <option value="Delta">Delta</option>
                                            <option value="Ebonyi">Ebonyi</option>
                                            <option value="Edo">Edo</option>
                                            <option value="Ekiti">Ekiti</option>
                                            <option value="Enugu">Enugu</option>
                                            <option value="Gombe">Gombe</option>
                                            <option value="Imo">Imo</option>
                                            <option value="Jigawa">Jigawa</option>
                                            <option value="Kaduna">Kaduna</option>
                                            <option value="Kano">Kano</option>
                                            <option value="Katsina">Katsina</option>
                                            <option value="Kebbi">Kebbi</option>
                                            <option value="Kogi">Kogi</option>
                                            <option value="Kwara">Kwara</option>
                                            <option value="Lagos">Lagos</option>
                                            <option value="Nasarawa">Nasarawa</option>
                                            <option value="Niger">Niger</option>
                                            <option value="Ogun">Ogun</option>
                                            <option value="Ondo">Ondo</option>
                                            <option value="Osun">Osun</option>
                                            <option value="Oyo">Oyo</option>
                                            <option value="Plateau">Plateau</option>
                                            <option value="Rivers">Rivers</option>
                                            <option value="Sokoto">Sokoto</option>
                                            <option value="Taraba">Taraba</option>
                                            <option value="Yobe">Yobe</option>
                                            <option value="Zamfara">Zamfara</option>
                                        </select>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="smallTxt">LGA of Origin:</div>
                                        <select id="lga" class="form-select round-2 mb-2" name="muncity" required>
                                        </select>

                                    </div>
                                </div>
                                <div class="smallTxt fw-bold">Account Information</div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="smallTxt">Username <span class="fw-light fst-italic text-muted">(A-Z,a-z,0-9 | 8+ characters)</span></div>
                                        <input type="text" class="form-control mb-2 round-2" name="username" minlength="8" pattern="[A-Za-z0-9]{8,16}" id="username" required>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="smallTxt">Password <span class="fw-light fst-italic text-muted">(A-Z,a-z,0-9 | 8+ characters)</span></div>
                                        <input type="password" class="form-control mb-2 round-2" name="password" id="password" minlength="8" pattern="[A-Za-z0-9]{8,16}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="smallTxt">Confirm Password</div>
                                        <input type="password" class="form-control mb-2 round-2" id="confirm-password" required>
                                    </div>
                                </div>

                                <div>

                                    <button type="submit" name="submit" class="btn px-3 round-2 btn-sm shadow btn-primary fw-bold float-end">Submit</button>
                                    <div class="spinner-border text-primary float-end me-3 d-none" id="myloading" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>


    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary d-none" data-bs-toggle="modal" id="verification-modal" data-bs-target="#exampleModal">
        Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Verification</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="smallTxt mb-2">An email has been sent your email, please check for the verification code and enter it below</div>
                    <input type="number" class="form-control round-2 text-center" id="input-code">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary d-none" id="close-modal" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn text-primary bg-white" id="resend" disabled>Resend <span id="timer"></span></button>
                    <button type="button" class="btn btn-success" id="verify">Confirm</button>
                </div>
            </div>
        </div>
    </div>



    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Get the state and local government selection inputs
        const stateSelect = document.getElementById("state");
        const lgaSelect = document.getElementById("lga");

        // Define an object with arrays of local governments for each state
        const localGovernments = {
            Abia: [
                "Aba North",
                "Aba South",
                "Arochukwu",
                "Bende",
                "Ikwuano",
                "Isiala Ngwa North",
                "Isiala Ngwa South",
                "Isuikwuato",
                "Obi Ngwa",
                "Ohafia",
                "Osisioma",
                "Ugwunagbo",
                "Ukwa East",
                "Ukwa West",
                "Umuahia North",
                "muahia South",
                "Umu Nneochi",
            ],
            Adamawa: [
                "Demsa",
                "Fufure",
                "Ganye",
                "Gayuk",
                "Gombi",
                "Grie",
                "Hong",
                "Jada",
                "Larmurde",
                "Madagali",
                "Maiha",
                "Mayo Belwa",
                "Michika",
                "Mubi North",
                "Mubi South",
                "Numan",
                "Shelleng",
                "Song",
                "Toungo",
                "Yola North",
                "Yola South",
            ],
            AkwaIbom: [
                "Abak",
                "Eastern Obolo",
                "Eket",
                "Esit Eket",
                "Essien Udim",
                "Etim Ekpo",
                "Etinan",
                "Ibeno",
                "Ibesikpo Asutan",
                "Ibiono-Ibom",
                "Ika",
                "Ikono",
                "Ikot Abasi",
                "Ikot Ekpene",
                "Ini",
                "Itu",
                "Mbo",
                "Mkpat-Enin",
                "Nsit-Atai",
                "Nsit-Ibom",
                "Nsit-Ubium",
                "Obot Akara",
                "Okobo",
                "Onna",
                "Oron",
                "Oruk Anam",
                "Udung-Uko",
                "Ukanafun",
                "Uruan",
                "Urue-Offong Oruko",
                "Uyo",
            ],
            Anambra: [
                "Aguata",
                "Anambra East",
                "Anambra West",
                "Anaocha",
                "Awka North",
                "Awka South",
                "Ayamelum",
                "Dunukofia",
                "Ekwusigo",
                "Idemili North",
                "Idemili South",
                "Ihiala",
                "Njikoka",
                "Nnewi North",
                "Nnewi South",
                "Ogbaru",
                "Onitsha North",
                "Onitsha South",
                "Orumba North",
                "Orumba South",
                "Oyi",
            ],

            Anambra: [
                "Aguata",
                "Anambra East",
                "Anambra West",
                "Anaocha",
                "Awka North",
                "Awka South",
                "Ayamelum",
                "Dunukofia",
                "Ekwusigo",
                "Idemili North",
                "Idemili South",
                "Ihiala",
                "Njikoka",
                "Nnewi North",
                "Nnewi South",
                "Ogbaru",
                "Onitsha North",
                "Onitsha South",
                "Orumba North",
                "Orumba South",
                "Oyi",
            ],
            Bauchi: [
                "Alkaleri",
                "Bauchi",
                "Bogoro",
                "Damban",
                "Darazo",
                "Dass",
                "Gamawa",
                "Ganjuwa",
                "Giade",
                "Itas-Gadau",
                "Jama are",
                "Katagum",
                "Kirfi",
                "Misau",
                "Ningi",
                "Shira",
                "Tafawa Balewa",
                " Toro",
                " Warji",
                " Zaki",
            ],

            Bayelsa: [
                "Brass",
                "Ekeremor",
                "Kolokuma Opokuma",
                "Nembe",
                "Ogbia",
                "Sagbama",
                "Southern Ijaw",
                "Yenagoa",
            ],
            Benue: [
                "Agatu",
                "Apa",
                "Ado",
                "Buruku",
                "Gboko",
                "Guma",
                "Gwer East",
                "Gwer West",
                "Katsina-Ala",
                "Konshisha",
                "Kwande",
                "Logo",
                "Makurdi",
                "Obi",
                "Ogbadibo",
                "Ohimini",
                "Oju",
                "Okpokwu",
                "Oturkpo",
                "Tarka",
                "Ukum",
                "Ushongo",
                "Vandeikya",
            ],
            Borno: [
                "Abadam",
                "Askira-Uba",
                "Bama",
                "Bayo",
                "Biu",
                "Chibok",
                "Damboa",
                "Dikwa",
                "Gubio",
                "Guzamala",
                "Gwoza",
                "Hawul",
                "Jere",
                "Kaga",
                "Kala-Balge",
                "Konduga",
                "Kukawa",
                "Kwaya Kusar",
                "Mafa",
                "Magumeri",
                "Maiduguri",
                "Marte",
                "Mobbar",
                "Monguno",
                "Ngala",
                "Nganzai",
                "Shani",
            ],
            "Cross River": [
                "Abi",
                "Akamkpa",
                "Akpabuyo",
                "Bakassi",
                "Bekwarra",
                "Biase",
                "Boki",
                "Calabar Municipal",
                "Calabar South",
                "Etung",
                "Ikom",
                "Obanliku",
                "Obubra",
                "Obudu",
                "Odukpani",
                "Ogoja",
                "Yakuur",
                "Yala",
            ],

            Delta: [
                "Aniocha North",
                "Aniocha South",
                "Bomadi",
                "Burutu",
                "Ethiope East",
                "Ethiope West",
                "Ika North East",
                "Ika South",
                "Isoko North",
                "Isoko South",
                "Ndokwa East",
                "Ndokwa West",
                "Okpe",
                "Oshimili North",
                "Oshimili South",
                "Patani",
                "Sapele",
                "Udu",
                "Ughelli North",
                "Ughelli South",
                "Ukwuani",
                "Uvwie",
                "Warri North",
                "Warri South",
                "Warri South West",
            ],

            Ebonyi: [
                "Abakaliki",
                "Afikpo North",
                "Afikpo South",
                "Ebonyi",
                "Ezza North",
                "Ezza South",
                "Ikwo",
                "Ishielu",
                "Ivo",
                "Izzi",
                "Ohaozara",
                "Ohaukwu",
                "Onicha",
            ],
            Edo: [
                "Akoko-Edo",
                "Egor",
                "Esan Central",
                "Esan North-East",
                "Esan South-East",
                "Esan West",
                "Etsako Central",
                "Etsako East",
                "Etsako West",
                "Igueben",
                "Ikpoba Okha",
                "Orhionmwon",
                "Oredo",
                "Ovia North-East",
                "Ovia South-West",
                "Owan East",
                "Owan West",
                "Uhunmwonde",
            ],

            Ekiti: [
                "Ado Ekiti",
                "Efon",
                "Ekiti East",
                "Ekiti South-West",
                "Ekiti West",
                "Emure",
                "Gbonyin",
                "Ido Osi",
                "Ijero",
                "Ikere",
                "Ikole",
                "Ilejemeje",
                "Irepodun-Ifelodun",
                "Ise-Orun",
                "Moba",
                "Oye",
            ],
            Rivers: [
                "Port Harcourt",
                "Obio-Akpor",
                "Okrika",
                "Ogu–Bolo",
                "Eleme",
                "Tai",
                "Gokana",
                "Khana",
                "Oyigbo",
                "Opobo–Nkoro",
                "Andoni",
                "Bonny",
                "Degema",
                "Asari-Toru",
                "Akuku-Toru",
                "Abua–Odual",
                "Ahoada West",
                "Ahoada East",
                "Ogba–Egbema–Ndoni",
                "Emohua",
                "Ikwerre",
                "Etche",
                "Omuma",
            ],
            Enugu: [
                "Aninri",
                "Awgu",
                "Enugu East",
                "Enugu North",
                "Enugu South",
                "Ezeagu",
                "Igbo Etiti",
                "Igbo Eze North",
                "Igbo Eze South",
                "Isi Uzo",
                "Nkanu East",
                "Nkanu West",
                "Nsukka",
                "Oji River",
                "Udenu",
                "Udi",
                "Uzo Uwani",
            ],
            Abuja: [
                "Abaji",
                "Bwari",
                "Gwagwalada",
                "Kuje",
                "Kwali",
                "Municipal Area Council",
            ],
            Gombe: [
                "Akko",
                "Balanga",
                "Billiri",
                "Dukku",
                "Funakaye",
                "Gombe",
                "Kaltungo",
                "Kwami",
                "Nafada",
                "Shongom",
                "Yamaltu-Deba",
            ],
            Imo: [
                "Aboh Mbaise",
                "Ahiazu Mbaise",
                "Ehime Mbano",
                "Ezinihitte",
                "Ideato North",
                "Ideato South",
                "Ihitte-Uboma",
                "Ikeduru",
                "Isiala Mbano",
                "Isu",
                "Mbaitoli",
                "Ngor Okpala",
                "Njaba",
                "Nkwerre",
                "Nwangele",
                "Obowo",
                "Oguta",
                "Ohaji-Egbema",
                "Okigwe",
                "Orlu",
                "Orsu",
                "Oru East",
                "Oru West",
                "Owerri Municipal",
                "Owerri North",
                "Owerri West",
                "Unuimo",
            ],
            Jigawa: [
                "Auyo",
                "Babura",
                "Biriniwa",
                "Birnin Kudu",
                "Buji",
                "Dutse",
                "Gagarawa",
                "Garki",
                "Gumel",
                "Guri",
                "Gwaram",
                "Gwiwa",
                "Hadejia",
                "Jahun",
                "Kafin Hausa",
                "Kazaure",
                "Kiri Kasama",
                "Kiyawa",
                "Kaugama",
                "Maigatari",
                "Malam Madori",
                "Miga",
                "Ringim",
                "Roni",
                "Sule Tankarkar",
                "Taura",
                "Yankwashi",
            ],
            Kaduna: [
                "Birnin Gwari",
                "Chikun",
                "Giwa",
                "Igabi",
                "Ikara",
                "Jaba",
                "Jema a",
                "Kachia",
                "Kaduna North",
                "Kaduna South",
                "Kagarko",
                "Kajuru",
                "Kaura",
                "Kauru",
                "Kubau",
                "Kudan",
                "Lere",
                "Makarfi",
                "Sabon Gari",
                "Sanga",
                "Soba",
                "Zangon Kataf",
                "Zaria",
            ],
            Kano: [
                "Ajingi",
                "Albasu",
                "Bagwai",
                "Bebeji",
                "Bichi",
                "Bunkure",
                "Dala",
                "Dambatta",
                "Dawakin Kudu",
                "Dawakin Tofa",
                "Doguwa",
                "Fagge",
                "Gabasawa",
                "Garko",
                "Garun Mallam",
                "Gaya",
                "Gezawa",
                "Gwale",
                "Gwarzo",
                "Kabo",
                "Kano Municipal",
                "Karaye",
                "Kibiya",
                "Kiru",
                "Kumbotso",
                "Kunchi",
                "Kura",
                "Madobi",
                "Makoda",
                "Minjibir",
                "Nasarawa",
                "Rano",
                "Rimin Gado",
                "Rogo",
                "Shanono",
                "Sumaila",
                "Takai",
                "Tarauni",
                "Tofa",
                "Tsanyawa",
                "Tudun Wada",
                "Ungogo",
                "Warawa",
                "Wudil",
            ],
            Katsina: [
                "Bakori",
                "Batagarawa",
                "Batsari",
                "Baure",
                "Bindawa",
                "Charanchi",
                "Dandume",
                "Danja",
                "Dan Musa",
                "Daura",
                "Dutsi",
                "Dutsin Ma",
                "Faskari",
                "Funtua",
                "Ingawa",
                "Jibia",
                "Kafur",
                "Kaita",
                "Kankara",
                "Kankia",
                "Katsina",
                "Kurfi",
                "Kusada",
                "Mai Adua",
                "Malumfashi",
                "Mani",
                "Mashi",
                "Matazu",
                "Musawa",
                "Rimi",
                "Sabuwa",
                "Safana",
                "Sandamu",
                "Zango",
            ],
            Kebbi: [
                "Aleiro",
                "Arewa Dandi",
                "Argungu",
                "Augie",
                "Bagudo",
                "Birnin Kebbi",
                "Bunza",
                "Dandi",
                "Fakai",
                "Gwandu",
                "Jega",
                "Kalgo",
                "Koko Besse",
                "Maiyama",
                "Ngaski",
                "Sakaba",
                "Shanga",
                "Suru",
                "Wasagu Danko",
                "Yauri",
                "Zuru",
            ],
            Kogi: [
                "Adavi",
                "Ajaokuta",
                "Ankpa",
                "Bassa",
                "Dekina",
                "Ibaji",
                "Idah",
                "Igalamela Odolu",
                "Ijumu",
                "Kabba Bunu",
                "Kogi",
                "Lokoja",
                "Mopa Muro",
                "Ofu",
                "Ogori Magongo",
                "Okehi",
                "Okene",
                "Olamaboro",
                "Omala",
                "Yagba East",
                "Yagba West",
            ],
            Kwara: [
                "Asa",
                "Baruten",
                "Edu",
                "Ekiti",
                "Ifelodun",
                "Ilorin East",
                "Ilorin South",
                "Ilorin West",
                "Irepodun",
                "Isin",
                "Kaiama",
                "Moro",
                "Offa",
                "Oke Ero",
                "Oyun",
                "Pategi",
            ],
            Lagos: [
                "Agege",
                "Ajeromi-Ifelodun",
                "Alimosho",
                "Amuwo-Odofin",
                "Apapa",
                "Badagry",
                "Epe",
                "Eti Osa",
                "Ibeju-Lekki",
                "Ifako-Ijaiye",
                "Ikeja",
                "Ikorodu",
                "Kosofe",
                "Lagos Island",
                "Lagos Mainland",
                "Mushin",
                "Ojo",
                "Oshodi-Isolo",
                "Shomolu",
                "Surulere",
            ],
            Nassarawa: [
                "Akwanga",
                "Awe",
                "Doma",
                "Karu",
                "Keana",
                "Keffi",
                "Kokona",
                "Lafia",
                "Nasarawa",
                "Nasarawa Egon",
                "Obi",
                "Toto",
                "Wamba",
            ],
            Niger: [
                "Agaie",
                "Agwara",
                "Bida",
                "Borgu",
                "Bosso",
                "Chanchaga",
                "Edati",
                "Gbako",
                "Gurara",
                "Katcha",
                "Kontagora",
                "Lapai",
                "Lavun",
                "Magama",
                "Mariga",
                "Mashegu",
                "Mokwa",
                "Moya",
                "Paikoro",
                "Rafi",
                "Rijau",
                "Shiroro",
                "Suleja",
                "Tafa",
                "Wushishi",
            ],
            Ogun: [
                "Abeokuta North",
                "Abeokuta South",
                "Ado-Odo Ota",
                "Egbado North",
                "Egbado South",
                "Ewekoro",
                "Ifo",
                "Ijebu East",
                "Ijebu North",
                "Ijebu North East",
                "Ijebu Ode",
                "Ikenne",
                "Imeko Afon",
                "Ipokia",
                "Obafemi Owode",
                "Odeda",
                "Odogbolu",
                "Ogun Waterside",
                "Remo North",
                "Shagamu",
            ],
            Ondo: [
                "Akoko North-East",
                "Akoko North-West",
                "Akoko South-West",
                "Akoko South-East",
                "Akure North",
                "Akure South",
                "Ese Odo",
                "Idanre",
                "Ifedore",
                "Ilaje",
                "Ile Oluji-Okeigbo",
                "Irele",
                "Odigbo",
                "Okitipupa",
                "Ondo East",
                "Ondo West",
                "Ose",
                "Owo",
            ],
            Osun: [
                "Atakunmosa East",
                "Atakunmosa West",
                "Aiyedaade",
                "Aiyedire",
                "Boluwaduro",
                "Boripe",
                "Ede North",
                "Ede South",
                "Ife Central",
                "Ife East",
                "Ife North",
                "Ife South",
                "Egbedore",
                "Ejigbo",
                "Ifedayo",
                "Ifelodun",
                "Ila",
                "Ilesa East",
                "Ilesa West",
                "Irepodun",
                "Irewole",
                "Isokan",
                "Iwo",
                "Obokun",
                "Odo Otin",
                "Ola Oluwa",
                "Olorunda",
                "Oriade",
                "Orolu",
                "Osogbo",
            ],
            Oyo: [
                "Afijio",
                "Akinyele",
                "Atiba",
                "Atisbo",
                "Egbeda",
                "Ibadan North",
                "Ibadan North-East",
                "Ibadan North-West",
                "Ibadan South-East",
                "Ibadan South-West",
                "Ibarapa Central",
                "Ibarapa East",
                "Ibarapa North",
                "Ido",
                "Irepo",
                "Iseyin",
                "Itesiwaju",
                "Iwajowa",
                "Kajola",
                "Lagelu",
                "Ogbomosho North",
                "Ogbomosho South",
                "Ogo Oluwa",
                "Olorunsogo",
                "Oluyole",
                "Ona Ara",
                "Orelope",
                "Ori Ire",
                "Oyo",
                "Oyo East",
                "Saki East",
                "Saki West",
                "Surulere",
            ],
            Plateau: [
                "Bokkos",
                "Barkin Ladi",
                "Bassa",
                "Jos East",
                "Jos North",
                "Jos South",
                "Kanam",
                "Kanke",
                "Langtang South",
                "Langtang North",
                "Mangu",
                "Mikang",
                "Pankshin",
                "Qua an Pan",
                "Riyom",
                "Shendam",
                "Wase",
            ],
            Sokoto: [
                "Binji",
                "Bodinga",
                "Dange Shuni",
                "Gada",
                "Goronyo",
                "Gudu",
                "Gwadabawa",
                "Illela",
                "Isa",
                "Kebbe",
                "Kware",
                "Rabah",
                "Sabon Birni",
                "Shagari",
                "Silame",
                "Sokoto North",
                "Sokoto South",
                "Tambuwal",
                "Tangaza",
                "Tureta",
                "Wamako",
                "Wurno",
                "Yabo",
            ],
            Taraba: [
                "Ardo Kola",
                "Bali",
                "Donga",
                "Gashaka",
                "Gassol",
                "Ibi",
                "Jalingo",
                "Karim Lamido",
                "Kumi",
                "Lau",
                "Sardauna",
                "Takum",
                "Ussa",
                "Wukari",
                "Yorro",
                "Zing",
            ],
            Yobe: [
                "Bade",
                "Bursari",
                "Damaturu",
                "Fika",
                "Fune",
                "Geidam",
                "Gujba",
                "Gulani",
                "Jakusko",
                "Karasuwa",
                "Machina",
                "Nangere",
                "Nguru",
                "Potiskum",
                "Tarmuwa",
                "Yunusari",
                "Yusufari",
            ],
            Zamfara: [
                "Anka",
                "Bakura",
                "Birnin Magaji Kiyaw",
                "Bukkuyum",
                "Bungudu",
                "Gummi",
                "Gusau",
                "Kaura Namoda",
                "Maradun",
                "Maru",
                "Shinkafi",
                "Talata Mafara",
                "Chafe",
                "Zurmi",
            ],
            // add arrays of local governments for all states in Nigeria
        };

        // Listen for the "change" event on the state selection input
        stateSelect.addEventListener("change", () => {
            // Get the selected state
            const selectedState = stateSelect.value;
            // Clear any existing options in the local government selection input
            lgaSelect.innerHTML = "";
            // Add an initial option to prompt the user to select a local government
            const initialOption = document.createElement("option");
            initialOption.value = "";
            initialOption.text = "Select a local government";
            lgaSelect.add(initialOption);
            // If the selected state is not an empty string
            if (selectedState !== "") {
                // Get the array of local governments for the selected state
                const lgas = localGovernments[selectedState];
                // For each local government, create an option and add it to the local government selection input
                lgas.forEach((lga) => {
                    const option = document.createElement("option");
                    option.value = lga;
                    option.text = lga;
                    lgaSelect.add(option);
                });
            }
        });
        ``;

        function yearsDiff(d1, d2) {
            let date1 = new Date(d1);
            let date2 = new Date(d2);
            let yearsDiff = date2.getFullYear() - date1.getFullYear();
            return yearsDiff;
        }
        var code = "";

        function mytimer() {
            var timer = 5000;


            var myvar = setInterval(() => {
                $("#timer").text("(" + timer / 1000 + ")");
                timer -= 1000;

            }, 1000);

            setTimeout(() => {
                clearInterval(myvar);
                $("#resend").attr("disabled", false);
                $("#timer").text("");
            }, 6000);

        };



        AOS.init();
        $.getJSON('extras/regions.json', function(data) {
            $("#regions").html('<option value="">- - -</option>');
            data.forEach(element => {
                var html = `<option value="${element.key}">${element.name}</option>`;
                $("#regions").append(html);
            });
        })

        function loadProvince(myKey) {
            $.getJSON('extras/provinces.json', function(data) {
                $("#provinces").html('<option value="">- - -</option>');
                data.forEach(element => {
                    if (element.region == myKey) {
                        var html = `<option value="${element.key}">${element.name}</option>`;
                        $("#provinces").append(html);
                    }

                });
            })

            $("#myregions").val($("#regions option:selected").text());
        }

        function loadCity(myKey) {
            $.getJSON('extras/cities.json', function(data) {
                $("#cities").html('<option value="">- - -</option>');
                data.forEach(element => {
                    if (element.province == myKey) {
                        var html = `<option value="${element.name}">${element.name}</option>`;
                        $("#cities").append(html);
                    }

                });
            })

            $("#myprovinces").val($("#provinces option:selected").text());
        }


        $("#signup-form").submit(function(e) {
            e.preventDefault();

            if (yearsDiff($("#bd").val(), "<?= date("Y-m-d") ?>") < 18) {
                Swal.fire(
                    'Oops!',
                    'You are below 18.',
                    'info'
                )
            } else if ($("#confirm-password").val() != $("#password").val()) {
                Swal.fire(
                    'Oops!',
                    'You password did not match.',
                    'info'
                )
            } else {

                $.post("ajax/check-username.php", {
                    username: $("#username").val()
                }, function(data) {
                    if (data == 1) {
                        Swal.fire(
                            'Oops!',
                            'Username already in used.',
                            'info'
                        )
                    } else {
                        //sendmail();
                        $("#myloading").removeClass("d-none");
                        $.post("ajax/signup.php",
                            $("#signup-form").serialize(),
                            function(response) {
                                if (response == 1) {
                                    window.location.href = "login.php?status=registered";
                                } else console.log(response);
                            });
                    }
                });



            }

        });

        $("#resend").click(function() {
            $("#close-modal").click();
            sendmail();
        })

        function sendmail() {

            $("#myloading").removeClass("d-none");

            code = Math.floor(100000 + Math.random() * 900000);
            var myBody = `Hello, this is your code: ${code} .`;
            var email = $("#email").val();

            var name = $("#fname").val() + " " + $("#lname").val();
            $.post("mailer/index.php", {
                mySubject: "iConsult Verification",
                myBody,
                email,
                name
            }, function(data) {
                if (data == 1) {
                    $("#verification-modal").click();
                    mytimer();
                    $("#myloading").addClass("d-none");
                } else {
                    $("#myloading").addClass("d-none");
                    Swal.fire(
                        'Oops!',
                        'Email not sent, retry later.',
                        'info'
                    )
                }
            });

        }


        $("#verify").click(function() {


            if ($("#input-code").val() == code) {
                $.post("ajax/signup.php",
                    $("#signup-form").serialize(),
                    function(response) {
                        if (response == 1) {
                            window.location.href = "login.php?status=registered";
                        } else console.log(response);
                    });
            } else {
                alert("Incorrect verification code.");
            }


        });
        
        
              // Get current date in yyyy-mm-dd format
      const today = new Date().toISOString().split("T")[0];
      // Set the max attribute of the input field to today's date
      document.getElementById("dob").setAttribute("max", today);

      // Get the date 18 years ago from today
      function validateForm() {
        const dob = document.getElementById("dob").value;
        const today = new Date();
        const eighteenYearsAgo = new Date();
        eighteenYearsAgo.setFullYear(eighteenYearsAgo.getFullYear() - 18);
        if (new Date(dob) > eighteenYearsAgo) {
          alert("You must be at least 18 years old to sign up.");
          return false;
        }
        return true;
      }
    </script>
</body>

</html>