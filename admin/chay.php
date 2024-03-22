<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chạy</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        #progress-bar-container {
            width: 50%;
            height: 30px;
            background: #0f2453;
            position: relative;
            overflow: hidden;
            opacity: 0.8;
            transition: opacity 1s linear;
        }

        #progress-bar {
            width: 0%;
            height: 100%;
            background: #4CAF50;
            text-align: center;
            line-height: 30px;
            color: black;
            font-weight: bold;
            font-size: 16px;
            position: absolute;
            top: 0;
            left: 50%; /* Đặt left thành 50% */
            transform: translateX(-50%); /* Dịch chuyển về trái 50% chiều rộng của thanh */
            transform-origin: left center;
            transition: width 3s linear, opacity 1s linear;
        }
    </style>
</head>
<body>
    
    <div id="progress-bar-container">
        <div id="progress-bar">
            0%
        </div>
    </div>

    <script>
        // Auto-increment progress bar
        var progressBar = document.getElementById("progress-bar");

        // Hàm bắt đầu tiến trình
        function startProgress() {
            var currentProgress = 0;

            // Set interval để tăng tiến trình mỗi 300ms
            var interval = setInterval(function() {
                currentProgress += 10;
                progressBar.style.width = currentProgress + "%";
                progressBar.style.opacity = 1 - currentProgress / 100;

                progressBar.textContent = currentProgress + "%";

                // Khi đạt 100%, chuyển hướng đến trang khác
                if (currentProgress === 100) {
                    clearInterval(interval);
                    setTimeout(function() {
                        window.location.href = "profit.php";
                    }, 500);
                }
            }, 300);
        }

        // Gọi hàm bắt đầu tiến trình khi trang được load
        window.onload = startProgress;
    </script>
</body>
</html>
