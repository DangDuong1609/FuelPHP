<?php
 $result=chayTruyVanTraVeDL($link,"select * from danh_muc");
 while($row=mysqli_fetch_assoc($result)){
     echo "<li class='nav-item'>
            <a class='nav-link' href='index.php?dmid=".$row['id']."'>".$row['name']."</a>
           </li>";
 }
?>