<head>
    
    <link rel="stylesheet" href="../newcss.css"/>
    
</head>

<body>
    <?php
    $msql=new mysqli('','root','','notebook');
    $query = "SELECT * from `payment_staff`";
    $res =$msql->query($query);
    $staffs = $res->fetch_all();
    
//    var_dump($staffs);die;
    ?>
    <form>
        <select name="staff">
            <?php 
            foreach($staffs as $staff){
                ?><option><?=$staff[1]?></option><?php
            }
            ?>
        </select>
        <input type="submit" value="delete" name="delete">
        
    </form>    
    <?php 
    
    if(isset($_GET['staff']) && !empty($_GET['staff'])){
        $staff_for_deleted=$_GET['staff'];
        
    }else{
        exit;
    }
    
    $query = "delete from `payment_staff` where `name`= ?";
    $entManger = $msql->prepare($query);
    $entManger->bind_param('s', $staff_for_deleted);
    if($entManger->execute()){
        echo 'The '.$staff_for_deleted.' is successfuly delited ';
    }
    
    ?>   
</body>




