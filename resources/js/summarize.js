'use strict';

//トップ画面・選択肢定義//////////////////////////////////////////////
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

//▶カーソルの移動
function toggleHidden(Show, ToHidden) {  
    Show.classList.remove('hidden');
    ToHidden.forEach(item => {
        item.classList.add('hidden')
    });    
}
//「おさらいする」マウスオーバー
summarize.addEventListener('mouseover', function() {
    toggleHidden(choose1, [choose2, choose3]);
});
//「ステータス確認」マウスオーバー
state.addEventListener('mouseover', function() {
    toggleHidden(choose2, [choose1, choose3]);
});
//「ステータス確認」クリック
state.addEventListener('click', function() {
    state_data.classList.toggle('hidden');
});
//「にげる」マウスオーバー
run.addEventListener('mouseover', function() {
    toggleHidden(choose3, [choose1, choose2]);
});
//「にげる」クリック
run.addEventListener('click', function() {
    run_data.classList.toggle('hidden');
});

//カウントダウンタイマーページ////////////////////////////////////////
const today = document.getElementById('today');









