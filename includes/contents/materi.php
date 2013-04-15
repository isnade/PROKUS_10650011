<div id="content">
    <div class="content_box">
<h2 align="center">Upload Files</h2>
<form enctype="multipart/form-data" action="includes/upload.php" method="post">
<table align="center">
  <tr>
    <td width="29%" height="37" valign="middle"><font size="2" face="verdana">File</font></td>
    <td><input type="file" name="datafile" size="30" id="gambar" /></td>
  </tr>
  
  <tr>
    <td height="182"><font face="verdana" size="2">Keterangan</font></td>
    <td><textarea name="keterangan" cols="30" rows="10"></textarea></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td width="71%"><input name="submit" type="submit" value="Upload" />&nbsp;</td>
  </tr>
</table>
</form>
<?php include "download.php";?>
      <div class="section_w250 float_r">
      </div>
    </div>
    <div class="content_box_bottom"></div>
  </div>
  <div class="cleaner"></div>