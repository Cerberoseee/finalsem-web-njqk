<form method="post" action="./upload-video.php" enctype="multipart/form-data">
  <input name="userId" type="text" />
  <input name="videoId" type="text" />
  <input name="thumbnail" accept="image/*" type="file"/>
  <input name="video" accept="video/*" type="file"/>
  <input type="submit"/>
</form>