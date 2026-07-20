<?php
include 'db_connection.php';

header('Content-Type: application/json');

$topicId = isset($_GET['topicID']) ? intval($_GET['topicID']) : 0;

if ($topicId === 0) {
    $sql = "SELECT quiz.id, topic.topicName, user.firstName, user.lastName, user.photoFileName,
            (SELECT COUNT(*) FROM quizquestion WHERE quizquestion.quizID = quiz.id) AS questionCount
            FROM quiz
            JOIN topic ON quiz.topicID = topic.id
            JOIN user ON quiz.educatorID = user.id";
    $stmt = $conn->prepare($sql);
} else {
    $sql = "SELECT quiz.id, topic.topicName, user.firstName, user.lastName, user.photoFileName,
            (SELECT COUNT(*) FROM quizquestion WHERE quizquestion.quizID = quiz.id) AS questionCount
            FROM quiz
            JOIN topic ON quiz.topicID = topic.id
            JOIN user ON quiz.educatorID = user.id
            WHERE quiz.topicID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $topicId);
}

$stmt->execute();
$result = $stmt->get_result();

$quizzes = [];
while ($row = $result->fetch_assoc()) {
    $quizzes[] = $row;
}

echo json_encode($quizzes);
$stmt->close();
$conn->close();
?>

