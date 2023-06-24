'use strict';
//#posts要素を定数postsElementに格納
const postsElement = document.getElementById('posts');
//postsElementが存在したら
if(postsElement !== null) {
    const posts = JSON.parse(postsElement.getAttribute('data-posts'));
    const matters = posts;
    console.log(posts);
    let checkTexts = [];
    let container = document.getElementById('container');
    let answer = document.getElementById('answer');
    let question = document.getElementById('question');
    let hint = document.getElementById('hint');
    let progParent = document.getElementById('progress');
    let prog = document.createElement('progress');
    let message = document.getElementById('message');
    const amount = matters.length;
    let hit = 0;
    let count = 0;
    let state = false;
    let startTime;

    function correctAnswer (e) {
    checkTexts[0].span.textContent = checkTexts[0].value;
    checkTexts[0].span.className = 'add-correct';
    hit++;
    checkTexts.shift();
    }

    function createText() {
    let rand = Math.floor(Math.random() * matters.length);
    let matter = matters.splice(rand, 1)[0];
    console.log(matter);
    progParent.appendChild(prog);
    prog.setAttribute("max", amount);
    prog.setAttribute("value", count);

    answer.textContent = '';
    question.innerText = matter.question;

    count++;

    // !..ここが一番のキモ 正解の文字列を分解して表示は＿でもvalueは正解の文字列というspan要素を作ってanswerノードの子要素に設置している
    checkTexts = matter.answer.split('').map(value => {
        let span = document.createElement('span');
        span.textContent = '_';
        answer.appendChild(span);
        return {span, value: value};
        });

        hint.textContent = `最初の文字は ${checkTexts[0].value}`;
        setTimeout(() => {
        hint.classList.add('fadein')
    }, 4000);
    hint.classList.remove('fadein');
    }

    document.addEventListener('keydown', (e) => {
    if(e.code === 'Enter') {
        if(state === true) {
        correctAnswer(e);

        if(!checkTexts.length ){
            if(count >= amount) {
            const elapsedTime = ((Date.now() - startTime) / 1000).toFixed(2); // 経過時間を計算して小数点2位の文字列に変換
            const wpm = hit / elapsedTime * 60 // wpmを計算

            setTimeout(() => {
                answer.remove();
                question.remove();
                hint.remove();
                message.style.display = "";
                message.style.marginTop = "50px";
                message.innerText = `-------- RESULT --------\n回答数 : ${amount} 問\n入力文字数 : ${hit}\n経過時間 : ${elapsedTime} 秒\nWPM : ${wpm.toFixed(2)}\n\nエンターを押すと開始画面に移動します`;
            }, 400);

            document.addEventListener('keypress', e => {
                if(e.code === 'Enter') {
                window.location.reload();
                }
            });
            }
            setTimeout(() => {
            hint.classList.remove('fadein');
            prog.remove();
            container.classList.add('fadein');
            createText();
            }, 400);
        }
        return;
        }
        state = true;
        startTime = Date.now();
        question.style.background = "lightgray";
        message.textContent = "";
        message.style.display = "none";
        container.classList.add('fadein');
        createText();
    }

    // ユーザーの入力値(e.key)が正しいものではなかったら、文字を震わせるアニメーションclassをつけて、150ミリ秒後に外す
    if(checkTexts[0].value !== e.key) {
        checkTexts[0].span.classList.add('caution');
        setTimeout(() => {checkTexts[0].span.classList.remove('caution')},150);
        return;
    }
    if(checkTexts[0].value === e.key) {
        correctAnswer(e);

        //配列要素が空っぽになったら400ミリ秒後に次の問題を出す
        if(!checkTexts.length ){
        if(count >= amount) {
            const elapsedTime = ((Date.now() - startTime) / 1000).toFixed(2); // 経過時間を計算して小数点2位の文字列に変換
            const wpm = hit / elapsedTime * 60 // wpmを計算

            setTimeout(() => {
            answer.remove();
            question.remove();
            hint.remove();
            message.style.display = "";
            message.style.marginTop = "50px";
            message.innerText = `-------- RESULT --------\n回答数 : ${amount} 問\n入力文字数 : ${hit}\n経過時間 : ${elapsedTime} 秒\nWPM : ${wpm.toFixed(2)}\n\nエンターを押すと開始画面に移動します`;
            }, 400);

            document.addEventListener('keypress', e => {
            if(e.code === 'Enter') {
                window.location.reload();
            }
            });
        }
        setTimeout(() => {
            hint.classList.remove('fadein');
            prog.remove();
            container.classList.add('fadein');
            createText();
        }, 400);
        }
    }
    });
}