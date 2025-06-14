<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>
<?php

  if(!isset($_SESSION['admin_name'])) {
    header("location:".ADMINURL."/admins/login-admins.php");
  }

  $orders = $conn->query("SELECT * FROM orders");
  $orders->execute();

  $allOrders = $orders->fetchAll(PDO::FETCH_OBJ);

?>

          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Orders</h5>
            
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">First Name</th>
                    <th scope="col">last Name</th>
                    <th scope="col">Town</th>
                    <th scope="col">State</th>
                    <th scope="col">Zip Code</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Street Address</th>
                    <th scope="col">Total Price</th>
                    <th scope="col">Status</th>
                    <th scope="col">Change Status</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($allOrders as $orders) : ?>
                  <tr>
                    <td><?php echo $orders->first_name; ?></td>
                    <td><?php echo $orders->last_name; ?></td>
                    <td><?php echo $orders->town; ?></td>
                    <td><?php echo $orders->state; ?></td>
                    <td>
                    <?php echo $orders->zip_code; ?>                     
                    </td>
                    <td><?php echo $orders->phone; ?></td>
                  <td>
                    <?php echo $orders->street_address; ?>
                 </td>
                    <td>$<?php echo $orders->total_price; ?></td>

                    <td><?php echo $orders->status; ?></td>
                    <td><a href="change-status.php?id=<?php echo $orders->id; ?>" class="btn btn-warning text-white text-center ">Update</a></td>
                    <td><a href="delete-orders.php?id=<?php echo $orders->id; ?>" class="btn btn-danger  text-center ">Delete</a></td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table> 
            </div>
          </div>
        </div>
        <?php require "../layouts/footer.php"; ?>
