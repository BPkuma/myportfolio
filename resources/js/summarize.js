'use strict';
//DOMが読み込まれたら////////////////////////////////////////////
document.addEventListener('DOMContentLoaded', () => {
    //スタート画面/////////////////////////////////////////////////
    //▶カーソルを定数choose1,choose2,shoose3に代入
    const choose1 = document.getElementById('choose1');
    const choose2 = document.getElementById('choose2');
    const choose3= document.getElementById('choose3');
    //「おさらいする」を定数summarizeに代入
    const summarize = document.getElementById('summarize');
    //「ステータス確認」を定数stateに代入
    const state = document.getElementById('state');
    //「にげる」を定数runに代入
    const run = document.getElementById('run');
    //ステータスの中身を定数state_dataに代入
    const state_data = document.getElementById('state_data');
    //「にげる」クリック時の中身を定数run_dataに代入
    const run_data = document.getElementById('run_data');
    //マウスオーバーされた箇所の▶カーソルからhiddenを付けはずしするtoggleHidden()
    function toggleHidden(Show, ToHidden) { 
        //hidden削除 
        Show.classList.remove('hidden');
        //hidden追加
        ToHidden.forEach(item => {
            item.classList.add('hidden')
        });    
    }
    //summarizeが存在したら
    if (summarize) {
        //「おさらいする」にマウスオーバーされたら
        summarize.addEventListener('mouseover', function() {
            toggleHidden(choose1, [choose2, choose3]);
        });
    }
    //stateが存在したら
    if (state) {
        //「ステータス確認」にマウスオーバーされたら
        state.addEventListener('mouseover', function() {
            toggleHidden(choose2, [choose1, choose3]);
        });
        //「ステータス確認」にクリックされたら
        state.addEventListener('click', function() {
            state_data.classList.toggle('hidden');
        });
    }
    //runが存在したら
    if (run) {
        //「にげる」にマウスオーバーされたら
        run.addEventListener('mouseover', function() {
            toggleHidden(choose3, [choose1, choose2]);
        });
        //「にげる」にクリックされたら
        run.addEventListener('click', function() {
            run_data.classList.toggle('hidden');
        });
    }
    //カウントダウンタイマーの表示////////////////////////////////////////
    //spanタグのidを定数todayに代入
    const today = document.getElementById('today');
    //Dateオブジェクトをインスタンス化して定数nowに代入
    const now = new Date();
    //定数nowから本日の月、日、曜日を取得して定数month、day、weekに代入
    const month = now.getMonth();
    const day = now.getDate();
    const week = ['日', '月', '火', '水', '木', '金', '土'][now.getDay()];
    //Dateオブジェクトをインスタンス化して定数goalに代入
    const goal = new Date();
    //定数goalに本日の終わり時間を設定する
    goal.setHours(23);
    goal.setMinutes(59);
    goal.setSeconds(59);
    //定数todayが存在していた場合
    if(today) {
        //テンプレート文字列を表示
        today.textContent = `${month + 1}/${day} (${week})`;
    }
    //本日の残り時間を計算し、配列を返すcountDown()
    function countDown(due) {
        //Dateインスタンスを定数nowに代入
        const now = new Date();
        //未来-現在をミリ秒で引き算し、定数restに代入
        const rest = due.getTime() - now.getTime();    
        //秒、分、時、日を計算
        const sec = Math.floor(rest / 1000) % 60;
        const min = Math.floor(rest / 1000 / 60) % 60;
        const hours = Math.floor(rest / 1000 / 60 / 60) % 24;
        const days = Math.floor(rest / 1000 / 60 / 60 / 24);
        //配列に格納した結果を定数countに代入
        const count = [days, hours, min, sec];
        return count;
    }
    //countDown()を呼び出し、テンプレート文字列を作成するrecalc()
    function recalc() {
        //countDown()を実行し、定数counterに代入
        const counter = countDown(goal);
        //テンプレート文字列を作成し、定数timeに代入
        const time = `${counter[1]}時間${counter[2]}分${String(counter[3]).padStart(2, '0')}秒`;
        //#timerを定数timerに代入
        const timer = document.getElementById('timer');
        //timerが存在したら
        if(timer) {
        //timeに書き換え
        timer.textContent = time;
        }
    }
    //recalc()を1秒ごとに繰り返し実行
    setInterval(recalc, 1000);

    
    //画像をアニメっぽく/////////////////////////////////////////
    //全ての画像を指定する用の変数iを初期化
    //let i = 0;
    //特定の画像を指定する用の変数indexを初期化
    let jasco_index = 0;
    let slime_index = 0;

    //ジャスコの画像を順番に表示させるShowImageJasco()作成
    function ShowImageJasco() {        
        //全ての画像を取得し、定数imagesに代入
        const images = document.querySelectorAll('img.jasco');    
        //全ての画像にhidden追加
        for (let i = 0; i < images.length; i++) {
            images[i].classList.add('hidden');
        }   
        //画像数が存在したら   
        if(images.length > 0) { 
            //jasco_index番目の画像からhidden削除 
            images[jasco_index].classList.remove('hidden'); 
            //jasco_indexに1を足し、画像数で割った余りを変数jasco_indexに代入   
            jasco_index = (jasco_index + 1) % images.length;
        }  
    }
    //スライムの画像を順番に表示させるShowImageslime()作成
    function ShowImageslime() {        
        //全ての画像を取得し、定数imagesに代入
        const images = document.querySelectorAll('img.slime');    
        //全ての画像にhidden追加
        for (let i = 0; i < images.length; i++) {
            images[i].classList.add('hidden');
        }   
        //画像数が存在したら   
        if(images.length > 0) { 
            //slime_index番目の画像からhidden削除 
            images[slime_index].classList.remove('hidden'); 
            //slime_indexに1を足し、画像数で割った余りを変数slime_indexに代入   
            slime_index = (slime_index + 1) % images.length;
        }  
    }
    //ShowImage()を繰り返し実行
    setInterval(ShowImageJasco, 1500);
    setInterval(ShowImageslime, 1500);
    
    //セリフの表示////////////////////////////////////////////////
    //#dialoguesを定数dialoguesElementに代入
    const dialoguesElement = document.getElementById('dialogues');
    //#talkを定数talkに代入
    const talk = document.getElementById('talk');
    //confirm要素を定数confirmに代入
    const confirm = document.querySelector('.confirm');

    //空の配列を変数dialoguesに代入
    let dialogues = [];    
    //定数dialoguesElementがnullではない場合
    if (dialoguesElement !== null) {
    //data-dialogues属性の値を取得し、JSオブジェクトに変換後、変数dialoguesに代入
    dialogues = JSON.parse(dialoguesElement.getAttribute('data-dialogues'));
    }
    //0を変数current_indexに代入
    let current_index = 0;

    //JSオブジェクトのプロパティtalkに書き換えるファンクション
    function showDialogue(dialogue) {
        //引数のJSオブジェクトとそのプロパティが存在したら
        if(dialogue && dialogue.talk) {    
        //書き換え 
        talk.textContent = dialogue.talk;    
        } 
    }
    //実行
    showDialogue(dialogues[current_index]);

    //confirmがnullではない場合
    if (confirm !== null) {
        //confirmがクリックされたら
        confirm.addEventListener('click', function() {    
            //current_indexがオブジェクトの個数より少なかったら
            if(current_index  < dialogues.length) {
                //showDialogue()実行
                showDialogue(dialogues[current_index]);        
            } else {
                console.log('表示終わり');
            }
            //インクリメント
            current_index++;
        });
    } 
});











