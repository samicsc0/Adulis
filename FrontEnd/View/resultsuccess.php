<!DOCTYPE html>

<head>
    <title>Success</title>
    <link rel="icon" href="../Assets/img/adulislogo1000.png">
</head>

<body>
    <div class="success">
        <img src="../Assets/img/check.png" alt="">
        <p>Order Placed Successfully!</p>
        <a href="index.php">Back To Home</a>
    </div>
    <style>
        .success{
            margin-top: 100px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .success img{
            width: 100px;
        }
        .success p{
            font-size: 2rem;
        }
        .success a{
            text-decoration: none;
            color: #000;
            border: 1px solid #000;
            padding: 16px 8px;
            border-radius: 10px;
        }
        .success a:hover{
            background-color: #0BAB0A;
            color: #fff;
        }
    </style>
</body>
</html>