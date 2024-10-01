<?php
// Bắt đầu phiên
session_start();
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; // Thêm user mới
$_id = NULL;  

// Hàm giải mã ID
function decodeUserId($encodedId) {
    return base64_decode($encodedId); // Hoặc dùng hàm giải mã tương ứng
}

// Giải mã ID nếu có trong URL
if (!empty($_GET['id'])) {
    $_id = decodeUserId($_GET['id']); // Giải mã ID
    $user = $userModel->findUserById($_id); // Cập nhật thông tin user
}

// Xử lý khi người dùng gửi thông tin
if (!empty($_POST['submit'])) {
    $result = null; // Biến lưu kết quả

    if (!empty($_id)) {
        $result = $userModel->updateUser($_POST); // Cập nhật người dùng
    } else {
        $result = $userModel->insertUser($_POST); // Thêm người dùng mới
    }

    // Kiểm tra xem có lỗi không
    if (isset($result['error'])) {
        $_SESSION['error'] = $result['error']; // Lưu thông báo lỗi vào session
        header('Location: form_user.php?id=' . $_GET['id']); // Chuyển hướng về trang hiện tại
        exit();
    } else {
        header('location: list_users.php'); // Nếu thành công, chuyển hướng đến danh sách người dùng
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>User form</title>
    <?php include 'views/meta.php' ?>
</head>
<body>
    <?php include 'views/header.php'?>
    <div class="container">
        <!-- Hiển thị thông báo lỗi nếu có -->
        <?php if (!empty($_SESSION['error'])) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo htmlspecialchars($_SESSION['error'], ENT_QUOTES, 'UTF-8'); ?>
            </div>
            <?php unset($_SESSION['error']); // Xóa thông báo sau khi hiển thị ?>
        <?php } ?>

        <?php if ($user || !isset($_id)) { ?>
            <div class="alert alert-warning" role="alert">
                User form
            </div>
            <form method="POST">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($_id); ?>">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" name="name" placeholder="Name" value='<?php if (!empty($user[0]['name'])) echo htmlspecialchars($user[0]['name'], ENT_QUOTES, 'UTF-8'); ?>'>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>

                <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
            </form>
        <?php } else { ?>
            <div class="alert alert-success" role="alert">
                User not found!
            </div>
        <?php } ?>
    </div>
</body>
</html>
