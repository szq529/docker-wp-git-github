const quiz = [
  {
    question: 'ドラえもんの色は？',
    answers: [
      'オレンジ',
      '赤',
      '緑',
      '青',
    ],
    correct: '青'
  }, {
    question: 'ドラえもんのしっぽの色は？',
    answers: [
      'ピンク',
      '紫',
      '赤',
      '黒',
    ],
    correct: '赤'
  }, {
    question: 'ドラえもんのひげの本数は？',
    answers: [
      '4本',
      '5本',
      '6本',
      '7本',
    ],
    correct: '6本'
  },
];

const quizLength = quiz.length;
let quizIndex = 0;
let scoer = 0;


// bottonタグを上書き
// それを定数でまとめる
const $button = document.getElementsByTagName('button');
const buttonLength = $button.length;

// クイズの問題文、選択肢を定義
const setupQuiz = () => {
  // ドキュメントの要素を取り出して定義したクイズで上書き
  document.getElementById('js-question').textContent = quiz[quizIndex].question;
  let buttonIndex = 0; /* 数をカウント */
  let buttonLength = $button.length;  /* ボタンの数だけ取ってくる */
  while(buttonIndex < buttonLength){  /* 数をカウントして、ボタンの数を取ってくる、この場合は4 */
    //ここに命令
    $button[buttonIndex].textContent = quiz[quizIndex].answers[buttonIndex]; /* ボタンの数だけ実行される */
    buttonIndex++;
  }
};
// 定義した定数を呼び出す
setupQuiz();

const clickHandler = (e) => {
  if(quiz[quizIndex].correct === e.target.textContent){   /* constの定数とボタンの中の文字が一致しているか */
    window.alert('正解');  /* 一致していたらこっちの処理 */
    scoer++;
  } else {
    window.alert('不正解');  /* 一致していなければこっちの処理 */
  }

  quizIndex++;

  if(quizIndex < quizLength){
    // 問題数がまだあればこちらを実行
    setupQuiz(); 
  } else {
    // 無ければこちらを実行
    window.alert('終了！アタナの正解数は' + scoer + '/' + quizLength + 'です！')
  }

};

// ボタンをクリックされたら正誤判定
let handlIndex = 0; /* 変数 */
while (handlIndex < buttonLength) {
  $button[handlIndex].addEventListener('click', (e) => {
    clickHandler(e); /* 定数を呼び出す */
  });
  handlIndex++;
}

