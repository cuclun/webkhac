<?php
    require_once __DIR__. '/../../autoload/autoload.php';

    

    $id = intval(getInput('id'));

    $EditProduct = $db->fetchID("transaction",$id);
    if( empty($EditProduct))
    {
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin("order");
    }

    $num2 = $db->xoa("orders","orders.transaction_id = $id");
    $num = $db->delete("transaction",$id);
    if($num > 0)
        {
            $_SESSION['success'] = "Xóa thành công!";
            redirectAdmin("order");
        }
        else
        {
             $_SESSION['error'] = "Xóa thất bại!";
             redirectAdmin("order");
        }

?>