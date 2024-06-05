
<?php
include 'database.php';


$sql_rooms = "SELECT COUNT(DISTINCT maPM) AS total_rooms FROM maytinh";
$result_rooms = $conn->query($sql_rooms);
$total_rooms = $result_rooms->fetch_assoc()['total_rooms'];


$sql_total = "SELECT COUNT(*) AS total_machines FROM maytinh";
$result_total = $conn->query($sql_total);
$row_total = $result_total->fetch_assoc();
$total_machines = $row_total['total_machines'];

$sql_broken = "SELECT COUNT(*) AS total_broken FROM maytinh where tinhtrang = 'Hu'";
$result_broken = $conn->query($sql_broken);
$row_broken = $result_broken->fetch_assoc();
$total_broken = $row_broken['total_broken'];

$total_good = $total_machines - $total_broken;

?>




  <main id="main" class="main">
 
    
    <div class="row">
        
    
    <div class="col-md-3">
      <div class="panel panel-primary">
    
        <div class="panel-heading">
          <div class="row">
            <div class="col-md-6">
              <span class="glyphicon glyphicon-record"></span>
            </div>
            <div class="col-md-6 text-right">
              <h2><?php echo $total_machines ?></h2>
              <p>máy<strong> trên <?php echo $total_rooms; ?></strong> phòng</p>
            </div>
          </div>
        </div><!-- End .panel-heading -->
    
        <div class="panel-footer">
          <div class="row">
            <div class="col-md-6">
              Tổng số máy hiện tại
            </div>
            <div class="col-md-6 text-right">
              <a href="#">Xem chi tiết
              <span class="glyphicon glyphicon-chevron-right"></span>
              </a>
            </div>
          </div>
        </div><!-- End .panel-footer -->
    
      </div><!-- End .panel panel-primary -->
    </div><!-- End .col-md-3 -->
    
    <div class="col-md-3">
      <div class="panel panel-success">
    
        <div class="panel-heading">
          <div class="row">
            <div class="col-md-6">
              <span class="glyphicon glyphicon-download-alt"></span>
            </div>
            <div class="col-md-6 text-right">
              <h2><?php echo $total_good ?></h2> 
              <p><strong>máy</strong> hoạt động tốt</p>
            </div>
          </div>
        </div><!-- End .panel-heading -->
    
        <div class="panel-footer">
          <div class="row">
            <div class="col-md-6">
              Tổng số máy hoạt động tốt
            </div>
            <div class="col-md-6 text-right">
              <a href="#">Xem chi tiết
              <span class="glyphicon glyphicon-chevron-right"></span>
              </a>
            </div>
          </div>
        </div><!-- End .panel-footer -->
    
      </div><!-- End .panel panel-success -->
    </div><!-- End .col-md-3 -->
    
    <div class="col-md-3">
      <div class="panel panel-danger">
    
        <div class="panel-heading">
          <div class="row">
            <div class="col-md-6">
              <span class="glyphicon glyphicon-remove-sign"></span>
            </div>
            <div class="col-md-6 text-right">
              <h2><?php echo $total_broken ?></h2>
              <p>máy bị <strong>hỏng</strong></p>
            </div>
          </div>
        </div><!-- End .panel-heading -->
    
        <div class="panel-footer">
          <div class="row">
            <div class="col-md-6">
              Tổng số máy bị hỏng
            </div>
            <div class="col-md-6 text-right">
              <a href="#">Xem chi tiết
              <span class="glyphicon glyphicon-chevron-right"></span>
              </a>
            </div>
          </div>
        </div><!-- End .panel-footer -->
    
      </div><!-- End .panel panel-danger -->
    </div><!-- End .col-md-3 -->
    
    <div class="col-md-3">
      <div class="panel panel-warning">
    
        <div class="panel-heading">
          <div class="row">
            <div class="col-md-6">
              <span class="glyphicon glyphicon-wrench"></span>
            </div>
            <div class="col-md-6 text-right">
              <h2><?php echo $total_rooms ?></h2> 
              <p><strong>phòng </strong> hoạt động</p>
            </div>
          </div>
        </div><!-- End .panel-heading -->
    
        <div class="panel-footer">
          <div class="row">
            <div class="col-md-6">
              Tổng số vật dụng
            </div>
            <div class="col-md-6 text-right">
              <a href="#">Xem chi tiết
              <span class="glyphicon glyphicon-chevron-right"></span>
              </a>
            </div>
          </div>
        </div><!-- End .panel-footer -->
    
      </div><!-- End .panel panel-warning -->
    </div><!-- End .col-md-3 -->
    
    </div><!-- End .row panel-->
       
    
          
      </main><!-- End #main -->


  