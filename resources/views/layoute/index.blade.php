<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Baranyai project</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
@yield('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"
        integrity="sha512-7Pi/otdlbbCR+LnW+F7PwFcSDJOuUJB3OxtEHbg4vSMvzvJjde4Po1v4BR9Gdc9aXNUNFVUY+SK51wWT8WF0Gg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    const startButton = document.getElementById('startBtn');
    const stopButton = document.getElementById('save');
    const timeInput = document.getElementById('newTime');
    const counter = document.querySelector('.counter');
    const counterValue = document.querySelector('.counter').textContent;
    var parts = counterValue.split(':');
    let sec = parts[2];
    let min = parts[1];
    let hour = parts[0];
    let intervalId;

    startButton.addEventListener('click', () => {
        intervalId = setInterval(() => {
            sec++;
            if(sec === 60)
            {
                sec = 0;
                min++;
            }
            if(min === 60)
            {
                min = 0;
                hour++;
            }
            counter.textContent = `${hour.toString().padStart(2, '0')}:${min.toString().padStart(2, '0')}:${sec.toString().padStart(2, '0')}`;

        }, 1000);

    });

    stopButton.addEventListener('click', () => {
        clearInterval(intervalId);

        let counternow = document.querySelector('.counter').textContent;

        timeInput.value = counternow;


    })
</script>
@include('scripts.script')
</body>
