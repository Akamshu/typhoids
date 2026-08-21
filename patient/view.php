<?php
session_start();
include('../php/db_config.php');

// 1. Session and Role Authorization Guard
if (isset($_SESSION['userType'])) {
    if ($_SESSION['userType'] != 3) {
        header('Location: ../login.php');
        exit();
    }
} else {
    header('Location: ../login.php');
    exit();
}

// 2. Validate and Sanitize Input ID
$issueId = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($issueId <= 0) {
    header('Location: browse.php');
    exit();
}

// 3. Fetch Issue Data using Prepared Statements (SQLi Prevention)
$stmt = $conn->prepare("SELECT * FROM healthissues WHERE issueID = ?");
$stmt->bind_param("i", $issueId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    header('Location: browse.php');
    exit();
}

$issue = $result->fetch_assoc();
$stmt->close();

$symptoms = !empty($issue['possibleSymptoms']) ? explode(',', $issue['possibleSymptoms']) : [];

// 4. Handle Thumbnail Image Logic (Removed Third-Party RapidAPI/Google cURL Dependency)
$defaultImage = "../assets/images/default-condition.jpg";
$thumbnail = !empty($issue['imagefile']) ? $issue['imagefile'] : $defaultImage;

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
    <link rel="icon" href="../favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/style.css?">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>iConsult | <?= htmlspecialchars($issue['issueName']) ?></title>
</head>

<body>
    <div class="container-fluid p-0">
        <?php include('components/navbar.php') ?>
        <div class="row m-0">
            <?php include('components/sidebar.php') ?>
            <div class="col-md-9 col-sm-12 col-12">
                <div class="vh-100 py-3">
                    <div class="p-3">
                        <div class="float-end" data-aos="fade-in">
                            <a href="<?= htmlspecialchars($thumbnail) ?>" target="_blank">
                                <img src="<?= htmlspecialchars($thumbnail) ?>" height="100" alt="Condition Thumbnail" class="shadow round-2 img-thumbnail">
                            </a>
                        </div>
                        <div class="h4 fw-bolder">Browse</div>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a style="cursor:pointer;" class="text-primary text-decoration-none" onclick="window.history.back()">Go back</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    <?= htmlspecialchars($issue['issueName']) ?>
                                </li>
                            </ol>
                        </nav>
                        <div class="h4 fw-bold mb-0 text-primary" data-aos="zoom-in">
                            <?= htmlspecialchars($issue['issueName']) ?>
                        </div>
                        <div class="smallTxt text-muted" data-aos="zoom-in">
                            also known as <?= htmlspecialchars($issue['profName'] ?? 'N/A') ?>
                        </div>
                        <hr>
                        <div class="row mycontent" id="main">

                            <div class="col-md-8">
                                <div class="smallTxt fw-bold">Description</div>
                                <div class="h6 fw-light lh-base">
                                    <?= nl2br(htmlspecialchars($issue['description'] ?? 'No description available.')) ?>
                                </div>
                                <hr>
                                <div class="smallTxt fw-bold">Medical Information</div>
                                <div class="h6 fw-light lh-base">
                                    <?= nl2br(htmlspecialchars($issue['medicalCondition'] ?? 'No medical condition details provided.')) ?>
                                </div>
                                <hr>
                                <div class="smallTxt fw-bold">Treatment</div>
                                <div class="h6 fw-light lh-base">
                                    <?= nl2br(htmlspecialchars($issue['treatmentDescription'] ?? 'No specific treatment guidelines listed.')) ?>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <div class="card round-2 shadow-sm border-0 bg-light">
                                    <div class="card-body">
                                        <div class="smallTxt fw-bold mb-2">Possible Symptoms</div>
                                        <div class="h6 font-weight-light lh-base">
                                            <ul class="ps-3 mb-0">
                                                <?php if (!empty($symptoms)): ?>
                                                    <?php foreach ($symptoms as $s): ?>
                                                        <li class="fw-light"><?= htmlspecialchars(trim($s)) ?></li>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <li class="fw-light text-muted">No symptoms listed</li>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                    </div>
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
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
        updateScreen();
        $("#navbrowse").addClass("bg-info text-white shadow");

        $(window).resize(updateScreen);

        function updateScreen() {
            if (window.innerWidth < 600) {
                $("#main").removeClass('mycontent');
            } else {
                $("#main").addClass('mycontent');
            }
        }
    </script>
</body>

</html>