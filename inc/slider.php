<div class="slidersection templete clear">
        <div id="slider">
<?php 
	$query = "SELECT * FROM tbl_slider ORDER BY id LIMIT 4";
		$slider = $db->select($query);
		if ($slider) {
			while ($result = $slider->fetch_assoc()) {
?>
            <a href="#">
            	<img height="280px"  src="admin/<?php echo $result['image']; ?>" alt="<?php echo $result['title']; ?>" title="<?php echo $result['title']; ?>" />
            </a>
<?php } } ?>
        </div>
</div>