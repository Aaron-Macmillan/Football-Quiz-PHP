<?php
include 'includes/header.php';

if (isset($_POST['username'])) {
    $_SESSION['username'] = $_POST['username'];
}

$questions = [
    [
        "question" => "Which club was the first to win a treble?",
        "answers" => [
            "A" => "Real Madrid",
            "B" => "Hamburg",
            "C" => "Celtic",
            "D" => "Bayern München"
        ],
        "correct" => "C"
    ],
    [
        "question" => "Who is the Premier League all time top scorer?",
        "answers" => [
            "A" => "Harry Kane",
            "B" => "Thierry Henry",
            "C" => "Andy Cole",
            "D" => "Alan Shearer"
        ],
        "correct" => "D"
    ],
    [
        "question" => "Which country has won the most Afcons?",
        "answers" => [
            "A" => "Egypt",
            "B" => "Cameroon",
            "C" => "Nigeria",
            "D" => "Ivory Coast"
        ],
        "correct" => "A"
    ],
    [
        "question" => "Which country has won the most World Cups?",
        "answers" => [
            "A" => "Germany",
            "B" => "Argentina",
            "C" => "Brazil",
            "D" => "Italy"
        ],
        "correct" => "C"
    ],
    [
        "question" => "Which player was the most expensive transfer of all time?",
        "answers" => [
            "A" => "Kylian Mbappe",
            "B" => "Ronaldo",
            "C" => "Coutinho",
            "D" => "Neymar Jr"
        ],
        "correct" => "D"
    ],
    [
        "question" => "Who is known as El Pistolero?",
        "answers" => [
            "A" => "Cavani",
            "B" => "Falcao",
            "C" => "Diego Forlan",
            "D" => "Luis Suarez"
        ],
        "correct" => "D"
    ],
    [
        "question" => "Which club has won the most Copa Libertadores titles?",
        "answers" => [
            "A" => "Independiente",
            "B" => "SE Palmeiras",
            "C" => "Boca Juniors",
            "D" => "Santos"
        ],
        "correct" => "A"
    ],
    [
        "question" => "Who is Ajax all time leading goal scorer?",
        "answers" => [
            "A" => "Johan Cruijff",
            "B" => "Justin Kluivert",
            "C" => "Dusan Tadic",
            "D" => "Piet Van Reenen"
        ],
        "correct" => "D"
    ],
    [
        "question" => "Who has scored the most goals in a single LaLiga season?",
        "answers" => [
            "A" => "Cristiano Ronaldo",
            "B" => "Romario",
            "C" => "Lionel Messi",
            "D" => "Alfredo Di Stefano"
        ],
        "correct" => "C"
    ],
    [
        "question" => "Who won the Ballon d'Or in 2007?",
        "answers" => [
            "A" => "Cristiano Ronaldo",
            "B" => "Kaka",
            "C" => "Lionel Messi",
            "D" => "Ronaldinho"
        ],
        "correct" => "B"
    ]
];

$_SESSION['questions'] = $questions;
?>

<h2>Welcome <?php echo $_SESSION['username']; ?>!</h2>

<form method="post" action="result.php">

<?php foreach ($questions as $index => $q): ?>
    <div class="question">
        <h3>Question <?php echo $index + 1; ?>: <?php echo $q['question']; ?></h3>
        <div class="answers">
            <?php foreach ($q['answers'] as $key => $answer): ?>
                <label>
                    <input type="radio" name="answers[<?php echo $index; ?>]" value="<?php echo $key; ?>" required>
                    <?php echo $key . ". " . $answer; ?>
                </label>
            <?php endforeach; ?>
        </div>
    </div>
<?php endforeach; ?>

<button type="submit">Submit Quiz</button>
</form>

<?php include 'includes/footer.php'; ?>
