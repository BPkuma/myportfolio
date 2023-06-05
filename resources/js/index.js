'use strict';
//ハンバーガーが押されたら
$(document).ready(function(){
    $('.hamburger').on('click', function(){
        $('.bar1, .bar2, .bar3').toggleClass('open');
        //メニュー開閉
        $('.menu').toggleClass('show');       
    }); 
});