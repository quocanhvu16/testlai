<!DOCTYPE HTML>
<html>
    <head>
        <title>PHP Form example</title>
    </head>

    <body>
        <?php
        $name=$mssv=$vacxin="";
        $nameErr=$mssvErr=$vacxinErr="";

        if ($_SERVER["REQUEST_METHOD"] == "POST"){      
            if (empty($_POST["name"])) {
                $nameErr = "Last Name is required";
            }
            else{
                $name = test_input($_POST["name"]);
            }

            if (empty($_POST["mssv"])) {
                $mssvErr = "MSSV is required";
            }
            else{
                $mssv = test_input($_POST["mssv"]);
            }
            if (empty($_POST["vacxin"])) {
                $vacxinErr = "vacxin is required";
            }
            else{
                $vacxin = test_input($_POST["vacxin"]);
            }
            if($nameErr =="" &&$mssvErr =="" &&$vacxinErr ==""  ){
                print_qr($name,$mssv,$vacxin);
            }
        }
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        ?>
        <h2>Đăng ký thông tin vacxin</h2>
        <h3>Nhập thông tin</h3>
        <p><span>Các dòng có dấu "*" đều bắt buộc.</span></p>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <p class="p">
                Họ tên: <input type="text" name="name" value="<?php echo $name?>"/>
                <span > * <?php echo $nameErr;?></span>
            </p>
            <p class="p">
                MSSV: <input type="text" name="mssv" value="<?php echo $mssv?>"/>
                <span > * <?php echo $mssvErr;?></span>
            </p>
            <p class="p">
                Số vacxin đã tiêm: <input type="text" name="vacxin" value="<?php echo $vacxin?>"/>
                <span > * <?php echo $vacxinErr;?></span>
            </p>
            </br>
            <input type="submit" name="submit" value="Submit" />
            <input type="reset" />
        </form>

        <?php 
            function print_qr($name,$mssv,$vacxin){
                echo "<h2>Mã QR của bạn:</h2>";
                if (empty($_POST["submit"])){
                }
                else{
                    $content =$name." ".$mssv." ".$vacxin;
                    ?>
                    <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=<?php echo$content;?>&choe=UTF-8" alt="">
            <?php
                }
            }
        ?>
    </body>

</html>