<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
session_start();
include("connect.php");
if (isset($_SESSION['idlog']) && isset($_SESSION['namalog'])){
$idlog=$_SESSION['idlog'];
$namalog=$_SESSION['namalog'];
?>

<!DOCTYPE html>
<html class="" lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard - Student</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/foundation.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/app.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/asPieProgress.css">
    <meta class="foundation-mq">
</head>

<body onload="progress()">
    <div class="off-canvas-wrapper">
        <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper="">
            <div class="sidebar off-canvas position-left reveal-for-large" id="my-info" data-off-canvas="l6sk4l-off-canvas" data-position="left" aria-hidden="true">
                <div class="profile">
                    <img class="thumbnail circle" src="../assets/img/profile-example.png">
                    <h5 class="user name"><?php echo $_SESSION['namalog'];?></h5>
                    <h6 class="matriculation id"><?php echo $_SESSION['idlog'];?></h6>
                </div>
                <ul class="nav">
                    <li class="active"><a href="dashboard.php"><i class="fa fa-dashboard" aria-hidden="true"></i>Dashboard</a></li>
                    <li><a href="../student/deskripsi.php"><i class="fa fa-info" aria-hidden="true"></i>Deskripsi</a></li>
                    <li><a href="panduan.php"><i class="fa fa-question-circle" aria-hidden="true"></i>Panduan</a></li>
                    <li><a href="user-profile.php"><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>
                    <li><a href="../student/SRL/2-Set-Goals.php"><i class="fa fa-tasks" aria-hidden="true"></i>SRL</a></li>
                    <li><a href="#"><i class="fa fa-unlock"></i> Logout</a></li>
                </ul>
            </div>
            <div class="main off-canvas-content" data-off-canvas-content="">
                <div class="title-bar hide-for-large">
                    <div class="title-bar-left">
                        <button class="menu-icon" type="button" data-open="my-info" aria-expanded="false" aria-controls="my-info"></button>
                        <span class="title-bar-title"><?php echo $_SESSION['namalog'];?></span>
                    </div>
                </div>
                <div class="row main-wrapper rounded">
                    <div class="columns main-wrapper rounded shadow">
                        <div class="page heading">
                            <h2>Dashboard</h2>
                        </div>
                        <div class="row top space">
                            <div class="columns">
                                <div class="top-bar">
                                    <div class="small-12 large-9 columns">
                                        <h4>Notifikasi</h4>
                                     
                <h6 class="balance">
                                        <span class="warning badge"> 1. </span> Anda sudah mengikuti MAI tes</h6>
                                        <form action=""  method="post" id="add-score" class="form-horizontal">

                                        <?php $sql1=mysqli_query($connect,"SELECT
tb_fuz_skor_mhs_mai.id_mhs AS id_mhs1,
tb_fuz_kategori.id_mhs AS id_mhs2,
tb_fuz_skor_mhs_mai.knowledge AS knowledge,
tb_fuz_skor_mhs_mai.regulation AS regulation,
tb_fuz_kategori.knowledge AS fuz_knowledge,
tb_fuz_kategori.regulation AS fuz_regulation,
tb_fuz_kategori.knowledge_kategori AS knowledge_kategori,
tb_fuz_kategori.regulation_kategori AS regulation_kategori
FROM
tb_fuz_skor_mhs_mai
INNER JOIN tb_fuz_kategori ON tb_fuz_skor_mhs_mai.id_mhs = tb_fuz_kategori.id_mhs
WHERE tb_fuz_skor_mhs_mai.id_mhs='$_SESSION[idlog]' and tb_fuz_kategori.id_mhs='$_SESSION[idlog]'");
                                        $data1=mysqli_fetch_array($sql1);
                                        $fuz_knowledge=$data1['fuz_knowledge'];
                                        $fuz_regulation=$data1['fuz_regulation'];
                                        $knowledge_kategori=$data1['knowledge_kategori'];
                                        $regulation_kategori=$data1['regulation_kategori'];

                                        ?>

                                        <table>
                                            <tr>
                                                <th width="20%">Knowledge</th>
                                                <th width="5%">:</th>
                                                <th width="10%"><?php echo "$fuz_knowledge"; ?></th>
                                                <th width="10%"><?php 

                                            if ($knowledge_kategori==1) {
                                                echo "rendah";
                                            }
                                            elseif ($knowledge_kategori==2) {
                                                echo "sedang";
                                            }
                                            elseif ($knowledge_kategori==3) {
                                                echo "tinggi";
                                            } ?></th>
                                              
                                            <th width="55"></th>
                                            </tr>
                                            <tr>
                                                <th width="20%">Regulation</th>
                                                <th width="5%">:</th>
                                                <th width="10%"><?php echo "$fuz_regulation"; ?></th>
                                                <th width="10%"><?php 

                                                if ($regulation_kategori==1) {
                                                    echo "rendah";
                                                }
                                                elseif ($regulation_kategori==2) {
                                                    echo "sedang";
                                                }
                                                elseif ($regulation_kategori==3) {
                                                    echo "tinggi";
                                                } ?></th>
                                                
                                            <th width="55"></th>
                                        </tr>
                                            

                                        </table>
                                         <a href="../student/deskripsi.php" class="button expanded success"> Mulai Belajar</a>

              





























                                </div>
                            </div>
                        </div>
                        <div class="row top space">
                            <div class="columns">
                                <div class="top-bar">
                                    <div class="small-12 large-4 columns">
                                        <div class="tachometer">
                                            <div class="container">
    <div id="tachometer">
        <div id="gauge" class="200x160px"></div>
    </div>
</div>
                                        </div>
                                        </div>
                                                                            <div class="small-12 large-8 columns">

                                        <div class="status">
                                    <h4>Total Materi Yang Sudah Dipelajari</h4>
<div class="warning progress" role="progressbar" tabindex="0" aria-valuenow="25" aria-valuemin="0" aria-valuetext="25 percent" aria-valuemax="100">
  <div class="progress-meter" style="width: 25%">
    <p class="progress-meter-text">25%</p>
  </div>
</div>
                                    <h4>    Self-Regulated Learning Process</h4>
<div class="primary progress">
  <div class="progress-meter" style="width: 50%">
    <p class="progress-meter-text">50%</p>
  </div>
</div>
</div>
</div>

                            </div>
                            <div class="column">
                                <div class="top space">
                                    <table class="projects table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Activity</th>
                                                <th>Duration</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><code>#T-1082</code></td>
                                                <td>
                                                    <a href="#">Log in</a>
                                                </td>
                                                <td> 1 min</td>
                                                <td><span class="status-ongoing"><i class="fa fa-circle"></i> ongoing</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="js-off-canvas-exit"></div>
            </div>
        </div>
    </div>
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/foundation.js"></script>
        <script src="../assets/js/raphael-2.1.4.min.js"></script>
            <script src="../assets/js/justgage.js"></script>
    <script>
    $(document).foundation();
     var g = new JustGage({
    id: "gauge",
    value: 20,
    min: 0,
    max: 100,
     pointer: true,
        pointerOptions: {
          toplength: -15,
          bottomlength: 10,
          bottomwidth: 12,
          color: '#8e8e93',
          stroke: '#ffffff',
          stroke_width: 3,
          stroke_linecap: 'round'
        },
    title: "Kemampuan SRL",
    textRenderer: customValue,
    hideMinMax: true,
    levelColors: [
             "#f44242",
          "#f4f141",
                    "#41f461"
        ]
  });
      function customValue(val) {
            if (val < 50) {
                return 'bad';
            } else if (val > 50 & val < 80) {
                return 'good';
            } else if (val > 81) {
                return 'excellent';
            }
        }
    </script>
    </script>
</body>
</html>
<?php } 
else
{
header('location:../../login/login_mhs.php');
}
?>
