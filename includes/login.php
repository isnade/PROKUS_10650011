<div id="content_wrapper">
  <div id="sidebar">
    <div class="sidebar_box"><img src="images/img.jpg" width="51" height="37" alt=""/>
	<span style="font:bold italic 20px/24px Georgia; color:#106fb8;">login</span></br></br>
	<form action="functions/loginpost.php" method="post" enctype="multipart/form-data">
      <table>
	  <tr>
	  <td>Username </td><td><input name="username" type="text" size="20"/></td>
	  </tr>
	  <tr>
      <td>Password </td><td><input name="password" type="password" size="20"/></td>
	  </tr>
	  <tr>
	  <td>Login sebagai</td>
      <td>
	  <select style="padding:4px;solid #000;width:142px;" name="sebagai">
			<option value="siswa">Siswa</option>
			<option value="guru">Guru</option>
			<option value="admin">Admin</option>
			</select></td>
	  </tr>
	  <tr>
	  <td colspan=2><input style="float:right;padding:4px;border:1px solid #000;width:142px;" type="submit" name="submit" value="LOGIN" /></td>
	  </tr>
	  </table>
    </div>
    <div class="sidebar_box_bottom"></div>
  </div>