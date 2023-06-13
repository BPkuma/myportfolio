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

    //サンプル表示用の残り時間を定数sample_counterに代入
    const sample_counter = countDown(goal);
    //テンプレートリテラルで作ったテキストを定数sample_timeに代入
    const sample_time = `${sample_counter[1]}時間${sample_counter[2]}分${sample_counter[3]}秒`;
    //サンプルを表示させるタイミングのための定数sample/sample2を定義
    const sample = document.querySelector('.sample');
    const sample2 = document.querySelector('.sample2');
    const sample3 = document.querySelector('.sample3');

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
        //テンプレート文字列を作成し、定数timeに代入(psdStart()で秒の桁を2桁に)
        const time = `${counter[1]}時間${counter[2]}分${String(counter[3]).padStart(2, '0')}秒`;
        //テンプレート文字列を作成し、定数timeに代入(psdStart()無しバージョン)
        const time2 =  `${counter[1]}時間${counter[2]}分${counter[3]}秒`;
        //#timerを定数timerに代入
        const timer = document.getElementById('timer');
        //サンプル用
        const sample_timer2 = document.getElementById('sample_timer2');
        const sample_timer3 = document.getElementById('sample_timer3');
        
        //timerが存在したら
        if(timer) {
            //timeに書き換え
            timer.textContent = time;
        }
        if(sample_timer2) {
            sample_timer2.textContent = time2;
        }
        if(sample_timer3) {
            sample_timer3.textContent = time;
        }
    }
    //recalc()を1秒ごとに繰り返し実行
    setInterval(recalc, 1000);
    //残り時間のサンプル表示
    document.getElementById('sample_timer').textContent = sample_time;
    
    //画像をアニメっぽく/////////////////////////////////////////
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

    //セリフの表示////////////////////////////////////////////////
    //#dialoguesを定数dialoguesElementに代入
    const dialoguesElement = document.getElementById('dialogues');
    //#talkを定数talkに代入
    const talk = document.getElementById('talk');    
    //confirm要素を定数confirmに代入
    const confirm = document.querySelector('.confirm');
    //cursor-pointer要素を定数cursor_pointerに代入
    const cursor_pointer = document.querySelector('.cursor-pointer');
    //yesno要素を定数yesnoに代入
    const yesno = document.querySelector('.yesno');
    //yes・no要素を定数yes・noに代入
    const yes = document.querySelector('.yes');
    const no = document.querySelector('.no');
    //yesno選択肢の▶#yesno_choose1・2要素を定数yesno_choose1・2に代入
    const yesno_choose1 = document.getElementById('yesno_choose1');
    const yesno_choose2 = document.getElementById('yesno_choose2');
    //各コードの要素を定数に代入///////////////////////////////////////////////////////
    const code_now = document.querySelector('.code_now');
    const code_goal = document.querySelector('.code_goal');
    const code_subtraction = document.querySelector('.code_subtraction');
    const code_hms = document.querySelector('.code_hms');
    const code_countdown = document.querySelector('.code_countdown');
    const code_backquote = document.querySelector('.code_backquote');
    const code_html = document.querySelector('.code_html');
    const code_rewrite = document.querySelector('.code_rewrite');
    const code_recalc = document.querySelector('.code_recalc');
    const code_padstart = document.querySelector('.code_padstart');

    

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
        //cursor_pointerがクリックされたら
        cursor_pointer.addEventListener('click', function() {    
            //current_indexがオブジェクトの個数より少なかったら
            if(current_index  < dialogues.length) {
                //showDialogue()実行
                showDialogue(dialogues[current_index]); 
                //会話内容にフラグがあった場合 
                switch(dialogues[current_index].flag) {
                    //フラグがqなら、yesno選択肢表示
                    case 'q':
                        yesno.classList.remove('hidden');
                        confirm.classList.add('hidden');
                        break;
                    //フラグがslimeなら、スライム君登場
                    case 'slime':
                        setTimeout(ShowImageslime, 300);
                        setInterval(ShowImageslime, 1500);  
                        break;
                    //フラグがcode_nowなら、コードcode_now表示
                    case 'code_now':
                        code_now.classList.remove('hidden');
                        break;
                    //フラグがcode_goalなら、コードcode_goal表示
                    case 'code_goal':
                        code_now.classList.add('hidden');
                        code_goal.classList.remove('hidden');
                        break;
                    //フラグがcode_subtractionなら、コードcode_subtraction表示
                    case 'code_subtraction':
                        code_goal.classList.add('hidden');
                        code_subtraction.classList.remove('hidden');
                        break;
                    //フラグがcode_hmsなら、コードcode_hms表示
                    case 'code_hms':
                        code_subtraction.classList.add('hidden');
                        code_hms.classList.remove('hidden');
                        break;
                    //フラグがcode_countdownなら、コードcode_countdown表示
                    case 'code_countdown':
                        code_hms.classList.add('hidden');
                        code_countdown.classList.remove('hidden');
                        break;
                    //フラグがcode_backquoteなら、コードcode_backquote表示
                    case 'code_backquote':
                        code_countdown.classList.add('hidden');
                        code_backquote.classList.remove('hidden');
                        break;
                    //フラグがcode_htmlなら、コードcode_html表示
                    case 'code_html':
                        code_backquote.classList.add('hidden');
                        code_html.classList.remove('hidden');
                        break;
                    //フラグがcode_rewriteなら、コードcode_rewrite表示
                    case 'code_rewrite':
                        code_rewrite.classList.remove('hidden');
                        break;
                    //フラグがsampleなら、サンプルsample表示
                    case 'sample':
                        code_html.classList.add('hidden');
                        code_rewrite.classList.add('hidden');
                        sample.classList.remove('hidden');
                        break;
                    //フラグがcode_recalcなら、コードcode_recalc表示
                    case 'code_recalc':
                        code_recalc.classList.remove('hidden');
                        break;
                    //フラグがsample2なら、サンプルsample2表示
                    case 'sample2':
                        code_recalc.classList.add('hidden');
                        sample.classList.add('hidden');
                        sample2.classList.remove('hidden');
                        break;
                    //フラグがcode_padstartなら、サンプルcode_padstart表示
                    case 'code_padstart':
                        code_padstart.classList.remove('hidden');
                        break;
                    //フラグがsample3なら、サンプルsample3表示
                    case 'sample3':
                        sample2.classList.add('hidden');
                        code_padstart.classList.add('hidden');
                        sample3.classList.remove('hidden');
                        break;
                }
                //インクリメント
                current_index++;                        
            } else {
                console.log('表示終わり');
            }
            
        });
    }     

    //yesno選択肢が存在する場合
    if(yesno !== null) {
        //yesにマウスオーバーしたら
        yes.addEventListener('mouseover', function() {
            toggleHidden(yesno_choose1, [yesno_choose2]);    
        });
        //noにマウスオーバーしたら
        no.addEventListener('mouseover', function() {
            toggleHidden(yesno_choose2, [yesno_choose1]);    
        });
        //yesがクリックされたら
        yes.addEventListener('click', function() {
            showDialogue(dialogues[current_index]);
            yesno.classList.add('hidden');
            confirm.classList.remove('hidden');
        });
        
        //noがクリックされたら
        no.addEventListener('click', function() {
            forever();
            
            setTimeout(function() {
                showDialogue(dialogues[current_index -1]);
            }, 2000);   
            yesno.classList.remove('hidden');         
        });

        function forever() {
            talk.textContent = 'ジャスコ「え？よくきこえませんでした。」';
            yesno.classList.add('hidden');
        }
    }
});











