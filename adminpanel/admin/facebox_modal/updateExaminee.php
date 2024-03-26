
<?php 
  include("../../../conn.php");
  $id = $_GET['id'];
 
  $selExmne = $conn->query("SELECT * FROM etudiant WHERE num_etudiant='$id' ")->fetch(PDO::FETCH_ASSOC);

 ?>

<fieldset style="width:543px;" >
	<legend><i class="facebox-header"><i class="edit large icon"></i>&nbsp;Update <b>( <?php echo strtoupper($selExmne['exmne_fullname']); ?> )</b></i></legend>
  <div class="col-md-12 mt-4">
<form method="post" id="updateExamineeFrm">
      
      <div class="form-group">
        <legend>Number</legend>
        <input type="hidden" name="num_etudiant" value="<?php echo $id; ?>">
        <input type="" name="exNumber" class="form-control" required=""readonly="" value="<?php echo $selExmne['num_etudiant']; ?>" >
     </div>


     <div class="form-group">
        <legend>Fullname</legend>
        <input type="hidden" name="exmne_id" value="<?php echo $id; ?>">
        <input type="" name="exFullname" class="form-control" required="" value="<?php echo $selExmne['exmne_fullname']; ?>" >
     </div>

     <div class="form-group">
        <legend>Gender</legend>
        <select class="form-control" name="exGender">
          <option value="<?php echo $selExmne['exmne_gender']; ?>"><?php echo $selExmne['exmne_gender']; ?></option>
          <option value="male">Male</option>
          <option value="female">Female</option>
        </select>
     </div>

     <div class="form-group">
        <legend>Birthdate</legend>
        <input type="date" name="exBdate" class="form-control" required="" value="<?php echo date('Y-m-d',strtotime($selExmne["exmne_birthdate"])) ?>"/>
     </div>


    <div class="form-group">
        <legend>Courses</legend>
        <?php
        $exmneCourse = $selExmne['exmne_course'];
        $selCourse = $conn->query("SELECT * FROM course_tbl WHERE cou_id='$exmneCourse' ")->fetch(PDO::FETCH_ASSOC);
        ?>
        <select class="form-control" name="exCourse[]" multiple>
                <?php
                    $examenCourseArray = explode( ',', $exmneCourse );
                    foreach($examenCourseArray as $value) {
                        $selCourse = $conn->query("SELECT * FROM course_tbl WHERE cou_id='$value' ")->fetch(PDO::FETCH_ASSOC);
                        echo $selCourse['cou_name']. "<br>";

                        ?>
                    <option value="<?php echo $value; ?>" selected><?php echo $selCourse['cou_name'];?></option>
                    <?php $selOtherCourses = $conn->query("SELECT * FROM course_tbl WHERE cou_id NOT IN ($exmneCourse) ");} ?>

                    <?php
                        while ($selOtherCourseRow = $selOtherCourses->fetch(PDO::FETCH_ASSOC)) { ?>
                        <option value="<?php echo $selOtherCourseRow['cou_id']; ?>"><?php echo $selOtherCourseRow['cou_name']; ?></option>
                <?php } ?>
        </select>
    </div>
     <div class="form-group">
        <legend>Year level</legend>
        <input type="" name="exYrlvl" class="form-control" readonly="" required="" value="<?php echo $selExmne['niveau']; ?>" >
     </div>

     <div class="form-group">
        <legend>Email</legend>
        <input type="" name="exEmail" class="form-control" required="" value="<?php echo $selExmne['adr_email']; ?>" >
     </div>

     <div class="form-group">
        <legend>Password</legend>
        <input type="" name="exPass" class="form-control" required="" value="<?php echo $selExmne['exmne_password']; ?>" >
     </div>

     <div class="form-group">
        <legend>Status</legend>
        <input type="hidden" name="course_id" value="<?php echo $id; ?>">
        <input type="" name="newCourseName" class="form-control" required="" value="<?php echo $selExmne['exmne_status']; ?>" >
     </div>
  <div class="form-group" align="right">
    <button type="submit" class="btn btn-sm btn-primary">Update Now</button>
  </div>
</form>
  </div>
</fieldset>







