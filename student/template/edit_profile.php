<div class="container card">
  <div class="row">
    <div class="col-12 col-lg-3 card">
      <div class="h3 text-info my-2">
        <p>Student Page</p>
      </div>
       <div class="d-none d-lg-block">
         <div class="">
           <nav>
             <ul class="nav flex-column">
               <b>LINKS</b>
               <li class="nav-item">
                 <a href="../index.php" class="nav-link">
                   <img src="../images/home.png" alt="" style="width:20px">
                   Home
                 </a>
               </li>
               <li class="nav-item">
                 <a href="tutorial.php" class="nav-link">
                   <img src="../images/res/video.png" alt="" style="width:20px">
                   Tutorials
                 </a>
               </li>
               <li class="nav-item">
                 <a href="book.php" class="nav-link">
                   <img src="../images/res/book.png" alt="" style="width:20px">
                   Books
                 </a>
               </li>
               <li class="nav-item">
                 <a href="app.php" class="nav-link">
                   <img src="../images/appl.jpeg" alt="" style="width:20px">
                   Apps
                 </a>
               </li>
               <li class="nav-item">
                 <a href="dataset.php" class="nav-link">
                   <img src="../images/res/dataset.png" alt="" style="width:20px">
                   Data Set
                 </a>
               </li>
               <li class="nav-item">
                 <a href="research.php" class="nav-link">
                   <img src="../images/res/research.png" alt="" style="width:20px">
                   Research
                 </a>
               </li>
               <b>QUICK LINK</b>
               <li class="nav-item">
                 <a href="edit_profile.php" class="nav-link">
                   <img src="../images/profile.jpeg" alt="" style="width:20px">
                   Edit Profile
                 </a>
               </li>
               <li class="nav-item">
                 <a href="password.php" class="nav-link">
                   <img src="../images/password.png" alt="" style="width:20px">
                   Change Password
                 </a>
               </li>
               <li class="nav-item">
                 <a href="../data/logout.php" class="nav-link">
                   <img src="../images/logout.png" alt="" style="width:20px">
                   Log out
                 </a>
               </li>
             </ul>
           </nav>
         </div>
       </div>
    </div>
    <div class="col-12 col-lg-9 mx-auto">
      <div class="row">
        <div class="col-12 my-2">
          <div class="">
                  <?php
                  class Photo
                      {
                        function photo()
                        {
                          global $obj;
                          $idno=$_SESSION['user_idno'];
                          $sql="SELECT * FROM user u,student s WHERE u.user_idno='$idno' AND u.user_type='Student' AND u.user_idno=s.idno";
                          $result_set=mysqli_query($obj->conn,$sql) or die(mysqli_connect_error($sql));
                          $no_rows = mysqli_num_rows($result_set);
                          if($row=mysqli_fetch_array($result_set))
                          {
                          ?>
                          <p class="text-info text-left">1. Upload your profile picture</p>
                          <form class="col-12 col-lg-10 mx-auto" action="../data/photo.php?id=<?php echo $row['user_idno'] ?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                              <div class="col-12 col-lg-3 mx-auto ">
                                <input type="file" name="file" value="" class="pt-3">
                              </div>
                              <div class="col-12 col-lg-3 mx-auto">
                                <input type="submit" name="picture" value="Upload" class="btn btn-info waves-light">
                              </div>
                            </div>
                          </form>
                         <?php
                          }
                        }
                      }
                  $list=new photo();
               ?>
          </div><hr>
          <div class="col-12">
            <!-- edit student profile -->
            <div class="">
              <?php
              class Form
                  {
                    function form()
                    {
                      global $obj;
                      $idno=$_SESSION['user_idno'];
                      $sql="SELECT * FROM user WHERE user_idno='$idno' AND user_type='Student'";
                      $result_set=mysqli_query($obj->conn,$sql) or die(mysqli_connect_error($sql));
                      $no_rows = mysqli_num_rows($result_set);
                      if($row=mysqli_fetch_array($result_set))
                      {
                      ?>
                     <form class="row" action="../data/edit_profile.php?id=<?php echo $row['user_idno'] ?>" method="post">
                       <?php
                      }
                    }
                  }
              $list=new form();
               ?>
                <?php
                  class Student_User
                      {
                        function student_user()
                        {
                          global $obj;
                          $idno=$_SESSION['user_idno'];
                          $sql="SELECT * FROM user u,student s WHERE u.user_idno='$idno' AND u.user_type='Student' AND u.user_idno=s.idno";
                          $result_set=mysqli_query($obj->conn,$sql) or die(mysqli_connect_error($sql));
                          $no_rows = mysqli_num_rows($result_set);
                          if($row=mysqli_fetch_array($result_set))
                          {
                            ?>
                            <p class="text-info text-left">2. Basic Information</p>
                            <div class="md-form col-12 col-lg-4">
                                <i class="fa fa-user prefix"></i>
                                <label for="form2">Student Name</label>
                                <input type="text" id="form2" name="fname" value="<?php echo $row['name'] ?>" class="form-control">
                              </div>
                              <div class="md-form col-12 col-lg-4">
                                <i class="fa fa-user prefix"></i>
                                <label for="form2">Father Name</label>
                                <input type="text" id="form2" name="lname" value="<?php echo $row['fathername'] ?>" class="form-control">
                              </div>
                              <div class="md-form col-12 col-lg-4">
                                <i class="fa fa-user prefix"></i>
                                <label for="form2">Grand Father Name</label>
                                <input type="text" id="form2" name="gname" value="<?php echo $row['gname'] ?>" class="form-control">
                              </div>
                              <div class="md-form col-12 col-lg-4">
                                <i class="fa fa-id-badge prefix"></i>
                                <label for="form2">Student ID NO</label>
                                <input type="text" id="form2" name="idno" value="<?php echo $row['user_idno'] ?>" class="form-control">
                              </div><div class="md-form col-12 col-lg-4">
                                <i class="fa fa-envelope prefix" class="mr-3"></i>
                                <label for="form2">E-mail</label>
                                <input type="email" id="form2" name="email" value="<?php echo $row['email'] ?>" class="form-control">
                              </div>
                              <div class="md-form col-12 col-lg-4">
                                <i class="fa fa-phone-square prefix"></i>
                                <label for="form2">Phone</label>
                                <input type="text" id="form2" name="phone" class="form-control" value="<?php echo $row['phone'] ?>">
                              </div>
                              <div class="col-12 col-lg-4 md-form">
                                <select class="custom-select" name="gender">
                                  <option value="<?php echo $row['gender'] ?>">Gender</option>
                                  <option value="Male">Male</option>
                                  <option value="Female">Female</option>
                                </select>
                              </div>
                              <div class="col-12 col-lg-4 md-form">
                                <select class="custom-select" name="year">
                                  <option value="<?php echo $row['year'] ?>">Year</option>
                                  <option value="I">I</option>
                                  <option value="II">II</option>
                                  <option value="III">III</option>
                                  <option value="IV">IV</option>
                                </select>
                              </div>
                              <div class="col-12 col-lg-4 md-form">
                                <select class="custom-select" name="program">
                                  <option value="<?php echo $row['program'] ?>">Program</option>
                                  <option value="BSc">BSc</option>
                                  <option value="MSc">MSc</option>
                                  <option value="Phd">Phd</option>
                                </select>
                              </div>
                              <div class="col-12 col-lg-5 mx-auto md-form">
                                <label for="">Birth date</label>
                                <input type="text" name="bdate" value="<?php echo $row['birthdate'] ?>" class="form-control">
                              </div>
                              <div class="col-12"></div>
                              <div class="col-12 col-lg-3 mx-auto">
                                <button type="submit" name="save" class="btn btn-info waves-light"><strong>Sava Changes</strong> </button>
                              </div>
                            <?php
                          }
                        }
                      }
                  $list=new student_user();
                ?>
              </form>
              <?php
                class NewStudent
                    {
                      function newstudent()
                      {
                        global $obj;
                        $idno=$_SESSION['user_idno'];
                        $sql="SELECT * FROM user u,student s WHERE u.user_idno='$idno' AND u.user_type='Student' AND u.user_idno=s.idno";
                        $result_set=mysqli_query($obj->conn,$sql) or die(mysqli_connect_error($sql));
                        $no_rows = mysqli_num_rows($result_set);
                        if(!$row=mysqli_fetch_array($result_set))
                        {
                        ?>
                        <div class="row">
                          <div class="col-12">
                            <p class="text-info col-12 col-lg-6 mx-auto">
                              <i>
                                You do not have provied enougn information about your self yet.
                                Please fill the form below to make your profile full.
                              </i>
                            </p>
                          </div>
                        </div>
                        <form class="row" action="../data/student.php" method="post">
                          <div class="form-group  col-12 col-lg-4">
                              <input type="text" name="firstname" value="" class="form-control" placeholder="Student Name">
                            </div>
                            <div class="form-group col-12 col-lg-4">
                              <input type="text"  name="fathername" value="" placeholder="Father Name" class="form-control">
                            </div>
                            <div class="form-group col-12 col-lg-4">
                              <input type="text" name="gname" value="" placeholder="Grand Father Name" class="form-control">
                            </div>
                            <div class="form-group col-12 col-lg-4">
                              <?php $idno=$_SESSION['user_idno']; ?>
                              <input type="text"  name="idno" value="<?php echo $idno ?>" placeholder="ID No" class="form-control">
                            </div>
                            <div class="form-group col-12 col-lg-4">
                              <input type="email"  name="email" value="" placeholder="E-mail" class="form-control">
                            </div>
                            <div class="form-group col-12 col-lg-4">
                              <input type="text" name="phone" class="form-control" value="" placeholder="Phone">
                            </div>
                            <div class="col-12 col-lg-3 form-group">
                              <label for="">Gender</label>
                              <select class="custom-select" name="gender">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                              </select>
                            </div>
                            <div class="col-12 col-lg-3 form-group">
                              <label for="">Year</label>
                              <select class="custom-select" name="year">
                                <option value="I">I</option>
                                <option value="II">II</option>
                                <option value="III">III</option>
                                <option value="IV">IV</option>
                              </select>
                            </div>
                            <div class="col-12 col-lg-3 form-group">
                              <label for="">Program</label>
                              <select class="custom-select" name="program">
                                <option value="BSc">BSc</option>
                                <option value="MSc">MSc</option>
                                <option value="Phd">Phd</option>
                              </select>
                            </div>
                            <div class="col-12 col-lg-3 mx-auto form-group">
                              <label for="">Birth date</label>
                              <input type="date" name="bdate" value="" placeholder="Birth Date" class="form-control">
                            </div>
                            <div class="col-12"></div>
                            <div class="col-12 col-lg-5 mx-auto">
                              <button type="submit" name="student" class="btn btn-info waves-light" mdbWavesEffect>Sava Information</button>
                            </div>
                        </form>
                       <?php
                        }
                      }
                    }
                $list=new newstudent();
               ?>
            </div>
            <!-- edit student profile -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
