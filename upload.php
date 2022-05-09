<?php
class UUID {
    public static function v4() {
        if (!function_exists('uuid_create'))
          return false;
    
        uuid_create($context);
    
        uuid_make($context, UUID_MAKE_V4);
        uuid_export($context, UUID_FMT_STR, $uuid);
        return trim($uuid);
      }
}

require_once("db_module.php");

$link=null;
taoKetNoi($link);
    if(isset($_POST['submit'])){
        $img_name = $_FILES['img']["name"];
        // var_dump($img_name);die();
        $img_size = $_FILES['img']["size"];
        $tmp_name = $_FILES['img']["tmp_name"];
        $error = $_FILES['img']["error"];
        $name=$_POST['ten'];
        $mota=$_POST['mota'];
        $giaban=$_POST['giaban'];
        $iddm=$_POST['iddm'];
        $usid= "7fddae8e-8977-11e0-bc11-003048c3b1f2";

        $created_at = date("Y-m-d H:i:s");
        $updated_at = date("Y-m-d H:i:s");

        if($error===0){
            if($img_size > 500000){
                $em="File quá lớn";
                header("Location: add.php?error=$em");
            }
            else{
                $img_ex=pathinfo($img_name,PATHINFO_EXTENSION);
                // var_dump($img_ex);die();
                $img_ex_lc= strtolower($img_ex);
                // var_dump($img_ex_lc);die();
                $allowed_exs = array("jpg","jpeg","png");
                if(in_array($img_ex_lc,$allowed_exs)){
                    $reture_cata_all=chayTruyVanTraVeDL($link,"select * from danh_muc where id = '$iddm'");
                    $row_cata=mysqli_fetch_assoc($reture_cata_all);
                    $new_img_name = $row_cata['code_name'].'/'.$img_name;
                    // var_dump($new_img_name);die();
                    $folder = "img/danhmuc/".$row_cata['code_name'];
                    // $fileName = preg_replace('#[^a-z.0-9]#i', '', $img_name);
                    // $aaa = explode(".", $fileName);
                    $moveResult = move_uploaded_file($tmp_name, "$folder/$img_name");
                    // var_dump($moveResult);die();
				    $result=chayTruyVanKhongTraVeDL($link,"insert into product value(null, '$usid', '$name', '$new_img_name', '$iddm', '$giaban', '$mota', '$created_at', '$updated_at')");
                    if($result){
                        $em="Load thành công";
                        header("Location: add.php?msg=$em");
                    }
                    else{
                        $em="Load thất bại";
                        header("Location: add.php?msg=$em");
                    }
                    giaiPhongBoNho($link,$result);
                }
                else{
                    $em="Bạn không thể upload loại file này";
                    header("Location: add.php?msg=$em");
                }
            }
        }
        else{
            $em="Lỗi";
            header("Location: add.php?msg=$em");
        }
    }
    else
    header("Location: add.php");
?>