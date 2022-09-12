<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <style>
    .form-container {
        background: #f1f1f1;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        flex-direction: column;
        width: 100vw;
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
    $message = "";
    $error = "";
    session_start();
    include './connectDb.php';
    if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['repassword']) && !empty($_POST['repassword'])) {
       if($_POST['password'] != $_POST['repassword']) {
        $error = "Mật khẩu nhập lại không đúng";
       }
       else {

       }
    }
    ?>
    <div class="form-container">
        <div class="message">
            <?php
                if ($message != "") {
                    echo '<div class="alert alert-success" role="alert">' . $message . '</div>';
                }
                if ($error != "") {
                    echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
                }
    
                ?>
        </div>
        <form action="./register.php" method="POST" class="form" id="form-1">
            <h3 class="heading">Đăng ký</h3>

            <div class="spacer"></div>
            <div class="form-group">
                <label htmlFor="name" class="form-label">Name</label>
                <input id="name" name="name" type="text" placeholder="Ung Hung" class="form-control" required />
            </div>

            <div class="form-group">
                <label htmlFor="username" class="form-label">Usename</label>
                <input id="username" name="username" type="text" placeholder="VD: ronglon1802" class="form-control"
                    required />
            </div>


            <div class="form-group">
                <label htmlFor="password" class="form-label">Password</label>
                <input id="password" name="password" type="password" placeholder="Nhập mật khẩu" class="form-control"
                    required />
            </div>
            <div class="form-group">
                <label htmlFor="repassword" class="form-label">RePassword</label>
                <input id="repassword" name="repassword" type="password" placeholder="Nhập lại mật khẩu"
                    class="form-control" required />
            </div>
            <div class="form-group">
                <label htmlFor="repassword" class="form-label">RePassword</label>
                <input id="repassword" name="repassword" type="password" placeholder="Nhập lại mật khẩu"
                    class="form-control" required />
            </div>
            <div class="form-group">
                <label htmlFor="email" class="form-label">Email</label>
                <input id="email" name="email" type="email" placeholder="Nhập lại mật khẩu" class="form-control"
                    required />
            </div>
            <div class="form-group">
                <label htmlFor="phone" class="form-label">Phone</label>
                <input id="phone" name="phone" type="text" placeholder="Nhập lại mật khẩu" class="form-control"
                    required />
            </div>

            <input type="hidden" name="action" value="submit" />
            <button class="form-submit">Đăng ký</button>
            <br><br>
            <a href='login.php'>Đăng nhập</a>
        </form>
    </div>
</body>

</html>