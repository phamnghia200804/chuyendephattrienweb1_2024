<?php
require_once 'models/UserModel.php';
$userModel = new UserModel();

function decodeUserId($encodedId) {
    return base64_decode($encodedId);
}

if (!empty($_GET['id']) && ($id = decodeUserId($_GET['id'])) && is_numeric($id)) {
    try {
        $userModel->deleteUserById($id);
        header('Location: list_users.php');
        exit();
    } catch (Exception $e) {
        echo "Error: " . htmlspecialchars($e->getMessage());
        exit();
    }
}

echo "Invalid or no user ID provided!";
exit();
?>
