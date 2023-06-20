'use strict';
//DOMが読み込まれたら////////////////////////////////////////////
//document.addEventListener('DOMContentLoaded', () => {
    //スタート画面/////////////////////////////////////////////////
    //▶カーソルを定数choose1,choose2,choose3,choose4に代入
    const choose1 = document.getElementById('choose1');
    const choose2 = document.getElementById('choose2');
    const choose3 = document.getElementById('choose3');
    const choose4 = document.getElementById('choose4');
    //「おさらいする」を定数summarizeに代入
    const summarize = document.getElementById('summarize');
    //「ステータス確認」を定数stateに代入
    const state = document.getElementById('state');
    //「にげる」を定数runに代入
    const run = document.getElementById('run');
    //「さんこうしりょう」を定数referenceに代入
    const reference = document.getElementById('reference');
    //ステータスの中身を定数state_dataに代入
    const state_data = document.getElementById('state_data');
    //「にげる」クリック時の中身を定数run_dataに代入
    const run_data = document.getElementById('run_data');  
    //「さんこうしりょう」クリック時の中身を定数reference-dataに代入
    const reference_data = document.getElementById('reference_data');
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
            toggleHidden(choose1, [choose2, choose3, choose4]);
        });
    }
    //stateが存在したら
    if (state) {
        //「ステータス確認」にマウスオーバーされたら
        state.addEventListener('mouseover', function() {
            toggleHidden(choose2, [choose1, choose3, choose4]);
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
            toggleHidden(choose3, [choose1, choose2, choose4]);
        });
        //「にげる」にクリックされたら
        run.addEventListener('click', function() {
            run_data.classList.toggle('hidden');
        });
    }
    //freferenceが存在したら
    if (reference) {
        //「さんこうしりょう」にマウスオーバーされたら
        reference.addEventListener('mouseover', function() {
            toggleHidden(choose4, [choose1, choose2, choose3]);
        });
        //「さんこうしりょう」にクリックされたら
        reference.addEventListener('click', function() {
            reference_data.classList.toggle('hidden');
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
    //サンプルを表示させるタイミングのための定数sample/sample2/sample3を定義
    const sample = document.querySelector('.sample');
    const sample2 = document.querySelector('.sample2');
    const sample3 = document.querySelector('.sample3');
    //サンプルを表示させるための定数sampleを定義
    const sample_timer = document.getElementById('sample_timer');

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
    if (sample_timer) {
        sample_timer.textContent = sample_time;
    }    
    //画像をアニメっぽく/////////////////////////////////////////
    //特定の画像を指定する用の変数indexを初期化
    let jasco_index = 0;
    let slime_index = 0;
    //setIntervalのidを格納するための配列を定数interval_idsに代入
    let interval_ids = [];
    //ジャスコの画像を順番に表示させるShowImageJasco()作成
    function ShowImageJasco() {        
        //全てのジャスコ画像を取得し、定数jImagesに代入
        const jImages = document.querySelectorAll('img.jasco');    
        //全てのジャスコ画像にhidden追加
        for (let i = 0; i < jImages.length; i++) {
            jImages[i].classList.add('hidden');
        }   
        //画像数が存在したら   
        if(jImages.length > 0) { 
            //jasco_index番目の画像からhidden削除 
            jImages[jasco_index].classList.remove('hidden'); 
            //jasco_indexに1を足し、画像数で割った余りを変数jasco_indexに代入   
            jasco_index = (jasco_index + 1) % jImages.length;
        }  
    }

    //全てのスライム画像を取得し、定数sImagesに代入
    const sImages = document.querySelectorAll('img.slime'); 
    //スライムの画像を順番に表示させるShowImageSlime()作成
    function ShowImageSlime() { 
        //画像が存在したら
        if(sImages.length > 0) {     
            //全ての画像にhidden追加
            for (let i = 0; i < sImages.length; i++) {
                sImages[i].classList.add('hidden');
            }            
            //slime_index番目の画像からhidden削除 
            sImages[slime_index].classList.remove('hidden'); 
            //slime_indexに1を足し、画像数で割った余りを変数slime_indexに代入   
            slime_index = (slime_index + 1) % sImages.length;
        }  
    }

    //スライム表示を取り消すファンクション
    function hideImageSlime() {
        //画像が存在したら
        if(sImages.length >= 0) { 
            //全ての画像にhidden追加
            for (let i = 0; i < sImages.length; i++) {
                sImages[i].classList.add('hidden');
            }
            for (let i = 0; i < interval_ids.length; i++) {
                clearInterval(interval_ids[i]);
            } 
            interval_ids = [];
        }
    }
    //ShowImageJasco()を繰り返し実行
    setInterval(ShowImageJasco, 1500);    

    //セリフの表示////////////////////////////////////////////////
    //#dialoguesを定数dialoguesElementに代入
    const dialoguesElement = document.getElementById('dialogues');
    //#talkを定数talkに代入
    const talk = document.getElementById('talk');    
    //confirm要素を定数confirmに代入
    const confirm = document.querySelector('.confirm');
    //back_button要素を定数back_buttonに代入
    const back_button = document.querySelector('.back_button');
    //yesno要素を定数yesnoに代入
    const yesno = document.querySelector('.yesno');
    //yes・no要素を定数yes・noに代入
    const yes = document.querySelector('.yes');
    const no = document.querySelector('.no');
    //はい、いいえ選択肢の▶#yesno_choose1・2要素を定数yesno_choose1・2に代入
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
    //オブジェクトの順番を表すための変数current_indexを0に初期化
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
    
    //flagカラムの値によって表示・非表示をコントロールするファンクション
    function handleDialogueFlag(flag) {
        switch (flag) {
            //フラグがuser_nameなら
            case 'user_name':
                let user_name = document.querySelector('.user_name').getAttribute('data-user-name');
                let dialogue_username = dialogues[current_index].talk.replace('ななし', user_name);
                talk.textContent = dialogue_username;
                break;
            //フラグがqなら
            case 'q':
                //はい、いいえ選択肢表示
                yesno.classList.remove('hidden');
                //▼ボタン非表示
                confirm.classList.add('hidden');
                //セリフ枠のcursor-pointerを無効に           
                dialoguesElement.classList.remove('cursor-pointer');
                dialoguesElement.style.pointerEvents = 'none';     
                break;
            //フラグがslimeなら、スライム君登場
            case 'slime':                
                interval_ids.push(setInterval(ShowImageSlime, 1500));
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
                sample2.classList.remove('hidden');                        
                break;
            //フラグがcode_padstartなら、サンプルcode_padstart表示
            case 'code_padstart':
                code_padstart.classList.remove('hidden');
                break;
            //フラグがsample3なら、サンプルsample3表示
            case 'sample3':
                code_padstart.classList.add('hidden');
                sample3.classList.remove('hidden');
                break;
            case 'end':
                window.location.href = '/summarize';
                break;   
        }
    }

    //confirmがnullではない場合
    if (confirm !== null) {
        //dialoguesElementがクリックされたら
        dialoguesElement.addEventListener('click', function() {             
            //current_indexがオブジェクトの個数より少なかったら
            if(current_index  < dialogues.length) {
                //次のセリフに書き換え
                showDialogue(dialogues[++current_index]);
                //フラグチェックする
                handleDialogueFlag(dialogues[current_index].flag);    
            }  
        });
        //back_buttonがクリックされたら
        back_button.addEventListener('click', function() {
            //current_indexが0より大きかったら
            if(current_index  > 0) {
                //1つ前のセリフに書き換え
                showDialogue(dialogues[--current_index]);
                //フラグチェックする
                handleDialogueFlag(dialogues[current_index].flag); 
                //dialoguesのorder番号が10より小さかったら（スライム登場前）
                if(dialogues[current_index].order < 10) {
                    //スライム画像非表示
                    hideImageSlime();                    
                }
            //current_indexが0なら
            } else if (current_index == 0) {
                //0番目のセリフ表示
                showDialogue[0];
            }                 
        });
    }

    //はい、いいえ選択肢が存在する場合
    if(yesno !== null) {
        //yesにマウスオーバーしたら
        yes.addEventListener('mouseover', function() {
            //yesno_choose1を表示
            toggleHidden(yesno_choose1, [yesno_choose2]);    
        });
        //noにマウスオーバーしたら
        no.addEventListener('mouseover', function() {
            //yesno_choose2を表示
            toggleHidden(yesno_choose2, [yesno_choose1]);    
        });
        //yesがクリックされたら
        yes.addEventListener('click', function() {
            //dialoguesElementにcursor-pointerクラスが無い場合
            if (!dialoguesElement.classList.contains('cursor-pointer')) {
                //cursor-pointer機能追加
                dialoguesElement.classList.add('cursor-pointer');
                dialoguesElement.style.pointerEvents = '';
            }
            //次のセリフ表示
            showDialogue(dialogues[++current_index]);
            //フラグチェックする
            handleDialogueFlag(dialogues[current_index].flag);
            //はい、いいえ選択肢非表示
            yesno.classList.add('hidden');
            //▼ボタン表示
            confirm.classList.remove('hidden');
        });
        //back_buttonがクリックされたら
        back_button.addEventListener('click', function() { 
            //dialoguesElementにcursor-pointerクラスが無い場合
            if (!dialoguesElement.classList.contains('cursor-pointer')) {
                //cursor-pointer機能追加
                dialoguesElement.classList.add('cursor-pointer');
                dialoguesElement.style.pointerEvents = '';
            }
            //はい、いいえ選択肢を非表示 
            yesno.classList.add('hidden');
            //▼ボタンを表示
            confirm.classList.remove('hidden');
            //フラグチェックする
            handleDialogueFlag(dialogues[current_index].flag); 
        });

        //noがクリックされたら
        no.addEventListener('click', function() { 
            //loop_index = current_index - 1; 
            console.log(current_index);
            //固定セリフ          
            forever();    
        });

        //no選択時の固定セリフ
        function forever() {
            //セリフ書き換え
            talk.textContent = 'ジャスコ「え？よくきこえませんでした。」';
            //1秒後にセリフ書き換え
            setTimeout(function() {
                showDialogue(dialogues[current_index]);
            }, 1000); 
        }        
    }











