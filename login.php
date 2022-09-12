<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

<head>
    <title>Document</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    .form-container {
        background: #f1f1f1;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        width: 100vw;
        flex-direction: column;
    }

    .form {
        width: 360px;
        min-height: 100px;
        padding: 32px 24px;
        text-align: center;
        background: #fff;
        border-radius: 10px;
        margin: 24px;
        align-self: center;
        box-shadow: 0 2px 5px 0 rgba(51, 62, 73, .1);
    }

    .form .heading {
        font-size: 2rem;
    }

    .form .desc {
        text-align: center;
        color: #636d77;
        font-size: 1.6rem;
        font-weight: lighter;
        line-height: 2.4rem;
        margin-top: 16px;
        font-weight: 300;
    }

    .form-group {
        display: flex;
        margin-bottom: 16px;
        flex-direction: column;
    }

    .form-label,
    .form-message {
        text-align: left;
    }

    .form-label {
        font-weight: 700;
        padding-bottom: 6px;
        line-height: 1.8rem;
        font-size: 1.4rem;
    }

    .form-control {
        height: 40px;
        padding: 8px 12px;
        border: 1px solid #b3b3b3;
        border-radius: 3px;
        outline: none;
        font-size: 1.4rem;
    }

    .form-control:hover {
        border-color: #1dbfaf;
    }

    .form-group.invalid .form-control {
        border-color: #f33a58;
    }

    .form-group.invalid .form-message {
        color: #f33a58;
    }

    .form-message {
        font-size: 1.2rem;
        line-height: 1.6rem;
        padding: 4px 0 0;
    }

    .form-submit {
        outline: none;
        background-color: #1dbfaf;
        margin-top: 12px;
        padding: 12px 16px;
        font-weight: 600;
        color: #fff;
        border: none;
        width: 100%;
        font-size: 14px;
        border-radius: 8px;
        cursor: pointer;
    }

    .form-submit:hover {
        background-color: #1ac7b6;
    }

    .spacer {
        margin-top: 36px;
    }
    </style>
</head>

<body>
    <?php
        session_start();
        include './connectDb.php';
        $error = false;
        if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) {
            $result = mysqli_query($con, "Select `id`,`username` from `member` WHERE (`username` ='" . $_POST['username'] . "' AND `password` = md5('" . $_POST['password'] . "'))");
            if (!$result) {
                $error = mysqli_error($con);
            } else {
                $user = mysqli_fetch_assoc($result);
                $_SESSION['current_user'] = $user;
            }
            mysqli_close($con);
            if ($error !== false || $result->num_rows == 0) {
                ?>
    <div id="login-notify" class="box-content">
        <h1>Thông báo</h1>
        <h4><?= !empty($error) ? $error : "Thông tin đăng nhập không chính xác" ?></h4>
        <a href="./login.php">Quay lại</a>
    </div>
    <?php
                exit;
            }
            ?>
    <?php } ?>
    <?php if (empty($_SESSION['current_user'])) { ?>
    <div class="form-container">
        <form action="./login.php" method="POST" class="form" id="form-1">
            <h3 class="heading">Đăng nhập</h3>

            <div class="spacer"></div>

            <div class="form-group">
                <label htmlFor="email" class="form-label">Usename</label>
                <input id="email" name="username" type="text" placeholder="VD: email@domain.com" class="form-control"
                    required />
            </div>

            <div class="form-group">
                <label htmlFor="password" class="form-label">Password</label>
                <input id="password" name="password" type="password" placeholder="Nhập mật khẩu" class="form-control"
                    required />
            </div>

            <input type="hidden" id="action" name="action" value="login" />
            <button class="form-submit">Đăng nhập</button>
            <span>Bạn chưa có tài khoản ?<a href='register.php'>Đăng ký ?</a></span>
        </form>
    </div>
    <?php
        } else {
            $currentUser = $_SESSION['current_user'];
            ?>
    <div id="login-notify" class="box-content">
        Xin chào <?= $currentUser['username'] ?><br />
        <a href="./logout.php">Đăng xuất</a>
    </div>
    <?php } ?>
</body>

</html>