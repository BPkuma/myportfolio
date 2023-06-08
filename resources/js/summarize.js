'use strict';

//スタート画面/////////////////////////////////////////////////

//DOMが読み込まれたら
document.addEventListener('DOMContentLoaded', () => {

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

//マウスオーバーされた箇所の▶カーソルからhiddenを取り除き、
//それ以外はhiddenを追加するtoggleHidden()作成
function toggleHidden(Show, ToHidden) {  
    Show.classList.remove('hidden');
    ToHidden.forEach(item => {
        item.classList.add('hidden')
    });    
}
//「おさらいする」マウスオーバー
if (summarize) {
summarize.addEventListener('mouseover', function() {
    toggleHidden(choose1, [choose2, choose3]);
});
}
//「ステータス確認」マウスオーバー
if (state) {
state.addEventListener('mouseover', function() {
    toggleHidden(choose2, [choose1, choose3]);
});
//「ステータス確認」クリック
state.addEventListener('click', function() {
    state_data.classList.toggle('hidden');
});
}
//「にげる」マウスオーバー
if (run) {
run.addEventListener('mouseover', function() {
    toggleHidden(choose3, [choose1, choose2]);
});
//「にげる」クリック
run.addEventListener('click', function() {
    run_data.classList.toggle('hidden');
});
}

//カウントダウンタイマーのページ////////////////////////////////////////

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

//テンプレート文字列を表示
today.textContent = `${month + 1}/${day} (${week})`;

//本日の残り時間を計算し、配列を返すcountDown()作成
//[日、時、分、秒]を定数countに代入
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

//countDown()を呼び出して定数counterに代入、テンプレート文字列を作成する
//recalc()作成
function recalc() {
    //countDown()を実行し、定数counterに代入
    const counter = countDown(goal);
    //テンプレート文字列を作成し、定数timeに代入
    const time = `${counter[1]}時間${counter[2]}分${String(counter[3]).padStart(2, '0')}秒`;
    //#timerを定数timerに代入
    const timer = document.getElementById('timer');
    //カウントダウンタイマーサンプル画面表示
    timer.textContent = time;
}

//recalc()を1秒ごとに繰り返し実行
setInterval(recalc, 1000);

//jQueryでセリフ表示変更/////////////////////////////////////
$(document).ready(function(){
    $('.confirm').on('click', function(){
        //クリックされた▼confirmの親の親要素にhidden追加
        $(this).parent().parent().addClass('hidden');
        //
        $(this).closest('.talk').next('.talk').children().first().removeClass('hidden');
    });
});

//画像をアニメっぽく/////////////////////////////////////////
//全ての画像を指定する用の変数iに0を代入
let i = 0;
//特定の画像を指定する用の変数indexに0を代入
let index = 0;

//画像を順番に表示させるShowImage()作成
function ShowImage() {
    //全ての画像を取得し、定数imagesに代入
    const images = document.querySelectorAll('.images img');    
    //全ての画像にhidden追加
    for (i = 0; i < images.length; i++) {
        images[i].classList.add('hidden');
    }      
    //index番目の画像からhidden削除  
    images[index].classList.remove('hidden'); 
    //indexに1を足し、画像数で割った余りを変数indexに代入   
    index = (index + 1) % images.length;  
}
//ShowImage()を繰り返し実行
setInterval(ShowImage, 1500);


});








