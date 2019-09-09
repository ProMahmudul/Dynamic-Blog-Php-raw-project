<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Post List</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th width="10%">No.</th>
					<th width="15%">Post Title</th>
					<th width="15%">Description</th>
					<th width="5%">Category</th>
					<th width="10%">Image</th>
					<th width="10%">Author</th>
					<th width="10%">Tags</th>
					<th width="10%">Date</th>
					<th width="15%">Action</th>
				</tr>
			</thead>
			<tbody>
<?php 
	$query = "SELECT tbl_post.*, tbl_category.name FROM	tbl_post
				INNER JOIN tbl_category
				ON tbl_post.cat = tbl_category.id
				ORDER BY tbl_post.title DESC";
				$post = $db->select($query);
				if ($post) {
					$i = 0;
					while ($result = $post->fetch_assoc()) {
						$i++;
?>
				<tr class="odd gradeX">
					<td><?php echo $i; ?></td>
					<td><?php echo $result['title']; ?></td>
					<td><?php echo $fm->textShorten($result['body'], 50); ?></td>
					<td><?php echo $result['name']; ?></td>	
					<td><img src="<?php echo $result['image']; ?>" height="40px" width="60px"></td>
					<td><?php echo $result['author']; ?></td>
					<td><?php echo $result['tags']; ?></td>
					<td><?php echo $fm->formatDate($result['date']); ?></td>
	<td>
	<a href="viewpost.php?viewpostid=<?php echo $result['id']; ?>">View</a> 

<?php 
	if (Session::get('userId') == $result['userid'] || Session::get('userRole') == '0') { ?>
||	<a href="editpost.php?editpostid=<?php echo $result['id']; ?>">Edit</a> ||
	<a onclick="return confirm('Are you sure to Delete!')" href="deletepost.php?delpostid=<?php echo $result['id']; ?>">Delete</a>
<?php } ?>
	
	</td>
				</tr>
<?php } } ?>
			</tbody>
		</table>

       </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function () {
    setupLeftMenu();
    $('.datatable').dataTable();
	setSidebarHeight();
});
</script>
<?php include 'inc/footer.php';?> 
