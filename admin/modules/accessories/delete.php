<?php
    require_once __DIR__. '/../../autoload/autoload.php';

    
    $id = intval(getInput('id'));

    $EditProduct = $db->fetchID("product",$id);
    if( empty($EditProduct))
    {
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin("accessories");
    }
    
    $num2 = $db->delete("accessories",$id);
    $num = $db->delete("product",$id);
    if($num > 0)
        {
            $_SESSION['success'] = "Xóa thành công!";
            redirectAdmin("accessories");
        }
        else
        {
             $_SESSION['error'] = "Xóa thất bại!";
             redirectAdmin("accessories");
        }

?>