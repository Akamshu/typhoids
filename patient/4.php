<?php
session_start();
include('../php/db_config.php');

if (isset($_SESSION['userType'])) {
    if ($_SESSION['userType'] != 3) {
        header('Location: ../login.php');
        exit();
    }
} else {
    header('Location: ../login.php');
    exit();
}

date_default_timezone_set("Asia/Manila");

// Extract session symptoms safely for JSON encoding
$symptoms = $_SESSION['symptoms'] ?? [];
$arr = [];
foreach ($symptoms as $item) {
    if (is_array($item)) {
        if (isset($item[1]) && !is_numeric($item[1])) {
            $arr[] = $item[1];
        } elseif (isset($item['name'])) {
            $arr[] = $item['name'];
        } elseif (isset($item['symptom'])) {
            $arr[] = $item['symptom'];
        } elseif (isset($item[0])) {
            $arr[] = $item[0];
        }
    } else {
        $arr[] = $item;
    }
}

$id = $_SESSION['user']['userID'];
$dateOfBirth = $_SESSION['user']['birthday'] ?? date("Y-m-d");
$today = date("Y-m-d");
$diff = date_diff(date_create($dateOfBirth), date_create($today));
$age = (int)$diff->format('%y');
$gender = ($_SESSION['user']['gender'] == 0) ? 'male' : 'female';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
    <link rel="icon" href="../favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/style.css?" />

    <title>iConsult | Diagnosis</title>
</head>

<body>
    <div class="container-fluid p-0">
        <?php include('components/navbar.php') ?>
        <div class="row m-0">
            <?php include('components/sidebar.php') ?>
            <div class="col-md-9 col-sm-12 col-12">
                <div class="vh-100 py-3">
                    <div class="p-3">
                        <div class="h4 fw-bolder">Check Health</div>
                        <div class="p-2 round-1 bg-light text-dark shadow-sm mb-4" style="overflow-x: auto">
                            <div class="d-flex align-items-center">
                                <div class="h6 mb-0 py-2 px-3 bg-info round-1 text-white">1</div>
                                <div class="h6 mb-0 py-2 px-3 me-2 text-nowrap">Terms of Service</div>
                                <div class="h6 mb-0 py-2 px-3 bg-info round-1 text-white">2</div>
                                <div class="h6 mb-0 py-2 px-3 me-2 text-nowrap">Select symptoms</div>
                                <div class="h6 mb-0 py-2 px-3 bg-info round-1 text-white">3</div>
                                <div class="h6 mb-0 py-2 px-3 me-2 text-nowrap">Refine symptoms</div>
                                <div class="h6 mb-0 py-2 px-3 bg-info round-1 text-white">4</div>
                                <div class="h6 mb-0 py-2 px-3 me-2">Diagnosis</div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-5">
                                <div class="card border-0 bg-light shadow-sm round-1">
                                    <div class="card-body">
                                        <div class="h5 fw-bold">Results</div>
                                        <div class="smallTxt text-muted mb-3">
                                            Please note that the list below may not be complete and is provided solely for informational purposes and is not a qualified medical opinion.
                                        </div>
                                        <?php
                                        $date = date("Y-m-d H:i:s");
                                        $raw_output = [];

                                        // Query local health issues database table
                                        $sql = "SELECT * FROM healthissues";
                                        $result = mysqli_query($conn, $sql);

                                        if ($result && $result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {

                                                // Clean and parse DB symptoms into an array
                                                $dbSymptomsList = array_filter(array_map('trim', explode(',', strtolower($row['possibleSymptoms']))));
                                                
                                                if (empty($dbSymptomsList)) {
                                                    continue;
                                                }

                                                $possibility = 0;

                                                // Evaluate each user symptom
                                                foreach ($symptoms as $userSymptom) {
                                                    $userSymName = '';

                                                    if (is_array($userSymptom)) {
                                                        if (isset($userSymptom[1]) && !is_numeric($userSymptom[1])) {
                                                            $userSymName = $userSymptom[1];
                                                        } elseif (isset($userSymptom['name'])) {
                                                            $userSymName = $userSymptom['name'];
                                                        } elseif (isset($userSymptom['symptom'])) {
                                                            $userSymName = $userSymptom['symptom'];
                                                        } elseif (isset($userSymptom[0])) {
                                                            $userSymName = $userSymptom[0];
                                                        }
                                                    } else {
                                                        $userSymName = $userSymptom;
                                                    }

                                                    $userSymName = strtolower(trim((string)$userSymName));
                                                    if ($userSymName === '') continue;

                                                    // Comparison logic
                                                    foreach ($dbSymptomsList as $dbSym) {
                                                        if ($dbSym === $userSymName || stripos($dbSym, $userSymName) !== false || stripos($userSymName, $dbSym) !== false) {
                                                            $possibility++;
                                                            break; // Prevent double-counting the same user symptom
                                                        }
                                                    }
                                                }

                                                // Collect results with score
                                                if ($possibility > 0) {
                                                    $specializationName = !empty($row['specialization']) ? $row['specialization'] : "General Practice";

                                                    $raw_output[] = [
                                                        'score' => $possibility,
                                                        'data' => (object) array(
                                                            "Issue" => (object) array(
                                                                "ID" => $row['issueID'],
                                                                "Name" => $row['issueName'],
                                                                "IcdName" => ''
                                                            ),
                                                            "Specialisation" => array(
                                                                (object) array("Name" => $specializationName)
                                                            )
                                                        )
                                                    ];
                                                }
                                            }
                                        }

                                        // Rank conditions by highest symptom match count
                                        usort($raw_output, function($a, $b) {
                                            return $b['score'] <=> $a['score'];
                                        });

                                        $output = array_column($raw_output, 'data');

                                        $doc = [];
                                        $last_id = 0;

                                        if (count($output) != 0) {
                                            $symp = $conn->real_escape_string(json_encode($arr));
                                            $outJson = $conn->real_escape_string(json_encode($output));

                                            $sql = "INSERT INTO diagnosis VALUES (null, $id, '$symp', '$outJson', '', '$date')";
                                            mysqli_query($conn, $sql);
                                            $last_id = $conn->insert_id;

                                            $count = 0;
                                            foreach ($output as $row) {
                                                if ($count == 3) break;
                                                $obj1 = $row->Issue;
                                                $obj2 = $row->Specialisation; 
                                        ?>

                                                <div class="card round-1 border-0 mb-3">
                                                    <div class="card-body">
                                                        <a href="view.php?id=<?= $obj1->ID ?>" class="float-end text-decoration-none smallTxt">View <i class="fas fa-angle-right"></i></a>
                                                        <div class="d-flex">
                                                            <div class="me-3">
                                                                <div class="d-flex align-items-center justify-content-center round-2 shadow-2 " style="width: 50px; height: 50px; border: 3px solid ">
                                                                    <div class="h4 mb-0"><?= ++$count ?></div>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <div class="h6 fw-bold mb-0">
                                                                    <?= htmlspecialchars($obj1->Name) ?>
                                                                </div>
                                                                <div class="smallTxt text-muted">
                                                                    Recommended Specialist:
                                                                </div>
                                                                <?php
                                                                echo htmlspecialchars($obj2[0]->Name) . "<br />";
                                                                array_push($doc, $obj2[0]->Name);
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                        <?php
                                            }
                                        } else {
                                            echo '<div class="alert alert-info">No matching health conditions found based on selected symptoms.</div>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-7">
                                <div class="p-3">
                                    <div class="text-start">
                                        <img src="../assets/images/consultdoc.jpg" height="200" alt="" />
                                    </div>

                                    <div class="h3 fw-bold">Consult a Doctor</div>
                                    <div class="h6 mb-3 text-secondary">
                                        Your symptoms may require medical evaluation. If your symptoms get worse, see a doctor immediately.
                                    </div>
                                    <div class="smallTxt fw-bold">Recommended Doctor</div>
                                    <?php
                                    for ($x = 0; $x < count($doc); $x++) {
                                        $specEscaped = $conn->real_escape_string($doc[$x]);
                                        $sql = "SELECT * FROM useraccount a INNER JOIN doctortbl b ON a.linkedAccount = b.doctorID WHERE a.usertype = 2 AND b.specialization = '$specEscaped'";
                                        $result = mysqli_query($conn, $sql);

                                        if ($result && $result->num_rows > 0) {
                                            $count = 0;
                                            $docs = [];
                                            while ($row = $result->fetch_assoc()) {
                                    ?>
                                                <div class="d-flex p-3 border round-1 align-items-center mb-2">
                                                    <div class="me-3">
                                                        <img src="../assets/images/profiledefault.png" height="40" alt="" />
                                                    </div>
                                                    <div>
                                                        <div class="h6 fw-bold mb-0">Dr. <?= htmlspecialchars($row['firstName'] . " " . $row['lastName']) ?></div>
                                                        <div class="smallTxt mb-0"><?= htmlspecialchars($row['specialization']) ?></div>
                                                    </div>
                                                    <div class="ms-auto align-self-start">
                                                        <a class="text-primary" style="cursor: pointer" onclick="sendRequest(<?= $row['userAccountID'] ?>)"><i class="far fa-paper-plane"></i></a>
                                                    </div>
                                                </div>
                                    <?php
                                                array_push($docs, $row['userAccountID']);
                                                ++$count;
                                                if ($count == 3) break;
                                            }

                                            if ($last_id > 0) {
                                                $docList = $conn->real_escape_string(implode(",", $docs));
                                                $sql = "UPDATE diagnosis SET doctor = '$docList' WHERE id = $last_id";
                                                mysqli_query($conn, $sql);
                                            }
                                            break;
                                        }
                                    }
                                    ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $("#navcheck").addClass("bg-info text-white shadow");

        function sendRequest(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "Request for Consultation",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.post('ajax/sendrequest.php', {
                        id: id
                    }, function(data) {
                        if (data == 1) {
                            Swal.fire(
                                'Sent!',
                                'Your request has been submitted.',
                                'success'
                            );
                        } else if (data == 0) {
                            Swal.fire(
                                'Oops!',
                                'You still have active request/consultation.',
                                'warning'
                            );
                        }
                    });
                }
            });
        }
    </script>
</body>

</html>