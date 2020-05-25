<?php
include ("includes/header.php");
?>



        <!-- Begin Page Content -->
        <button type="button" class="btn btn-primary" style="margin-left:80px"  data-toggle="modal" data-target="#exampleModalAdd">Add User</button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                <label for="">User Name/ First Name</label>
                <input class="form-control" type="text" placeholder="Enter Username"  name="add_user_name" required id="">
                </div>
                <div class="form-group">
                <label for="">Last Name</label>
                <input class="form-control" type="text" placeholder="Enter Lastname"  name="add_last_name" required id="">
                </div>
                <div class="form-group">
                <label for="">e-mail</label>
                <input class="form-control" type="email" placeholder="Enter e-mail address"  name="add_user_email" required id="">
                </div>
                <div class="form-group">
                <label for="">Address</label>
                <input class="form-control" type="text" placeholder="Enter address"  name="add_user_addr" required id="">
                </div>
                <div class="form-group">
                <label for="">Phone Number</label>
                <input class="form-control" type="phone" placeholder="Enter phone number"  name="add_user_phnum" required id="">
                </div>
                <div class="form-group">
                    <label for="">User Password</label>
                    <input class="form-control" type="password" placeholder="Enter Password"  name="add_user_pass" required id="">
                </div>
                <div class="form-group">
                    <label for="">Select Profile Photo</label>
                    <input class="form-control" type="file"  name="image" required id="">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" name="add_btn" class="btn btn-primary" value="Add User">
              </div>
              </form>
            </div>
          </div>
        </div>  
        <br><br>
        <table class="container-fluid table">
          <thead>
            <th>ID</th>
            <th>USER NAME</th>
            <th>LAST NAME</th>
            <th>EMAIL</th>
            <th>ADDRESS</th>
            <th>PHONE NUMBER</th>
            <th>PASSWORD</th>
            <th>CREATED AT</th>
            <th>PROFILE PICTURE</th>
            <th>EDIT</th>
            <th>DELETE</th>
          </thead>
          <tbody>
            <?php
            $select_user="SELECT * FROM users";

            $res=mysqli_query($connection,$select_user);

            if($res)
            {
              $i=1;
              while ($row=mysqli_fetch_assoc($res)) 
              {
                $id=$row['id'];
                $name=$row['user_name'];
                $lname=$row['last_name'];
                $u_email=$row['user_email'];
                $addr=$row['address'];
                $phnum=$row['phone_num'];
                $pass=$row['user_password'];
                $created=$row['created_at'];
                $profile_photo = $row['profile_picture'];
                ?>
                <tr>
                  <td><?php echo htmlentities($i);?></td>
                  <td><?php echo htmlentities($name);?></td>
                  <td><?php echo htmlentities($lname);?></td>
                  <td><?php echo htmlentities($u_email);?></td>
                  <td><?php echo htmlentities($addr);?></td>
                  <td><?php echo htmlentities($phnum);?></td>
                  <td><?php echo htmlentities($pass);?></td>
                  <td><?php echo htmlentities($created);?></td>
                  <th>
                                <?php
                                if($profile_photo)
                                {
                                    ?>
                                    <a href="img/<?php echo $profile_photo;?>" download>
                                    
                                        <img src="img/<?php echo $profile_photo;?>" width="100px" height="100px" alt="">

                                    </a>

                                    <?php
                                }
                                else
                                {
                                    ?> <i class="fas fa-user fa-6x"><?php
                                }
                                ?>
                                    
                    </th>
                  <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo $id ?>">Edit</button></td>
                  <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalDelete<?php echo $id ?>">Delete</button></td>
                </tr>
                <!-- Edit Modal -->
                  <div class="modal fade" id="exampleModal<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                      <form action=""  method="post" enctype="multipart/form-data">
                        <div class="form-group">
                        <label for="">Change Username</label><br>
                        <input type="text" name="username" class="form-control" value="<?php echo htmlentities($name)?>">
                        <input type="hidden" name="userid" class="form-control" value="<?php echo htmlentities($id)?>">
                        </div>
                        <div class="form-group">
                        <label for="">Change Lastname</label><br>
                        <input type="text" name="newlast_name" class="form-control" value="<?php echo htmlentities($lname)?>">
                        </div>
                        <div class="form-group">
                        <label for="">Change e-mail</label><br>
                        <input type="text" name="newmail" class="form-control" value="<?php echo htmlentities($u_email)?>">
                        </div>
                        <div class="form-group">
                        <label for="">Change Address</label><br>
                        <input type="text" name="newaddr" class="form-control" value="<?php echo htmlentities($addr)?>">
                        </div>
                        <div class="form-group">
                        <label for="">Change Phone Number</label><br>
                        <input type="text" name="newphno" class="form-control" value="<?php echo htmlentities($phnum)?>">
                        </div>
                        <div class="form-group">
                        <label for="">Change Password</label><br>
                        <input type="text" name="password" class="form-control" value="<?php echo htmlentities($pass)?>">
                        </div>
                        <div class="form-group">
                        <label for="">Change/ Upload Profile Picture</label><br>
                        <input class="form-control" type="file" name="image" id="">
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" name="save_btn" value="Save changes">
                      </div>
                      </form>
                    </div>
                  </div>
                </div>

                <!-- Delete Modal -->
                <div class="modal fade" id="exampleModalDelete<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Entry</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="" method="post" >

                      <div class="modal-body">
                      Are You Sure Want to Delete this?
                      <input type="hidden" class="form-control" name="delete_id" value="<?php echo $id; ?>" >

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="delete_btn" class="btn btn-danger">Delete</button>
                      </div>
                    </div>
                  </div>
                </div>
              
                <?php
                $i++;
              }
            }
            ?>
          </tbody>

        </table>

      </div>
      <!-- End of Main Content -->

       

    
  
  <?php
  include ("includes/footer.php");
  ?>


<?php

if(isset($_POST['delete_btn']))
{
  // echo "clicked";
  $delete_id = $_POST['delete_id'];
  $curr_name=$_SESSION['user_name'];

  $check="SELECT * FROM users";
  $check_result=mysqli_query($connection,$check);
  if($check_result)
  {
    
    while ($rows=mysqli_fetch_array($check_result)) 
    {
      if($delete_id==$rows['id'])
      {
        // $confid=$rows['id'];
        $login_name=$rows['user_name'];
      }
    }
  }
 # echo $confid;


  if ($curr_name==$login_name) 
  {
    $delete_query = "DELETE FROM users WHERE id='$delete_id' ";

    $delete_result = mysqli_query($connection,$delete_query);

    if($delete_result)
    {
      header("Location:user_logout.php");
    }
    else
    {
      echo "Error".mysqli_error($connection);
    }
  }
  else 
  {
    $delete_query1 = "DELETE FROM users WHERE id='$delete_id' ";

    $delete_result1 = mysqli_query($connection,$delete_query1);

    if($delete_result1)
    {
      header("Location:users.php");
    }
    else
    {
      echo "Error".mysqli_error($connection);
    }
  }
  

}
?>

<?php

if(isset($_POST['add_btn']))
{
  $add_name=$_POST['add_user_name'];
  $add_lname=$_POST['add_last_name'];
  $add_mail=$_POST['add_user_email'];
  $add_addr=$_POST['add_user_addr'];
  $add_phno=$_POST['add_user_phnum'];
  $add_pass=$_POST['add_user_pass'];
  if(isset($_FILES['image']))
  {
    

    $errors= array();
    $file_name = $_FILES['image']['name'];
    $file_size =$_FILES['image']['size'];
    $file_tmp =$_FILES['image']['tmp_name'];
    $file_type=$_FILES['image']['type'];
    

    if(empty($errors)==true)
    {
       move_uploaded_file($file_tmp,"img/".$file_name);
   
       $image = $file_name;

    }
    else{
       print_r($errors);
       $image = "";

    }
 }
  $insert_query="INSERT INTO users(user_name,last_name,user_email,address,phone_num,user_password,profile_picture) VALUES ('$add_name','$add_lname','$add_mail','$add_addr','$add_phno','$add_pass','$image')";
  $insert_result=mysqli_query($connection,$insert_query);

  if($insert_result)
  {
    header("Location:users.php");
  }
  else{
    echo "Error ".mysqli_error($connection);
  }
}
?>

<?php

if(isset($_POST['save_btn']))
{
  $name1=$_POST['username'];
  $chng_lname=$_POST['newlast_name'];
  $chng_email=$_POST['newmail'];
  $chng_addr=$_POST['newaddr'];
  $chng_phno=$_POST['newphno'];
  $pass1=$_POST['password'];
  $id1=$_POST['userid'];
  $len_phnum=strlen($chng_phno);

  $new="SELECT * FROM users";
  $new_res=mysqli_query($connection,$new);

  while($row1=mysqli_fetch_assoc($new_res))
  {
    if($id1==$row1['id'])
    {
      $prof_pic=$row1['profile_picture'];
    }
    
    if ($chng_email!=$row1['user_email'])
    {
      $new_mail=$chng_email;
    }
    else
    {
      echo "<script>alert('mail id already exist');</script>";
    }
    
  }

  if(isset($_FILES['image']))
  {
    $errors= array();
    if($prof_pic)
    {
      $file_name = $prof_pic;
    }
    elseif($prof_pic=="")
    {
      $file_name = $_FILES['image']['name'];
    }
    
    $file_size =$_FILES['image']['size'];
    $file_tmp =$_FILES['image']['tmp_name'];
    $file_type=$_FILES['image']['type'];
    

    if(empty($errors)==true)
    {
       move_uploaded_file($file_tmp,"img/".$file_name);
   
       $image = $file_name;

    }
    else{
       print_r($errors);
       $image = "";

    }
  }
  // echo $file_name;
  // echo $prof_pic;
  if ($len_phnum == 10)
  {
    $update_query="UPDATE users SET user_name='$name1' ,last_name='$chng_lname',user_email='$new_mail',address='$chng_addr',phone_num='$chng_phno', user_password='$pass1' , profile_picture='$image' WHERE id='$id1'";

    $update_result=mysqli_query($connection,$update_query);

    if ($update_result) 
    {
      header("Location:users.php");
    }
    else {
      echo "Something went wrong";
    }
  }
  elseif ($len_phnum< 10 || $len_phnum>10)
  {
    echo"
    <script>alert('Not a valid phone number');</script>
    ";
  }
  

}
?>