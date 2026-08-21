<?php
session_start();
include('../../php/db_config.php');

// 1. Session Authentication & Validation
if (!isset($_SESSION['user']['userID'])) {
    http_response_code(401);
    exit('Unauthorized access.');
}

$userId = intval($_SESSION['user']['userID']);
$keyword = isset($_POST['keyword']) ? trim($_POST['keyword']) : '';
$todayInput = isset($_POST['date']) && !empty($_POST['date']) ? $_POST['date'] : date('Y-m-d');

// 2. Fetch Diagnosis Records with Prepared Statement
$stmt = $conn->prepare("SELECT id, result, symptoms, date FROM diagnosis WHERE userid = ? ORDER BY id DESC");
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows > 0) {
    // 3. Cache Symptoms Lookup Table to Prevent N+1 Query Problem
    $symptomMap = [];
    $symResult = mysqli_query($conn, "SELECT symptomID, name FROM symptoms");
    if ($symResult) {
        while ($symRow = $symResult->fetch_assoc()) {
            $symptomMap[$symRow['symptomID']] = $symRow['name'];
        }
    }

    $targetDate = date_create($todayInput);

    while ($row = $result->fetch_assoc()) {
        $output = json_decode($row['result'] ?? '[]', true);
        $original_date = $row['date'];

        // Date calculations
        $timestamp = strtotime($original_date);
        $formattedDate = date("F d, h:i A", $timestamp);

        // Date comparison check
        $recordDate = date_create($original_date);
        $diff = date_diff($recordDate, $targetDate);
        $age = intval($diff->format('%r%a')); // Total days difference

        // Skip future-dated records relative to target filtering date
        if ($age < 0) {
            continue;
        }

        // Extract Top Result Issue Name safely
        $topResult = !empty($output[0]['Issue']['Name']) ? $output[0]['Issue']['Name'] : "No result";

        // 4. Keyword Filter logic (Sub-string search instead of broken substr_compare)
        if ($keyword !== '') {
            $matchFound = false;
            
            // Check top result name
            if (stripos($topResult, $keyword) !== false) {
                $matchFound = true;
            }

            // Check associated symptom names
            if (!$matchFound) {
                $sympIds = json_decode($row['symptoms'] ?? '[]', true);
                if (is_array($sympIds)) {
                    foreach ($sympIds as $sId) {
                        if (isset($symptomMap[$sId]) && stripos($symptomMap[$sId], $keyword) !== false) {
                            $matchFound = true;
                            break;
                        }
                    }
                }
            }

            if (!$matchFound) {
                continue;
            }
        }

        // Parse list of symptoms
        $symptomList = [];
        $sympIds = json_decode($row['symptoms'] ?? '[]', true);
        if (is_array($sympIds)) {
            foreach ($sympIds as $sId) {
                if (isset($symptomMap[$sId])) {
                    $symptomList[] = htmlspecialchars($symptomMap[$sId]);
                }
            }
        }
        $symptomString = !empty($symptomList) ? implode(', ', $symptomList) : 'None reported';

        // Render Record Output
?>
        <div class="bg-white p-2 border round-1 mb-3">
            <div>
                <a href="viewhistory.php?id=<?= intval($row['id']) ?>" class="text-decoration-none smallTxt float-end mb-0">
                    View <i class="fas fa-angle-right"></i>
                </a>
                <div class="smallTxt mb-0"><?= htmlspecialchars($formattedDate) ?></div>

                <div class="bg-light round-2 p-2 mt-1">
                    <div class="smallTxt mb-1">
                        <strong>Symptoms:</strong> <?= $symptomString ?>
                    </div>
                    <div class="smallTxt mb-0">
                        <strong>Top result:</strong> <span class="fw-bold"><?= htmlspecialchars($topResult) ?></span>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
    $stmt->close();
} else {
    echo '<div class="text-muted smallTxt p-2">No diagnosis history found.</div>';
}
?>