<?php include 'inc/header.php';?>

<?php
$postid = mysqli_real_escape_string($db->link, $_GET['category']);
	if (!isset($postid) || $postid == NULL) {
		header("Location: 404.php");
	} else{
		$id = $postid;
	}
?>
<div class="contentsection contemplete clear">
<div class="maincontent clear">
	<?php 
		$query = "SELECT * FROM tbl_post WHERE cat = $id";
		$post = $db->select($query);
		if($post){
			while($result = $post->fetch_assoc()){
	?>
	<div class="samepost clear">
		<h2><a href="post.php?id=<?php echo $result['id'];?>"><?php echo $result['title'];?></a></h2>
		<h4><?php echo $fm->formatDate($result['date']);?>, By <a href="#"><?php echo $result['author'];?></a></h4>
		 <a href="post.php?id=<?php echo $result['id'];?>"><img src="admin/<?php echo $result['image'];?>" alt="post image"/></a>
		<?php echo $fm->textShorten($result['body']);?>
		<div class="readmore clear">
			<a href="post.php?id=<?php echo $result['id'];?>">Read More</a>
		</div>
	</div>
	<?php } } else{ ?>
	<p>No post available in this category!</p>
	<?php } ?>
</div>
<?php include 'inc/sidebar.php';?>
<?php include 'inc/footer.php';?>