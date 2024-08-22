
        // ページが読み込まれた時に実行
document.addEventListener('DOMContentLoaded', function() {
    const timeInput = document.getElementById('end_time');
    const timeDisplay = document.getElementById('time');
    const startTimeStr = timeInput.value; // スタート時間の設定 (例: '12:04:00')
    console.log(startTimeStr)
    if(startTimeStr != "00:00:00" &&  startTimeStr != ""){
        // 時間を表示する関数
        function displayTime() {
            const now = new Date();
            const startTime = new Date();
            const [hours, minutes, seconds] = startTimeStr.split(':').map(Number);

            // スタート時間を現在の日付に設定
            startTime.setHours(hours);
            startTime.setMinutes(minutes);
            startTime.setSeconds(seconds);
            startTime.setMilliseconds(0);

            const elapsed = now - startTime; // 経過時間（ミリ秒）
            const h = String(Math.floor(elapsed / 3600000)).padStart(2, '0');
            const m = String(Math.floor((elapsed % 3600000) / 60000)).padStart(2, '0');
            const s = String(Math.floor((elapsed % 60000) / 1000)).padStart(2, '0');

            timeDisplay.textContent = `${h}:${m}:${s}`;

            setTimeout(displayTime, 1000); // 1秒ごとに更新
        }

        displayTime();
    }
});

/* // スタートボタンがクリックされたら時間を進める
startButton.addEventListener('click', () => {
  startButton.disabled = true;
  stopButton.disabled = false;
  resetButton.disabled = true;
  startTime = Date.now();
  displayTime();
});

// ストップボタンがクリックされたら時間を止める
stopButton.addEventListener('click', function() {
  startButton.disabled = false;
  stopButton.disabled = true;
  resetButton.disabled = false;
  clearTimeout(timeoutID);
  stopTime += (Date.now() - startTime);
});

// リセットボタンがクリックされたら時間を0に戻す
resetButton.addEventListener('click', function() {
  startButton.disabled = false;
  stopButton.disabled = true;
  resetButton.disabled = true;
  time.textContent = '00:00:00.000';
  stopTime = 0;
});
 */
