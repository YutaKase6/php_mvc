<?php

require_once __DIR__ . '/AbstractController.php';

class QuizController extends AbstractController
{

    public function defaultAction()
    {
        require_once self::LIB_DIR . '/quizList.php';

        $view = array();
        $count = 0;
        foreach ($quizList as $q) {
            $view[] = array(
                'question' => '第' . ($count + 1) . '問 : ' . $q['q'],
                'name' => 'a' . $count
            );
            $count++;
        }

        require_once self::VIEW_DIR . '/quizView.php';
    }

    public function answerAction()
    {
        require_once self::LIB_DIR . '/quizList.php';
        $view = array();
        $count = 0;
        foreach ($quizList as $q) {
            $tmp = array(
                'question' => '第' . ($count + 1) . '問 : ' . $q['q'],
                'ans' => $_POST['a' . $count]
            );
            if ($_POST['a' . $count] == $q['ans']) {
                $tmp['result'] = '正解';
            } else {
                $tmp['result'] = '不正解';
            }
            $view[] = $tmp;
            $count++;
        }

        require_once self::VIEW_DIR . '/ansView.php';
    }
}
