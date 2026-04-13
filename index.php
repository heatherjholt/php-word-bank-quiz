<?php
$questions = json_decode(file_get_contents("php_quiz.json"), true);

//build a word bank for the sidebar 
$wordBank = [];
foreach ($questions as $q) { $wordBank[] = $q['answer']; }
shuffle($wordBank);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SYSTEM_PHP://QUIZ</title>
    <link href="style.css" type="text/css" rel="stylesheet">
</head>

<body class="matrix-layout">
    <!--wordbank stuff here-->
    <aside class="sidebar">
        <details>
            <summary class="sidebar-title">> WORD_BANK.exe</summary>
            <nav>
                <ul class="word-list">
                    <?php foreach ($wordBank as $word): ?>
                    <li>>  <?php echo htmlspecialchars($word); ?></li>
                    <?php endforeach; ?>
                </ul>
            </nav>
        </details>
    </aside>

    <main class="main-content">
        <h1 class="system-title">[PHP_KNOWLEDGE_DECODER]</h1>

        <div class="container">
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $score = 0;
                echo '<div class="result"><h3>> RESULTS_ANALYSIS:</h3>';
                //loop for checking answers 
                foreach ($questions as $index => $q) {
                    $userAnswer = isset($_POST["answer$index"]) ? htmlspecialchars(trim($_POST["answer$index"])) : '';                    
                    $correctAnswer = $q['answer'];
                    $isCorrect = (strtolower($userAnswer) === strtolower($correctAnswer));

                    echo "<div class='feedback-item'>";
                    echo "<p><strong>" . ($index + 1) . ". " . htmlspecialchars($q['question']) . "</strong><br>";
                    echo "INPUT: <span class='" . ($isCorrect ? "correct" : "incorrect") . "'>" . ($userAnswer ?: "NULL") . "</span>";
                    if (!$isCorrect) echo " | EXPECTED: <span class='correct'>" . htmlspecialchars($correctAnswer) . "</span>";
                    echo "</p></div>";

                    if ($isCorrect) $score++;
                }
                //score info 
                echo "<h4>ACCURACY_RATING: $score / " . count($questions) . "</h4>";
                echo '<a href="' . $_SERVER['PHP_SELF'] . '" class="restart-link">> REBOOT_SYSTEM</a>';
                echo '</div>';

            } else {
                echo '<form method="post" action="' . htmlspecialchars($_SERVER['PHP_SELF']) . '">';
                //loop for displaying the questions from the json 
                foreach ($questions as $index => $q) {
                    echo '<div class="question-row">';
                        echo '<span class="q-number"><strong>' . ($index + 1) . '.</strong></span>';
                        $input = '<input type="text" name="answer' . $index . '" required autocomplete="off" placeholder="____">';
                        $displayQ = str_replace("____", $input, htmlspecialchars($q["question"]));
                        echo '<span class="q-text">' . $displayQ . '</span>';
                    echo '</div>';
                }
                
                echo '<button type="submit" class="btn-submit">>EXECUTE</button>';
                echo '</form>';
            }
            ?>
        </div>

        <div class="source">
            <p>[Primary Source + More Data] <br> 
            <a href="https://dev.to/robin-ivi/top-50-php-interview-questions-4p69" target="_blank">Top 50 PHP Interview Questions</a></p>
        </div>

        <footer>
            OPERATOR: Heather Holt // LOG: 2026
        </footer>
    </main>

</body>
</html>