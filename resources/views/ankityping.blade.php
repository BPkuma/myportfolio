<x-app-layout>
    <div
        class="
        text-7xl text-center mt-6 p-5 text-bold
        font-body md:メイリオ:
        ">
    Anki Typing
    </div>

    <div class="
        mt-14 grid grid-cols-3 gap-4
        text-xl text-center text-neutral-50
        mx-5
        ">
            <a href="{{ url('/fizzbuzz') }}"
                class="
                bg-lime-700 rounded-lg p-5
                hover:bg-lime-500 transition duration-300
                ">
            問題を作る
            </a>
            <a href="{{ url('/summarize') }}"
                class="
                bg-lime-700 rounded-lg p-5
                hover:bg-lime-500 transition duration-300
                ">
            ゲームで遊ぶ
            </a>
            <a href="{{ url('/typing') }}"
                class="
                bg-lime-700 rounded-lg p-5
                hover:bg-lime-500 transition duration-300
                ">
            設定
            </a>

    </div>

    <div id="container">
        <div id="progress"></div>
        <div id="answer"></div>
        <div id="question"></div>
    </div>
    <div id="hint"></div>
    
    <script>
    const matters = [
        [
        'alert',
        'ダイアログに引数指定の文字列を表示する',
        ],
        [
        'querySelector',
        '引数にCSSセレクタ形式指定で条件と一致したHTML要素の最初のひとつを返す',
        ],
        [
        'console.log',
        'コンソールに引数指定の値を表示する',
        ],
        [
        'setTimeout',
        '指定秒数後に引数指定の関数を実行する',
        ],
        [
        'Math.random',
        '0以上1未満のランダムな浮動小数を返す',
        ],
        [
        'Math.floor',
        '引数指定した数値の小数点以下を切り捨てて返す',
        ],
        [
        'location.reload',
        'ページをリロードする',
        ],
        [
        'location.replace',
        '指定したページへ移動する',
        ],
        [
        'location.href',
        '現在のページのURLを返す',
        ],
        [
        'length',
        '文字列の長さを求めるメソッド\n配列の要素数にも応用可能',
        ],
        [
        'substring',
        '文字列に対して、引数指定した番号の文字を返すメソッド 負の値を指定すると0番目とみなされる',
        ],
        [
        'slice',
        '文字列や配列に対して、引数指定した位置の要素を切り抜くメソッド\n元の文字列からは要素が無くなる',
        ],
        [
        'getFullYear',
        '日付オブジェクトの年を4桁の整数で返す',
        ],
        [
        'toFixed',
        '数値型の値に対して、引数指定した固定小数点表記の文字列に変換する',
        ],
        [
        'replace',
        '文字列に対して、第1引数の文字列を第2引数の文字列に置換するメソッド',
        ],
        [
        'split',
        '文字列に対して、引数で指定した区切り文字で分割し、分割された文字列を要素とする配列を生成するメソッド\n引数に空文字を指定することで単語を分解して配列化できる',
        ],
        [
        'map',
        '配列に対して、配列の各要素一つずつに引数指定したコールバック関数を実行し、その結果を新しい配列として返すメソッド\n元の配列は非破壊で残るため、メソッドの返り値は何らかの変数に代入する必要がある',
        ],
    ];
    let checkTexts = [];
    </script>

</x-app-layout>
