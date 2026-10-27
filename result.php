<?php
include 'includes/header.php';

if (!isset($_SESSION['questions']) || !isset($_POST['answers'])) {
    echo "<h2>Error: No quiz data found.</h2>";
    exit;
}

$questions = $_SESSION['questions'];
$userAnswers = $_POST['answers'];

function calculateScore($questions, $userAnswers) {
    $score = 0;
    foreach ($questions as $index => $q) {
        if (isset($userAnswers[$index]) && $userAnswers[$index] === $q['correct']) {
            $score += 10;
        }
    }
    return $score;
}

$score = calculateScore($questions, $userAnswers);
?>

<h1>Results for <?php echo $_SESSION['username']; ?></h1>
<h2>Your Score: <?php echo $score; ?>%</h2>

<?php foreach ($questions as $index => $q): ?>
    <div class="question">
        <h3><?php echo $q['question']; ?></h3>

        <?php foreach ($q['answers'] as $key => $answer):
            $class = "";

            if ($key === $q['correct']) {
                $class = "correct";
            }

            if ($key === $userAnswers[$index] && $key !== $q['correct']) {
                $class = "wrong";
            }
        ?>
            <div class="<?php echo $class; ?>">
                <?php echo $key . ". " . $answer; ?>
            </div>
        <?php endforeach; ?>
    </div>
<?php endforeach; ?>

<?php include 'includes/footer.php'; ?>
