<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Success</title>
    <style>
        /* Styling for the pop-up */
        .popup {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 9999;
        }

        /* Overlay to cover the entire screen */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 9998;
        }
    </style>
</head>

<body>
    <div class="overlay"></div>
    <div class="popup">
        <h1>Đăng ký thành công!</h1>
        <p>Cảm ơn bạn đã đăng ký.</p>
    </div>

    <script>
        // Close the pop-up and redirect after 3 seconds
        setTimeout(function () {
            window.close();
        }, 3000);
    </script>
</body>

</html>