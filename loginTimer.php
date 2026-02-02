<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Blocked</title>
</head>
<body>
    <div id="Timer"></div>
    <script>
        var now = new Date();
        var countdownDate = new Date(now.getTime() + 60 * 1000); // 1 minute

        var x = setInterval(function() {
            var now = new Date().getTime();
            var distance = countdownDate - now;

            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));

            document.getElementById("Timer").innerHTML = '<h1>Login is blocked</h1>' + minutes + 'm ' + seconds + 's';

            if (distance < 0) {
                clearInterval(x);
                document.getElementById("Timer").innerHTML = "Redirecting...";
                window.location.href = 'LoginForm.php';
            }
        }, 1000);
    </script>
</body>
</html>