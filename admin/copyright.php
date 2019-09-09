<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_10">

    <div class="box round first grid">
        <h2>Update Copyright Text</h2>

<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $note = $fm->validation($_POST['note']);


    $note = mysqli_real_escape_string($db->link, $note);

        if ($note == "") {
        echo "<span class='error'>Field must not be empty !</span>";

    } else{
            $query = "UPDATE tbl_footer
                SET
                note   = '$note'
                WHERE id = '1'";
            $updated_row = $db->update($query);
            if ($updated_row) {
             echo "<span class='success'>Data Updated Successfully.
             </span>";
            }else {
             echo "<span class='error'>Data Not Updated !</span>";
            }
    }
}
?>


        <div class="block copyblock"> 
<?php 
    $query = "SELECT * FROM tbl_footer WHERE id = '1'";
    $footernote = $db->select($query);
    if ($footernote) {
        while ($result = $footernote->fetch_assoc()) {
?> 
         <form action="" method="post">
            <table class="form">					
                <tr>
                    <td>
                        <input type="text" value="<?php echo $result['note']; ?>" name="note" class="large" />
                    </td>
                </tr>
				
				 <tr> 
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
<?php } } ?>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?> 