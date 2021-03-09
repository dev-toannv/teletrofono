<?php 
	if(!defined("MY_PROJECT")) die("Connect error");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
</head>
<body>
<p><a href="index.php?revenue"><-- Quay lại</a></p>
<canvas id="linechart"></canvas>
</body>
<?php
 require_once("modules/config/connectdb.php");
 if(isset($_SESSION['search']['year'])){
    $x1=$y1='';
    $year=$_SESSION['search']['year'];
    $month="select month(bill_time) as 'month' from bill where year(bill_time)=$year and bill_status=3 group by month(bill_time) order by month(bill_time) ASC";
    $month=mysqli_query($conn,$month);
    while($m=mysqli_fetch_assoc($month)){
        $mo=$m['month'];
        $total=0;
        $x1.="'"."Tháng ".$mo."',";

        $sql_m="select bill_money from bill where year(bill_time)=$year and month(bill_time)=$mo and bill_status=3";
        $sql_m=mysqli_query($conn,$sql_m);
        while($t=mysqli_fetch_assoc($sql_m)){
            $total+=$t['bill_money'];
        }
        $y1.=$total.",";

    }
    echo "<script>";
        echo"
            var bienx=[".$x1;
            //    echo"2000,2001,2002,2003";
            echo"];";
                    echo "var bieny=[".$y1."];
                    var CHART=document.getElementById('linechart').getContext('2d');
                    var line_chart=new Chart(CHART,{
                        type:'bar',
                        data:{
                            labels:bienx,
                            datasets:[{
                                label:'Doanh thu',
                                borderColor:'#55ffff',
                                borderWidth:2,
                                data:bieny,
                            }]
                        }
                    });
            </script>";



 }
 else{
     $x1=$y1='';

     $year="select year(bill_time) as 'year' from bill where bill_status=3 group by year(bill_time) order by year(bill_time) ASC";
     $year=mysqli_query($conn,$year);
     while($row=mysqli_fetch_assoc($year)){
         $y=$row['year'];
         $x1.="'"."Năm ".$y."',";
         $total=0;
         $sql_y="select bill_money from bill where year(bill_time)=$y and bill_status=3";
         $sql_y=mysqli_query($conn,$sql_y);
         while($m=mysqli_fetch_assoc($sql_y)){
             $total+=$m['bill_money'];
         }
         $y1.=$total.",";
         
     }
        // echo $x1."<br>";
        // echo $y1;

        echo "<script>";
        echo"
            var bienx=[".$x1;
            //    echo"2000,2001,2002,2003";
            echo"];";
                    echo "var bieny=[".$y1."];
                    var CHART=document.getElementById('linechart').getContext('2d');
                    var line_chart=new Chart(CHART,{
                        type:'bar',
                        data:{
                            labels:bienx,
                            datasets:[{
                                label:'Doanh thu',
                                borderColor:'#55ffff',
                                borderWidth:2,
                                data:bieny,
                            }]
                        }
                    });
            </script>";
    }
?>
</html>


