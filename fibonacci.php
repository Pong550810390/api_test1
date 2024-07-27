<?php

header('Content-Type: application/json');


function fibonacciSequence($memberCount) {
    $sequence = [0, 1];
    for ($i = 2; $i < $memberCount; $i++) {
        $sequence[] = $sequence[$i - 1] + $sequence[$i - 2];
    }
    return array_slice($sequence, 0, $memberCount);
}


function calculateTotal($sequence) {
    return array_sum($sequence);
}


if (!isset($_GET['member-count'])) {
    echo json_encode([
        "error" => "member-count parameter is required"
    ]);
    exit;
}
$memberCount = intval($_GET['member-count']);


if ($memberCount < 1 || $memberCount > 100) {
    echo json_encode([
        "error" => "member-count must be between 1 and 100"
    ]);
    exit;
}

$sequence = fibonacciSequence($memberCount);
$total = calculateTotal($sequence);

$response = [
    "member-count" => $memberCount,
    "sequence" => $sequence,
    "total" => $total
];

echo json_encode($response);
?>
